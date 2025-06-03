<?php

require_once 'db_setup.php';

function getArabiLinks(){
	$sql = "SELECT id, Head, qafiya from nazamo where Lang='ARB' ORDER by qafiya, Head";
	$rec = db_query_all($sql);

	$html = "<ul class='list-group list-group-flush'>";
	for ($i=0; $i < count($rec); $i++) { 
		$id = $rec[$i]['id'];
		$head = $rec[$i]['Head'];
		$qafiya = $rec[$i]['qafiya'];
		$q = $i+1;
		$html .= "<li class='list-group-item'>$q. <a href='view.php?id=$id'>$head </a> - ($qafiya)</li>";
	}
	$html .= "</ul>";
	return $html;
}

function getLSDLinks(){
	$sql = "SELECT id, Head, qafiya from nazamo where Lang='LSD' ORDER by Head";
	$rec = db_query_all($sql);

	$html = "<ul class='list-group list-group-flush'>";
	for ($i=0; $i < count($rec); $i++) { 
		$id = $rec[$i]['id'];
		$head = $rec[$i]['Head'];
		$q = $i+1;
		$html .= "<li class='list-group-item'>$q. <a href='view.php?id=$id'>$head </a></li>";
	}
	$html .= "</ul>";
	return $html;
}

function getURDLinks(){
	$sql = "SELECT id, Head, qafiya from nazamo where Lang='URD' ORDER by Head";
	$rec = db_query_all($sql);

	$html = "<ul class='list-group list-group-flush'>";
	for ($i=0; $i < count($rec); $i++) { 
		$id = $rec[$i]['id'];
		$head = $rec[$i]['Head'];
		$q = $i+1;
		$html .= "<li class='list-group-item'>$q. <a href='view.php?id=$id'>$head </a></li>";
	}
	$html .= "</ul>";
	return $html;
}

function getByUpdated(){
	$sql = "SELECT * from nazamo ORDER by last_updated DESC";
	$rec = db_query_all($sql);

	$html = "<ul class='list-group list-group-flush'>";
	for ($i=0; $i < count($rec); $i++) { 
		$id = $rec[$i]['Id'];
		$head = $rec[$i]['Head'];
		$last = $rec[$i]['last_updated'];

		if ($last == "2025-05-26 07:40:25") break;
		
		// if ($last == "2025-05-25 21:51:16") break;

		$first  = new DateTime( $last );
		$second = new DateTime();
		$diff = $first->diff( $second );
		$disp = $diff->format( '%H:%I:%S' ); // -> 00:25:25

		$q = $i+1;
		$html .= "<li class='list-group-item'>$id. <a href='view.php?id=$id'>$head </a> - ($disp) ($last)</li>";
	}
	$html .= "</ul>";
	return $html;
}

function getSinf(){
	$sql = "SELECT * from nazamo ORDER by Sinf DESC, Head ASC";
	$rec = db_query_all($sql);

	$html = "<ul class='list-group list-group-flush'>";
	for ($i=0; $i < count($rec); $i++) { 
		$id = $rec[$i]['Id'];
		$head = $rec[$i]['Head'];
		$sinf = $rec[$i]['Sinf'];
		
		$q = $i+1;
		$html .= "<li class='list-group-item'>$id. <a href='view.php?id=$id'>$head </a> - ($sinf)</li>";
	}
	$html .= "</ul>";
	return $html;
}

function is_authorized($email, $name, $picture) {
	$sql = "INSERT INTO users (email, name, picture) SELECT * FROM (SELECT '$email', '$name', '$picture') AS tmp
		WHERE NOT EXISTS (
    	SELECT email FROM users WHERE email = '$email'
		) LIMIT 1;";

	db_execute($sql);
	$sql2 = "SELECT * from users WHERE email = '$email'";
	$ret = db_query_one($sql2);
	
	return $ret['authorized'];
}

function getFeaturedLinks() {
	$sql = "SELECT id, Head from nazamo where id in (116, 102, 481, 390, 396, 331, 325, 299, 273)";
	$rec = db_query_all($sql);

	$html = "<ul class='list-group list-group-flush'>";
	for ($i=0; $i < count($rec); $i++) { 
		$id = $rec[$i]['id'];
		$head = $rec[$i]['Head'];
		$q = $i+1;
		$html .= "<li class='list-group-item'>$q. <a href='view.php?id=$id'>$head </a></li>";
	}
	$html .= "</ul>";
	return $html;
}

function get_doubled_links(){
	$sql = "SELECT id, Head  FROM `nazamo` WHERE `Mawad` LIKE '%---%' OR remarks LIKE '%doubled%' ORDER BY `w_date`  DESC";
	$rec = db_query_all($sql);

	$html = "<ul class='list-group list-group-flush'>";
	for ($i=0; $i < count($rec); $i++) { 
		$id = $rec[$i]['id'];
		$head = $rec[$i]['Head'];
		$q = $i+1;
		$html .= "<li class='list-group-item'>$q. <a href='view.php?id=$id'>$head </a></li>";
	}
	$html .= "</ul>";
	return $html;
}
