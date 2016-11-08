jQuery(function(){

    $.validator.addMethod("names", function(value, element) {
        return this.optional(element) || /^[a-zA-Zá-ź ]+$/i.test(value);
    }, "Solo puede ingresar letras");

    $.validator.addMethod("numbers", function(value, element) {
        return this.optional(element) || /^[0-9]+$/i.test(value);
    }, "Solo puede ingresar números");

    $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-zá-úä-üÁ-Ú0-9\-.,!¡¿?;() ]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

    $.validator.addMethod("codes", function(value, element) {
        return this.optional(element) || /^[A-Za-zá-úÁ-Ú0-9\-_ ]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

    $.validator.addMethod("greaterThan", function(value, element, params) {
            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) >= new Date($(params).val());
            }
            return isNaN(value) && isNaN($(params).val()) || (Number(value) > Number($(params).val())); 
    },'Debe ser mayor o igual que la fecha de inicio.');

    //Validación

    $('#formEvaluation').validate({
        rules: {
            nombre: {
                required: true,
                maxlength: 200,
                lettersAndNumber: true
            },
            tiempo: {
                required: true,
                min: 1,
                max: 600,
                numbers:true
            },                         
            fecha_inicio: {
                required: true,                
            },
            fecha_fin: {
                required: true,
                greaterThan: "#fecha_inicio"
            },
            descripcion:{
                required: true,
                maxlength: 500,
                lettersAndNumber: true
            }
        },
        messages: {
            nombre: {
                required: "Debe ingresar un nombre",
                maxlength: "El nombre no debe tener más de 200 caracteres",
                lettersAndNumber: "Sólo puede ingresar letras, números y signos de puntuación."
            },
            tiempo: {
                required: "Debe ingresar el tiempo que durará la evaluación",
                min: "El valor mínio es 1 minuto",
                max: "El valor máximo es 600 minutos"                
            },                       
            descripcion: {
                required: "Debe ingresar la descripción de la evaluación",
                maxlength: "La descripción no debe tener más de 500 caracteres",
                lettersAndNumber: "Sólo debe ingresar letras, números y signos de puntuación"
            },
            fecha_inicio: {
                required: "Debes ingresar la fecha de inicio"
            },
            fecha_fin: {
                required: "Debes ingresar la fecha fin"
            }
        }
    });

   
});