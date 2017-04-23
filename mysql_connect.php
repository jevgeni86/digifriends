<?php
$dbh=mysql_connect($mysql_host, $mysql_user, $mysql_pwd) or die ("Could not connect to mysql host!");
$db_sel=mysql_select_db($mysql_db, $dbh) or die("Could not connect to Database!");
?>
