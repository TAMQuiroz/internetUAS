$(document).ready(function(){
	$('.view-course').on("click", function(event){
		var courseCode = $(this).closest('tr').find('.course-id').text();
		$.ajax({
			type:"GET",
			url:baseUrl + "/courses/view?courseCode=" + courseCode,
			dataType: "json",
			data: data,
			contentType: "application/json; charset=utf-8",
			success: function(data){
		      $('#modal-course #course-code').html(data.course.Codigo);
		      $('#modal-course #course-name').html(data.course.Nombre);
		      if(data.course.NivelAcademico != -1){
		      	$('#modal-course #course-academicLevel').html(data.course.NivelAcademico);
		      }else{
		      	$('#modal-course #course-academicLevel').html("Electivo");
		      }
		      
		      $('#modal-course').modal();
			}
		});
	});

	$('.delete-course').on("click", function(event){
		var courseId = $(this).closest('tr').find('.course-id').text();
		$('#modal-button').attr('href', baseUrl + "/courses/delete?course-id=" + courseId );
	});
});