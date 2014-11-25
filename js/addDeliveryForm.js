function add(selector, key) {
        $.ajax({
          type: "POST",
          url: "addItemTool.php",
          data: "key=" + key,
          success: function(html) {
              if (html != null) {
                  selector.html(html);
              }
          }
        });
  return false;
}

$(function()
{
    var count = 0;

    $('#addItemButton').click(function(e) {

    	e.preventDefault();

      $('#deliveryItems')
            .append($('<div></div>')
            .addClass("form-group")
            .attr( "id", count));


        $('#' + count)
            .append($('<div></div>')
            .addClass("col-sm-2")
            .append($('<select></select>')
              .addClass("form-control strainSelector")
              .attr("name", "strain[]")
              .append('&lt;?php printAllStrainOptions();?&gt;')));

     	  $('#' + count)
        		.append($('<div></div>')
     				.addClass("col-sm-2")
     				.append($('<select></select>')
     					.addClass("form-control bottleSelector")
     					.attr("name", "bottle[]")
     					.append('&lt;?php printAllBottleOptions();?&gt;')));

         $('#' + count)
            .append($('<div></div>')
            .addClass("col-sm-2")
            .append($('<input></input>')
              .addClass("form-control")
              .attr("name", "amount[]")
              .attr("type", "text")
              .attr("placeholder", "Menge")));

        $('#' + count)
            .append($('<div></div>')
            .addClass("col-sm-2")
            .append($('<button></button>')
              .addClass("btn btn-danger")
              .addClass("deleteItem")
              .attr("type", "button")
              .append($('<span></span>')
                .addClass("glyphicon glyphicon-remove"))
              .text(' Eintrag entfernen!')));

        add($(".bottleSelector"), "bottle");
        add($(".strainSelector"), "strain"); 
        count++;   

        $('.deleteItem').click(function(e) {
          console.log(e);
          e.preventDefault();
          $(e.target).parent().parent().remove();
    
    });

    });

    

});


		
