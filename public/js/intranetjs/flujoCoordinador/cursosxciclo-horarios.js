$(document).ready(function(){
	$('.delete-timetable').on("click", function(event){
		var idtimetable = $(this).closest('tr').find('.timetableId').text();
		var idcourse = $('#courseId').val();
		//console.log(courseId);
		//{id}/horario/{idCourse}/delete/{idTimetable}
		//$('#modal-button').attr("href", baseUrl + "/dictatedCourses/delete?timetableId=" + timetableId + "&courseId=" + courseId);
		$('#modal-button').attr("href", baseUrl + "/flujoCoordinador/horario/" + idcourse + "/delete/" + idtimetable);
	});

});