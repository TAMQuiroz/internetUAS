jQuery(function(){

  $.validator.addMethod("names", function(value, element) {
        return this.optional(element) || /^[a-zA-Zá-ź ]+$/i.test(value);
    }, "Solo puede ingresar letras");

  $.validator.addMethod("numbers", function(value, element) {
        return this.optional(element) || /^[0-9]+$/i.test(value);
    }, "Solo puede ingresar números");

  $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-z1-9\- ]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

  $.validator.addMethod("checkExists", function(value, element)
    {
        var code = $("#teachercode").val();

        $.ajax({
            url: baseUrl + "/teachers/getCodigo/" + code,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"code" : code}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              if (data.teacher.teacher !== true) {
               // console.log("hola");
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

  $.validator.addMethod("checkEmails", function(value, element)
    {
        var email = $("#teacheremail").val();

        $.ajax({
            url: baseUrl + "/teachers/getEmail/" + email,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"email" : email}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              if (data.teacher.teacher !== true) {
                //console.log("Correo ya existe");
                $('#validarEmail').val(" ");
                return false;
              }
              else{
                //console.log("Correo no existe");
                $('#validarEmail').val(value);
                return true;
              }
            },
            error: function () {
                console.log("Ocurrió un error");
                return false;
            }
        });
        if(jQuery("#validarEmail").val()===" "){return false;}else{return true;}

    }, 'El correo ingresado ya existe');

  $.validator.addMethod("checkEmailEdit", function(value, element)
    {
        var email = $("#teacheremail").val();
        var code  = $("#teachercode").val();

        $.ajax({
            url: baseUrl + "/teachers/getEmail/" + email,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"email" : email}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              if (data.teacher.teacher !== true && data.teacher.info.Codigo !== code) {
                //console.log("Correo ya existe");
                $('#validarEmail').val(" ");
                return false;
              }
              else{
                //console.log("Correo no existe");
                $('#validarEmail').val(value);
                return true;
              }
            },
            error: function () {
                console.log("Ocurrió un error");
                return false;
            }
        });
        if(jQuery("#validarEmail").val()===" "){return false;}else{return true;}

    }, 'El correo ingresado ya existe');

  //Validación

	$('#formTeacher').validate({
    rules: {
      teachercode: {
        required: true,
        numbers: true,
        maxlength: 12,
        checkExists: true,
      },
      teacherfaculty: {
        required: true,
        min:1,
      },
      teachername: {
        required: true,
        names: true,
        maxlength: 30,
      },
      teacherlastname: {
        required: true,
        names: true,
        maxlength: 30,
      },
      teachersecondlastname: {
        required: true,
        names: true,
        maxlength: 30,
      },
      teacheremail: {
        required: true,
        email: true,
        maxlength: 40,
        checkEmails: true,
      },
      teacherposition:{
        lettersAndNumber: true,
        names: true,
      }
    },
    messages: {
      teachercode: {
        required: "Debe ingresar el código",
        numbers: "Debe ingresar un código válido",
        maxlength: "El código no debe ser mayor de 12 dígitos",
        checkExists: "El código ingresado ya existe",
      },
      teacherfaculty: {
        required: "Debe seleccionar una especialidad",
        min: "Debe seleccionar una especialidad",
      },
      teachername: {
        required: "Debe ingresar el nombre",
        names: "Debe ingresar un nombre válido",
        maxlength: "El nombre no debe tener más 30 caracteres",
      },
      teacherlastname: {
        required: "Debe ingresar el apellido paterno",
        names: "Debe ingresar un apellido válido",
        maxlength: "El apellido no debe tener más 30 caracteres",
      },
      teachersecondlastname: {
        required: "Debe ingresar el apellido materno",
        names: "Debe ingresar un apellido válido",
        maxlength: "El apellido no debe tener más 30 caracteres",
      },
      teacheremail: {
        required: "Debe ingresar el correo electrónico",
        email: "Debe ingresar un correo electrónico válido",
        maxlength: "El correo no debe tener más 50 caracteres",
        checkEmails: "El correo ingresado ya existe",
      },
      teacherposition:{
        lettersAndNumber: "Debe seleccionar un cargo",
        names: "Debe seleccionar un cargo",
      }
    }
  });

  $('#editTeacher').validate({
    rules: {
      teacherfaculty: {
        required: true,
        min:1,
      },
      teachername: {
        required: true,
        names: true,
        maxlength: 30,
      },
      teacherlastname: {
        required: true,
        names: true,
        maxlength: 30,
      },
      teachersecondlastname: {
        required: true,
        names: true,
        maxlength: 30,
      },
      teacheremail: {
        required: true,
        email: true,
        maxlength: 40,
        checkEmailEdit:true,
      },
      teacherposition:{
        lettersAndNumber: true,
        names: true,
      }
    },
    messages: {
      teacherfaculty: {
        required: "Debe seleccionar una especialidad",
        min: "Debe seleccionar una especialidad",
      },
      teachername: {
        required: "Debe ingresar el nombre",
        names: "Debe ingresar un nombre válido",
        maxlength: "El nombre no debe tener más 30 caracteres",
      },
      teacherlastname: {
        required: "Debe ingresar el apellido paterno",
        names: "Debe ingresar un apellido válido",
        maxlength: "El apellido no debe tener más 30 caracteres",
      },
      teachersecondlastname: {
        required: "Debe ingresar el apellido materno",
        names: "Debe ingresar un apellido válido",
        maxlength: "El apellido no debe tener más 30 caracteres",
      },
      teacheremail: {
        required: "Debe ingresar el correo electrónico",
        email: "Debe ingresar un correo electrónico válido",
        maxlength: "El correo no debe tener más 50 caracteres",
        checkEmailEdit: "El correo ingresado ya existe"
      },
      teacherposition:{
        lettersAndNumber: "Debe seleccionar un cargo",
        names: "Debe seleccionar un cargo",
      }
    }
  });
});