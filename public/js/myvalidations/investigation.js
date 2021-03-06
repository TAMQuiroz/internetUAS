jQuery(function(){

    $.validator.addMethod("names", function(value, element) {
        return this.optional(element) || /^[a-zA-Zá-ź:/ ]+$/i.test(value);
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
                lettersAndNumber: true,
            },
            apellido_paterno: {
                required: true,
                maxlength: 100,
                names: true,
            },
            apellido_materno: {
                required: true,
                maxlength: 100,
                names: true,
            },
            correo:{
                required: true,
                email: true,
            },
            celular: {
                required: true,
                maxlength: 9,
                minlength: 9,
                numbers: true,
            },
            area: {
                required: false,
            },
            especialidad: {
                required: true,
            },
            descripcion: {
                required: true,
            },
            lider: {
                required: true,
            },
        },
        messages: {
            nombre: {
                required: "Debe ingresar un nombre",
                maxlength: "El nombre no debe tener más de 50 caracteres",
            },
            apellido_paterno: {
                required: "Debe ingresar un apellido paterno",
                maxlength: "El apellido paterno no debe tener más de 100 caracteres",
            },
            apellido_materno: {
                required: "Debe ingresar un apellido materno",
                maxlength: "El apellido materno no debe tener más de 100 caracteres",
            },
            celular: {
                required: "Debe ingresar un celular",
                maxlength: "El celular debe tener 9 caracteres",
                minlength: "El celular debe tener 9 caracteres",
                numbers: "Ingrese un celular coherente",
            },
            area: {
                required: "Debe ingresar un area",
            },
            correo: {
                required: "Debe ingresar un correo",
                email: "Debe ingresar un correo valido",
                maxlength : "El tamaño debe ser 9 digitos",
            },
            especialidad: {
                required: "Debe ingresar una especialidad",
            },
            descripcion: {
                required: "Debe ingresar una descripcion",
            },
            lider: {
                required: "Debe ingresar un lider de investigacion",
            },
            ubicacion: {
                required: "Debe ingresar una ubicacion",
            },
            fecha: {
                required: "Debe ingresar una fecha",
            },
            hora: {
                required: "Debe ingresar una hora",
            },
            duracion: {
                required: "Debe ingresar una duracion",
            },
            fecha_ini: {
                required: "Debe ingresar una fecha de inicio",
            },
            fecha_fin: {
                required: "Debe ingresar una fecha de fin",
                min: "Debe ingresar una fecha superior a la fecha inicial",
            },
            num_entregables: {
                required: "Debe ingresar una cantidad de entregables",
                min: "Debe poner un numero mayor a 0",
            },
            porcen_avance: {
                min: "Debe poner un numero mayor o igual a 0",
                max: "Debe poner un numero menor o igual a 100",
            },
            archivo: {
                required: "Debe ingresar un entregable",
            },
            peso: {
                required: "Debe ingresar un peso",
            }
        }
    });

    //Fechas

    $(".input-group.date").datepicker({
        format: "yyyy-mm-dd",
        startDate: "today", 
        language: "es",
        autoclose: true,
        todayHighlight: true,
        minDate: 0,
     });

   $('#fecha_ini').change(function(){
        fecha_ini = $(this).val();
        $('#fecha_fin').attr('min',fecha_ini);
    });

    $('#fecha_fin').change(function(){
        fecha_fin = $(this).val();
        $('#fecha_ini').attr('max',fecha_fin);
    });

    $('#fecha_ini_edit').change(function(){
        fecha_fin_ultimo_entregable = $('#fecha_limite').val();
        fecha_ini = $(this).val();
        $('#fecha_fin_edit').attr('min',fecha_fin_ultimo_entregable);
    });

    $('#fecha_fin_edit').change(function(){
        fecha_ini_primer_entregable = $('#fecha_inicio').val();
        fecha_fin = $(this).val();
        $('#fecha_ini_edit').attr('max',fecha_ini_primer_entregable);
    });

});

$(document).ready(function(){
    getProjectDates();

    $('#padre').change(function(){
        getProjectDates();        
    });
});

function getProjectDates(){
    var task_id             = $('#padre').val();
    var url_entregable      = '/investigacion/entregable/getDeliverable';
    var url_proyecto        = '/investigacion/proyecto/getProject';
    var project_id          = $('#id_proyecto').val();

    if(task_id == 0){
        $.ajax({
            type: "GET",
            url: url_proyecto + '/' + project_id,
            success: function (data) {
                //console.log(data);
                $('#fecha_ini').attr('min',data.fecha_ini);               
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }else{
        $.ajax({
            type: "GET",
            url: url_entregable + '/' + task_id,
            success: function (data) {
                //console.log(data);
                $('#fecha_ini').attr('min',data.fecha_inicio);               
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    }   
}