$(document).ready(function(){

	var studentResultList=[];
	var ex;

	var modalSelect = $('#courseEvaluated-name');

	$("#save-button").on("click", function(event){
		modalSelect = $('#courseEvaluated-name').val();

		$.ajax({
			type:"GET",
			url:baseUrl + "/EvaluatedCourses/getByAcademicCicle?academicCicle_code" + modalSelect,
			dataType: "json",
			data: ex,
			contentType: "application/json; charset=utf-8",
			success: function(ex){
				$('#courseEvaluated-table').append(
					'<tr class="even pointer">' +
						'<td class=" "> <input type="hidden" name="courseEvaluated[]" value="' + ex[0].IdCursoEvaluado +'"></input>' 
						+ ex[0].IdCurso + '</td>'+
						'<td class=" ">' + ex[0].Descripcion + '</td>' +
	                    '<td class=" ">' +
	                        '<a class="btn btn-danger btn-xs remove-courseEvaluated" data-target=".bs-example-modal-sm">' +
	                        '<i class="fa fa-remove"></i></a>' +
	                    '</td>' +
                    '</tr>');

				$(".remove-courseEvaluated").on("click", function(event){
					$(this).closest('tr').remove();
				});
			}
		});
	});

	$('.delete-evaluatedCourse').on("click", function(event){
		var courseId = $(this).closest('tr').find('.evaluatedCourseid').text();
		$('#modal-button').attr('href', baseUrl + "/EvaluatedCourses/delete?evaluatedCourse_code=" + courseId );
	});
});