$(document).ready(function(){

	var modalNewSelect = $('#aspect_new_name');
	var modalEditSelect = $('#aspect_edit_name');
	var itemAspect;

	$('#aspect-new').on('hidden.bs.modal', function (e){
		$('#aspect_new_name').val('');
	});

	$('#aspect-edit').on('hidden.bs.modal', function (e){
		$('#aspect_edit_name').val('');
	});

	$('#aspect-table').on("click", '.remove-aspect',function(event){
		$(this).closest('tr').remove();
	});

	$('#aspect-table').on("click", '.edit-aspect',function(event){	
		itemAspect = $(this).closest('tr');
		var name = itemAspect.find(".aspectName").text();
		//name = name.ltrim().join(' ');

		$('#aspect_edit_name').val(name);
		$('#aspect-edit').modal('show'); 
	});

	$.validator.addMethod("lettersAndNumber", function(value, element) {
        return this.optional(element) || /^[A-Za-zá-ú1-9\- ,.()]+$/i.test(value);
    }, "Solo puede ingresar letras y números");

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
				'<input type="hidden" class="aspectItem" name="aspectItem[]" value="0-'+ modalNewSelect+'""></input>' +
				'<input type="hidden" class="aspectCode" value="0""></input>' +
				'<td class="aspectName">' +  modalNewSelect + '</td>'+
				'<td class=" ">' +
	            '<a class="btn btn-primary btn-xs edit-aspect" >' +
	           	'<i class="fa fa-pencil"></i></a>' +
	            '<a class="btn btn-danger btn-xs remove-aspect" data-target=".bs-example-modal-sm">' +
	           	'<i class="fa fa-remove"></i></a>' +
	            '</td>' +
	            '</tr>'
	        );			
			$('#aspect-new').modal('hide');
		}       
	});	

	$("#btn-save-edit").on("click", function(event){
		modalEditSelect = $('#aspect_edit_name').val();

		$('#formModalAspectEditName').validate({
		    rules: {
		      aspect_edit_name:{
		        required: true,
		        lettersAndNumber: true,
		        maxlength: 50,
		      }
		    },
		    messages: {
		      aspect_edit_name: {
		        required: "Debe ingresar un nombre",
		        lettersAndNumber: "Debe ingresar un nombre válido",
		        maxlength: "El nombre no debe tener más 50 caracteres",
		      }
		    }
		});

		if ($("#formModalAspectEditName").valid()) {
			var code = itemAspect.find(".aspectCode").val();
			//code = code.replace(/\s+/g, ''); //Se quita los espacios

			itemAspect.find(".aspectItem").val(code + '-' + modalEditSelect);
			itemAspect.find(".aspectName").text(modalEditSelect);
			$('#aspect-edit').modal('hide');
		}
	});

});