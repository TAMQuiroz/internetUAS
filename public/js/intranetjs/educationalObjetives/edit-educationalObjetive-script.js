$(document).ready(function(){

	var studentResultList=[];
	var ex;

	var modalSelect = $('#studentResult-name');

	$("#save-button").on("click", function(event){
		modalSelect = $('#studentResult-name').val();

		$.ajax({
			type:"GET",
			url:baseUrl + "/studentResult/getById/" + modalSelect,
			dataType: "json",
			data: ex,
			contentType: "application/json; charset=utf-8",
			success: function(ex){
				$('#studentResult-table').append(
					'<tr class="even pointer">' +
						'<td class=" "> <input type="hidden" name="studentResult[]" value="' + ex.IdResultadoEstudiantil +'"></input>' 
						+ ex.IdResultadoEstudiantil + '</td>'+
						'<td class=" ">' + ex.Descripcion + '</td>' +
	                    '<td class=" ">' +
	                        '<a class="btn btn-danger btn-xs remove-studentResult" data-target=".bs-example-modal-sm">' +
	                        '<i class="fa fa-remove"></i></a>' +
	                    '</td>' +
                    '</tr>');

				$(".remove-studentResult").on("click", function(event){
					$(this).closest('tr').remove();
				});
			}
		});
	});

	$(".remove-studentResult").on("click", function(event){
		$(this).closest('tr').remove();
	});
});