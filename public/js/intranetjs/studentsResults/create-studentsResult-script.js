$(document).ready(function(){
	
	$('#aspect-new').on('hidden.bs.modal', function (e){
		$('#aspect_new_name').val('');
	});

	$.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-zá-ú1-9\- ,.()]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

	$('#aspect-table').on("click", '.remove-aspect',function(event){
		$(this).closest('tr').remove();
	})	

	$("#btn-save-new").on("click", function(event){
		modalNewSelect = $('#aspect_new_name').val();

		$('#formModalAspectNewName').validate({
		    rules: {
		      aspect_new_name:{
		        required: true,
		        lettersAndNumber: true,
		        maxlength: 50,
		      }
		    },
		    messages: {
		      aspect_new_name: {
		        required: "Debe ingresar un nombre",
		        lettersAndNumber: "Debe ingresar un nombre válido",
		        maxlength: "El nombre no debe tener más 50 caracteres",
		      }
		    }
		});

		if ($("#formModalAspectNewName").valid()) {

			$('#aspect-table').append(
				'<tr class="even pointer">' +
				'<td class=" "><input type="hidden" name="aspect[]" value="' + modalNewSelect +'" />' 
				+ modalNewSelect + '</td>'+
	            '<td class=" ">' +
	            '<a class="btn btn-danger btn-xs remove-aspect" data-target=".bs-example-modal-sm">' +
	           	'<i class="fa fa-remove"></i></a>' +
	            '</td>' +
	            '</tr>'
	        );
			$('#aspect-new').modal('hide');
		}
	});

});