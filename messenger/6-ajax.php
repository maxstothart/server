<?php
if (isset($_POST["req"])) {
  // (A) LOAD LIBRARY
  require "2-core.php";
  require "3-lib-msg.php";

  switch ($_POST["req"]) {
    // (B) INVALID
    default: echo "Invalid request"; break;

    // (C) LIST MESSAGES
    case "list":
      $msg = $MSG->getMsg($_POST["uid"], $_SESSION["user"]["id"]);
      if (count($msg)>0) { foreach ($msg as $m) {
        $css = $m["user_from"] == $_SESSION["user"]["id"] ? "mout" : "min" ; ?>
        <div class="<?=$css?>">
          <div class="mdate"><?=$m["date_send"]?></div>
          <div class="mtxt"><?=$m["message"]?></div>
        </div>
      <?php }}
      break;

    // (D) SEND MESSAGE
    case "send":
      echo $MSG->send($_SESSION["user"]["id"], $_POST["to"], $_POST["msg"])
        ? "OK" : $MSG->error ;
      break;
  }
}
