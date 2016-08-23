$(document).ready(function(){

	var cantLevels =  $('#cantLevels').val();

	$('#studentsResult').change(function(event){
		var idStudentsResult = $('#studentsResult').val();
		var aspect = document.getElementById('aspect');
		aspect.value = '-1';

		var classStudentsResult = '.studentsResult.' + idStudentsResult;
		$('.studentsResult').attr("hidden", true);

		if (idStudentsResult != '-1'){
			$(classStudentsResult).attr("hidden", false);
			aspect.disabled = false;
		}

	});

	$('#aspect').change(function(event){
		var idAspect = $('#aspect').val();
		var classAspect = '.aspect.' + idAspect;

		if (idAspect != '-1'){
			$('#titleCriterions').attr("hidden", false);
			$('#criterions').attr("hidden", false);
			$('.aspect').attr("hidden", true);
			$(classAspect).attr("hidden", false);
		}

	});
	/*
	$('#datatable').dataTable({
		paging: false,
		language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        }
	});
	*/

	//buttons + & - for grading
	var currentGrade;
	$('.minusGrade').click(function(){ 
		currentGrade = $(this).closest('td').find("input").val();
		(currentGrade>0)?(--currentGrade):(true);
		$(this).closest('td').find("input").val(currentGrade);
	});

	$('.plusGrade').click(function(){ 
		currentGrade = $(this).closest('td').find("input").val();
		(currentGrade<cantLevels)?(++currentGrade):(true);
		$(this).closest('td').find("input").val(currentGrade);
	});
	/*
	//Progress Bar
	$("#stuProgressBar").data("transitiongoal") === 50;

	var numGradeItems;

	var arrGrades = []
	numGradeItems = $('.studentsTableGridInput').length;
	arrGrades = $( ".studentsTableGridInput" )
	  .map(function() {
	    return this.val;
	  }).get().join();

	console.log(arrGrades);
	var numOfTrue = 0;
	for(var i=0;i<arrGrades.length;i++){
    if(arrGrades[i].val == 0)
       numOfTrue++;
	}
	*/
});