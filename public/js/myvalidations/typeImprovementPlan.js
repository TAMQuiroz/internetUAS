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

  $.validator.addMethod("codes", function(value, element) {
    return this.optional(element) || /^[A-Za-zá-úÁ-Ú0-9\-_ ]+$/i.test(value);
  }, "Solo puede ingresar letras y números");

  $.validator.addMethod("checkExists", function(value, element)
    {
        var code = $("#code").val();
        $.ajax({
            url: baseUrl + "/typeImprovement/getCode/" + code,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"code" : code}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              console.log(data);
              if (data.typeImprovementPlan.typeImprovementPlan !== true) {
                console.log("Código ya existe");
                $('#validarCode').val(" ");
                return false;
              }
              else{
                console.log("Código no existe");
                $('#validarCode').val(value);
                return true;
              }
            },
            error: function () {
                console.log("Ocurrió un error checkExists ");
                return false;
            }
        });
        if(jQuery("#validarCode").val()===" "){return false;}else{return true;}

    }, 'El código ingresado ya existe');

  $.validator.addMethod("checkIdenticadorEdit", function(value, element)
    {
        var code = $("#code").val();
        var typeImprovementPlanId = $("#typeImprovementPlanId").val();
        //console.log(identifier);
        $.ajax({
            url: baseUrl + "/typeImprovement/getCode/" + code,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"code" : code}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {

              if (data.typeImprovementPlan.typeImprovementPlan !== true && data.typeImprovementPlan.info.IdTipoPlanMejora !== parseInt(typeImprovementPlanId)) {
                //console.log("Código ya existe");
                $('#validarCode').val(" ");
                return false;
              }
              else{
                //console.log("Código no existe");
                $('#validarCode').val(value);
                return true;
              }
            },
            error: function () {
                //console.log("Ocurrió un error");
                return false;
            }
        });
        if(jQuery("#validarCode").val()===" "){return false;}else{return true;}

    }, 'El código ingresado ya existe');

  //Validación

  $('#formTypeImprovement').validate({
    rules: {
      code: {
        required: true,
        maxlength: 10,
        checkExists: true,
        codes: true
      },
      theme: {
        required: true,
        maxlength: 100,
        lettersAndNumber: true
      },
      description: {
        maxlength: 300
      }

    },
    messages: {
      code: {
        required: "Debe ingresar un código",
        maxlength: "El código no debe tener más de 10 caracteres",
        checkExists: "El código ingresado ya existe",
        codes: "Ingrese un código coherente"
      },
      theme: {
        required: "Debe ingresar un tema relacionado",
        maxlength: "El tema relacionado no debe tener más de 50 caracteres",
        lettersAndNumber: "Ingrese un tema relacionado coherente"
      },
      description: {
        maxlength: "La descripción no debe tener más de 300 caracteres"
      }
    }
  });

  $('#editTypeImprovement').validate({
    rules: {
      code: {
        required: true,
        maxlength: 10,
        checkIdenticadorEdit: true,
        codes: true
      },
      theme: {
        required: true,
        maxlength: 100,
        lettersAndNumber: true
      },
      description: {
        maxlength: 300
      }

    },
    messages: {
      code: {
        required: "Debe ingresar un Código",
        maxlength: "El Código no debe tener más de 10 caracteres",
        checkIdenticadorEdit: "El código ingresado ya existe",
        codes: "Ingrese un código coherente"
      },
      theme: {
        required: "Debe ingresar un tema relacionado",
        maxlength: "El tema relacionado no debe tener más de 50 caracteres",
        lettersAndNumber: "Ingrese un tema relacionado coherente"
      },
      description: {
        maxlength: "La Descripción no debe tener más de 300 caracteres"
      }
    }
  });
});