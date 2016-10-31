<?php
function db_init($host,$dbuser,$dbpw,$dbname,$dbport){
  $conn = mysqli_connect($host,$dbuser,$dbpw,$dbname,$dbport);
  return $conn;
}
?>
