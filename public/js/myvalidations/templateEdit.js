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
            fase: {
                required: true,
            },
            titulo: {
                required: true,
                maxlength: 100,
            },
            ruta: {
                required: false,
            },
            obligatorio:{
                required: false,
            },
        },
        messages: {
            fase: {
                required: "Debe ingresar una fase",
            },
            titulo: {
                required: "Debe ingresar un titulo",
                maxlength: "El titulo no debe tener más de 100 caracteres",
            },
            ruta: {
                required: "Debe ingresar una Plantilla",
            },
            obligatorio: {
                
            },
        }
    });

});