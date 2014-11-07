<?php

$tags = array();
$time = array();


function getValues(&type, &myArray)
{
  if(isset($_POST[$type]))
  {
    $myArray = $_POST[$type];
    for ($i = 0; $i < count($myArray); $i++)
    {
      $myArray[$i] = strip_tags($myArray[$i]);
    }
  }
}

getValues('checkbox', $tags);
getValues('select', $time);

echo $tags[0];
/*
if(isset($_GET['']))
{
  $X = $_GET[''];
  for ($i = 0; $i < count($X); $i++)
  {
    $X[$i] = strip_tags($tX[$i]);
  }
}
*/ 
?>