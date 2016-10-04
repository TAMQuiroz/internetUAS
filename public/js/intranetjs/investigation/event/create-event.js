$(document).ready(function () {
     $('#eventMM').spinner({
         spin: function (event, ui) {
             if (ui.value >= 60) {
                 $(this).spinner('value', ui.value - 60);
                 $('#hours').spinner('stepUp');
                 return false;
             } else if (ui.value < 0) {
                 $(this).spinner('value', ui.value + 60);
                 $('#hours').spinner('stepDown');
                 return false;
             }
         }
     });
     $('#evenHH').spinner({
         min: 0});
 });