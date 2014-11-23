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
     					.addClass("form-control")
     					.attr("name", "bottle[]")
     					.append('&lt;?php printAllBottleOptions();?&gt;'))));

     	  $('#deliveryDate')
        	.after($('<div></div>')
        		.addClass("form-group")
        		.append($('<div></div>')
     				.addClass("col-sm-4")
     				.append($('<select></select>')
     					.addClass("form-control")
     					.attr("name", "strain[]")
     					.append('&lt;?php printAllStrainOptions();?&gt;'))));
    });


});

		
