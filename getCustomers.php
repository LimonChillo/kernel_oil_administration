<?php include "head.php";?>
<div class="container">
  <h1>Kunden*innen</h1>
  <a href="addCustomers.php" class="btn btn-default">Kunden*innen hinzufügen</a>
  </p>
  <table class="table table-hover">
      <tr>
        <th>#</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Firma</th>
        <th>Straße</th>
        <th>PLZ</th>
        <th>Ort</th>
        <th>Staat</th>
      </tr>
      <?php printAllCustomersAsDatarows(); ?>
  </table>
  </div>
</div>
<?php include "footer.php";


function printAllCustomersAsDatarows(){
  $allCustomers = getAllCustomers();
  foreach ($allCustomers as $customer)
  {
    echo "<tr>";
    echo "<td>".$customer->ID."</td>";
    echo "<td>".$customer->firstname."</td>";
    echo "<td>".$customer->lastname."</td>";
    echo "<td>".$customer->company."</td>";
    echo "<td>".$customer->road."</td>";
    echo "<td>".$customer->zip."</td>";
    echo "<td>".$customer->city."</td>";
    echo "<td>".$customer->country."</td>";
    echo "</tr>";
  }

}

?>