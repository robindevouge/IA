<?php

include "settings.php";
include "databaseConnect.php";
include "Security.php";

//print_r($_POST);
//print_r(array_keys($_POST));

$link=Connect();
$name=$_POST["last_name"];
$first=$_POST["first_name"];
$alias=$_POST["alias"];
$password=sch_encrypt($_POST["password0"],$alias);
$email=$_POST["email"];
$query=$link->prepare("INSERT INTO users (name, first, alias, email,password, register_date) VALUES (:name,:first, :alias, :email,:password,NOW())");

if (!$query->execute(array(':name'=>$name,":first"=>$first,':email'=>$email,':password'=>$password,':alias'=>$alias))) {
    die("Exiting, insert failure");
}
$link=null;
die();
?>