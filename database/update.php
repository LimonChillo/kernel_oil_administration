<?php

function updatePressingOfBarrel($barrels, $pressing) {
  $dbh=connectToDB();
  foreach ($barrels as $barrel){
     $sth = $dbh->prepare("UPDATE barrel SET pressingFK = ? WHERE ID = ?");
     $sth->execute(array($pressing, $barrel->ID));
  }
}

function stockBottle($id, $amount)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("UPDATE bottle SET amount = ? WHERE ID = ?");
  $sth->execute(array($amount, $id));
}

function stockLabel($amount, $strain, $bottle)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("UPDATE label SET amount = ? WHERE strainFK = ? AND bottleFK = ?");
  $sth->execute(array($amount, $strain, $bottle));
}

function stockLabelByID($ID, $amount)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("UPDATE label SET amount = ? WHERE ID = ?");
  $sth->execute(array($amount, $ID));
}

function bottlePressing($pressing, $bool)
{
  $dbh = connectToDB();
  $sth = $dbh->prepare("UPDATE pressing SET bottled = ? WHERE ID = ?");
  $sth->execute(array($bool, $pressing));
}

function updateCustomer($id, $firstname, $lastname, $company, $road, $zip, $city, $country) {
  $dbh = connectToDB();
  $sth = $dbh->prepare(
        "UPDATE customer SET firstname = ?, lastname = ?, company = ?, road = ?,
           zip = ?, city = ?, country = ?
              WHERE
                ID = ?
                  ");
        $sth->execute(array($firstname, $lastname, $company, $road, $zip, $city, $country, $id));
}

function updateBottle($id, $ml) {
  $dbh = connectToDB();
  $name = $ml."ml";
  $sth = $dbh->prepare(
        "UPDATE bottle SET ml = ?, name = ?
              WHERE
                ID = ?
                  ");
        $sth->execute(array($ml, $name, $id));
}

function updateStrain($id, $name) {
  $dbh = connectToDB();
  $sth = $dbh->prepare( "UPDATE strain SET name = ? WHERE ID = ? ");
  $sth->execute(array($name, $id));
}

function updateUser($id, $username, $password, $email, $admin) {
  $dbh = connectToDB();
  $sth = $dbh->prepare( "UPDATE user SET username = ?, password = ?, email = ?, admin = ? WHERE ID = ? ");
  $sth->execute(array($username, $password, $email, $admin, $id));
}

function updateProduct($strain, $bottle, $amount) {
  $dbh = connectToDB();
  $sth = $dbh->prepare( "UPDATE product SET amount = amount - ? WHERE strainFK = ? AND bottleFK = ?");
  $sth->execute(array($amount, $strain, $bottle));
}
function updateProductPositiv($strain, $bottle, $amount) {
  $dbh = connectToDB();
  $sth = $dbh->prepare( "UPDATE product SET amount = amount + ? WHERE strainFK = ? AND bottleFK = ?");
  $sth->execute(array($amount, $strain, $bottle));
}

?>