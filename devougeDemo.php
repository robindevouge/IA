<?php
/*
  an example of how to dump a database table into json for use with an ajax query on the client side
 */
include("settings.php");
function ConnectMYSQL(){
// change four lines below to match your web hosting
    $mysql_server="robindevouge.be.mysql";
    $mysql_userName="robindevouge_be";
    $mysql_password=file_get_contents("./assets/.password");
    $mysql_databaseName="ia_dictionary";

// this is the "up-to-date" way of connecting
    $databaseConfiguration='mysql:host='.$mysql_server.';dbname='.$mysql_databaseName.';charset=utf8';//would be different with a Microsoft server
    $link=new PDO($databaseConfiguration,$mysql_userName, $mysql_password);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                                   //make sure to have errors reported when developing
    return $link;
}
function Connect(){
    return ConnectMYSQL();
}
function dumpDB(){
    $link=Connect();
    $query=$link->prepare("SELECT word,answer  FROM numbers");// change to match your db
    $query->execute();
    $res=$query->fetchall();
    return $res;
}
echo json_encode(dumpDB());
/* YIELDS, which is an array of objects
[{"id":"2","0":"2","whichQCM":"2","1":"2"},{"id":"3","0":"3","whichQCM":"2","1":"2"},{"id":"4","0":"4","whichQCM":"2","1":"2"},{"id":"5","0":"5","whichQCM":"2","1":"2"},{"id":"6","0":"6","whichQCM":"2","1":"2"},{"id":"7","0":"7","whichQCM":"2","1":"2"},{"id":"8","0":"8","whichQCM":"2","1":"2"},{"id":"9","0":"9","whichQCM":"2","1":"2"},{"id":"10","0":"10","whichQCM":"2","1":"2"},{"id":"11","0":"11","whichQCM":"2","1":"2"},{"id":"12","0":"12","whichQCM":"2","1":"2"},{"id":"13","0":"13","whichQCM":"2","1":"2"},{"id":"14","0":"14","whichQCM":"2","1":"2"},{"id":"15","0":"15","whichQCM":"2","1":"2"},{"id":"16","0":"16","whichQCM":"2","1":"2"},{"id":"17","0":"17","whichQCM":"2","1":"2"},{"id":"18","0":"18","whichQCM":"2","1":"2"},{"id":"19","0":"19","whichQCM":"2","1":"2"},{"id":"20","0":"20","whichQCM":"2","1":"2"},{"id":"21","0":"21","whichQCM":"2","1":"2"},{"id":"22","0":"22","whichQCM":"2","1":"2"},{"id":"23","0":"23","whichQCM":"2","1":"2"},{"id":"24","0":"24","whichQCM":"2","1":"2"},{"id":"25","0":"25","whichQCM":"2","1":"2"},{"id":"26","0":"26","whichQCM":"2","1":"2"},{"id":"27","0":"27","whichQCM":"2","1":"2"},{"id":"28","0":"28","whichQCM":"2","1":"2"},{"id":"29","0":"29","whichQCM":"2","1":"2"},{"id":"30","0":"30","whichQCM":"2","1":"2"},{"id":"31","0":"31","whichQCM":"2","1":"2"},{"id":"32","0":"32","whichQCM":"2","1":"2"},{"id":"33","0":"33","whichQCM":"2","1":"2"},{"id":"34","0":"34","whichQCM":"2","1":"2"},{"id":"35","0":"35","whichQCM":"2","1":"2"},{"id":"36","0":"36","whichQCM":"2","1":"2"},{"id":"37","0":"37","whichQCM":"2","1":"2"},{"id":"38","0":"38","whichQCM":"2","1":"2"},{"id":"39","0":"39","whichQCM":"2","1":"2"},{"id":"40","0":"40","whichQCM":"2","1":"2"},{"id":"41","0":"41","whichQCM":"2","1":"2"},{"id":"42","0":"42","whichQCM":"2","1":"2"},{"id":"43","0":"43","whichQCM":"2","1":"2"},{"id":"44","0":"44","whichQCM":"2","1":"2"},{"id":"45","0":"45","whichQCM":"2","1":"2"},{"id":"46","0":"46","whichQCM":"2","1":"2"},{"id":"47","0":"47","whichQCM":"2","1":"2"},{"id":"48","0":"48","whichQCM":"2","1":"2"},{"id":"49","0":"49","whichQCM":"2","1":"2"},{"id":"50","0":"50","whichQCM":"2","1":"2"},{"id":"51","0":"51","whichQCM":"2","1":"2"},{"id":"52","0":"52","whichQCM":"2","1":"2"},{"id":"53","0":"53","whichQCM":"2","1":"2"},{"id":"54","0":"54","whichQCM":"2","1":"2"},{"id":"55","0":"55","whichQCM":"2","1":"2"},{"id":"56","0":"56","whichQCM":"2","1":"2"},{"id":"57","0":"57","whichQCM":"2","1":"2"},{"id":"58","0":"58","whichQCM":"2","1":"2"},{"id":"59","0":"59","whichQCM":"2","1":"2"},{"id":"60","0":"60","whichQCM":"2","1":"2"},{"id":"61","0":"61","whichQCM":"2","1":"2"},{"id":"62","0":"62","whichQCM":"2","1":"2"},{"id":"63","0":"63","whichQCM":"2","1":"2"},{"id":"64","0":"64","whichQCM":"2","1":"2"},{"id":"65","0":"65","whichQCM":"2","1":"2"},{"id":"66","0":"66","whichQCM":"2","1":"2"},{"id":"67","0":"67","whichQCM":"2","1":"2"},{"id":"68","0":"68","whichQCM":"2","1":"2"},{"id":"69","0":"69","whichQCM":"2","1":"2"},{"id":"70","0":"70","whichQCM":"2","1":"2"},{"id":"71","0":"71","whichQCM":"2","1":"2"},{"id":"72","0":"72","whichQCM":"2","1":"2"},{"id":"73","0":"73","whichQCM":"2","1":"2"},{"id":"74","0":"74","whichQCM":"2","1":"2"},{"id":"75","0":"75","whichQCM":"2","1":"2"},{"id":"76","0":"76","whichQCM":"2","1":"2"},{"id":"77","0":"77","whichQCM":"2","1":"2"},{"id":"78","0":"78","whichQCM":"2","1":"2"},{"id":"79","0":"79","whichQCM":"2","1":"2"},{"id":"80","0":"80","whichQCM":"2","1":"2"},{"id":"81","0":"81","whichQCM":"2","1":"2"},{"id":"82","0":"82","whichQCM":"2","1":"2"},{"id":"83","0":"83","whichQCM":"2","1":"2"},{"id":"84","0":"84","whichQCM":"2","1":"2"},{"id":"85","0":"85","whichQCM":"2","1":"2"},{"id":"86","0":"86","whichQCM":"2","1":"2"},{"id":"87","0":"87","whichQCM":"2","1":"2"},{"id":"88","0":"88","whichQCM":"2","1":"2"},{"id":"89","0":"89","whichQCM":"2","1":"2"},{"id":"90","0":"90","whichQCM":"2","1":"2"},{"id":"91","0":"91","whichQCM":"2","1":"2"},{"id":"92","0":"92","whichQCM":"2","1":"2"},{"id":"93","0":"93","whichQCM":"2","1":"2"},{"id":"94","0":"94","whichQCM":"2","1":"2"},{"id":"95","0":"95","whichQCM":"2","1":"2"},{"id":"96","0":"96","whichQCM":"2","1":"2"},{"id":"97","0":"97","whichQCM":"2","1":"2"},{"id":"98","0":"98","whichQCM":"2","1":"2"},{"id":"99","0":"99","whichQCM":"2","1":"2"},{"id":"100","0":"100","whichQCM":"2","1":"2"},{"id":"101","0":"101","whichQCM":"2","1":"2"}]


 */


?>