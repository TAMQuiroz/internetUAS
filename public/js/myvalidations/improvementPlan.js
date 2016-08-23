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

    //Validación

    $('#formImprovementPlan').validate({
        rules: {
            title: {
                required: true,
                maxlength: 100,
                lettersAndNumber: true
            },
            typePlan: {
                required: true,
                min: 1
            },
            find: {
                required: true,
                maxlength: 100,
                lettersAndNumber: true
            },
            analysis: {
                required: true,
                maxlength: 300,
                lettersAndNumber: true
            },
            desc: {
                required: true,
                maxlength: 300,
                lettersAndNumber: true
            },
            dateI: {
                required: true
            }
        },
        messages: {
            title: {
                required: "Debe ingresar un título",
                maxlength: "El título no debe tener más de 100 caracteres",
                lettersAndNumber: "Sólo puede ingresar letras, números y signos de puntuación"
            },
            typePlan: {
                required: "Debe escoger un Tipo de Plan de Mejora",
                min: "Debe escoger un Tipo de Plan de Mejora"
            },
            find: {
                required: "Debe ingresar el Hallazgo o Descripción de la Debilidad",
                maxlength: "El Hallazgo no debe tener más de 300 caracteres",
                lettersAndNumber: "Sólo debe ingresar letras, números y signos de puntuación"
            },
            analysis: {
                required: "Debe ingresar el Análisis Causal",
                maxlength: "El Análisis Causal no debe tener más de 300 caracteres",
                lettersAndNumber: "Sólo debe ingresar letras, números y signos de puntuación"
            },
            desc: {
                required: "Debe ingresar la Descripción de la Acción",
                maxlength: "La Descripción de la Acción no debe tener más de 300 caracteres",
                lettersAndNumber: "Sólo debe ingresar letras, números y signos de puntuación"
            },
            dateI: {
                required: "Debes ingresar la fecha de implementación"
            }
        }
    });

    $('#editImprovementPlan').validate({
        rules: {
            title: {
                required: true,
                maxlength: 100,
                lettersAndNumber: true
            },
            typePlan: {
                required: true,
                min: 1
            },
            find: {
                required: true,
                maxlength: 100,
                lettersAndNumber: true
            },
            analysis: {
                required: true,
                maxlength: 300,
                lettersAndNumber: true
            },
            desc: {
                required: true,
                maxlength: 300,
                lettersAndNumber: true
            },
            dateI: {
                required: true
            }
        },
        messages: {
            title: {
                required: "Debe ingresar un título",
                maxlength: "El título no debe tener más de 100 caracteres",
                lettersAndNumber: "Sólo puede ingresar letras, números y signos de puntuación"
            },
            typePlan: {
                required: "Debe escoger un Tipo de Plan de Mejora",
                min: "Debe escoger un Tipo de Plan de Mejora"
            },
            find: {
                required: "Debe ingresar el Hallazgo o Descripción de la Debilidad",
                maxlength: "El Hallazgo no debe tener más de 300 caracteres",
                lettersAndNumber: "Sólo debe ingresar letras, números y signos de puntuación"
            },
            analysis: {
                required: "Debe ingresar el Análisis Causal",
                maxlength: "El Análisis Causal no debe tener más de 300 caracteres",
                lettersAndNumber: "Sólo debe ingresar letras, números y signos de puntuación"
            },
            desc: {
                required: "Debe ingresar la Descripción de la Acción",
                maxlength: "La Descripción de la Acción no debe tener más de 300 caracteres",
                lettersAndNumber: "Sólo debe ingresar letras, números y signos de puntuación"
            },
            dateI: {
                required: "Debes ingresar la fecha de implementación"
            }
        }
    });
});