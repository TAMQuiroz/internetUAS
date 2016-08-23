$(document).ready(function(){

	$('#criteria-table').on("click", '.delete-criteria',function(event){
		var id = $(this).closest('tr').find('.criteriaCode').text();
		$('#modal-button').attr('href', baseUrl + "/criteria/delete?criterion-code=" + id );
	});

	$('#criteria-new').on('hidden.bs.modal', function (e){
		$('#criteria_new_name').val('');
	});

	$('#criteria-edit').on('hidden.bs.modal', function (e){
		$('#criteria_edit_name').val('');
	});

	$('#criteria-table').on("click", '.edit-criteria',function(event){
		var code = $(this).closest('tr').find(".criteriaCode").text();
		var name = $(this).closest('tr').find(".criteriaName").text();

		$('#criteria_edit_code').val(code);
		$('#criteria_edit_name').val(name);
	});

});