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
      // deleteLabelByStrain()
      header("Location:getStrains.php?msg=Sorte gelöscht&err=0");
    }
  else
  {
    header("Location:getStrains.php?msg=Sorte existiert nicht&err=1");
  }

}


if(isset($_POST['insertBottle']))
{
  $ml = strip_tags($_POST['ml']);
  if (getBottleByMl($ml) != null)
  {
    header("Location:addBottle.php?msg=Flaschengröße existiert bereits&err=1");
  }

  insertBottle($ml);
  header("Location:getBottles.php?msg=Flasche hinzugefügt&err=0");
}

if(isset($_POST['updateBottle']))
{
  $ml = strip_tags($_POST['ml']);
  if(sizeOf(getBottleByID($_POST['updateBottle'])) != 0)
    {
      updateBottle($_POST['updateBottle'], $ml);
      header("Location:getBottles.php?msg=Flaschentyp geändert&err=0");
    }
  else
  {
    header("Location:getBottles.php?msg=Flasche existiert nicht&err=1");
  }
}

if(isset($_POST['deleteBottle']))
{
  if(sizeOf(getBottleByID($_POST['deleteBottle'])) != 0)
    {
      deleteBottleByID($_POST['deleteBottle']);
      header("Location:getBottles.php?msg=Flaschentyp gelöscht&err=0");
    }
  else
  {
    header("Location:getBottles.php?msg=Flaschentyp existiert nicht&err=1");
  }
}

if(isset($_POST['stockBottle']))
{
  $bottle = getBottleByID($_POST['stockBottle']);
  $amount = $bottle->amount + $_POST['amount'];
  if(sizeOf($bottle) != 0)
    {

      stockBottle($bottle->ID, $amount);
      header("Location:getBottles.php?msg=Flaschen eingelagert&err=0");
    }
  else
  {
    header("Location:getBottles.php?msg=Flasche existiert nicht&err=1");
  }
}

if(isset($_POST['stockLabel']))
{
  $label = getLabelByID($_POST['stockLabel']);
  $amount = $label->amount + $_POST['amount'];
  if(sizeOf($label) != 0)
    {

      stockLabelByID($label->ID, $amount);
      header("Location:getLabels.php?msg=Etikette eingelagert&err=0");
    }
  else
  {
    header("Location:getBottles.php?msg=Etikette existiert nicht&err=1");
  }
}

if(isset($_POST['insertBarrel']))
{
  $date = strip_tags($_POST['date']);
  $literPerBarrel = strip_tags($_POST['literPerBarrel']);
  $strain = strip_tags($_POST['strain']);

  insertBarrel($strain, $literPerBarrel,$date);
  header("Location:addBarrel.php?msg=Fass hinzugefügt&err=0");
}

if(isset($_POST['insertBottling']))
{
  //ToDo
  //Flaschen & Etiketten überprüfen
  //Update isBotteld in Pressing
  //Produkte hinzufügen

  $date = strip_tags($_POST['date']);
  $pressing = strip_tags($_POST['pressing']);
  $strainFK = strip_tags($_POST['strainFK']);
  $count = strip_tags($_POST['count']);

  //check for enough bottels and labels

  $errMsg = "";

  for($i = 0; $i < $count; $i++)
  {
    if(!checkBottleAmmount(strip_tags($_POST[$i.'_bottleId']),strip_tags($_POST[$i.'_amount'])))
    {
        $name = getBottleByID(strip_tags($_POST[$i.'_bottleId']))->name;
        $errMsg .= "Zu wenig leere Flaschen (".$name.") verfügbar.<br>";       
    }
    if(!checkLabelAmmount(strip_tags($_POST[$i.'_bottleId']),strip_tags($_POST[$i.'_amount']),$strainFK))
    {
        $name = getStrainByID($strainFK)->name." ".getBottleByID(strip_tags($_POST[$i.'_bottleId']))->name;
        $errMsg .= "Zu wenig Etiketten (".$name.") verfügbar.<br>";       
    }
    if(!checkLabelAmmount(strip_tags($_POST[$i.'_bottleId']),strip_tags($_POST[$i.'_amount']),0))
    {
        $name = getBottleByID(strip_tags($_POST[$i.'_bottleId']))->name;
        $errMsg .= "Zu wenig Rücketiketten (".$name.") verfügbar.<br>";        
    }
  }
  if($errMsg != "")
  {
    header("Location:getPressings.php?msg=".$errMsg."&err=1");
    exit;
  }



  //insert dateset for each bottle type
  for($i = 0; $i < $count; $i++)
  {
    insertOrUpdateProduct($strainFK,strip_tags($_POST[$i.'_bottleId']),strip_tags($_POST[$i.'_amount']));
    insertBottling($pressing, strip_tags($_POST[$i.'_bottleId']), strip_tags($_POST[$i.'_amount']), $date,  $strainFK);
    
    unstockLabels(strip_tags($_POST[$i.'_bottleId']),$strainFK,strip_tags($_POST[$i.'_amount']));
    unstockBottles(strip_tags($_POST[$i.'_bottleId']),strip_tags($_POST[$i.'_amount']));
  }

  bottlePressing( $pressing,true);
  header("Location:getPressings.php?msg=Abfüllung erfolgreich hinzugefügt&err=0");
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
    header("Location:addCustomer.php?msg=Es ist ein Fehler aufgetreten&err=1 ");
  }
  header("Location:getCustomers.php?msg=Kunde hinzugefügt&err=0");
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
      header("Location:getCustomers.php?msg=Kunde bearbeitet&err=0");
    }
  else
  {
    header("Location:getCustomers.php?msg=Kunde existiert nicht&err=1");
  }
}

