<!-- 
thanks to
http://stackoverflow.com/questions/20948155/simple-save-to-json-file-with-jquery
-->
<?php
$myFile = "dictionary.json";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = $_GET["dictionary"];
fwrite($fh, $stringData);
fclose($fh)
?>