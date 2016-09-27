jQuery(function(){

    $.validator.addMethod("names", function(value, element) {
        return this.optional(element) || /^[a-zA-Zá-ź ]+$/i.test(value);
    }, "Solo puede ingresar letras");

    $.validator.addMethod("numbers", function(value, element) {
        return this.optional(element) || /^[0-9]+$/i.test(value);
    }, "Solo puede ingresar números");

    $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?; ]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

    //Validación

    $('#formSuggestion').validate({
        rules: {
            nombre: {
                required: true,
                maxlength: 50,
                names: true,
            },
            apellido_paterno: {
                required: true,
                maxlength: 100,
                names: true,
            },
            apellido_materno: {
                required: true,
                maxlength: 100,
                names: true,
            },
            correo:{
                required: true,
                email: true,
            },
            celular: {
                required: true,
                maxlength: 9,
                minlength: 9,
                numbers: true,
            },
            area: {
                required: false,
            },
            especialidad: {
                required: true,
            },
            descripcion: {
                required: true,
            }
        },
        messages: {
            nombre: {
                required: "Debe ingresar un nombre",
                maxlength: "El nombre no debe tener más de 50 caracteres",
            },
            apellido_paterno: {
                required: "Debe ingresar un apellido paterno",
                maxlength: "El apellido paterno no debe tener más de 100 caracteres",
            },
            apellido_materno: {
                required: "Debe ingresar un apellido materno",
                maxlength: "El apellido materno no debe tener más de 100 caracteres",
            },
            celular: {
                required: "Debe ingresar un celular",
                maxlength: "El celular debe tener 9 caracteres",
                minlength: "El celular debe tener 9 caracteres",
                numbers: "Ingrese un celular coherente",
            },
            area: {
                required: "Debe ingresar un area",
            },
            correo: {
                required: "Debe ingresar un correo",
                email: "Debe ingresar un correo valido",
                maxlength : "El tamaño debe ser 9 digitos",
            },
            especialidad: {
                required: "Debe ingresar una especialidad",
            },
            descripcion: {
                required: "Debe ingresar una descripcion",
            },
        }
    });

});