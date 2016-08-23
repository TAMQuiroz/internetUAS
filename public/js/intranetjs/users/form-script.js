$(document).ready(function(){
    $('#profilecode').on('change', function() {
        if($(this).val() == 4 || $(this).val() > 5){
            $('#facultyBlock').show();
        }else{
            $('#facultyBlock').hide();
        }
    });
});