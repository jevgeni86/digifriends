<?php
include("./mysql_conf.php");
include("./mysql_connect.php");

$X = $_GET['number'];

$res=mysql_query("insert into number values (".$X.", curdate(), now())");

if (!$res){
	echo 2;
	return;//is already in db
}

#compute digifriend
for ($i = 1; $i <= $X; $i++) {
    if (($i % 3) == 0){
		$digifriend = $i+$i*$X;
		mysql_query("insert into digifriend values (".$X.", $digifriend)");
	}
    if (($i % 5) == 0){
		$digifriend = $i+$i*round(sqrt($X))+1;
		mysql_query("insert into digifriend values (".$X.", $digifriend)");
	}
    if ((($i % 3) == 0) and (($i % 5) == 0)){
		$digifriend = $i+$i*3*5*round(sqrt($X))+2;
		mysql_query("insert into digifriend values (".$X.", $digifriend)");
	}
} 

 echo 0;//success

?>
