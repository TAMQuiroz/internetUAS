jQuery(function(){

  $.validator.addMethod("checkExists", function(value, element)
    {
        var cycle = $("#cycle").val();

        $.ajax({
            url: baseUrl + "/academicCycle/getCycle/" + cycle,
            async: false,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"cycle" : cycle}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
              //console.log(data);
              if (data.cycle.academicCycle !== true) {
                //console.log("Código existe");
                $('#validarCycle').val(" ");
                return false;
              }
              else{
                //console.log("Código no existe");
                $('#validarCycle').val(value);
                return true;
              }
            },
            error: function () {
                console.log("Ocurrió un error");
                return false;
            }
        });
        if(jQuery("#validarCycle").val()===" "){return false;}else{return true;}

    }, 'El ciclo académico ingresado ya existe');

  //Validación

  var anio = $("#anio").val();
  var numberC = $("#numberC").val();

  $('.anio').on("change", function(event){
    var anio = $("#anio").val();
    var numberC = $("#numberC").val();

    if(anio == "0"){
      var anio = " ";
    }
    if(numberC == "3"){
      var numberC = " ";
    }

    $('#cycle').val(anio+"-"+numberC);
  });

  $('.numberC').on("change", function(event){
    var anio = $("#anio").val();
    var numberC = $("#numberC").val();

    if(anio == "0"){
      var anio = " ";
    }
    if(numberC == "3"){
      var numberC = " ";
    }

    $('#cycle').val(anio+"-"+numberC);
  });

  //Delete AcademicCycle

  $('.delete-cycle').on("click", function(event){
    var cycleId = $(this).closest('tr').find('.cycleId').text();
    console.log(cycleId);
    $('#modal-button').attr("href", baseUrl + "/academicCycle/delete?cycleId=" + cycleId);
  });

  //
   
	$('#formAcademic').validate({
    rules: {
      anio: {
        required: true,
        min: 1,
      },
      numberC: {
        required: true,
        max:2,
      },
      cycle: {

        checkExists: true,
      }
    },
    messages: {
      anio: {
        required: "Debe seleccionar el año del ciclo",
        min: "Debe seleccionar el año del ciclo",
      },
      numberC: {
        required: "Debe seleccionar el número del ciclo",
        max: "Debe seleccionar el número del ciclo",
      },
      cycle: {

        checkExists: "El ciclo académico ya existe",
      }
    }
  });

  
});