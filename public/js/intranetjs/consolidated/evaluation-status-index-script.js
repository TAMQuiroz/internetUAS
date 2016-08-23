$(document).ready(function(){
    $('#cyclepicker').on("change", function(event){
        var cycle = $("#cyclepicker").val();
        location.href =baseUrl + "/consolidated/status?academicCycle=" + cycle;
    });
});