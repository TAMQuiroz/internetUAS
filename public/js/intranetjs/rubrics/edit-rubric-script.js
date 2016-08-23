$(document).ready(function(){

	var modalNewSelect = $('#aspect-new-name');
	var modalEditSelect = $('#aspect-edit-name');
	var itemAspect;	

	$("#btn-save-new").on("click", function(event){
		modalNewSelect = $('#aspect-new-name').val();

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
        
        $(".remove-aspect").on("click", function(event){
			$(this).closest('tr').remove();		
		});

		$(".edit-aspect").on("click", function(event){		
			itemAspect = $(this).closest('tr');
			var name = itemAspect.find(".aspectName").text();
			name = name.replace(/\s+/g, '');

			$('#aspect-edit-name').val(name);
			$('#aspect-edit').modal('show'); 
		});
	});

	$(".remove-aspect").on("click", function(event){
		$(this).closest('tr').remove();		
	});

	$(".edit-aspect").on("click", function(event){		
		itemAspect = $(this).closest('tr');
		var name = itemAspect.find(".aspectName").text();
		name = name.replace(/\s+/g, '');

		$('#aspect-edit-name').val(name);
		$('#aspect-edit').modal('show'); 
	});

	$("#btn-save-edit").on("click", function(event){
		modalEditSelect = $('#aspect-edit-name').val();
		var code = itemAspect.find(".aspectCode").val();
		code = code.replace(/\s+/g, '');

		itemAspect.find(".aspectItem").val(code + '-' + modalEditSelect);
		itemAspect.find(".aspectName").text(modalEditSelect);
	});

	/*
	var aspectList=[];
	var ex;
	var modalSelect = $('#aspect-name');
	$("#save-button").on("click", function(event){
		modalSelect = $('#aspect-name').val();

		$.ajax({
			type:"GET",
			url:baseUrl + "/aspects/getById/" + modalSelect,
			dataType: "json",
			data: ex,
			contentType: "application/json; charset=utf-8",
			success: function(ex){
				$('#aspect-table').append(
					'<tr class="even pointer">' +
						'<td class=" "> <input type="hidden" name="aspect[]" value="' + ex.IdAspecto +'"></input>' 
						+ ex.IdAspecto + '</td>'+
						'<td class=" ">' + ex.Nombre + '</td>' +
	                    '<td class=" ">' +
	                        '<a class="btn btn-danger btn-xs remove-aspect" data-target=".bs-example-modal-sm">' +
	                        '<i class="fa fa-remove"></i></a>' +
	                    '</td>' +
                    '</tr>');

				$(".remove-aspect").on("click", function(event){
					$(this).closest('tr').remove();
				});
			}
		});
	});
	*/

	
});