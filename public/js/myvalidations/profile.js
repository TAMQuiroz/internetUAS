/**
 * Created by paolo on 6/1/16.
 */
jQuery(function(){
    $.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-z1-9\- ]+$/i.test(value);
    }, "Solo puede ingresar letras y números");
    
    $('#formProfile').validate({
        rules: {
            profilename: {
                lettersAndNumber: true,
                required: true,
                maxlength: 20
            },
            profiledescription:{
                required: true,
                maxlength: 100
            }
        },

        messages: {
            profilename: {
                lettersAndNumber: "Solo pueden ser letras y numeros",
                required: "Debe ingresar el nombre",
                maxlength: "La descripcion no debe de pasar de los 20 caracteres"
            },
            profiledescription: {
                required: "Debe poner una descripcion",
                maxlength: "La descripcion no debe de pasar de los 100 caracteres"
            }
        }
    });

    $('#editProfile').validate({
        rules: {
            profilename: {
                lettersAndNumber: true,
                required: true,
                maxlength: 20
            },
            profiledescription:{
                required: true,
                maxlength: 100
            }
        },

        messages: {
            profilename: {
                lettersAndNumber: "Solo pueden ser letras y numeros",
                required: "Debe ingresar el nombre",
                maxlength: "La descripcion no debe de pasar de los 20 caracteres"
            },
            profiledescription: {
                required: "Debe poner una descripcion",
                maxlength: "La descripcion no debe de pasar de los 100 caracteres"
            }
        }
    });
});