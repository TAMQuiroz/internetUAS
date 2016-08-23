$(document).ready(function(){
    
    // Cuando se elige un resultado estudiantil del combobox
    // solo se muestran sus aspectos
    $('#period').change(function(event){
        var period = $(this).val();
        $('.level').attr("hidden", true);
        if(period!=""){
            $('.' + period).attr("hidden", false);
        }
    });

});