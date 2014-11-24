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


    $('#addItemButton').click(function(e) {

    	e.preventDefault();
        $('#deliveryDate')
        	.after($('<div></div>')
        		.addClass("form-group")
        		.append($('<div></div>')
     				.addClass("col-sm-4")
     				.append($('<input></input>')
     					.addClass("form-control")
     					.attr("name", "amount[]")
     					.attr("type", "text")
     					.attr("placeholder", "Menge"))));

     	  $('#deliveryDate')
        	.after($('<div></div>')
        		.addClass("form-group")
        		.append($('<div></div>')
     				.addClass("col-sm-4")
     				.append($('<select></select>')
     					.addClass("form-control bottleSelector")
     					.attr("name", "bottle[]")
     					.append('&lt;?php printAllBottleOptions();?&gt;'))));

     	  $('#deliveryDate')
        	.after($('<div></div>')
        		.addClass("form-group")
        		.append($('<div></div>')
     				.addClass("col-sm-4")
     				.append($('<select></select>')
     					.addClass("form-control strainSelector")
     					.attr("name", "strain[]")
     					.append('&lt;?php printAllStrainOptions();?&gt;'))));

        add($(".bottleSelector"), "bottle");
        add($(".strainSelector"), "strain");    
    });


});

		
