<?php
function sch_encrypt($string){
  return md5($string."kedis");
}
function sch_verify($string, $encrypted){
  return md5($string."kedis")==$encrypted;
}
?>