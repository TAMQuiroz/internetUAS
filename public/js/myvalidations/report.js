jQuery(function(){

    $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-zá-ú1-9\- ,.()]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

    $('#formReport').validate({
        rules: {
            title: {
                required: true,
                lettersAndNumber: true,
                maxlength: 50,
            },
            description: {
                required: true,
                lettersAndNumber: true,
                maxlength: 200,
            }
        },
        messages: {
            title: {
                required: "Debe ingresar un título",
                lettersAndNumber: "Debe ingresar un título válido",
                maxlength: "El título no debe tener más 50 caracteres",
            },
            description: {
                required: "Debe ingresar una descripción",
                lettersAndNumber: "Debe ingresar una descripción válida",
                maxlength: "La descripción no debe tener más 200 caracteres",
            }
        }
    });
});
