
jQuery(document).ready(function($){

	$("#btn-add-address").on('click', function(){
		$("#address-table tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#address-table tbody");
	});

	$(document).on("click",".eliminar",function(){
		var parent = $(this).parents().get(0);
		$(parent).remove();
	});
  
});


     


