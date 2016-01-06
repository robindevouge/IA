<?php
include "settings.php";
include "databaseConnect.php";

$link=Connect();
$testedAlias=$_GET["alias"];
/* guard against SQL injection
 *  should be the rule for anything
 *  gotten from a user input
 *
 * this means using 'prepare' and 'execute'
 */
$query=$link->prepare("SELECT alias FROM users where alias=:alias");
$query->execute(array(":alias"=>$testedAlias));
$result=$query->fetch(PDO::FETCH_ASSOC);
if (!$result) // we failed to find an alias, therefore all is OK
    echo '"true"'; // note the quotes !
else
    echo '"cet alias est déjà pris"';// if failure, anything is OK, note the quotes

?>