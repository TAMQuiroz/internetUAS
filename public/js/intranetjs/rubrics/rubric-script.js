$(document).ready(function(){

	var aspectList=[];
	var ex;

	var modalSelect = $('#aspect-name');

	$("#save-button").on("click", function(event){
		modalSelect = $('#aspect-name').val();

		$.ajax({
			type:"GET",
			url:baseUrl + "/aspects/getById/" + modalSelect,
			dataType: "json",
			data: ex,
			contentType: "application/json; charset=utf-8",
			success: function(ex){

				$('#aspect-table').append(
					'<tr class="even pointer">' +
						'<td class=" "><input type="hidden" name="aspect[]" value="' + ex[0].IdAspecto +'"></input>' 
						+ ex[0].IdAspecto + '</td>'+
						'<td class=" ">' + ex[0].Nombre + '</td>' +
	                    '<td class=" ">' +
	                        '<a class="btn btn-danger btn-xs remove-aspect" data-target=".bs-example-modal-sm">' +
	                        '<i class="fa fa-remove"></i></a>' +
	                    '</td>' +
                    '</tr>');

				$(".remove-aspect").on("click", function(event){
					$(this).closest('tr').remove();
				});
			}
		});
	});
});