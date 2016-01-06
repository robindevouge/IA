<?php

include "settings.php";
include "databaseConnect.php";

$link=Connect();
$word=$_POST["word"];
$answer=$_POST["answer"];
$query=$link->prepare("INSERT INTO ia_dictionary (word, answer) VALUES (:word, :answer)");

if (!$query->execute(array(':word'=>$word,":answer"=>$answer))) {
    die("Exiting, insert failure");
}
$link=null;
die();
?>