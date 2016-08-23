$(document).ready(function(){
    $('#password').on("input", function() {
        var rpassword = $('#repeat_password').val();
        var passlength = $('#password').val().length;
        if ( ($(this).val() == rpassword) && (passlength>7) ) {
            $('.btn-success').prop('disabled', false);
            $('#pw-message-error').hide(17);
        }else{
            $('.btn-success').prop('disabled', true);
            $('#pw-message-error').show(17);
        }
    });
    $('#repeat_password').on("input", function() {
        var password = $('#password').val();
        var passlength = $('#password').val().length;
        console.log($(this).val() + "  " + password);
        if ( ($(this).val() == password)  &&(passlength>7) ) {
            $('.btn-success').prop('disabled', false);
            $('#pw-message-error').hide(17);
        }else{
            $('.btn-success').prop('disabled', true);
            $('#pw-message-error').show(17);
        }

    });
    $('#pw-message-error').hide();
});