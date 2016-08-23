jQuery(function(){

  $.validator.addMethod("names", function(value, element) {
        return this.optional(element) || /^[a-zA-Zá-ź ]+$/i.test(value);
    }, "Solo puede ingresar letras");

  $.validator.addMethod("numbers", function(value, element) {
        return this.optional(element) || /^[0-9]+$/i.test(value);
    }, "Solo puede ingresar números");

  $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-z0-9\- ]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

   $.validator.addMethod("checkExists", function(value, element)
    {
        var number = $("#number").val();
        //console.log(identifier);
        $.ajax({
            url: baseUrl + "/educationalObjectives/getNumber/" + number,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"number" : number}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              console.log(data);
              if (data.educationalObjetive.educationalObjetive !== true) {
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

    }, 'El número ingresado ya existe');

   $.validator.addMethod("checkIdenticadorEdit", function(value, element)
    {
        var number = $("#number").val();
        var code = $("#code").val();
        //console.log(identifier);
        $.ajax({
            url: baseUrl + "/educationalObjectives/getNumber/" + number,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"number" : number}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {

              if (data.educationalObjetive.educationalObjetive !== true && data.educationalObjetive.info.IdObjetivoEducacional !== parseInt(code)) {
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


	$('#formEducationalObjetive').validate({
    rules: {
      number: {
        checkExists: true,
        required: true,
        numbers: true,
        min: 1,       
      },
      description: {
        required: true,
        maxlength: 200,
        minlength: 1,
      },
    },
    messages: {
      number: {
        checkExists: "El Identicador ingresado ya existe",
        required: "Debe ingresar un Identicador",
        numbers: "Debe ingresar un número",        
        min: "El Identicador debe ser mayor a 1",
      },
      description: {
        required: "Debe ingresar una Descripción",
        maxlength: "La Descripción no debe tener más 200 caracteres",
        minlength: "Debe ingresar una Descripción",
      }
    }
  });


  $('#editEducationalObjetive').validate({
    rules: {
      number: {
        required: true,
        numbers: true,
        checkExists: true,
        min: 1,
      },
      description: {
        required: true,
        maxlength: 200,
        minlength: 1,
      },
    },
    messages: {
      number: {
        required: "Debe ingresar un Identicador",
        checkExists: "El Identicador ingresado ya existe",
        numbers: "Debe ingresar un número",
        min: "El Identicador debe ser mayor a 1",
      },
      description: {
        required: "Debe ingresar una Descripción",
        maxlength: "La Descripción no debe tener más 200 caracteres",
        minlength: "Debe ingresar una Descripción",
      }
    }
  });
});