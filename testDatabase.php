<?php

include "database/functions.php";

$query .= "SELECT * FROM strain";
$sth = $dbh->prepare("$query;");
$sth->execute($arr);
$data = $sth->fetchAll();

foreach($data as $d) 
{
  echo $d -> name;
}
?>