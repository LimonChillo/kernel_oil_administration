<?php
function getStrains()
{
  $sth = $dbh->prepare("SELECT s.ID, s.name FROM strain s");
    $sth->execute();
    $strains = $sth->fetchAll();

  return $strains;
}

function getAmountBottles($bottleId)
{
  $sth = $dbh->prepare("SELECT b.amout FROM bottle b WHERE b.ID = ?");
    $sth->execute( array( $bottleId ););
    $amountBottles = $sth->fetchAll();

  return $amountBottles;
}

function getAmountLabels($bottleId, $strainId)
{
  $sth = $dbh->prepare("SELECT l.amount FROM label l JOIN bottle b JOIN strain strain ON l.bottleFK = b.ID AND l.strainFK = s.ID WHERE b.ID = ? AND s.ID = ?;");
    $sth->execute( array( $bottleId, $strainId ););
    $amountLabels = $sth->fetchAll();

  return $amountLabels;
}

function getAmountCornByStrain($strainId)
{
  $sth = $dbh->prepare("SELECT b.fillLevel as fillLevel FROM barrel b JOIN strain s ON b.strainFK = s.ID WHERE s.ID = ? ORDER BY s.name;");
    $sth->execute( array( $strainId ););
    $amountCorn = $sth->fetchAll();

  return $amountCorn;
}


SELECT p.amount as amount FROM product p JOIN strain s JOIN bottle b ON p.bottleFK = b.ID AND p.strainFK = s.ID WHERE s.ID = ? and b.ID = ? ORDER BY s.name;
?>