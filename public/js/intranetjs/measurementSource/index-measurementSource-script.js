$(document).ready(function(){

	var modalNewSelect = $('#source_new_name');
	var modalEditSelect = $('#source_edit_name');
	var itemSource;
	var ex;

	$('#source-new').on('hidden.bs.modal', function (e){
		$('#source_new_name').val('');
	});

	$('#source-edit').on('hidden.bs.modal', function (e){
		$('#source_edit_name').val('');
	});

	$('.remove-source').on("click", function(event){
		//var id = $(this).closest('tr').find('.id').text();
		var id = $(this).closest('tr').find(".srcCode").val();
		$('#modal-button').attr("href", baseUrl + "/measurementSource/delete?id=" + id);
	});


	$('.edit-source').on("click",function(event){	
		//itemSource = $(this).closest('tr');
		var name = $(this).closest('tr').find(".srcName").text();
		var code = $(this).closest('tr').find(".code").text();
		//name = name.ltrim().join(' ');

		$('#source_edit_name').val(name);
		$('#code').val(code);
		$('#source-edit').modal('show'); 

	});

});