if(isset($_POST['deleteCustomer']))
{

  if(sizeOf(getCustomerByID($_POST['deleteCustomer'])) != 0)
    {
      deleteCustomerByID($_POST['deleteCustomer']);
      header("Location:getCustomers.php?msg=Kunde gelöscht&err=0");
    }
  else
  {
    header("Location:getCustomers.php?msg=Kunde existiert nicht&err=1");
  }
}

if(isset($_POST['insertUser']))
{
  $username = mystrtolower(strip_tags($_POST['username']));
  $password = strip_tags($_POST['password']);
  $email = strip_tags($_POST['email']);
  $admin = ($_POST['admin'] == null) ? "0" : "1" ;

  if (getUserByName($username) != 0)
  {
    header("Location:addUser.php?msg=Benutzer existiert bereits&err=1");
  }
  else
  {
    insertUser($username, $password, $email, $admin);
    header("Location:getUsers.php?msg=Benutzer hinzugefügt&err=0");
  }
}

if(isset($_POST['updateUser']))
{
  $username = mystrtolower(strip_tags($_POST['username']));
  $password = strip_tags($_POST['password']);
  $email = strip_tags($_POST['email']);
  $admin = strip_tags($_POST['admin']);
  if(isset($_POST['admin']))
        $admin = true;
  $user = getUserByID($_POST['updateUser']);
  if(sizeOf($user) != 0)
    {
      updateUser($_POST['updateUser'], $username, $password, $email, $admin);
      header("Location:getUsers.php?msg=Benutzer bearbeitet&err=0");
    }
  else
  {
    header("Location:getUsers.php?msg=Benutzer existiert nicht&err=1");
  }
}

if(isset($_POST['deleteUser']))
{

  if(sizeOf(getUserByID($_POST['deleteUser'])) != 0)
    {
      deleteUserByID($_POST['deleteUser']);
      header("Location:getUsers.php?msg=Benutzer entfernt&err=0");
    }
  else
  {
    header("Location:getCustomers.php?msg=Benutzer existiert nicht&err=1");
  }
}

if(isset($_POST['stockBottles']))
{
  $amount = strip_tags($_POST['amount']);
  $name = strip_tags($_POST['name']);

  stockBottles($amount, $name);
  header("Location:stockBottles.php?msg=Flaschen eingelagert&err=0");
}

if(isset($_POST['stockLabels']))
{
  $amount = strip_tags($_POST['amount']);
  $bottle = strip_tags($_POST['bottle']);
  $strain = strip_tags($_POST['strain']);

  stockLabels($amount,$bottle,$strain);
  header("Location:stockLabels.php?msg=Etiketten eingelagert&err=0");
}

if(isset($_POST['bottlePresssing']))
{
  $pressing = strip_tags($_POST['pressing']);
  $bool = strip_tags($_POST['bool']);

  bottlePresssing($pressing, $bool);
  header("Location:bottlePressing.php?msg=Pressung abgefüllt&err=0");
}

if (isset($_POST['login']))
{

  $username = strtolower(strip_tags($_POST['username']));
  $password = strip_tags($_POST['password']);
  $user = getUserByName($username);
  if($user == false)
    header("Location:login.php?msg=Benutzer existiert nicht&err=1");
  else if($user->password == $password)
  {
    session_start();
    $_SESSION['username'] = $user->username;
    $_SESSION['user'] = $user->ID;
    header("Location:index.php?msg=Willkommen ".$_SESSION['username']."&err=0");
  }
  else
  {
    header("Location:login.php?msg=Passwort falsch&err=1&user=".$username);
  }
}

if (isset($_POST['insertDelivery']))
{
  
  $customer = strtolower(strip_tags($_POST['customer']));
  $date = strtolower(strip_tags($_POST['date']));

  $strains = $_POST['strain'];
  $bottles = $_POST['bottle'];
  $amounts = $_POST['amount'];

  for($i = 0; $i < sizeOf($strains); $i++)
  {
    
    if($amounts[$i] <=  (getProductByStrainByBottle($strains[$i], $bottles[$i]) -> amount))
    {
      if ($i == 0)
        insertShipment($customer, $date);

      insertShipmentItem(getProductByStrainByBottle($strains[$i], $bottles[$i]) -> ID, getShipmentIDByCustomerByDate($customer, $date) -> ID, $amounts[$i]);
      updateProduct($strains[$i], $bottles[$i], $amounts[$i]);
    }
    else
    {
      header("Location:addDelivery.php?msg=Nicht genug " . getStrainByID($strains[$i]) -> name . " in der Größe "  . getBottleByID($bottles[$i]) -> name . " vorhanden&err=1");
      exit;
    }
  }

  header("Location:addDelivery.php?msg=Lieferung eingetragen&err=0");
}


if (isset($_POST['insertPressing']))
{
  $barrels = array();

  $date = strip_tags($_POST['date']);
  $amount = strip_tags($_POST['amount']);
  $barrels = $_POST['barrel'];
  
  if (is_numeric($amount) && $amount > 0)
  { 
    insertPressing($date, $amount, $barrels);
    header("Location:index.php?msg=Pressing eingetragen" . $barrels[0]->ID . "&err=0");
  }
  else
  {
    header("Location:getBarrels.php?msg=Fehlerhafte Mengenangabe&err=1");
  }
}

?>