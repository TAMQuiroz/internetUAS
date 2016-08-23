$(document).ready(function(){

	var ex;

	$('.view-suggestion').on("click", function(event){
		var suggestionId = $(this).closest('tr').find('.suggestionId').text();
		//var status = $(this).closest('tr').find('.statusSuggestion').text();
		var idCoordinator = $('#idCoordinator').text();
		var idUser = $('#idUser').text();

		//if(status == 'Solicitado' && idUser == idCoordinator) {$('#btnAprobar').attr("style", "visibility: visible"); $('#btnRechazar').attr("style", "visibility: visible");
		//	$('#btnAprobar').attr("href", baseUrl + "/suggestions/aprrove?idSuggestion=" + suggestionId); $('#btnRechazar').attr("href", baseUrl + "/suggestions/reject?idSuggestion=" + suggestionId);        }
		//else{$('#btnAprobar').attr("style", "visibility: hidden"); $('#btnRechazar').attr("style", "visibility: hidden");}

		$.ajax({
			type:"GET",
			url:baseUrl + "/suggestions/getSuggestion/" + suggestionId,
			dataType: "json",
			data: ex,
			contentType: "application/json; charset=utf-8",
			success: function(ex){
				//console.log(ex);
				$('#title').text(ex.suggestion.suggestion.Titulo);
				$('#descriptionSuggestion').text(ex.suggestion.suggestion.Descripcion);
				$('#owner').text(ex.suggestion.name + " " +ex.suggestion.lastname + " " + ex.suggestion.secondlastname);
				$('#dateR').text(ex.suggestion.suggestion.created_at);
				if(ex.suggestion.suggestion.updated_at !=null){
                    $('#dateL').text(ex.suggestion.suggestion.updated_at);
                }else{
                    $('#dateL').text("-");
                }
				//if(ex.suggestion.suggestion.updated_at !=null){	$('#dateL').text(ex.suggestion.suggestion.updated_at);}else{$('#dateL').text("-");}

				//$('#edit-button').attr("href", baseUrl + "/teachers/edit?teacherid=" + suggestionId );
			}

		});
	});

	var form = $('#form-search-suggestions');
	/*
	$('#btnSearch').on('click', function() {
		$.post(form.attr('action'), form.serialize(), function(table) {
			$('#suggestionTable').html(table);
		})
	})
	*/
});