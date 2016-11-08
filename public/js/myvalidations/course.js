/** Created by paolo on 5/23/16.*/
jQuery(function(){
    $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-z0-9\- ]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

    $.validator.addMethod("checkExists", function(value, element)
    {
        var code = $("#coursecode").val();

        $.ajax({
            url: baseUrl + "/courses/getCode/" + code,
            type: 'GET',
            dataType: 'json',
            data: JSON.stringify({"code" : code}),
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                if (data.course.course !== true) {
                    console.log("No valido");
                    $('#validateCode').val(" ");
                    return false;
                }
                else{
                    console.log("valido");
                    $('#validateCode').val(value);
                    return true;
                }
            },
            error: function () {
                console.log("Ocurrió un error");
                return false;
            }
        });
        if(jQuery("#validateCode").val()===" "){return false;}else{return true;}
    }, 'El código ingresado ya existe');

    $('#formCourse').validate({
        rules: {
            coursecode: {
                lettersAndNumber: true,
                required: true,
                maxlength: 6,
                checkExists: true
            },
            coursename:{
                required: true
            },
            courseacademicLevel:{
                required: true,
                min:0,
                max:12
            },
            facultycode:{
                required: true
            }
        },
        messages: {
            coursecode: {
                lettersAndNumber: "Solo pueden ser letras y numeros",
                required: "Debe ingresar el código",
                maxlength: "El código no debe ser menor de hasta 6 caracteres",
                checkExists: "El código ingresado ya existe"
            },
            coursename: {
                required: "Debe poner un nombre"
            },
            courseacademicLevel: {
                required: "Debe ingresar el nombre",
                min: "Debe ser por lo menos 0",
                max: "Debe ser a lo mas 12"
            },
            facultycode: {
                required: "Debe ingresar una facultad"
            }
        }
    });
});