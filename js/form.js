$(function()
{

	//Aktuelles Datum in Date_Input eintragen!
	var d = new Date();
  	var day = ("0" + d.getDate()).slice(-2);
  	var month = ("0" + (d.getMonth() + 1)).slice(-2);
  	var today = d.getFullYear()+"-"+(month)+"-"+(day);
  	$("input[type=date]").val(today);

    $('#customerFormSelect').change(function() {
        $('#customerForm').submit();
    });


    $('tr.barrelList').on('click', function(e){
    	console.log($(e.target).parent().attr("id"));
  		var id = $(e.target).parent().attr("id")
  		document.getElementByClassName(id).checked = true;  
    })

    $('input[name="barrel[]"]').on('click', function(e){
	    console.log("swagetti");
	    if ($('input[name="barrel[]"]:checked').length > 0)
	    {
	    	$('button[name="submit"]').removeAttr("disabled");  
	    }
	    else
	    {
	    	$('button[name="submit"]').attr("disabled", "disabled");
	    }
	});    
});