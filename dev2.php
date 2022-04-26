<head>

</head>
<body>
<?php



if (isset($_POST['ShutDown']))
{
	echo "ShutDown button pressed ", "<br>", "working ";
	exec ("sudo reboot");// works
	
	echo "\n";
	echo "<br>","called for shutdown", "<br>";
	
}



?>
<h1 > Shut Down</h1>
<div align="center">
<form method="post">
<button style= "padding:14px 28px;margin: 4px 8px" name="ShutDown"> Shut Down </button>
</form>
</div>
</body>
