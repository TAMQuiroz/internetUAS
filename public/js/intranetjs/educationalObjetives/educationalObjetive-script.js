$(document).ready(function(){

	var modalNewSelect1 = $('#studentResult-new-identifier');
	var modalNewSelect2 = $('#studentResult-new-description');
	var modalNewSelect3 = $('#studentResult-new-cicle');

	var modalEditSelect1 = $('#studentResult-edit-identifier');
	var modalEditSelect2 = $('#studentResult-edit-description');
	var itemAspect;	


	$("#btn-save-new").on("click", function(event){
		$('#studentResult-new').modal();
		modalNewSelect2 = $('#studentResult-new-description').val();
		modalNewSelect1 = $('#studentResult-new-identifier').val();
		modalNewSelect3 = $('#studentResult-new-cicle').val();

		$('#studentResult-table').append(
			'<tr class="even pointer">' +
			'<td class=" "><input type="hidden" class="studentResultItem" name="studentResult[]" value="' + modalNewSelect1 +'"></input>' +
			'<input type="hidden" class="studentResultCode" value="0""></input>' +
			+ modalNewSelect1 + '</td>'+
			'<td class=" "><input type="hidden" name="studentResult[]" value="' + modalNewSelect2 +'"></input>' 
			+ modalNewSelect2 + '</td>'+
            '<td class=" "><input type="hidden" name="studentResult[]" value="' + modalNewSelect3 +'"></input>' 
			+ modalNewSelect3 + '</td>'+
			'<td class=" ">' +
            '<a class="btn btn-danger btn-xs remove-studentResult" data-target=".bs-example-modal-sm">' +
           	'<i class="fa fa-remove"></i></a>' +
            '</td>' +
            '</tr>');

		$(".remove-studentResult").on("click", function(event){
			$(this).closest('tr').remove();
		});

/*		$(".edit-studentResult").on("click", function(event){		
			itemStudentResult = $(this).closest('tr');
			var identifier = itemStudentResult.find(".studentResultIdentifier").text();
			identifier = identifier.replace(/\s+/g, '');
			var description = itemStudentResult.find(".studentResultDescription").text();
			description = description.replace(/\s+/g, '');

			$('#studentResult-edit-identifier').val(identifier);
			$('#studentResult-edit-description').val(description);
			$('#studentResult-edit').modal('show'); 
		});*/

	});

	$(".remove-studentResult").on("click", function(event){
		$(this).closest('tr').remove();
	});

	$(".edit-studentResult").on("click", function(event){		
		itemStudentResult = $(this).closest('tr');
		var identifier = itemStudentResult.find(".studentResultIdentifier").text();
		identifier = identifier.replace(/\s+/g, '');
		var description = itemStudentResult.find(".studentResultDescription").text();
		description = description.replace(/\s+/g, '');

		$('#studentResult-edit-identifier').val(identifier);
		$('#studentResult-edit-description').val(description);
		$('#studentResult-edit').modal('show'); 
	});

	$("#btn-save-edit").on("click", function(event){
		modalEditSelect1 = $('#studentResult-edit-identifier').val();
		modalEditSelect2 = $('#studentResult-edit-description').val();
		var code = itemStudentResult.find(".studentResultCode").val();
		code = code.replace(/\s+/g, '');

		itemStudentResult.find(".atudentResultItem").val(code + '-' + modalEditSelect1);
		itemStudentResult.find(".StudentResultIdentifier").text(modalEditSelect1);
		itemStudentResult.find(".StudentResultDescription").text(modalEditSelect2);
	});
});

				

