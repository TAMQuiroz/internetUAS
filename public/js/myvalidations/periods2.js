jQuery(document).ready(function($) {

  $("#select-measures").click(function(){
      agregar();
      $('#modal-measures').modal('hide');
  });

  // agregar nuevo henry:
  function agregar(){
    //borramos la tabla
    $("#measaure_table tbody").remove(); 

    $('#tblIntrumentosModal tbody tr').each(function (index2) {

      var idIntrumento = $(this).find("td").eq(0).find("input").val();
      var checkbox = $(this).find("td").eq(1).find("input").is(":checked");
      var nombre = $(this).find("td").eq(2).html();
           
      //alert(idIntrumento + ' ' + checkbox +' ' + nombre);
      if (checkbox){ 
        var fila ='<tr>'+                    
                      '<td hidden><input type="hidden" name="measures[]" value="'+idIntrumento+'"></td>'+
                      '<td>'+ nombre +'</td>'+
                    '</tr>';

        //agregamos al detalle       
        $("#measaure_table").append(fila);
      }

      
    });   
    
  }

});