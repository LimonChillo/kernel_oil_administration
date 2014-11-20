 function translate() {
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
}