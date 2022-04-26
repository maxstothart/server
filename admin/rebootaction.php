<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <script src="jquery-1.11.0.min.js"></script>
  <script src="script.js"></script>
  <link media="all" type="text/css" href="pi.css" rel="stylesheet">
  <title>Reboot</title>
</head>
<body class="body">

<h2>PI Server Reboot</h2>
<HR>
<h3>Server is rebooting now !</h3>

<HR>

<?php
		exec("python reboot.py");
		//exec("python /var/www/remotecontrol/python/shutdown.py");

?>


<!-- After 5 seconds attempt to return to main page - this will prevent this action being called again if the user refreshes this page -->

<script>
	var clock = setInterval(function(){execReboot()},5000);
	function execReboot()	{	
		gotoServerStatus();
	}
</script>
</body>
