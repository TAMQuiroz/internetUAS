$(document).ready(function(){
	$('.write-observation').on("click", function(event){
		var versionId = $(this).closest('tr').find('.version-id').text();
		var entregableId = $(this).closest('tr').find('.entregable-id').text();
		//alert('entregableId :'+entregableId);
		$.ajax({
			type:"GET",
			url:baseUrl + "/investigacion/entregable/show/" + entregableId + "/viewVersion?versionId=" + versionId,
			dataType: "json",
			data: data,
			contentType: "application/json; charset=utf-8",
			success: function(data){
		      $('#modal-write-observation #versionId').html(data.version.id);
		      $('#modal-write-observation').modal();
			},
			error: function (data, errorThrown) {
                  alert('request failed :'+errorThrown);
              }
		})
		
	});

	$('.view-observation').on("click", function(event){
		var versionId = $(this).closest('tr').find('.version-id').text();
		var entregableId = $(this).closest('tr').find('.entregable-id').text();
		//alert('entregableId :'+entregableId);
		$.ajax({
			type:"GET",
			url:baseUrl + "/investigacion/entregable/show/" + entregableId + "/viewVersion?versionId=" + versionId,
			dataType: "json",
			data: data,
			contentType: "application/json; charset=utf-8",
			success: function(data){
		      $('#modal-view-observation #versionObservation').html(data.version.observacion);
		      $('#modal-view-observation').modal();
			},
			error: function (data, errorThrown) {
                  alert('request failed :'+errorThrown);
              }
		})
		
	});

	$('#btnSave').on("click", function(event){
		$('#modal-write-observation').hide();
	});
});