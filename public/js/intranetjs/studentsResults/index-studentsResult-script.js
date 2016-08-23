$(document).ready(function(){

	$('.delete-studentsResult').on("click", function(event){
		var id = $(this).closest('tr').find('.id').text();
		$('#modal-button').attr("href", baseUrl + "/studentsResult/delete?id=" + id);
	});

});