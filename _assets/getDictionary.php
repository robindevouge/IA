<?php

include "settings.php";
include "databaseConnect.php";

function dumpDB(){
    $link=Connect();
    $query=$link->prepare("SELECT word,answer  FROM ia_dictionary");// change to match your db
    $query->execute();
    $res=$query->fetchall(PDO::FETCH_ASSOC);
    return $res;
}
echo json_encode(dumpDB());


?>