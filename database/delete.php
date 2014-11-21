<?php
function deleteBottleByID ($id) {
  $dbh = connectToDB();
  //Delete corresponding Label
  $sth = $dbh->prepare("DELETE FROM label WHERE bottleFK = ?");
  $sth->execute(array($id));
  $sth = $dbh->prepare("DELETE FROM bottle WHERE ID = ?");
  $sth->execute(array($id));

  if( sizeOf(getBottleByID($id)) == null)
    return true;
  return false;
}

function deleteCustomerByID($id) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("DELETE FROM customer WHERE ID = ?");
  $sth->execute(array($id));
  if( sizeOf(getCustomerByID($id)) == null)
    return true;
  return false;
}

function deleteStrainByID ($id) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("DELETE FROM strain WHERE ID = ?");
  $sth->execute(array($id));

  //Delete corresponding Label
  $sth = $dbh->prepare("DELETE FROM label WHERE strainFK = ?");
  $sth->execute(array($id));
  if( sizeOf(getStrainByID($id)) == null)
    return true;
  return false;
}


?>