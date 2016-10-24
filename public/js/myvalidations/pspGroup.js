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
            numero: {
                required: true,
                min: 1,
                max: 9,
            },
            descripcion: {
                required: true,
                maxlength: 100,
            },            
        },
        messages: {
            fase: {
                required: "Debe ingresar un numero de grupo",
                min: "numero mayor igual a 1",
                max: "numero menor igual a 9",
            },
            descripcion: {
                required: "Debe ingresar una descripcion",
                maxlength: "La descripcion no debe tener más de 100 caracteres",
            },                       
        }
    });

});