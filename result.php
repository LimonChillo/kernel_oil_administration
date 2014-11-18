<?php

include "head.php"

if(isset($_POST['insertStrain'))
{
  $name = strip_tags($_POST['name']);
  if (mysql_num_rows(getStrainByName($name)) > 0)
  {
    header("Location:addStrain.php?error=1");
  }

  insertStrain($name);
  echo "Erfolgreich eingetragen: " . $name;
  
}

if(isset($_POST['insertBottle'))
{
  $ml = strip_tags($_POST['ml']);
  if (mysql_num_rows(getBottleByMl($ml)) > 0)
  {
    header("Location:addBottle.php?error=1"); 
  }

}

if(isset($_POST['insertPressing'))
{
  $date = strip_tags($_POST['date']);
  $amount = strip_tags($_POST['amount']);
  $barrels = strip_tags($_POST['barrels']);
}

}

if(isset($_POST['insertBarrel'))
{
  $date = strip_tags($_POST['date']);
  $literPerBarrel = strip_tags($_POST['literPerBarrel']);
  $strain = strip_tags($_POST['strain']);
}

if(isset($_POST['insertBottling'))
{
  $date = strip_tags($_POST['date']);
  $amount = strip_tags($_POST['amount']);
  $pressing = strip_tags($_POST['pressing']);
  $bottle = strip_tags($_POST['bottle']);
}

if(isset($_POST['insertCustomer'))
{
  $firstname = strip_tags($_POST['firstname']);
  $lastname = strip_tags($_POST['lastname']);
  $company = strip_tags($_POST['company']);
  $road = strip_tags($_POST['road']);
  $zip = strip_tags($_POST['zip']);
  $city = strip_tags($_POST['city']);
  $country = strip_tags($_POST['country']);
}

if(isset($_POST['insertUser'))
{
  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);
  $email = strip_tags($_POST['email']);
  $is_admin = strip_tags($_POST['is_admin']);

  if (mysql_num_rows(getUserByName($username)) > 0)
  {
    header("Location:add.php?error=1");
  }
}

if(isset($_POST['stockBottles'))
{
  $amount = strip_tags($_POST['amount']);
  $name = strip_tags($_POST['name']);
}

if(isset($_POST['stockLabels'))
{
  $amount = strip_tags($_POST['amount']);
  $bottle = strip_tags($_POST['bottle']);  
  $strain = strip_tags($_POST['strain']);
}

if(isset($_POST['bottlePresssing'))
{
  $pressing = strip_tags($_POST['pressing']);
  $bool = strip_tags($_POST['bool']);
}


include "footer.php";





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