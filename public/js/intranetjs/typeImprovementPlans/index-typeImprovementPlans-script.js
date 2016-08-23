$(document).ready(function(){

	var ex;

	$('.view-typeImprovementPlan').on("click", function(event){
		var typeImprovementPlanId = $(this).closest('tr').find('.typeImprovementPlanId').text();

		$.ajax({
			type:"GET",
			url:baseUrl + "/typeImprovement/getTypeImprovementPlan/" + typeImprovementPlanId,
			dataType: "json",
			data: ex,
			contentType: "application/json; charset=utf-8",
			success: function(ex){
				//console.log(ex);
				$('#typeCode').text(ex.typeImprovementPlan.typeImprovementPlan.Codigo);
				$('#typeTheme').text(ex.typeImprovementPlan.typeImprovementPlan.Tema);
				$('#typeDescription').text(ex.typeImprovementPlan.typeImprovementPlan.Descripcion);
				$('#dateR').text(ex.typeImprovementPlan.typeImprovementPlan.created_at);
				if(ex.typeImprovementPlan.typeImprovementPlan.updated_at != null){
					$('#dateL').text(ex.typeImprovementPlan.typeImprovementPlan.updated_at);	
				}else{
					$('#dateL').text("-");
				}
				
				$('#edit-button').attr("href", baseUrl + "/typeImprovement/edit?typeImprovementPlanId=" + typeImprovementPlanId);
			}
		});
	});

	$('.delete-typeImprovement').on("click", function(event){
		var typeImprovementPlanId = $(this).closest('tr').find('.typeImprovementPlanId').text();
		$('#modal-button').attr("href", baseUrl + "/typeImprovement/delete?typeImprovementPlanId=" + typeImprovementPlanId);
	});

});