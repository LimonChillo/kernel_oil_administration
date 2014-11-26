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
    	var id = $(e.target).parent().attr("id");
    	$('input#' + id).prop('checked');
    })
});