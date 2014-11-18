<?php

include "database/functions.php";

$query .= "SELECT * FROM strain";
$sth = $dbh->prepare("$query;");
$sth->execute($arr);
$data = $sth->fetchAll();

foreach($data as $d) 
{
  echo $d -> name;
}
?>

<html>
<head>
	<title></title>
</head>
<body>

	<form id="formi" name="formi" method="GET" action="database/buildVariables.php">
		<input id="test" name="test" type="text"></input>
		<input type="submit" value="schicken">
	</form>

</body>
</html>