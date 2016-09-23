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

    //Validación

	$('#formSuggestion').validate({
    rules: {
      nombre: {
        required: true,
        maxlength: 50,
        lettersAndNumber: true,
      },
      apellido_paterno: {
        required: true,
        maxlength: 100,
        lettersAndNumber: true,
      },
      apellido_materno: {
        required: true,
        maxlength: 100,
        lettersAndNumber: true,
      },
      correo:{
        required: true,
      },
      celular: {
        required: true,
        maxlength: 9,
        numbers: true,
      },
      area: {
        required: false,
      },
      especialidad: {
        required: true,
      }
    },
    messages: {
      nombre: {
        required: "Debe ingresar un nombre",
        maxlength: "El nombre no debe tener más de 50 caracteres",
        lettersAndNumber: "Ingrese un nombre coherente",
      },
      apellido_paterno: {
        required: "Debe ingresar un apellido paterno",
        maxlength: "El apellido paterno no debe tener más de 100 caracteres",
        lettersAndNumber: "Ingrese un apellido paterno coherente",
      },
      apellido_materno: {
        required: "Debe ingresar un apellido materno",
        maxlength: "El apellido materno no debe tener más de 100 caracteres",
        lettersAndNumber: "Ingrese un apellido materno coherente",
      },
      celular: {
        required: "Debe ingresar un celular",
        maxlength: "El celular no debe tener más de 9 caracteres",
        numbers: "Ingrese un celular coherente",
      },
      area: {
        required: "Debe ingresar un area",
      },
      correo: {
        required: "Debe ingresar un correo",
      },
      especialidad: {
        required: "Debe ingresar una especialidad",
      },
    }
  });

  $('#editSuggestion').validate({
    rules: {
      nombre: {
        required: true,
        maxlength: 50,
        lettersAndNumber: true,
      },
      description: {
        required: true,
        maxlength: 100,
      }
    },
    messages: {
      nombre: {
        required: "Debe ingresar un nombre",
        maxlength: "El título no debe tener más de 50 caracteres",
        lettersAndNumber: "Ingrese un título coherente",
      },
      description: {
        required: "Debe ingresar una descripción",
        maxlength: "La descripción no debe tener más de 100 caracteres",
      }
    }
  });
});