jQuery(function(){

 

  $('.cycleClass').click(function() {
    var valCycleStart=$("#cycleStart").val();
    var valCycleEnd=$("#cycleEnd").val();
    
    if(valCycleStart>valCycleEnd) {
      $('#validation').show();
      $('#validation').text("El ciclo Inicio debe ser menor o igual que el ciclo Fin");
    }
    if (valCycleStart<=valCycleEnd){
      $('#validation').hide();
    }
    if($("select")[0].selectedIndex==0){
      $('#validation').show();
      $('#validation').text("Debe seleccionar ambos ciclos");
    }


  });


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

  //Validación

	$('#formEditPeriod').validate({
    rules: {
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
    'stRstCheck[]': { required: true }
    },
    messages: {
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
      },
    'stRstCheck[]': {
        required: "Debe seleccionar almenos un resultado estudiantil",
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