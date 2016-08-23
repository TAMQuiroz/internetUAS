jQuery(function(){

  $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-z0-9\- ]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

  $.validator.addMethod("checkExists", function(value, element)
    {
        var codeT = $("#codeT").val();

        $.ajax({
            url: baseUrl + "/dictatedCourses/getCodigo/" + codeT,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"codeT" : codeT}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              //console.log(data.timetable.timetable);
              if (data.timetable.timetable !== true) {
                //console.log("Código existe");
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
  /*
  $.validator.addMethod("checkCodeEdit", function(value, element)
    {
        var codeT = $("#codeT").val();

        $.ajax({
            url: baseUrl + "/dictatedCourses/getCodigo/" + codeT,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"codeT" : codeT}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              if (data.timetable.timetable !== true && data.timetable.info.Codigo !== codeT) {
                //console.log("Correo ya existe");
                $('#validarCode').val(" ");
                return false;
              }
              else{
                //console.log("Correo no existe");
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

    }, 'El correo ingresado ya existe');
  */
  //Validación

	$('#registerTimeTable').validate({
    rules: {
      codeT: {
        required: true,
        maxlength: 10,
        checkExists: true,
        lettersAndNumber:true,
      },
      totalA: {
        required: true,
        number: true,
        min:1,
        max:100,
      }
    },
    messages: {
      codeT: {
        required: "Debe ingresar el código",
        maxlength: "El código no debe tener más de 10 caracteres",
        checkExists: "El código ingresado ya existe",
        lettersAndNumber: "Sólo puede ingresar letras, números y guion",
      },
      totalA: {
        required: "Debe ingresar el número de alumnos",
        number: "Debe ingresar el número de alumnos",
        min: "El número de alumnos debe ser mayor a 1",
        max: "El número de alumnos debe ser menor a 100",
      }
    }
  });

  $('#EditTimeTable').validate({
    rules: {
      codeT: {
        required: true,
        maxlength: 10,
        lettersAndNumber:true,
      },
      totalA: {
        required: true,
        number: true,
        min:1,
        max:100,
      }
    },
    messages: {
      codeT: {
        required: "Debe ingresar el código",
        maxlength: "El código no debe tener más de 10 caracteres",
        lettersAndNumber: "Sólo puede ingresar letras, números y guion",
      },
      totalA: {
        required: "Debe ingresar el número de alumnos",
        number: "Debe ingresar el número de alumnos",
        min: "El número de alumnos debe ser mayor a 1",
        max: "El número de alumnos debe ser menor a 100",
      }
    }
  });

});