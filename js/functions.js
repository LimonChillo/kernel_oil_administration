 function translate() {
  $('th').each(function() {
    var self = $(this)
    $.ajax({
      type: "POST",
      url: "translate.php",
      data: "text=" + this.innerHTML,
      success: function(html) {
          if (html != null) {
              if(html != " belastung")
                self.html(html);
          }
      }
    });
  });
  return false;
}