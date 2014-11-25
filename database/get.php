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
  return $result->name;
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
  $sth = $dbh->prepare("SELECT * FROM pressing WHERE bottled != 1");
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

function getStrainIdByPressingId($id){
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT strainFK FROM barrel WHERE pressingFK = ? LIMIT 1");
  $sth->execute(array( $id ));
  return $sth->fetchObject()->strainFK;
}

function getDatesWhenCustomerGotDeliveries($customer_id) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT DISTINCT sh.date as date
  FROM shipment sh JOIN customer c
  ON sh.customerFK = c.ID
  WHERE c.ID = ?
  ORDER BY sh.date;");
  $sth->execute(array( $customer_id));

  return $sth->fetchAll();
}

function getDeliveredStrainsByCustomerByDate($customer_id, $date) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT s.ID as ID s.name as name
  FROM product p JOIN strain s JOIN bottle b JOIN shipmentitem shi JOIN shipment sh JOIN customer c
  ON p.strainFK = s.ID AND shi.productFK = p.ID AND shi.shipmentFK = sh.ID AND sh.customerFK = c.ID
  WHERE c.ID = ? AND sh.date = ?");
  $sth->execute(array( $customer_id, $date ));

  return $sth->fetchAll();
}

function getDeliveredProductsByCustomerByStrainByBottleByDate($customer_id, $strain_id, $bottle_id, $date) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT SUM(sh.amount) as amount
  FROM product p JOIN strain s JOIN bottle b JOIN shipmentitem shi JOIN shipment sh JOIN customer c
  ON p.bottleFK = b.ID AND p.strainFK = s.ID AND shi.productFK = p.ID AND shi.shipmentFK = sh.ID AND sh.customerFK = c.ID
  WHERE c.ID = ? AND s.ID = ? AND b.ID = ? AND sh.date = ?");
  $sth->execute(array( $customer_id, $strain_id, $bottle_id, $date ));
  return $sth->fetchAll();
}

function getAmountOfBottleTypes()
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT count(*) as count FROM bottle");
  $sth->execute(array( $id ));

  return $sth->fetchObject()->count;
}

function getShipmentIDByCustomerByDate($customer, $date)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT sh.ID as ID 
  FROM shipment sh
  WHERE sh.customerFK = ? AND sh.date = ? 
  LIMIT 1");
  $sth->execute(array( $customer, $date ));
  return $sth->fetch();
}

function getProductByStrainByBottle($strain, $bottle)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT p.amount as amount, p.ID as ID 
  FROM product p
  WHERE p.strainFK = ? AND p.bottleFK = ?");
  $sth->execute(array( $strain, $bottle ));
  return $sth->fetch();
}
// ----------- Gets für die überprüfung


function getUserByName ($username) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM user WHERE username = ?");
  $sth->execute(array($username));
  return $sth->fetchObject();
}

function getUserByID ($id) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM user WHERE ID = ?");
  $sth->execute(array($id));
  return $sth->fetchObject();
}

function userExists($username) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM user WHERE username = ?");
  $sth->execute(array($username));
  $user = $sth->fetchObject();
  if ($user == null)
    return false;
  return true;
}
function isAdmin($userid) {
  $dbh = connectToDB();
  $sth = $dbh->prepare("SELECT * FROM user WHERE ID = ?");
  $sth->execute(array($userid));
  $user = $sth->fetchObject();
  // return var_dump($user);
  if ($user->admin == 1)
    return true;
  return false;
}
?>