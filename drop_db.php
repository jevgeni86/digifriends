<?php
include("./mysql_conf.php");
include("./mysql_connect.php");


unlink("./mysql_conf.php");

mysql_query("drop database digifriends");

echo 0;//success

?>