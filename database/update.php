<?php

function updatePressingOfBarrel($barrels, $pressing) {
  $dbh=connectToDB();
  foreach ($barrels as $barrel){
     $sth = $dbh->prepare("UPDATE barrel SET pressingFK = ? WHERE ID = ?");
     $sth->execute(array($pressing, $barrel->ID));
  }
}

function stockBottles($amount, $name)
{
  $dbh = connectToDB();
  //$bottle = getBottleByName($name);
  $sth = $dbh->prepare("UPDATE bottle SET amount = ? WHERE name = ?");
  $sth->execute(array($amount, $name));
}

function stockLabels($amount, $strain, $bottle)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("UPDATE label SET amount = ? WHERE strainFK = ? AND bottleFK = ?");
  $sth->execute(array($amount, $strain, $bottle));
}

function bottlePressing($pressing, $bool)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("UPDATE pressing SET bottled = ? WHERE ID = ?");
  $sth->execute(array($bool, $pressing));
}

?>