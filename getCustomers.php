<?php include "head.php";?>
<div class="container">
  <h1>Kunden*innen</h1>
  <a href="addCustomers.php" class="btn btn-default">Kunden*innen hinzufügen</a>
  </p>
  <?php printDatarows("customer"); ?>

  </div>
</div>
<script>(function () {

          $('th').each(function() {
            var self = $(this)
            $.ajax({
              type: "POST",
              url: "translate.php",
              data: "text=" + this.innerHTML,
              success: function(html) {
                  if (html != null) {
                      self.html(html);
                  }
              }
            });
          });
          return false;
})();
</script>

<?php include "footer.php";?>