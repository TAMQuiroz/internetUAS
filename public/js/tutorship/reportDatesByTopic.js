$(function() {
    $(document).ready(function() {
        //
        $("#fecha_inicio_reporte").datepicker({
            format: "yyyy-mm-dd",
            startDate: "2016-01-01",
            language: "es",
            autoclose: true,
            todayHighlight: true
        });
        $('#fecha_inicio_reporte').datepicker('setDate', "");

        $("#fecha_fin_reporte").datepicker({
            format: "yyyy-mm-dd",
            startDate: "2016-01-01",
            language: "es",
            autoclose: true,
            todayHighlight: true
        });

        $('#fecha_fin_reporte').datepicker('setDate', "");
        var inputStartDate = $('#fecha_inicio_reporte').children(".input-date");
        inputStartDate.change(function() {
            var valueInputStart = $(this).val();
            $('#fecha_fin_reporte').datepicker('setStartDate', valueInputStart);
            $('#fecha_fin_reporte').datepicker('setDate', valueInputStart);
        });
    });

    // Build the chart  
    var asistidas = $("#topicTotalAsistidasReport").attr("value");
    var dataComplete = [];
    var i = 0;
    $(".table tbody tr").each(function(index)
    {
        var name, amount, percentage;
        var dat = {};
        $(this).children("td").each(function(index2)
        {
            switch (index2)
            {
                case 1:
                    name = $(this).text();
                    break;
                case 2:
                    amount = $(this).text();
                    break;
                case 3:
                    percentage = $(this).text();
                    break;
            }
        })
        dat.name = name;
        dat.y = percentage;
        if (i == 0) {
            dat.sliced = true;
            dat.selected = true;
        }
        i++;
        dataComplete.push(dat);
    })

    $('#graphics_asistidas').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Reporte gráfico - Total citas: ' + asistidas
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
                data: (function() {
                    // generate an array of random data
                    var data = [];
                    for (j = 0; j < dataComplete.length; j++) {
                        if (j == 0) {
                            data.push({
                                name: dataComplete[j].name,
                                y: parseInt(dataComplete[j].y),
                                sliced: true,
                                selected: true
                            });
                        }
                        else {
                            data.push({
                                name: dataComplete[j].name,
                                y: parseInt(dataComplete[j].y)
                            });
                        }
                    }
                    return data;
                }())
            }]
    });

});
