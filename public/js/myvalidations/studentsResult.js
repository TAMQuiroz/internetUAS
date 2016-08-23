jQuery(function(){

  $.validator.addMethod("capitalLetter", function(value, element) {
        return this.optional(element) || /[A-Z]/i.test(value);
    }, "Solo puede ingresar una letra mayúscula");

  $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-zá-ú1-9\- ,.()]+$/i.test(value);
    }, "Solo puede ingresar letras y números");
  
  $.validator.addMethod("checkExists", function(value, element)
    {
        var identifier = $("#identifier").val();
        //console.log(identifier);
        $.ajax({
            url: baseUrl + "/studentsResult/getIdentifier/" + identifier,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"identifier" : identifier}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              console.log(data);
              if (data.studentsResults.studentsResult !== true) {
                //console.log("Código ya existe");
                $('#validateIdentifier').val(" ");
                return false;
              }
              else{
                //console.log("Código no existe");
                $('#validateIdentifier').val(value);
                return true;
              }
            },
            error: function () {
                console.log("Ocurrió un error checkExists ");
                return false;
            }
        });
        if(jQuery("#validateIdentifier").val()===" "){return false;}else{return true;}

    }, 'El identicador ingresado ya existe');

  $.validator.addMethod("checkIdenticadorEdit", function(value, element)
    {
        var identifier = $("#identifier").val();
        var code = $("#code").val();
        //console.log(identifier);
        $.ajax({
            url: baseUrl + "/studentsResult/getIdentifier/" + identifier,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"identifier" : identifier}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {

              if (data.studentsResults.studentsResult !== true && data.studentsResults.info.IdResultadoEstudiantil !== parseInt(code)) {
                //console.log("Código ya existe");
                $('#validateIdentifier').val(" ");
                return false;
              }
              else{
                //console.log("Código no existe");
                $('#validateIdentifier').val(value);
                return true;
              }
            },
            error: function () {
                //console.log("Ocurrió un error");
                return false;
            }
        });
        if(jQuery("#validateIdentifier").val()===" "){return false;}else{return true;}

    }, 'El identicador ingresado ya existe');
  
  //Validación

  // Registrar

	$('#formStudentsResult').validate({
    rules: {
      identifier: {
        required: true,
        pattern: /^[A-Z\Ñ]{1}/,
        checkExists: true,
        maxlength: 1,
      },
      description: {
        required: true,
        lettersAndNumber: true,
        maxlength: 200,
      }
    },
    messages: {
      identifier: {
        required: "Debe ingresar un identicador",
        pattern: "Debe ingresar una letra mayúscula",
        checkExists: "El identicador ingresado ya existe",
        maxlength: "Debe ingresar una letra mayúscula",
      },
      description: {
        required: "Debe ingresar una descripción",
        lettersAndNumber: "Debe ingresar una descripción válida",
        maxlength: "La descripción no debe tener más 200 caracteres",
      }
    }
  });

  // Modal

  $('#formNombre').validate({
    rules: {
      aspect_new_name:{
        required: true,
        lettersAndNumber: true,
        maxlength: 50,
      }
    },
    messages: {
      aspect_new_name: {
        required: "Debe ingresar un nombre",
        lettersAndNumber: "Debe ingresar un nombre válido",
        maxlength: "El nombre no debe tener más 50 caracteres",
      }
    }
  });

  // Editar

  $('#editStudentsResult').validate({
    rules: {
      identifier: {
        required: true,
        pattern: /^[A-Z\Ñ]{1}/,
        checkIdenticadorEdit: true,
        maxlength: 1,
      },
      description: {
        required: true,
        lettersAndNumber: true,
        maxlength: 200,
      }
    },
    messages: {
      identifier: {
        required: "Debe ingresar un identicador",
        pattern: "Debe ingresar una letra mayúscula",
        checkIdenticadorEdit: "El identicador ingresado ya existe",
        maxlength: "Debe ingresar una letra mayúscula",
      },
      description: {
        required: "Debe ingresar una descripción",
        lettersAndNumber: "Debe ingresar una descripción válida",
        maxlength: "La descripción no debe tener más 200 caracteres",
      }
    }
  });


  $('#formModalCriteriaNewName').validate({
    rules: {
      criteria_new_name: {
        required: true,
        maxlength: 50,
        minlength: 1,
      }
    },
    messages: {
      criteria_new_name: {
        required: "Debe ingresar un nombre",
        maxlength: "El nombre no debe tener más 50 caracteres",
        minlength: "Debe ingresar una Nombre",
      }
    }
  });

});