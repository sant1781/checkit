<?php
	$connect = mysql_connect("localhost", "root", "");
	$dbh = new PDO('mysql:host=localhost;dbname=checkit', 'root', '');
	//if(!$connect){
	//	die('Could not connect!: ' . mysql_error());
	//}
	mysql_select_db("checkit", $connect);	
        
       
?>