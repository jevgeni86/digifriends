
<html>
<head>
	<meta charset="UTF-8">
	<title>Digifriends</title>
	<meta name="description" content="The Digifriends Website">
	<link rel="stylesheet" href="css/stylesheet.css" type="text/css">
	
</head>


<?php
include("./functions.php");
?>

<div>
<a href="./index.php"><h2>DigifriendsDB</h2></a>
</div>


<?php

$mysql_conf_file_path = "./mysql_conf.php";

if (file_exists($mysql_conf_file_path)){
	
	include($mysql_conf_file_path);
	
	$dbh=mysql_connect($mysql_host, $mysql_user, $mysql_pwd);
	if ($dbh){
		$db_sel=mysql_select_db($mysql_db, $dbh);
		if ($db_sel){
			include("./user_stories.php");
		}else{
			?><script>showHint("Could not connect to database. Try rerunning setup.");</script><?php
			include("./setup.php");
		}
		
	}else{
		?><script>showHint("Could not connect to mysql host. Try rerunning setup.");</script><?php
		include("./setup.php");
	}
	
} else {
	include("./setup.php");
}
?>

<div>
	<div id="spinner" style="visibility: hidden;"><img src="./img/spinner.gif" /></div>
	<div><p id="hint" /></div>
</div>

</html>

