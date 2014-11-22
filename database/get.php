<?php
function getAnyTable($table, $orderBy)
{

  $query = "SELECT * FROM $table";
  if($table == "strain")
    $query .= " WHERE ID != 0";
  if($orderBy != null)
    $query .= " ORDER BY $orderBy";

  $dbh = connectToDB();
  $sth = $dbh->prepare($query);
  $sth->execute();

  return $sth->fetchAll();
}


function getJoinedLabels($orderBy)
{
    $query = "SELECT l.ID AS ID, s.name AS strain, b.name AS bottle, l.amount AS amount
      FROM label l LEFT OUTER JOIN strain s ON l.strainFK = s.ID LEFT OUTER JOIN bottle b ON l.bottleFK = b.ID";

    switch ($orderBy) {
      case 'sorte':
        $query .= " ORDER BY s.name";
        break;

      case 'bottle':
        $query .= " ORDER BY b.name";
        break;

      default:
        # code...
        break;

  }

  $dbh = connectToDB();
  $sth = $dbh->prepare($query);
  $sth->execute();

  return $sth->fetchAll();
}

function getColumnNames($table)
{
  $dbh = connectToDB();
    $sth = $dbh->prepare("SHOW columns FROM $table");
  $sth->execute();

  return $sth->fetchAll();
}

function getAllStrains () {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM strain WHERE ID != 0");
  $sth->execute();

  return $sth->fetchAll();
}

function getStrainByName($name)
{
  $dbh = connectToDB();

  $sth = $dbh->prepare("SELECT * FROM strain WHERE strain.name = ?");
  $sth->execute(array($name));
  $result = $sth->fetchObject();
  if($result == null)
    return null;
  return $result;
}

function getStrainByID($id)
{
  $dbh = connectToDB();

  $sth = $dbh->prepare("SELECT * FROM strain WHERE ID = ?");
  $sth->execute(array($id));
  $result = $sth->fetchObject();
  if($result == null)
    return null;
  return $result;
}

function getStrainNameByID($id)
{
  $dbh = connectToDB();

  $sth = $dbh->prepare("SELECT strain.name FROM strain WHERE strain.ID = ?");
  $sth->execute(array($id));
  $result = $sth->fetchObject();
  if($result == null)
    return null;
  return $result;
}

function getAllBottles()
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottle");
  $sth->execute();

  return $sth->fetchAll();
}

function getBottleByMl($ml)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottle WHERE ml = ?");
  $sth->execute(array($ml));
  $bottle = $sth->fetchObject();
  if($bottle == null)
    return null;
  return $bottle;
}

function getBottleByID($id)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottle WHERE ID = ?");
  $sth->execute(array($id));
  $bottle = $sth->fetchObject();
  if($bottle == null)
    return null;
  return $bottle;
}

function getBottlesOrderedByMlDESC()
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottle ORDER BY ml DESC");
  $sth->execute();

  return $sth->fetchAll();
}

function getAllBarrels(){

  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM barrel");
  $sth->execute();

  return $sth->fetchAll();
}

function getBarrelsByStrain($strain){

  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM barrel WHERE strainFK = ?");
  $sth->execute(array($strain));

  return $sth->fetchAll();
}

function getAllPressings() {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM pressing WHERE bottled != 0");
  $sth->execute();

  return $sth->fetchAll();
}

function getPressingsByStrain($strain){

  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM pressing WHERE strainFK = ?");
  $sth->execute(array($strain));

  return $sth->fetchAll();
}

function getAmountCornByStrain($strain){

        $barrels = getBarrelsByStrain($strain->ID);
        $amount = 0;
        foreach ($barrels as $barrel) {
          $amount += $barrel->fillLevel;
        }
  return $amount;
}

function getAllCustomers () {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM customer");
  $sth->execute();

  return $sth->fetchAll();
}

function getCustomerByID ($id) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM customer WHERE ID = ?");
  $sth->execute(array( $id ));

  return $sth->fetchObject();
}

function getAllUsers () {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM user");
  $sth->execute();

  return $sth->fetchAll();
}

function getAllBottlings () {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM bottling");
  $sth->execute();

  return $sth->fetchAll();
}


function getPressingById ($id) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM pressing WHERE ID = ?");
  $sth->execute(array( $id ));

  return $sth->fetchObject();
}

function getDeliveredProductsByCustomerOrderedByDate($customer_id, $strain_id, $bottle_id) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT SUM(sh.amount) as amount, sh.date as date GROUP BY sh.date
  FROM product p JOIN strain s JOIN bottle b JOIN shipmentitem shi JOIN shipment sh JOIN customer c
  ON p.bottleFK = b.ID AND p.strainFK = s.ID AND shi.productFK = p.ID AND shi.shipmentFK = sh.ID AND sh.customerFK = c.ID
  WHERE c.ID = ?
  AND s.ID = ? AND b.ID = ?
  ORDER BY sh.date;");
  $sth->execute(array( $customer_id, $strain_id, $bottle_id ));

  return $sth->fetchAll();
}

function getAmountOfBottleTypes()
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT count(*) as count FROM bottle");
  $sth->execute(array( $id ));

  return $sth->fetchObject()->count;
}
// ----------- Gets für die überprüfung


function getUserByName ($username) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM user WHERE username = ?");
  $sth->execute(array($username));
  return $sth->fetchAll();
}

?>