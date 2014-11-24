<?php  
  include_once "database/functions.php";

function printAllStrainOption() {
  $allStrains = getAllStrains();
  foreach ($allStrains as $strain)
  {
    echo "<option value='".$strain->ID."'> ".$strain->name."</option>";
  }
}

function printAllBottleOption() {
  $allBottles = getAllBottles();
  foreach ($allBottles as $bottles)
  {
    echo "<option value='".$bottles->ID."'> ".$bottles->name."</option>";
  }
}

if($_POST['key'] == 'bottle')
  printAllBottleOption();
else
  printAllStrainOption();
?>