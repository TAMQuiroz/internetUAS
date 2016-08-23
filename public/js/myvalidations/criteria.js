/**
 * Created by paolo on 6/3/16.
 */
jQuery(function(){

    $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-zá-ú1-9\- ,.()]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

    $('#formModalCriteriaNew').validate({
        rules: {
            criteria_new_name:{
                required: true,
                lettersAndNumber: true,
                maxlength: 200,
            }
        },
        messages: {
            criteria_new_name: {
                required: "Debe ingresar un nombre",
                lettersAndNumber: "Debe ingresar un nombre válido",
                maxlength: "El nombre no debe tener más 200 caracteres",
            }
        }
    });

    $('#formModalCriteriaEdit').validate({
        rules: {
            criteria_edit_name:{
                required: true,
                lettersAndNumber: true,
                maxlength: 200,
            }
        },
        messages: {
            criteria_edit_name: {
                required: "Debe ingresar un nombre",
                lettersAndNumber: "Debe ingresar un nombre válido",
                maxlength: "El nombre no debe tener más 200 caracteres",
            }
        }
    });

    $('#formEditCriterion').validate({
        rules: {
            criterionname: {
                lettersAndNumber: true,
                required: true,
                maxlength: 200
            },
            levelDescCurrent:{
                lettersAndNumber: true,
                required: true,
                maxlength: 200
            },
            levelDescPast:{
                lettersAndNumber: true,
                required: true,
                maxlength: 200
            }
        },

        messages: {
            criterionname: {
                required: "Debe ingresar un nombre de un criterio",
                maxlength: "El nombre del criterio no puede tener mas de 200 caracteres"
            },
            levelDescCurrent: {
                required: "Debe ingresar una descripción para el nivel",
                maxlength: "La descripción del nivel no puede tener mas de 200 caracteres"
            },
            levelDescPast: {
                required: "Debe ingresar una descripción para el nivel",
                maxlength: "La descripción del nivel no puede tener mas de 200 caracteres"
            }
        }
    });
});