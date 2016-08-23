$(document).ready(function(){

	$('#aspect-table').on("click", '.delete-aspect',function(event){
		var aspectId = $(this).closest('tr').find('.aspect_code').text();
		$('#modal-button').attr('href', baseUrl + "/aspects/delete?aspect-code=" + aspectId );
	});

	// Cuando se elige un resultado estudiantil del combobox
	// solo se muestran sus aspectos
	$('#studentsResult').change(function(event){
		var studentsResult = $(this).val();
		if(studentsResult==""){
			$('.aspect').attr("hidden", false);
		}
		else
		{
			$('.aspect').attr("hidden", true);
			$('.' + studentsResult).attr("hidden", false);
		}
	});

	// Cuando se cierra el modal se limpian los valores
	$('#aspect-new').on('hidden.bs.modal', function (e){
		$('#aspect_new_name').val('');
	});

	$('#aspect-edit').on('hidden.bs.modal', function (e){
		$('#aspect_edit_name').val('');
	});

	// Llena los datos del modal editar
	$('.edit-aspect').on("click",function(event){
		var stRs = $(this).closest('tr').find(".aspect_studentsResultName").text();
		var code = $(this).closest('tr').find(".aspect_code").text();
		var name = $(this).closest('tr').find(".aspect_name").text();

		$('#studentsResult_edit_code').val(stRs);
		$('#aspect_edit_name').val(name);
		$('#aspect_edit_code').val(code);
	});

});