<?php
include "database/functions.php"; 

if(isset($_POST['insertStrain']))
{
  $name = strip_tags($_POST['name']);
    
  if (sizeOf(getStrainByName($name)) > 0)
  {
    header("Location:addStrain.php?msg=0");
  }

  insertStrain($name);
  header("Location:addStrain.php?msg=1");
  
}

if(isset($_POST['insertBottle']))
{
  $ml = strip_tags($_POST['ml']);
  if (sizeOf(getBottleByMl($ml)) > 0)
  {
    header("Location:addBottle.php?error=0"); 
  }

  insertBottle($ml);
  header("Location:addStrain.php?msg=1");
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
  $firstname = strip_tags($_POST['firstname']);
  $lastname = strip_tags($_POST['lastname']);
  $company = strip_tags($_POST['company']);
  $road = strip_tags($_POST['road']);
  $zip = strip_tags($_POST['zip']);
  $city = strip_tags($_POST['city']);
  $country = strip_tags($_POST['country']);

  insertCustomer($firstname, $lastname, $company, $road, $zip, $city, $country);
  header("Location:addCustomer.php?msg=1");
}

if(isset($_POST['insertUser']))
{
  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);
  $email = strip_tags($_POST['email']);
  $is_admin = strip_tags($_POST['is_admin']);

  if (sizeOf(getUserByName($username)) > 0)
  {
    header("Location:addUser.php?error=0"); 
  }

  insertUser($username, $passwort, $email, $is_admin);
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




/*  FÜR ARRAY
if(isset($_POST['test']))
{
  $tags[0] = $_POST['test'];
  for ($i = 0; $i < count($tags); $i++)
  {
    $tags[$i] = strip_tags($tags[$i]);
  }
}

echo $tags[]; 
*/
?>