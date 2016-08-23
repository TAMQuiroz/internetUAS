$(document).ready(function(){

$('#btn-studentResult-table').click(
	//$('#studentResult-new-description').val()

		modalNewSelect = $('#studentResult-new').val();

		$('#studentResult-table').append(
			'<tr class="even pointer">' +
			'<td class=" "><input type="hidden" name="studentResult[]" value="' + modalNewSelect +'"></input>' 
			+ modalNewSelect + '</td>'+
            '<td class=" ">' +
            '<a class="btn btn-danger btn-xs remove-studentResult" data-target=".bs-example-modal-sm">' +
           	'<i class="fa fa-remove"></i></a>' +
            '</td>' +
            '</tr>');
		$(".remove-studentResult").on("click", function(event){
			$(this).closest('tr').remove();
		});
        )
	)}
);