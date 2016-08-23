jQuery(function(){

  //Validación

  var cycle = $("#cycle").val();
  console.log(cycle);

  $('.cycle').on("change", function(event){
    var cycle = $("#cycle").val();
    if(cycle != 0){
      location.href =baseUrl + "/consolidated/evaluation/view?cycle=" + cycle; 
    }else{
      location.href =baseUrl + "/consolidated/evaluation/"; 
    }
  });

  $( "#downloadButton" ).click(function() {
  var cycle = $("#cycle").val();
    if(cycle != 0){
      location.href =baseUrl + "/consolidated/evaluation/download?cycle=" + cycle; 
    }else{
      location.href =baseUrl + "/consolidated/evaluation/"; 
    }
  });
  
});