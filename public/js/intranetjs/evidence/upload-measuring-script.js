$(document).ready(function(){

	$('#studentsResult').change(function(event){
		var idStudentsResult = $('#studentsResult').val();	
		var aspect = document.getElementById('aspect');	
		var criterion = document.getElementById('criterion');
		var measuring = document.getElementById('measuring');

		aspect.disabled = false;
		criterion.disabled = true;
		measuring.disabled = true;
		$('.aspect').attr("hidden", true);
		aspect.value = '-1';

		if(idStudentsResult!="-1"){
			$('.aspect').attr("hidden", true);
			$('.' + idStudentsResult).attr("hidden", false);
		}
		 
	});

	$('#aspect').change(function(event){
		var idAspect = $('#aspect').val();
		var criterion = document.getElementById('criterion');
		var measuring = document.getElementById('measuring');

		criterion.disabled = false;
		measuring.disabled = true;
		$('.criterion').attr("hidden", true);
		criterion.value = '-1';

		if(idAspect!="-1"){
			$('.criterion').attr("hidden", true);
			$('.' + idAspect).attr("hidden", false);
		}
		 
	});


	$('#criterion').change(function(event){
		var idCriterion = $('#criterion').val();
		var measuring = document.getElementById('measuring');

		measuring.disabled = false;
		$('.measuring').attr("hidden", true);
		measuring.value = '-1';

		if(idCriterion!="-1"){
			$('.measuring').attr("hidden", true);
			$('.' + idCriterion).attr("hidden", false);
		}	
		 
	});


});