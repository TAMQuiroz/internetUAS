$(document).ready(function(){

    var ex;

    $('.view-improvementPlan').on("click", function(event){
        var improvementPlanId = $(this).closest('tr').find('.improvementPlanId').text();
        $.ajax({
            type:"GET",
            url:baseUrl + "/enhacementPlan/getEnhacementPlan/" + improvementPlanId,
            dataType: "json",
            data: ex,
            contentType: "application/json; charset=utf-8",
            success: function(ex){
                console.log(ex);

                $('#typeDescription').text(ex.improvementPlan.typeDescription);
                $('#typeCode').text(ex.improvementPlan.typeCode);
                $('#typeTheme').text(ex.improvementPlan.typeTheme);
                $('#find').text(ex.improvementPlan.improvementPlan.Hallazgo);
                $('#analysis').text(ex.improvementPlan.improvementPlan.AnalisisCausal);

                if (ex.improvementPlan.improvementPlan.IdDocente !=null) {
                    $('#owner').text(ex.improvementPlan.nameteacher + " " + ex.improvementPlan.lastnameteacher+ " "
                        + ex.improvementPlan.secondlastnameteacher);
                }else{
                    $('#owner').text("Todos");
                }
                $('#dateI').text(ex.improvementPlan.improvementPlan.FechaImplementacion);
                $('#dateR').text(ex.improvementPlan.improvementPlan.created_at);
                $('#dateI').text(ex.improvementPlan.improvementPlan.Fecha);
                if(ex.improvementPlan.improvementPlan.updated_at != null){
                    $('#dateL').text(ex.improvementPlan.improvementPlan.updated_at);
                }else{
                    $('#dateL').text("-");
                }

                $('#state').text(ex.improvementPlan.improvementPlan.Estado);

                $('#edit-button').attr("href", baseUrl + "/enhacementPlan/edit?improvementPlanId=" + improvementPlanId );
            }
        });
    });

    $('.delete-enhacementPlan').on("click", function(event){
        var improvementPlanId = $(this).closest('tr').find('.improvementPlanId').text();
        console.log(improvementPlanId);
        $('#modal-button').attr('href', baseUrl + "/enhacementPlan/delete?enhancementPlanId=" + improvementPlanId );
    });
});