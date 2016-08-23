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
      title: {
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
      title: {
        required: "Debe ingresar un título",
        maxlength: "El título no debe tener más de 50 caracteres",
        lettersAndNumber: "Ingrese un título coherente",
      },
      description: {
        required: "Debe ingresar una descripción",
        maxlength: "La descripción no debe tener más de 100 caracteres",
      }
    }
  });

  $('#editSuggestion').validate({
    rules: {
      title: {
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
      title: {
        required: "Debe ingresar un título",
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