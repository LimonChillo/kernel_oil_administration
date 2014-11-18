<?php include "head.php";?>
<div class="container">
  <h1>Sorten</h1>
  <a href="addStrains.php" class="btn btn-default">Sorte hinzufügen</a>
  </p>
  <table class="table table-hover strainList">
      <tr>
        <th>#</th>
        <th>Sortenname</th>
      </tr>
      <?php printAllStrainsAsDatarows(); ?>
  </table>
  </div>
</div>
<?php include "footer.php";


function printAllStrainsAsDatarows(){
  $allStrains = getAllStrains();
  foreach ($allStrains as $strain)
  {
    echo "<tr>";
    echo "<td>".$strain->ID."</td>";
    echo "<td>".$strain->name."</td>";
    echo "</tr>";
  }

}

?>