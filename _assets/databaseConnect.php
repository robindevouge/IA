<?php
function Connect(){
$mysql_server="127.0.0.1";
$mysql_userName="smoothclicker";
$mysql_password=file_get_contents("../../passwords/.password");
$mysql_databaseName="smoothclicker_1";

  /* Connecting, selecting database */
//$link = new mysqli($mysql_server, $mysql_userName, $mysql_password,$mysql_databaseName);
//if ($link->connect_errno) {
//    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
//   die("exiting");
//}


$link=new PDO('mysql:host=localhost;dbname='.$mysql_databaseName.';charset=utf8',$mysql_userName, $mysql_password);
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $link;
}
?>