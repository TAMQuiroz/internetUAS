jQuery(document).ready(function($) {
  var form = $('#form-search-professor');

  $('#select-measures').on('click', function() {
    $('#modal-measures').modal('hide');
    var measures = $('.measures_input:checked');
    fillTable(measures);
  });

  $('#measaure_table').on('click', '.delete-measure', function() {
    $(this).parent().parent().remove();
  });

});

function fillTable(measures) {
  measures.each(function(index, input) {
    var tr = $(input).parent().parent();
    console.log(tr)
    tr.find('td:first').remove();
    tr.append('<td><div class="btn btn-danger btn-xs delete-measure"><i class="fa fa-remove"></i></div></td>');

    $('#measaure_table').find('tbody').append(tr);
  })
}