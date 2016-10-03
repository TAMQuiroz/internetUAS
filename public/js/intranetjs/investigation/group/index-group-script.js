$(document).ready(function(){
	$('.view-group').on("click", function(event){
		var groupId = $(this).closest('tr').find('.group-id').text();
		console.log(groupId);
		$.ajax({
			type:"GET",
			url:baseUrl + "/investigacion/grupo/view?groupId=" + groupId,
			dataType: "json",
			data: data,
			contentType: "application/json; charset=utf-8",
			success: function(data){
		      $('#modal-group #group-id').html(data.group.id);
		      $('#modal-group #group-name').html(data.group.nombre);
		      $('#modal-group #group-fac').html(data.group.id_especialidad);
		      $('#modal-group #group-desc').html(data.group.descripcion);
		      $('#modal-group #group-lider').html(data.group.id_lider);
		      $('#modal-group').modal();
			},
			error: function (data, errorThrown) {
                  alert('request failed :'+errorThrown);
              }
		})
	});

	$('.delete-group').on("click", function(event){
		var groupId = $(this).closest('tr').find('.group-id').text();
		$('#modal-button').attr('href', baseUrl + "/investigacion/grupo/delete/" + groupId );
	});
});