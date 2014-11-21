<?php
include "database/functions.php";


#########
// STRAINS
if(isset($_POST['insertStrain']))
{
  $name = strip_tags($_POST['name']);

  if (getStrainByName($name) != null)
  {
    header("Location:addStrain.php?msg=Sorte existiert bereits&err=1");
  }

  insertStrain($name);
  header("Location:getStrains.php?msg=Sorte hinzugefügt&err=0");

}

if(isset($_POST['updateStrain']))
{
  $id = strip_tags($_POST['updateStrain']);
  if(sizeOf(getStrainByID($id)) != 0)
    {
      updateStrain($id, $_POST['name']);
      header("Location:getStrains.php?msg=Sorte geändert&err=0");
    }
  else
  {
    header("Location:getStrains.php?msg=Sorte existiert nicht&err=1");
  }
}

if(isset($_POST['deleteStrain']))
{
  $id = $_POST['deleteStrain'];
  if(sizeOf(getStrainByID($id)) != 0)
    {
      deleteStrainByID($id);
      header("Location:getStrains.php?msg=Sorte gelöscht$err=0");
    }
  else
  {
    header("Location:getStrains.php?msg=Sorte existiert nicht$err");
  }
}


if(isset($_POST['insertBottle']))
{
  $ml = strip_tags($_POST['ml']);
  if (getBottleByMl($ml) != null)
  {
    header("Location:addBottle.php?error=0");
  }

  insertBottle($ml);
  header("Location:getBottles.php?msg=1");
}

if(isset($_POST['updateBottle']))
{
  $ml = strip_tags($_POST['ml']);
  if(sizeOf(getBottleByID($_POST['updateBottle'])) != 0)
    {
      updateBottle($_POST['updateBottle'], $ml);
      header("Location:getBottles.php?msg=Flaschentyp geändert");
    }
  else
  {
    header("Location:getBottles.php?msg=Flasche existiert nicht");
  }
}

if(isset($_POST['deleteBottle']))
{
  if(sizeOf(getBottleByID($_POST['deleteBottle'])) != 0)
    {
      deleteBottleByID($_POST['deleteBottle']);
      header("Location:getBottles.php?msg=Flaschentyp gelöscht");
    }
  else
  {
    header("Location:getBottles.php?msg=Flaschentyp existiert nicht");
  }
}

if(isset($_POST['stockBottle']))
{
  $bottle = getBottleByID($_POST['stockBottle']);
  $amount = $bottle->amount + $_POST['amount'];
  if(sizeOf($bottle) != 0)
    {

      stockBottle($bottle->ID, $amount);
      header("Location:getBottles.php?msg=Flaschen eingelagert");
    }
  else
  {
    header("Location:getBottles.php?msg=Flasche existiert nicht");
  }
}

if(isset($_POST['insertPressing']))
{
  $date = strip_tags($_POST['date']);
  $amount = strip_tags($_POST['amount']);
  $barrels = strip_tags($_POST['barrels']);

  insertPressing($date, $amount, $barrels);
  header("Location:addPressing.php?msg=1");
}

if(isset($_POST['insertBarrel']))
{
  $date = strip_tags($_POST['date']);
  $literPerBarrel = strip_tags($_POST['literPerBarrel']);
  $strain = strip_tags($_POST['strain']);

  insertBarrel($strain, $literPerBarrel,$date);
  header("Location:addBarrel.php?msg=1");
}

if(isset($_POST['insertBottling']))
{
  $date = strip_tags($_POST['date']);
  $amount = strip_tags($_POST['amount']);
  $pressing = strip_tags($_POST['pressing']);
  $bottle = strip_tags($_POST['bottle']);

  insertBottling($date, $amount, $pressing, $bottle);
  header("Location:addBottling.php?msg=1");
}

if(isset($_POST['insertCustomer']))
{
  try{
    $firstname = strip_tags($_POST['firstname']);
    $lastname = strip_tags($_POST['lastname']);
    $company = strip_tags($_POST['company']);
    $road = strip_tags($_POST['road']);
    $zip = strip_tags($_POST['ZIP']);
    $city = strip_tags($_POST['city']);
    $country = strip_tags($_POST['country']);

    // if(!is_numeric($_POST['ZIP']))
    // {
    //   throw new Exception("PLZ muss eine Zahl sein. Ihre Eingabe: ");
    // }
    // else
      insertCustomer($firstname, $lastname, $company, $road, $zip, $city, $country);
  }
  catch(Exception $e)
  {
    header("Location:addCustomer.php?msg=Es ist ein Fehler aufgetreten. ");
  }
  header("Location:getCustomers.php?msg=Kunde hinzugefügt");
}

if(isset($_POST['updateCustomer']))
{
  $firstname = strip_tags($_POST['firstname']);
  $lastname = strip_tags($_POST['lastname']);
  $company = strip_tags($_POST['company']);
  $road = strip_tags($_POST['road']);
  $zip = strip_tags($_POST['zip']);
  $city = strip_tags($_POST['city']);
  $country = strip_tags($_POST['country']);

if(sizeOf(getCustomerByID($_POST['updateCustomer'])) != 0)
  {
    updateCustomer($_POST['updateCustomer'], $firstname, $lastname, $company, $road, $zip, $city, $country);
    header("Location:getCustomers.php?msg=1");
  }
else
{
  header("Location:getCustomers.php?msg=0");
}
}

if(isset($_POST['deleteCustomer']))
{

if(sizeOf(getCustomerByID($_POST['deleteCustomer'])) != 0)
  {
    deleteCustomerByID($_POST['deleteCustomer']);
    header("Location:getCustomers.php?msg=2");
  }
else
{
  header("Location:getCustomers.php?msg=3");
}
}

if(isset($_POST['insertUser']))
{
  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);
  $email = strip_tags($_POST['email']);
  $is_admin = ($_POST['is_admin'] == null) ? "0" : "1" ;

  if (sizeOf(getUserByName($username)) > 0)
  {
    header("Location:addUser.php?error=0");
  }

  insertUser($username, $password, $email, $is_admin);
  header("Location:addUser.php?msg=1");
}

if(isset($_POST['stockBottles']))
{
  $amount = strip_tags($_POST['amount']);
  $name = strip_tags($_POST['name']);

  stockBottles($amount, $name);
  header("Location:stockBottles.php?msg=1");
}

if(isset($_POST['stockLabels']))
{
  $amount = strip_tags($_POST['amount']);
  $bottle = strip_tags($_POST['bottle']);
  $strain = strip_tags($_POST['strain']);

  stockLabels($amount,$bottle,$strain);
  header("Location:stockLabels.php?msg=1");
}

if(isset($_POST['bottlePresssing']))
{
  $pressing = strip_tags($_POST['pressing']);
  $bool = strip_tags($_POST['bool']);

  bottlePresssing($pressing, $bool);
  header("Location:bottlePressing.php?msg=1");
}



?>