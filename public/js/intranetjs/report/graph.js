

$(function () {
    var especialidades = document.getElementById("especialidad");
    var esp = especialidades;
    Highcharts.chart('container', {

        chart: {
            type: 'column'
        },

        title: {
            text: 'Total fruit consumtion, grouped by gender'
        },

        xAxis: {
            categories: [especialidades, 'Oranges', 'Pears', 'Grapes', 'Bananas']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Number of fruits'
            }
        },

        tooltip: {
            formatter: function () {
                return '<b>' + this.x + '</b><br/>' +
                    this.series.name + ': ' + this.y + '<br/>' +
                    'Total: ' + this.point.stackTotal;
            }
        },

        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },

        series: [{
            name: 'Investigador',
            data: [5, 3, 4, 7, 2],
            stack: 'male'
        }, {
            name: 'Profesor',
            data: [3, 4, 4, 2, 5],
            stack: 'male'
        }]
    });
});