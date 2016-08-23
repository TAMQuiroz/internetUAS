jQuery(function(){

  $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-zá-ú1-9\- ,.()]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

    $('#formModalSourceNewName').validate({
        rules: {
          source_new_name:{
            required: true,
            lettersAndNumber: true,
            maxlength: 50,
          }
        },
        messages: {
          source_new_name: {
            required: "Debe ingresar un nombre",
            lettersAndNumber: "Debe ingresar un nombre válido",
            maxlength: "El nombre no debe tener más 50 caracteres",
          }
        }
    });

    $('#formModalSourceEditName').validate({
        rules: {
          source_edit_name:{
            required: true,
            lettersAndNumber: true,
            maxlength: 50,
          }
        },
        messages: {
          source_edit_name: {
            required: "Debe ingresar un nombre",
            lettersAndNumber: "Debe ingresar un nombre válido",
            maxlength: "El nombre no debe tener más 50 caracteres",
          }
        }
    });

});