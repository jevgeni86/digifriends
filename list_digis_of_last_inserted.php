<?php
include("./mysql_conf.php");
include("./mysql_connect.php");

$res = mysql_query("select d.num, d.digi, sel2.date_added from digifriend d, (select num, date_added from number n, (SELECT max(date_added) as last_entry FROM digifriends.number) sel where n.date_added=sel.last_entry) sel2 where d.num=sel2.num");

$row_counter = 0;

while($row = mysql_fetch_array($res)){

	if ($row_counter < 1){
		echo "The last inserted number was: ".$row['num'];
		echo "<br>";
		echo "Inserted on ".$row['date_added'];
		echo "<br>";
		echo "This number's digifriends are: \n";
		echo "<br>";
		
		mysql_query("update number set date_last_used=curdate() where num=".$row['num']);
	}
	if ($row_counter > 0) echo ", ";
	echo $row['digi'];
	
	$row_counter += 1;
}

if (mysql_num_rows($res)==0){
	echo "Database is empty. Please insert number to compute digifriends";
}

?>