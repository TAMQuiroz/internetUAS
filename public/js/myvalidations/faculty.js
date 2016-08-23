jQuery(function(){

  $.validator.addMethod("namesSpace", function(value, element) {
        return this.optional(element) || /^[a-zA-Zá-ź ]+$/i.test(value);
    }, "Solo puede ingresar letras"); //con espacios

  $.validator.addMethod("numbers", function(value, element) {
        return this.optional(element) || /^[0-9]+$/i.test(value);
    }, "Solo puede ingresar números");

  $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-z1-9\- ]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

  $.validator.addMethod("names", function(value, element) {
        return this.optional(element) || /^[a-zA-Zá-ź ]+$/i.test(value);
    }, "Solo puede ingresar letras"); //sin espacios

  $.validator.addMethod("checkExists", function(value, element)
    {
        var code = $("#code").val();

        $.ajax({
            url: baseUrl + "/faculty/getCode/" + code,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"code" : code}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              if (data.faculty.faculty!== true) {
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
                console.log("Ocurrió un error");
                return false;
            }
        });
        if(jQuery("#validarCode").val()===" "){return false;}else{return true;}

    }, 'El código ingresado ya existe');

  $.validator.addMethod("checkCodeEdit", function(value, element)
    {
        var code = $("#code").val();
        var id  = $("#facultyId").val();

        $.ajax({
            url: baseUrl + "/faculty/getCode/" + code,
            async: false,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"code" : code}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              if(data.faculty.info !== null){
                if (data.faculty.faculty != true && parseInt(data.faculty.info.IdEspecialidad) != parseInt(id)) {
                  //console.log("Código ya existe");
                  $('#validarCode').val(" ");
                  return false;
                }
                else{
                  //console.log("Código no existe");
                  $('#validarCode').val(value);
                  return true;
                }
              }else{
                  //console.log("Código no existe");
                  $('#validarCode').val(value);
                  return true;
              }
                
            },
            error: function () {
                console.log("Ocurrió un error");
                return false;
            }
        });
        if(jQuery("#validarCode").val()===" "){return false;}else{return true;}

    }, 'El código ingresado ya existe');

  $.validator.addMethod("checkName", function(value, element)
    {
        var name = $("#name").val();

        $.ajax({
            url: baseUrl + "/faculty/getName/" + name,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"name" : name}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              if (data.faculty.faculty!== true) {
                //console.log("Código ya existe");
                $('#validarName').val(" ");
                return false;
              }
              else{
                //console.log("Código no existe");
                $('#validarName').val(value);
                return true;
              }
            },
            error: function () {
                console.log("Ocurrió un error");
                return false;
            }
        });
        if(jQuery("#validarName").val()===" "){return false;}else{return true;}

    }, 'El código ingresado ya existe');

  $.validator.addMethod("checkNameEdit", function(value, element)
    {
        var name = $("#name").val();
        var id  = $("#facultyId").val();

        $.ajax({
            url: baseUrl + "/faculty/getName/" + name,
            async: false,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"name" : name}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              if(data.faculty.info !== null){
                if (data.faculty.faculty != true && parseInt(data.faculty.info.IdEspecialidad) != parseInt(id)) {
                  
                  $('#validarCode').val(" ");
                  return false;
                }
                else{
                  
                  $('#validarCode').val(value);
                  return true;
                }
              }else{
                  
                  $('#validarCode').val(value);
                  return true;
              }
            },
            error: function () {
                console.log("Ocurrió un error");
                return false;
            }
          
        });
        if(jQuery("#validarCode").val()===" "){return false; }else{return true;}

    }, 'El código ingresado ya existe');



  //Validación

	$('#formFaculty').validate({
	
    rules: {
      code: {
        required: true,
        namesSpace: true,
        maxlength: 3,
        checkExists: true,
      },
      name: {
        required: true,
        names: true,
        maxlength: 40,
        checkName: true,
      },
      description: {
        maxlength: 200
      },
    },
    messages: {
      code: {
        required: "Debe ingresar el código",
        numbers: "Debe ingresar un código válido",
        maxlength: "El código no debe ser mayor de 3 dígitos",
        checkExists: "El código ingresado ya existe",
      },
      name: {
        required: "Debe ingresar el nombre",
        names: "Debe ingresar un nombre válido",
        maxlength: "El nombre no debe tener más 40 caracteres",
        checkName: "El nombre ingresado ya existe",
      },
      description: {
        maxlength: "La descripción no debe tener más 200 caracteres"
      }
    }
  });
  
  	$('#formFacultyEdit').validate({
	
    rules: {
      code: {
        required: true,
        namesSpace: true,
        maxlength: 3,
        checkCodeEdit: true,
      },
      name: {
        required: true,
        names: true,
        maxlength: 40,
        checkNameEdit: true,
      },
      description: {
        maxlength: 200,
      },
    },
    messages: {
      code: {
        required: "Debe ingresar el código",
        numbers: "Debe ingresar un código válido",
        maxlength: "El código no debe ser mayor de 3 dígitos",
        checkCodeEdit: "El código ingresado ya existe",
      },
      name: {
        required: "Debe ingresar el nombre",
        names: "Debe ingresar un nombre válido",
        maxlength: "El nombre no debe tener más 40 caracteres",
        checkNameEdit: "El nombre ingresado ya existe",
      },
      description: {
        maxlength: "La descripción no debe tener más 200 caracteres",
      }
    }
  });
  

});