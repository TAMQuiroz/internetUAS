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
            hora_ini: {
                required: true,
                min: 8,
                max: 21,
            },
            fecha: {
                required: true,                
            },            
        }      
    });

});