jQuery(document).ready(function($){

	var index = 2;

	$("#btn-add-address").on('click', function(){
		$("#address-table tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#address-table tbody");
		$("#address-table tbody tr:last td select").attr({ "id": "teacher"+ index});
		index++;
		//console.log(index);
	});

	$(document).on("click",".eliminar",function(){
		//console.log(index);
		var rowNum = $("#address-table tr").length;
		//console.log(rowNum);
		if(rowNum > 2){
			var parent = $(this).parents().get(0);
			$(parent).remove();
			//index--;
		}
		
	});

	$('#teacher2').on('click', function(){
 
	    /* Por cada columna */
	    $('#address-table tr').each(function(){
	 
	        /* Obtener todas las celdas */
	        var celdas = $(this).find('td');
	 		

	        /* Mostrar el valor de cada celda */
	        celdas.each(function(){ alert($(this).html()); });
	 
	        /* Mostrar el valor de la celda 2 */
	        alert( $(celdas[1]).html() );
	 
	    });
});
/*
	$(".myselect").change(function() {
		console.log("Entró");
		//$(".myselect option:selected").remove();

 		var mitexto = $(".myselect option:selected").val();
 		console.log(mitexto);
 		$('input:text[name=code]').val('20072069');
 		$('input:text[name=email]').val('andres@hotmail.com');
 		$('input:text[name=faculty]').val('Ingeniería Informática');
	});

	*/
  
});