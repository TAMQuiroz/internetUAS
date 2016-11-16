$(function () {

    $(document).ready(function () {

        //
        $("#fecha_inicio_reporte").datepicker({
            format: "yyyy-mm-dd",
            startDate: "2016-01-01", 
            language: "es",
            autoclose: true,
            todayHighlight: true
        });    
        $('#fecha_inicio_reporte').datepicker('setDate',"");

        $("#fecha_fin_reporte").datepicker({
            format: "yyyy-mm-dd",
            startDate: "2016-01-01", 
            language: "es",
            autoclose: true,
            todayHighlight: true
        });    
        
        $('#fecha_fin_reporte').datepicker('setDate', "" );
        var inputStartDate = $('#fecha_inicio_reporte').children(".input-date");
        inputStartDate.change(function() {        
            var valueInputStart = $(this).val();
            $('#fecha_fin_reporte').datepicker('setStartDate', valueInputStart);
            $('#fecha_fin_reporte').datepicker('setDate', valueInputStart);
        });
    });

    // Build the chart             
    var pendientes  = $("#pendientes").attr("value");
    var confirmadas = $("#confirmadas").attr("value");
    var canceladas  = $("#canceladas").attr("value");
    var sugeridas   = $("#sugeridas").attr("value");
    var rechazadas  = $("#rechazadas").attr("value");
    var asistidas   = $("#asistidas").attr("value");
    var noasistidas = $("#noasistidas").attr("value");
    var citas       = $("#citas").attr("value");    

    $('#graphics').highcharts({    
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Reporte gráfico - Total citas: ' + citas  
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',                    
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Porcentaje',
            colorByPoint: true,
            data: [{
                name: 'Pendiente',
                y: pendientes/citas * 100
            }, {
                name: 'Cancelada',
                y: canceladas/citas * 100                
            }, {
                name: 'Confirmada',
                y: confirmadas/citas * 100               
            }, {
                name: 'Sugerida',
                y: sugeridas/citas * 100
            }, {
                name: 'Rechazada',
                y: rechazadas/citas *100
            }, {
                name: 'Asistida',
                y: asistidas/citas * 100,
                sliced: true,
                selected: true
            }, {
                name: 'No asistida',
                y: noasistidas/citas * 100
            }]
        }]
    });
    
});
