<!DOCTYPE html>
<html>
  <head>
    <title>Users List</title>
    <link rel="stylesheet" href="4-styles.css"/>
    <script src="5-message.js"></script>
  </head>
  <body>
    <?php
    // (A) GET USERS
    require "2-core.php";
    require "3-lib-msg.php";
    $users = $MSG->getUsers($_SESSION["user"]["id"]);
    ?>

    <!-- (B) LEFT : USER NOW & LIST -->
    <div id="userLeft">
      <!-- (B1) CURRENT USER -->
      <div id="userNow">
        You are <?=$_SESSION["user"]["name"]?>
      </div>

      <!-- (B2) USER LIST -->
      <?php foreach ($users as $uid=>$u) { ?>
      <div class="userRow" id="usr<?=$uid?>" onclick="msg.show(<?=$uid?>)">
        <?php if (isset($u["unread"])) { ?>
        <u class="userUR" id="ur<?=$uid?>"><?=$u["unread"]?></u>
        <?php } ?>
        <?=$u["user_name"]?>
      </div>
      <?php } ?>
    </div>

    <!-- (C) RIGHT : MESSAGES LIST -->
    <div id="userRight">
      <!-- (C1) SEND MESSAGE -->
      <form id="userSend" onsubmit="return msg.send()">
        <input type="text" id="msgTxt" required/>
        <input type="submit" value="Send"/>
      </form>

       <!-- (C2) MESSAGES -->
       <div id="userMsg"></div>
    </div>
  </body>
</html>
