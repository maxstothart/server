<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <script src="jquery-1.11.0.min.js"></script>
  <script src="script.js"></script>
  <link media="all" type="text/css" href="pi.css" rel="stylesheet">
  <title>Reboot</title>
  
  
  <script>
   $('document').ready(function() {
   
		// Call count down timer (see script.js)
		countDownToAction("rebootaction.php", "#rebootseconds");
		
	});  
	</script>
  
</head>
<body class="body">

<h2>PI Server Reboot</h2>
<HR>
<h3>Server will reboot in <span id="rebootseconds"></span> seconds ...</h3>
<HR>
<input type="button" id="cancel"  value="Cancel" onClick="gotoServerStatus()"/>
</body>