/**
 * Created by paolo on 6/1/16.
 */
jQuery(function(){
    $.validator.addMethod("letters", function(value, element) {
        return this.optional(element) || /^[A-Za-z\-. ]+$/i.test(value);
    }, "Solo puede ingresar letras");
    $.validator.addMethod("lettersspanish", function(value, element) {
        return this.optional(element) || /^([a-z ñáéíóú]{2,60})$/i.test(value);
    }, "Solo puede ingresar letras");
    $.validator.addMethod("validEmail", function(value, element) {
        return this.optional(element) || /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/i.test(value);
    }, "Solo pueden ser direcciones de correo validas.");

    $.validator.addMethod("checkExists", function(value, element)
    {
        var code = $("#userusername").val();

        $.ajax({
            url: baseUrl + "/users/getUsername/" + code,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"code" : code}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                if (data.user.user !== true) {
                    $('#validateCode').val(" ");
                    return false;
                }
                else{
                    $('#validateCode').val(value);
                    return true;
                }
            },
            error: function () {
                console.log("Ocurrió un error");
                return false;
            }
        });
        return jQuery("#validateCode").val() !== " ";
    }, 'El nombre de usuario ingresado ya existe');

    $('#formUser').validate({
        rules: {
            userfirstname: {
                letters: true,
                required: true,
                maxlength: 21
            },
            userlastname:{
                letters: true,
                required: true,
                maxlength: 21
            },
            userspanishlastname:{
                letters: true,
                required: true,
                maxlength: 21
            },
            useremail:{
                //validEmail: true,
                required: true,
                maxlength: 31,
                email: true,
            },
            userusername:{
                letters: true,
                checkExists: true,
                required: true,
                maxlength: 31
            },
            profilecode:{
                required: true
            }
        },
        messages: {
            userfirstname: {
                letters: "Solo pueden ser letras",
                required: "Debe ingresar el nombre",
                maxlength: "El tamanho maximo de este campo es de 21 caracteres"
            },
            userlastname: {
                letters: "Solo pueden ser letras",
                required: "Debe ingresar el apellido paterno",
                maxlength: "El tamanho maximo de este campo es de 21 caracteres"
            },
            userspanishlastname: {
                letters: "Solo pueden ser letras",
                required: "Debe ingresar el apellido materno",
                maxlength: "El tamanho maximo de este campo es de 21 caracteres"
            },
            useremail: {
                //validEmail: "De una dirección de correo válida",
                required: "Debe ingresar un correo electrónico",
                maxlength: "El tamanho maximo de este campo es de 31 caracteres",
                email: "Debe ingresar un correo electrónico válido",
            },
            userusername: {
                checkExists: "El nombre de usuario ya existe",
                required: "Debe ingresar un usuario",
                maxlength: "El tamanho maximo de este campo es de 31 caracteres"
            },
            profilecode: {
                required: "Debe elegir un perfil"
            }
        }
    });

    $('#editUser').validate({
        rules: {
            userfirstname: {
                lettersspanish: true,
                required: true,
                maxlength: 21
            },
            userlastname:{
                lettersspanish: true,
                required: true,
                maxlength: 21
            },
            userspanishlastname:{
                lettersspanish: true,
                required: true,
                maxlength: 21
            },
            useremail:{
                //validEmail: true,
                required: true,
                maxlength: 31,
                email: true,
            },
            userusername:{
                checkExists: true,
                required: true,
                maxlength: 31
            },
            profilecode:{
                required: true
            }
        },
        messages: {
            userfirstname: {
                letters: "Solo pueden ser letras",
                required: "Debe ingresar el nombre",
                maxlength: "El tamanho maximo de este campo es de 21 caracteres"
            },
            userlastname: {
                letters: "Solo pueden ser letras",
                required: "Debe ingresar el apellido paterno",
                maxlength: "El tamanho maximo de este campo es de 21 caracteres"
            },
            userspanishlastname: {
                letters: "Solo pueden ser letras",
                required: "Debe ingresar el apellido materno",
                maxlength: "El tamanho maximo de este campo es de 21 caracteres"
            },
            useremail: {
                //validEmail: "De una direccion de correo valida",
                required: "Debe ingresar el correo",
                maxlength: "El tamanho maximo de este campo es de 31 caracteres",
                email: "Debe ingresar un correo electrónico válido",
            },
            userusername: {
                letters: "Solo pueden ser letras",
                checkExists: "El nombre de usuario ya existe",
                required: "Debe ingresar un usuario",
                maxlength: "El tamanho maximo de este campo es de 31 caracteres"
            },
            profilecode: {
                required: "Debe elegir un perfil"
            }
        }
    });

    $('#passwordValidationForm').validate({
        rules: {
            user : {
                required: true
            },
            password : {
                required: true,
                minlength: 8
            },
            repeat_password : {
                required: true,
                minlength: 8
            }
        },
        messages: {
            user : {
                required: "Debe poner un usuario"
            },
            password : {
                required: "Debe poner una contrasenha",
                minlength: "Debe tener minimo 8 caracteres"
            },
            repeat_password : {
                required: "Debe repetir la contrasenha",
                minlength: "Debe tener minimo 8 caracteres"
            }
        }
    });
});