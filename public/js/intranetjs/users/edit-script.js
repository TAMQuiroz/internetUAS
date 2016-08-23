$(document).ready(function(){
    $('#profilecode').on('change', function() {
        if($(this).val() == 4 ){
            $('#facultyBlock').show();
        }else{
            $('#facultyBlock').hide();
        }
    });
});