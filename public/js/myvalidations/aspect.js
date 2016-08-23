jQuery(function(){

  $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-zá-ú1-9\- ,.()]+$/i.test(value);
    }, "Solo puede ingresar letras y números");
   
  //Validación

  $('#formModalAspectNew').validate({
    rules: {
      studentsResult_new_code:{
        required: true,
      },
      aspect_new_name:{
        required: true,
        lettersAndNumber: true,
        maxlength: 50,
      }
    },
    messages: {
      studentsResult_new_code: {
        required: "Debe seleccionar un resultado estudiantil",
      },
      aspect_new_name: {
        required: "Debe ingresar un nombre",
        lettersAndNumber: "Debe ingresar un nombre válido",
        maxlength: "El nombre no debe tener más 50 caracteres",
      }
    }
  });

  $('#formModalAspectEdit').validate({
    rules: {
      studentsResult_edit_code:{
        required: true,
      },
      aspect_edit_name:{
        required: true,
        lettersAndNumber: true,
        maxlength: 50,
      }
    },
    messages: {
      studentsResult_edit_code: {
        required: "Debe seleccionar un resultado estudiantil",
      },
      aspect_edit_name: {
        required: "Debe ingresar un nombre",
        lettersAndNumber: "Debe ingresar un nombre válido",
        maxlength: "El nombre no debe tener más 50 caracteres",
      }
    }
  });

});