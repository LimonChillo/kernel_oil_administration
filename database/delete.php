<?php
function deleteBottleByID ($id) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("DELETE FROM bottle WHERE ID = ?");
  $sth->execute(array($id));
  if( $sth->fetchAll() != null)
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
?>