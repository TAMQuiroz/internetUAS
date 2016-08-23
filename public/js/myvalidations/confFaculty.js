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

  $.validator.addMethod("maxlevel", function(value, element) {
        return +$('#criteriaLevel').val()>= +$(element).val();
    }, "El nivel de aceptación debe ser menor al nivel de criterio");

  $.validator.addMethod("maxCycle", function(value, element) {
        return +$('#cycleEnd option:selected').attr('numero')>= +$('#cycleStart option:selected').attr('numero');
    }, "El ciclo de fin debe de ser mayor o igual al ciclo de inicio");
  $.validator.addMethod("minCycle", function(value, element) {
        return +$('#cycleStart option:selected').attr('numero')<= +$('#cycleEnd option:selected').attr('numero');
    }, "El ciclo de inicio debe de ser menor o igual al ciclo de fin");

  //Validación

	$('#formEditPeriod').validate({
    rules: {
      cycleEnd: {
        required: true,
        min:1,
        minCycle:true,
      },
      cycleStart: {
        required: true,
        min:1,
        maxCycle:true,
      },
      facultyCoordinator: {
        required: true,
        min:1,
      },
      criteriaLevel: {
        required: true,
        min:1,
		    max:10,
        number:true,
      },
      facultyAgreementLevel: {
        required: true,
		    min:1,
		    max:10,
        number:true,
        maxlevel: true,
      },
	  facultyAgreement: {
        required: true,
		    min:1,
		    max:100,
        number:true,
      },
    },
    messages: {
      cycleStart: {
        required: "Debe seleccionar un ciclo de inicio",
        min: "Debe seleccionar un ciclo de inicio",
        minCycle: "El ciclo de inicio debe de ser menor o igual al ciclo de fin",

      },
      cycleEnd: {
        required: "Debe seleccionar un ciclo de fin",
        min: "Debe seleccionar un ciclo de fin",
        maxCycle: "El ciclo de fin debe de ser mayor o igual al ciclo de inicio",
      },
      facultyCoordinator: {
        required: "Debe seleccionar un coordinador",
        min: "Debe seleccionar un coordinador",
      },
      criteriaLevel: {
        required: "Debe ingresar el nivel de criterio",
        min: "El nivel de criterio debe ser mayor o igual a 1",
        max: "El nivel de criterio debe ser menor a 10",
        number: "El nivel de criterio debe ser un número",
      },
      facultyAgreementLevel: {
        required: "Debe ingresar el nivel de aceptación",
        min: "El nivel de aceptación debe ser mayor o igual a 1",
        max: "El nivel de aceptación debe ser menor a 10",
        number: "El nivel de criterio debe ser un número",
        maxlevel: "El nivel de aceptación debe ser menor o igual al nivel de criterio",
      },
	  facultyAgreement: {
        required: "Debe ingresar el porcentaje de aceptación",
        min: "El porcentaje de aceptación debe ser mayor o igual a 1",
        max: "El porcentaje de aceptación debe ser menor a 100",
        number: "El nivel de criterio debe ser un número",
      }
    }
  });

  $('#formEditCycle').validate({
    rules: {
      cycleId: {
        required: true,
        min:1
      },
      cycleDateI: {
        required: true,
      },
      cycleDateF: {
        required: true,
      },
      cycleCoordinator: {
        required: true,
        min:1
      },
      criteriaLevel: {
        required: true,
        min:1,
        max:10,
        number:true,
      },
      facultyAgreementLevel: {
        required: true,
        min:1,
        max:10,
        number:true,
        maxlevel: true,
      },
    facultyAgreement: {
        required: true,
        min:1,
        max:100,
        number:true,
      },
    },
    messages: {
      cycleId: {
        required: "Debe seleccionar un ciclo",
        min: "Debe seleccionar un ciclo",
      },
      cycleDateI: {
        required: "Necesita ingresar una fecha inicio",
      },
      cycleDateF: {
        required: "Necesita ingresar una fecha fin",
      },
      cycleCoordinator: {
        required: "Debe seleccionar un coordinador",
        min: "Debe seleccionar un coordinador",
      },
      criteriaLevel: {
        required: "Debe ingresar el nivel de criterio",
        min: "El nivel de criterio debe ser mayor o igual a 1",
        max: "El nivel de criterio debe ser menor a 10",
        number: "El nivel de criterio debe ser un número",
      },
      facultyAgreementLevel: {
        required: "Debe ingresar el nivel de aceptación",
        min: "El nivel de aceptación debe ser mayor o igual a 1",
        max: "El nivel de aceptación debe ser menor a 10",
        number: "El nivel de criterio debe ser un número",
        maxlevel: "El nivel de aceptación debe ser menor o igual al nivel de criterio",
      },
     facultyAgreement: {
        required: "Debe ingresar el porcentaje de aceptación",
        min: "El porcentaje de aceptación debe ser mayor o igual a 1",
        max: "El porcentaje de aceptación debe ser menor a 100",
        number: "El nivel de criterio debe ser un número",
      }
    }
  });

});