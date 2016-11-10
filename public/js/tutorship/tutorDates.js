$(document).ready(function($) {

	//Datepickers
	$('#tut-date-begin').datepicker({
		format: "dd-mm-yyyy",
		startDate: "01-01-2016",
		language: "es",
		autoclose: true,
		todayHighlight: true,
	});
	
	$('#tut-date-begin').datepicker('setDate', '');        
	$('#tut-date-begin').children('div').css({ display: 'block'});
	
	$('#tut-date-end').datepicker({
		format: "dd-mm-yyyy",
		startDate: "01-01-2016",
		language: "es",
		autoclose: true,
		todayHighlight: true,
	});
	
	$('#tut-date-end').datepicker('setDate', '');
	$('#tut-date-end').children('div').css({ display: 'block'});
			
});






        
        
        
