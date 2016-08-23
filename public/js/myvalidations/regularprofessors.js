jQuery(document).ready(function($) {
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

});

function fillTable(professors) {
  professors.each(function(index, input) {
    var tr = $(input).parent().parent();
    tr.find('td:first').remove();
    tr.append('<td><div class="btn btn-danger btn-xs delete-prof"><i class="fa fa-remove"></i></div></td>');

    $('#prof_table').find('tbody').append(tr);
  })
}