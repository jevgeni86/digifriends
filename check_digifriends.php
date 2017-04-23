<?php

include("./mysql_conf.php");
include("./mysql_connect.php");

#create temp table to temprorarily store digifriends of y and z

$filename = "./sql/digifriend_temp.sql";

include("./read_sql_file.php");

$digi_Y = $_GET['digi_y'];
$digi_Z = $_GET['digi_z'];



#compute digifriends of y
for ($i = 1; $i <= $digi_Y; $i++) {
    if (($i % 3) == 0){
		$digifriend = $i+$i*$digi_Y;
		mysql_query("insert into digifriend_temp values (".$digi_Y.", $digifriend)");
	}
    if (($i % 5) == 0){
		$digifriend = $i+$i*round(sqrt($digi_Y))+1;
		mysql_query("insert into digifriend_temp values (".$digi_Y.", $digifriend)");
	}
    if ((($i % 3) == 0) and (($i % 5) == 0)){
		$digifriend = $i+$i*3*5*round(sqrt($digi_Y))+2;
		mysql_query("insert into digifriend_temp values (".$digi_Y.", $digifriend)");
	}
} 


#compute digifriends of z
for ($i = 1; $i <= $digi_Z; $i++) {
    if (($i % 3) == 0){
		$digifriend = $i+$i*$digi_Z;
		mysql_query("insert into digifriend_temp values (".$digi_Z.", $digifriend)");
	}
    if (($i % 5) == 0){
		$digifriend = $i+$i*round(sqrt($digi_Z))+1;
		mysql_query("insert into digifriend_temp values (".$digi_Z.", $digifriend)");
	}
    if ((($i % 3) == 0) and (($i % 5) == 0)){
		$digifriend = $i+$i*3*5*round(sqrt($digi_Z))+2;
		mysql_query("insert into digifriend_temp values (".$digi_Z.", $digifriend)");
	}
}

#check if digi_y and digi_z are friends
$res = mysql_query("select num from digifriend_temp where (num=".$digi_Y." AND digi=".$digi_Z.") OR (num=".$digi_Z." AND digi=".$digi_Y.")");



if (mysql_num_rows($res)>0){
	echo "The specified numbers are digifriends";
	//echo 0;
}else{
	echo "The specified numbers are not digifriends";
	//echo 1;
}

 ?>
 