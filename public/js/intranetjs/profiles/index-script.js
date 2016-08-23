$(document).ready(function(){
    $('.view-profile').on("click", function(event){
        var profileCode = $(this).closest('tr').find('.profile-id').text();
        $.ajax({
            type:"GET",
            url:baseUrl + "/profile/view?profileCode=" + profileCode,
            dataType: "json",
            data: data,
            contentType: "application/json; charset=utf-8",
            success: function(data){
                $('#modal-profile #profile-code').html(data.profiled.IdPerfil);
                $('#modal-profile #profile-name').html(data.profiled.Nombre);
                $('#modal-profile #profile-description').html(data.profiled.Descripcion);
                $('#modal-profile').modal();
            }
        });
    });

    $('.delete-profile').on("click", function(event){
        var profileId = $(this).closest('tr').find('.profile-id').text();
        $('#modal-button').attr('href', baseUrl + "/profile/delete?profile-id=" + profileId );
    });
});