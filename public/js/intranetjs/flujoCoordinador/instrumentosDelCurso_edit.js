$(document).ready(function(){

	var form = $('#measuringByCourse');

	$('#idStudentsResult').change(function(event){

		var id = $('#idStudentsResult').val();
		var sdtR = 'tr[name=' + id +']';

		$('.table-mxc').attr("hidden", true);
		if(id != ''){
			$(sdtR).attr("hidden", false);
			//console.log(form.serialize());
			/*
		    $.post(form.attr('action'), form.serialize(), function(table) {	    	
		    	//console.log(table);
		    	$('#detailTable').html(table);	    	
		    })
		    */
		}
	});


});