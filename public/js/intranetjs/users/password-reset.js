$(document).ready(function(){
    $('#repeat_password').on("input", function() {
        var password = $('#password').val();
        console.log($(this).val() + "  " + password);
        if($(this).val() == password){
            $('#btncreatepassword').prop('disabled', false);
            $('#pw-message-error').hide(1000);
        }else{
            $('#btncreatepassword').prop('disabled', true);
            $('#pw-message-error').show(17);
        }

    });
    $('#pw-message-error').hide();
});