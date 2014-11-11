<?php

  include "../head.php";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		deleteAllData();
		$dbh = connectToDB();

  	$sth = $dbh->prepare("SELECT * FROM strain");
  	$sth->execute();

   	$strains = $sth->fetchAll();

   	foreach ($strains as $strain) {
   		$amountBarrels = rand(5,10);
   		for ($counter = 0; $counter < $amountBarrels; $counter++) {
   			$literPerBarrel = rand(10,100);
   			$literPerBarrel = ($literPerBarrel > 50) ? $literPerBarrel = 50 : $literPerBarrel ;
   			$sth = $dbh->prepare(
			  "INSERT INTO barrel
				(strainFK, fillLevel)
				  VALUES
				(?, ?)");

   			$sth->execute(array($strain->ID, $literPerBarrel));
   		}
   		foreach (getBottles() as $bottle) {
   			addLabels((string)rand(10,100), $strain->ID, $bottle);
			}
   	}

	}
	/*
		$dbh->exec("DELETE FROM user WHERE email LIKE  '%test.at'"); //keine beeinflussbare Variable

		$sth = $dbh->prepare(
			  "INSERT INTO user
				(id, firstname,surname,email,is_female,password,register_date, avatar)
				  VALUES
				(NULL,  ?,     ?,      ?,    ?,              ?,?,?)");
		$stho = $dbh->prepare(
			  "INSERT INTO offer
				(id, course, teacher)
				  VALUES
				(NULL, ?,   ?)");
		$sths = $dbh->prepare(
			  "INSERT INTO search
				(id, course, student)
				  VALUES
				(NULL, ?,   ?)");

		//create user
		$id=5;
		while($id <= $_POST['amount'])
		{
			$isfemaleRand = rand(1,20);

			if($isfemaleRand > 10)
				$isfemale = 1;
			else
				$isfemale = 0;

			if($isfemale == 0)
			{
				$firstnameNr = rand(0,count($firstMale)-1);
				$firstname = $firstMale[$firstnameNr];
			}else
			{
				$firstnameNr = rand(0,count($firstFemale)-1);
				$firstname = $firstFemale[$firstnameNr];
			}

			$surname = $surnames[rand(0, count($surnames)-1)];
			$email = $id."@test.at";

			$password = hashPasswordSecure("asdf");

			if($isfemale == 0)
	            $avatar = "male_avatar.png";
	        else
	        	$avatar = "female_avatar.png";

			$sth->execute(
				array(
					$firstname,
					$surname,
					$email,
					$isfemale,
					$password,
					$date,
					$avatar
				)
			);

			$o = range(1, 25);
			shuffle($o);
			$offers = array_slice($o, 0, 5);
			$DBid = $dbh->lastInsertId();

			foreach ($offers as $offer ) {
				try{
				$stho->execute(
					array(
						$offer,
						$DBid
					)
				);
				}
				catch(Execption $e)
				{}
			}
			$searchamount = 0;
			$searches = array();
			while($searchamount < 5)
			{
				$s = rand(1,25);
				if(!in_array ( $s , $searches) && !in_array ( $s , $offers))
				{
					$searchamount++;
					$searches[$searchamount] = $s;
				}
			}
			foreach ($searches as $search ) {
				$sths->execute(
					array(
						$search,
						$DBid
					)
				);
			}
			$id++;
		}
	}

	*/

?>

<div class="container">

  <h1>Datensatzgenerator</h1>
  <h2>Generator</h2>


  <div>
    <form action="randDataGen.php" method="POST">
       <input type="submit" value= " Abschicken">
    </form>
  </div>

</div>


<?php
    include "../footer.php";
?>