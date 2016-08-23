$(document).ready(function(){
    $('.view-user').on("click", function(event){
        var userCode = $(this).closest('tr').find('.user-id').text();
        $.ajax({
            type:"GET",
            url:baseUrl + "/users/view?userCode=" + userCode,
            dataType: "json",
            data: data,
            contentType: "application/json; charset=utf-8",
            success: function(data){
                console.log(data);
                $('#modal-user #userusername').html(data.user.Usuario);
                $('#modal-user #username').html(data.accreditor.Nombre);
                $('#modal-user #userfirstname').html(data.accreditor.ApellidoPaterno);
                $('#modal-user #userspanishfirstname').html(data.accreditor.ApellidoMaterno);
                $('#modal-user #useremail').html(data.accreditor.Correo);

                $('#modal-user #profile-name').html(data.profile.Nombre);
                $('#modal-user #profile-description').html(data.profile.Descripcion);
                $('#modal-user').modal();
            }
        });
    });

    $('.delete-user').on("click", function(event){
        var userId = $(this).closest('tr').find('.user-id').text();
        $('#modal-button').attr('href', baseUrl + "/users/delete?user-id=" + userId );
    });
});