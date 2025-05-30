<?php
include 'db_setup.php';

echo 'Welcom to abyat<br>';
function getAbyatCount($nazam){
	$str = "\n";
	$pattern = "/\*/mu";
	$my_nazam = preg_replace($pattern, $str, $nazam);

	$pattern2 = "/\n\s*\n/mu";
	$my_nazam = preg_replace($pattern2, $str, $my_nazam);

	$splited =  (explode("\n",$my_nazam));
	return count($splited)/2;
}

// $sql = "SELECT *  FROM `nazamo` WHERE `abyat_count` LIKE '%.5%'  ORDER BY `nazamo`.`abyat_count`  ASC";


$sql = "SELECT * from nazamo ORDER BY abyat_count ASC;";
$ret = db_query_all($sql);

for ($i=0; $i < count($ret); $i++) { 
	$nazam = $ret[$i]['Mawad'];
	$id = $ret[$i]['Id'];
	$matla = $ret[$i]['Head'];

	$abyatcnt = getAbyatCount($nazam);

	echo $ret[$i]['remarks'] . "-";
	echo $matla . " - ";
	echo $ret[$i]['abyat_count'] . " - ";
	echo "<a href='edit.php?id=$id'>" .$abyatcnt . "</a><br>";

	// $sql2 = "UPDATE nazamo SET abyat_count= '$abyatcnt' WHERE Id = '$id'";
	// db_execute($sql2);
}

