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

	$('#save-source').on('click', function(){

		$('#modal-source').modal('hide'); 

		$('.srcCheck').each(function() {
			var id = $(this).val();
			var texto = '.' + id;
			//console.log($(this).is(":checked") );

			if($(this).is(":checked")){				
				$(texto).attr("hidden", false);
			}
			else{
				$(texto).attr("hidden", true);
				$(texto +' .checkFlat').each(function() {
					
					if($(this).is(":checked")){
						console.log($(this).val());
						$(this).prop("checked",false);
					}
				});
				
			}
			
		});

		/*
		var id = $('#idStudentsResult').val();
		if(id != ''){
			console.log(form.serialize());
		    $.post(form.attr('action'), form.serialize(), function(table) {	    	
		    	//console.log(table);
		    	$('#detailTable').html(table);	    	
		    })
		}
		*/
	});

});