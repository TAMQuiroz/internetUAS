$(document).ready(function(){

	var studentResultList=[];
	var ex, dataFa, dataeducationalObjectives;

	$('#faculty-identifier').change(function(event){
		var idFaculty = $('#faculty-identifier').val();

		$.ajax({
			type:"GET",
			url:baseUrl + "/educationalObjectives/findFaculty/" + idFaculty,
			dataType: "json",
			data: dataFa,
			contentType: "application/json; charset=utf-8",
			error: function(xhr, textStatus, error){
			      console.log(textStatus);
			      console.log(error);
			  },
			success: function(dataFa){
				$('#faculty-name').val(dataFa.faculty.Nombre);
			}
		});

		$.ajax({
			type:"GET",
			url:baseUrl + "/educationalObjectives/indexByFaculty/" + idFaculty,
			dataType: "json",
			data: dataRubrics,
			contentType: "application/json; charset=utf-8",
			success: function(dataeducationalObjectives){
				$('#educationalObjective-table tr').not(function(){if ($(this).has('th').length){return true}}).remove();

				$(dataeducationalObjectives.educationalObjectives).each(function(index){
            $('#educationalObjective-table tbody').append('<tr class="even pointer rubric-register">' +
            '<td class="educationalObjetiveid">' + $(this)[0].IdObjetivoEducacional + '</td>' +
            '<td class="educationalObjective-description">' + $(this)[0].Descripcion + '</td>' +
            '<td class="educationalObjective-number">' + $(this)[0].Numero + '</td>' +
            '<td class="educationalObjective-actions"><a class="btn btn-primary btn-xs view-educationalObjective"' +
            'data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>' +
            '<a href="' +
             baseUrl + "/educationalObjectives/edit?educationalObjetive_code=" + $(this)[0].IdObjetivoEducacional +
            '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>' +
            '<a href="" class="btn btn-danger btn-xs delete-educationalObjective" data-toggle="modal"' +
            'data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>' +
            '</tr>');
        });
			}
		});

		$('#educationalObjective-table').on("click", '.delete-educationalObjective',function(event){
			var rubricId = $(this).closest('tr').find('.educationalObjetiveid').text();
			$('#modal-button').attr('href', baseUrl + "/educationalObjectives/delete?educationalObjetive_code=" + educationalObjetiveId );
		});

	});

	$('#educationalObjetive-table').on("click", '.view-educationalObjetive',function(event){
		var educationalObjetiveId = $(this).closest('tr').find('.educationalObjetiveid').text();

		$.ajax({
			type:"GET",
			url:baseUrl + "/educationalObjectives/getEducationalObjectiveStudentResults/" + educationalObjetiveId,
			dataType: "json",
			data: ex,
			contentType: "application/json; charset=utf-8",
			success: function(ex){
				$('.modal-title').text("Objetivo Educacional");
				$('#modal-educationalObjetive-description').text(ex.educationalObjetive.info[0].Descripcion);
				/*
				if(ex.rubric.info[0].Vigente == "") {
					$('#rubric-state').text("Pendiente de Estado");
				} else {
					$('#rubric-state').text(ex.rubric.info[0].Vigente);
				}
				*/
				$('#studentResult-table tr').not(function(){if ($(this).has('th').length){return true}}).remove();

				$(ex.educationalObjective.StudentResults).each(function(index){
					$('#StudentResult-list').append('<tr class="even pointer">' +
              								 '<td class=" ">' + $(this)[0].Identificador +'</td>' +
              								 '<td class=" ">' + $(this)[0].Descripcion +'</td>' +
              								 '<td class=" ">' + $(this)[0].CicloRegistro +'</td>' +
            								 '</tr>');
				});

				$('#edit-button').attr("href", baseUrl + "/educationalObjectives/edit?educationalObjetive_code=" + educationalObjetiveId );
			}
		});
	});


	$('.delete-educationalObjetive').on("click", function(event){
		var id = $(this).closest('tr').find('.id').text();
		$('#modal-button').attr('href', baseUrl + "/educationalObjectives/delete?id=" + id );
	});

});