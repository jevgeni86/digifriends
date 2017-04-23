<?php
#create mysql_conf
$mysql_conf_file = fopen("./mysql_conf.php", "w") or die("Unable to create mysql_conf! Please check write privileges in web project directory");

$mysql_host="localhost";
$mysql_user=$_GET["user"];
$mysql_pwd=$_GET["pass"];
$mysql_db="digifriends";

fwrite($mysql_conf_file, "<?php \n");

fwrite($mysql_conf_file, "\$mysql_host="."'".$mysql_host."';"."\n");
fwrite($mysql_conf_file, "\$mysql_user="."'".$mysql_user."';"."\n");
fwrite($mysql_conf_file, "\$mysql_pwd="."'".$mysql_pwd."';"."\n");
fwrite($mysql_conf_file, "\$mysql_db="."'".$mysql_db."';"."\n");

fwrite($mysql_conf_file, "?> \n");

fclose($mysql_conf_file);


#create db

$dbh=mysql_connect($mysql_host, $mysql_user, $mysql_pwd) or die ("Could not connect to mysql host! Please check if mysql server is running");



$filename = "./sql/digifriends.sql";

include("./read_sql_file.php");

echo 0;//success



?>