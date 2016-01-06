<?php

	function ConnectMYSQL(){
		/*
		$mysql_server="robindevouge.be.mysql";
		$mysql_userName="robindevouge_be";
		$mysql_password="UHgTE7BJ"
//		$mysql_password=file_get_contents("./assets/.password");
		$mysql_databaseName="robindevouge_be";
		*/
		
		$mysql_server="localhost";
		$mysql_userName="root";
		$mysql_password="root";
		$mysql_databaseName="mysql";


	$databaseConfiguration='mysql:host='.$mysql_server.';dbname='.$mysql_databaseName.';charset=utf8';//would be different with a Microsoft server
		$link=new PDO($databaseConfiguration,$mysql_userName, $mysql_password);
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $link;
	}

?>