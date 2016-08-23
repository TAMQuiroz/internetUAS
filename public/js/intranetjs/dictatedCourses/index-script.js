$(document).ready(function(){
	$('.delete-timetable').on("click", function(event){
		var timetableId = $(this).closest('tr').find('.timetableId').text();
		var courseId = $('#courseId').val();
		//console.log(courseId);
		$('#modal-button').attr("href", baseUrl + "/dictatedCourses/delete?timetableId=" + timetableId + "&courseId=" + courseId);
	});

});