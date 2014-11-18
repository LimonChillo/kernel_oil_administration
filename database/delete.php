<?php
function deleteBottleByID ($id) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("DELETE FROM bottle WHERE ID = ?");
  $sth->execute(array($id));
  if( $sth->fetchAll() != null)
    return true;
  return false;
}
?>