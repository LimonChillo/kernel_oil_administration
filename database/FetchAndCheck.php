<?php

if(isset($_POST['insertStrain'))
{
  $name = strip_tags($_POST['name']);
}

if(isset($_POST['insertBottle'))
{
  $ml = strip_tags($_POST['ml']);
  $name = strip_tags($_POST['name']);
}

if(isset($_POST['insertPressing'))
{
  $date = strip_tags($_POST['date']);
  $amount = strip_tags($_POST['amount']);
  $barrels = strip_tags($_POST['barrels']);
}

if(isset($_POST['insertLabel'))
{
  $labelname = strip_tags($_POST['labelname']);
  $bottleID = strip_tags($_POST['bottleID']);
  $strainID = strip_tags($_POST['strainID']);
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
  $ = strip_tags($_POST['firstname']);
  $ = strip_tags($_POST['lastname']);
  $ = strip_tags($_POST['company']);
  $ = strip_tags($_POST['road']);
  $ = strip_tags($_POST['zip']);
  $ = strip_tags($_POST['city']);
  $ = strip_tags($_POST['country']);
}

if(isset($_POST['insertUser'))
{
  $ = strip_tags($_POST['username']);
  $ = strip_tags($_POST['password']);
  $ = strip_tags($_POST['email']);
  $ = strip_tags($_POST['is_admin']);
}

if(isset($_POST['stockBottles'))
{
  $ = strip_tags($_POST['']);
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