$(document).ready(function(){

	var aspectList=[];
	var ex, dataRE, dataRubrics;

	$('#studentsResult-identifier').change(function(event){
		var idStudentsResult = $('#studentsResult-identifier').val();

		$.ajax({
			type:"GET",
			url:baseUrl + "/rubrics/findRE/" + idStudentsResult,
			dataType: "json",
			data: dataRE,
			contentType: "application/json; charset=utf-8",
			error: function(xhr, textStatus, error){
			      console.log(textStatus);
			      console.log(error);
			  },
			success: function(dataRE){
				$('#studentsResult-description').val(dataRE.studentsResult.Descripcion);
			}
		});

		$.ajax({
			type:"GET",
			url:baseUrl + "/rubrics/indexByRE/" + idStudentsResult,
			dataType: "json",
			data: dataRubrics,
			contentType: "application/json; charset=utf-8",
			success: function(dataRubrics){
				$('#rubric-table tr').not(function(){if ($(this).has('th').length){return true}}).remove();

				$(dataRubrics.rubrics).each(function(index){
            $('#rubric-table tbody').append('<tr class="even pointer rubric-register">' +
            '<td class="rubric-id">' + $(this)[0].IdRubrica + '</td>' +
            '<td class="rubric-name">' + $(this)[0].Nombre + '</td>' +
            '<td class="rubric-actions"><a class="btn btn-primary btn-xs view-rubric"' +
            'data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search"></i></a>' +
            '<a href="' +
             baseUrl + "/rubrics/editRubric?rubric-code=" + $(this)[0].IdRubrica +
            '" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>' +
            '<a href="" class="btn btn-danger btn-xs delete-rubric" data-toggle="modal"' +
            'data-target=".bs-example-modal-sm"><i class="fa fa-remove"></i></a>' +
            '</tr>');
        });
			}
		});

		$('#rubric-table').on("click", '.delete-rubric',function(event){
			var rubricId = $(this).closest('tr').find('.rubric-id').text();
			$('#modal-button').attr('href', baseUrl + "/rubrics/deleteRubric?rubric-code=" + rubricId );
		});

	});

	$('#rubric-table').on("click", '.view-rubric',function(event){
		var rubricId = $(this).closest('tr').find('.rubric-id').text();

		$.ajax({
			type:"GET",
			url:baseUrl + "/rubrics/getRubricAspects/" + rubricId,
			dataType: "json",
			data: ex,
			contentType: "application/json; charset=utf-8",
			success: function(ex){
				$('.modal-title').text("Rúbrica");
				$('#modal-rubric-name').text(ex.rubric.info[0].Nombre);
				/*
				if(ex.rubric.info[0].Vigente == "") {
					$('#rubric-state').text("Pendiente de Estado");
				} else {
					$('#rubric-state').text(ex.rubric.info[0].Vigente);
				}
				*/
				$('#aspect-table tr').not(function(){if ($(this).has('th').length){return true}}).remove();

				$(ex.rubric.aspects).each(function(index){
					$('#aspect-list').append('<tr class="even pointer">' +
              								 '<td class=" ">' + $(this)[0].IdAspecto +'</td>' +
              								 '<td class=" ">' + $(this)[0].Nombre +'</td>' +
            								 '</tr>');
				});

				$('#edit-button').attr("href", baseUrl + "/rubrics/editRubric?rubric-code=" + rubricId );
			}
		});
	});


	$('.delete-rubric').on("click", function(event){
		var rubricId = $(this).closest('tr').find('.rubric-id').text();
		$('#modal-button').attr('href', baseUrl + "/rubrics/deleteRubric?rubric-code=" + rubricId );
	});

});