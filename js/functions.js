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

function crafters() {
  $('#kra').mouseenter(function() {
    $('#kra').html('Kranewitter');
    $('#ho').html('Ho');
  })
  $('#hi').mouseenter(function() {
    $('#hi').html('Hintersonnleitner');
  })
  $('#ho').mouseenter(function() {
    $('#ho').html('Hoffmann');
    $('#kra').html('Kra');
  })
  $('#crafters').mouseleave(function() {
    $('#kra').html('Kra');
    $('#hi').html('Hi');
    $('#ho').html('Ho');
  })
}