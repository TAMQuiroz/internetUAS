$(document).ready(function(){
    
    $("#objCheckAll").change(function () {
        $('.objCheck').prop("checked", $(this).prop("checked"));
    });

    $("#stRstCheckAll").change(function () {
        $('.stRstCheck').prop("checked", $(this).prop("checked"));
        $('.aspCheck').prop("checked", $(this).prop("checked"));
        $('.crtCheck').prop("checked", $(this).prop("checked"));
    });

    $('.objCheck').change(function () {
        $idO = $(this).val();

        if($(this).prop("checked") == true){
            $('.stRstCheck.O' + $idO).prop("checked", true);
            $('.aspCheck.O' + $idO).prop("checked", true);
            $('.crtCheck.O' + $idO).prop("checked", true);
        }
    });

    $('.stRstCheck').change(function () {
        $idR = $(this).val();
        $('.aspCheck.A' + $idR).prop("checked", $(this).prop("checked"));
        $('.crtCheck.A' + $idR).prop("checked", $(this).prop("checked"));

        if($(this).prop("checked") == false){
            $('#stRstCheckAll').prop("checked", false);
        }
        else {
            $('.objCheck.A' + $idR).prop("checked", true);
        }
    });

    $('.aspCheck').change(function () {
        $idA = $(this).val();
        $idR = $(this).attr('class').split(' ');
        $('.crtCheck.C' + $idA).prop("checked", $(this).prop("checked"));
        if($(this).prop("checked") == true){
            $('#stRstCheck' + $idR[1]).prop("checked", true);
            $('.objCheck.' + $idR).prop("checked", true);
        }
        else {
            $('#stRstCheckAll').prop("checked", false);
        }
    });

    $('.crtCheck').change(function () {
        $ids = $(this).attr('class').split(' ');
        if($(this).prop("checked") == true){
            $('#stRstCheck' + $ids[1]).prop("checked", true);
            $('#aspCheck' + $ids[2]).prop("checked", true);
            $('.objCheck.' + $idR).prop("checked", true);
        }
        else {
            $('#stRstCheckAll').prop("checked", false);
        }
    });
});