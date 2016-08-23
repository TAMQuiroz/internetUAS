$(document).ready(function(){

    var ex;

    $('.view-suggestion').on("click", function(event){
        var suggestionId = $(this).closest('tr').find('.suggestionId').text();

        $.ajax({
            type:"GET",
            url:baseUrl + "/suggestions/getSuggestion/" + suggestionId,
            dataType: "json",
            data: ex,
            contentType: "application/json; charset=utf-8",
            success: function(ex){
                //console.log(ex);
                $('#title').text(ex.suggestion.suggestion.Titulo);
                $('#descriptionSuggestion').text(ex.suggestion.suggestion.Descripcion);
                $('#owner').text(ex.suggestion.name + " " +ex.suggestion.lastname + " " + ex.suggestion.secondlastname);
                $('#dateR').text(ex.suggestion.suggestion.created_at);
                if(ex.suggestion.suggestion.updated_at !=null){
                    $('#dateL').text(ex.suggestion.suggestion.updated_at);
                }else{
                    $('#dateL').text("-");
                }

                if(ex.suggestion.suggestion.IdTipoPlanMejora != null){
                    $('#code').text(ex.suggestion.suggestion.type_improvement_plan.Codigo);
                    $('#themeType').text(ex.suggestion.suggestion.type_improvement_plan.Tema);
                }else{
                    $('#code').text("-");
                    $('#themeType').text("-");
                }

                //$('#edit-button').attr("href", baseUrl + "/teachers/edit?teacherid=" + suggestionId );
            }
        });
    });

    $('.delete-suggestion').on("click", function(event){
        var suggestionId = $(this).closest('tr').find('.suggestionId').text();
        $('#modal-button').attr('href', baseUrl + "/suggestions/delete?suggestion-id=" + suggestionId );
    });
});