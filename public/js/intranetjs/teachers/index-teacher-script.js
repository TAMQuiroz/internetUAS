$(document).ready(function(){

	var ex;

	$('.view-teacher').on("click", function(event){
		var teacherId = $(this).closest('tr').find('.teacherid').text();

		$.ajax({
			type:"GET",
			url:baseUrl + "/teachers/getTeacher/" + teacherId,
			dataType: "json",
			data: ex,
			contentType: "application/json; charset=utf-8",
			success: function(ex){
				//console.log(ex);
				//$('#teacher-id').val(teacherId);
				$('#teachercode').text(ex.teacher.teacher.Codigo);
				$('#teachername').text(ex.teacher.teacher.Nombre);
				$('#teacherlastname').text(ex.teacher.teacher.ApellidoPaterno);
				$('#teachersecondlastname').text(ex.teacher.teacher.ApellidoMaterno);
				$('#teacheremail').text(ex.teacher.teacher.Correo);
				for (var i = 0; i < ex.teacher.specialty.length; i++) {
					if(ex.teacher.teacher.IdEspecialidad == ex.teacher.specialty[i].IdEspecialidad){
						$('#teacherspecialty').text(ex.teacher.specialty[i].Nombre);
					}
				}
				$('#teacherposition').text(ex.teacher.teacher.Cargo);
				if(ex.teacher.teacher.Vigente == 1) {
					$('#teacherstatus').text("Activo");
				} else {
					$('#teacherstatus').text("Inactivo");
				}
				$('#teacherdescription').text(ex.teacher.teacher.Descripcion);
				
				$('#edit-button').attr("href", baseUrl + "/teachers/edit?teacherid=" + teacherId );
			}
		});
	});

	$('.delete-teacher').on("click", function(event){
		var teacherId = $(this).closest('tr').find('.teacherid').text();
		console.log(teacherId);
		$('#modal-button').attr("href", baseUrl + "/teachers/delete?teacherid=" + teacherId);
	});

});