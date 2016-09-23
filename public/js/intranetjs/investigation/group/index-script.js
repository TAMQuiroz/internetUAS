$(document).ready(function(){
	$('.view-group').on("click", function(event){
		var groupId = $(this).closest('tr').find('.group-id').text();
		$.ajax({
			type:"GET",
			url:baseUrl + "/group/show?groupId=" + groupId,
			dataType: "json",
			data: data,
			contentType: "application/json; charset=utf-8",
			success: function(data){
		      $('#modal-group #group-id').html(data.group.id);
		      $('#modal-group #group-name').html(data.group.nombre);
		      $('#modal-group #group-desc').html(data.group.descripcion);
		      $('#modal-group').modal();
			}
		});
	});

	$('.delete-course').on("click", function(event){
		var courseId = $(this).closest('tr').find('.course-id').text();
		$('#modal-button').attr('href', baseUrl + "/courses/delete?course-id=" + courseId );
	});
});