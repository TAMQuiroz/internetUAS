$(document).ready(function($) {
  var form = $('#form-search-professor');

  $('#search-professor').on('click', function() {
    var data = $('#course_edit_form input[name="regular_professors[]"]').serialize() +"&"+  form.serialize();
    $.post(form.attr('action'), data, function(table) {
      $('#professors_table').html(table);
    })
  })

  $('#professors_table').on('click', '#select-professors', function() {
    $('#modal-regular-professor').modal('hide');
    var professors = $('.professors_selected:checked');
    fillTable(professors);
  });

  $('#prof_table').on('click', '.delete-prof', function() {
    $(this).parent().parent().remove();
  });

  //////////////////////////// BUSCAR PROFESORES PARA EVALUACIONES ////////////////

  var form = $('#form-search-teacher');

  $('#search-teacher').on('click', function() {
    var data = form.serialize();
    $.post(form.attr('action'), data, function(table) {
      $('#table-teacher').html(table);
    });
  });
});


function select(id,app,apm,nombre){  
    $('#modal-buscar-profesor').modal('hide');//oculto todo el modal
    $('#idDocente').val(id);//copio el id en un input oculto
    $('#nombre').val(app+' '+ apm+', '+nombre); // copio el nombre completo
}
  