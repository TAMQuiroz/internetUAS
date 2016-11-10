

$(function () {
    //Datos para Bar Chart
    var especialidades = document.getElementById("especialidad");
    var estadoP = document.getElementById("estadoP");
    var numOptions = especialidades.length;
    var numEstados = estadoP.length;
    var arrayEspId = [];
    var arrayEstado = [];
    var arrayEsp = [];
    var arrayProyXInvXEsp =[];
    var arrayProyXProfXEsp =[];
    //Creacion de arrray que contiene los porcentajes de inv por esp
    var arrayInvXEsp = [];
    var arrayProfXEsp = [];
    var totalInv = 0;
    var totalProf = 0;
    for (var i=1; i< numOptions; i++){
        arrayInvXEsp.push(0);
    }
    for (var i=1; i< numOptions; i++){
        arrayProfXEsp.push(0);
    }
    for (var i=1; i< numOptions; i++){
        arrayProyXInvXEsp.push(0);
        arrayProyXProfXEsp.push(0);
    }
    for (var i=1; i < numOptions ; i ++){
        var text = especialidades[i].text;
        arrayEspId.push(i);
        arrayEsp.push(text);
    }
    for (var i=1; i < numEstados ; i ++){
        var text = estadoP[i].text;
        arrayEstado.push(text);
    }
    var tableI = document.getElementById('tableI');

    //var rowLengthI = tableI.tBodies.length;
    var rowLengthI = (tableI.rows.length-1)/2;

    for(var i=0; i<rowLengthI; i+=1){

      var index = (i*2)+1;
      //var row = tableI.tBodies[i];
      var row = tableI.rows[index];

      //your code goes here, looping over every row.
      //cells are accessed as easy

      //var cellLength = row.firstElementChild.cells.length;

      //Celda que contiene nombre de Especialidad = 4
      //var cellEsp = row.firstElementChild.cells[4];
      var cellEsp = row.children[4];
      //var cellNumP = row.firstElementChild.cells[5];
      var cellNumP = row.children[5];
      for(var esp=0; esp<arrayEsp.length; esp++){
            if(arrayEsp[esp] == cellEsp.textContent){
                //Es un investigador de la especialidad
                //Celda que contiene el numero de proyectos = 5
                arrayProyXInvXEsp[esp] = arrayProyXInvXEsp[esp] + parseInt(cellNumP.textContent);
                arrayInvXEsp[esp] = arrayInvXEsp[esp] + 1;
                totalInv = totalInv + 1;
            }
      }
    }

    var tableP = document.getElementById('tableP');

    //var rowLengthI = tableI.tBodies.length;
    var rowLengthP = (tableP.rows.length-1)/2;

    for(var i=0; i<rowLengthP; i+=1){

      var index = (i*2)+1;
      //var row = tableI.tBodies[i];
      var row = tableP.rows[index];

      //your code goes here, looping over every row.
      //cells are accessed as easy

      //var cellLength = row.firstElementChild.cells.length;

      //Celda que contiene nombre de Especialidad = 4
      //var cellEsp = row.firstElementChild.cells[4];
      var cellEsp = row.children[4];
      //var cellNumP = row.firstElementChild.cells[5];
      var cellNumP = row.children[5];
      for(var esp=0; esp<arrayEsp.length; esp++){
            if(arrayEsp[esp] == cellEsp.textContent){
                //Celda que contiene el numero de proyectos = 5
                arrayProyXProfXEsp[esp] = arrayProyXProfXEsp[esp] + parseInt(cellNumP.textContent);
                arrayProfXEsp[esp] = arrayProfXEsp[esp] + 1;
                totalProf = totalProf + 1;
            }
      }
    }

    Highcharts.chart('container', {

        chart: {
            type: 'column'
        },

        title: {
            text: 'Total de proyectos asignados, agrupados por tipo de usuario'
        },

        xAxis: {
            categories: arrayEsp,       
            //categories: [especialidades[1].text, numOptions, 'Pears', 'Grapes', 'Bananas']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            tickInterval: 2,
            title: {
                text: 'Numero de proyectos'
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
            data: arrayProyXInvXEsp,
            stack: 'male'
        }, {
            name: 'Profesor',
            data: arrayProyXProfXEsp,
            stack: 'male'
        }]
    });

    //DAtos para PIE INV
    var arrayInvXEspPorc = [];
    for(var i=0;i<arrayInvXEsp.length; i++){
        var porc = (arrayInvXEsp[i]/totalInv)*100;
        arrayInvXEspPorc.push(porc);
    }
    //var arrayData = [56.33,24.03,10.38,5.68];
    var arrayDataPieI = new Array();

    for(var i=0; i<arrayEsp.length; i++){
        var temp = new Array(arrayEsp[i], arrayInvXEspPorc[i], arrayEspId[i]);
        arrayDataPieI[i] = temp;
    }

    var pieI = [];

    for(var i=0; i<arrayEsp.length; i++){
        var data = {};
        data.name = arrayEsp[i];
        data.y = arrayInvXEspPorc[i];
        data.drilldown = arrayEspId[i];
        pieI.push(data);
    }

    //Array drilldown

    var arrayDrillI = new Array();
    /*var arrayData = [[['v11.0',24.13], ['v12.0',17.2], ['v13.0',8.11], ['v14.0',5.33], ['v15.0',1.11]],[['v11.0',24.13], ['v12.0',17.2], ['v13.0',8.11], ['v14.0',5.33], ['v15.0',1.11]],[['v11.0',24.13], ['v12.0',17.2], ['v13.0',8.11], ['v14.0',5.33], ['v15.0',1.11]],[['v11.0',24.13], ['v12.0',17.2], ['v13.0',8.11], ['v14.0',5.33], ['v15.0',1.11]]];

    for(var i=0; i<arrayEsp.length; i++){
        //name, id, data
        var temp = new Array(arrayEsp[i], arrayEspId[i], arrayData[i]);
        arrayDrillI[i] = temp;
    }*/

    var drilldownI = [];

    for(var i=0; i<arrayEsp.length; i++){
        //name, id, data
        var drilldown_data_esp = {};
        drilldown_data_esp.name = arrayEsp[i];
        drilldown_data_esp.id = arrayEspId[i];
        drilldown_data_esp.data = [];
        for(var j=0; j<arrayEstado.length; j++){
            drilldown_data_esp.data.push([arrayEstado[i],24.13]);    
        }
        drilldownI.push(drilldown_data_esp);
    }    


    // Create the chart
    Highcharts.chart('pieI', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Browser market shares. January, 2015 to May, 2015'
        },
        subtitle: {
            text: 'Click the slices to view versions. Source: netmarketshare.com.'
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: pieI
        }],
        drilldown: {
            series: drilldownI
        }
    });

    //DAtos para PIE PROF
    var arrayProfXEspPorc = [];
    for(var i=0;i<arrayProfXEsp.length; i++){
        var porc = (arrayProfXEsp[i]/totalProf)*100;
        arrayProfXEspPorc.push(porc);
    }
    //var arrayData = [56.33,24.03,10.38,5.68];
    var arrayDataPieP = new Array();

    for(var i=0; i<arrayEsp.length; i++){
        var temp = new Array(arrayEsp[i], arrayProfXEspPorc[i], arrayEsp[i]);
        arrayDataPieP[i] = temp;
    }

    // Create the chart
    Highcharts.chart('pieP', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Browser market shares. January, 2015 to May, 2015'
        },
        subtitle: {
            text: 'Click the slices to view versions. Source: netmarketshare.com.'
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Microsoft Internet Explorer',
                y: 56.33,
                drilldown: 'Microsoft Internet Explorer'
            }, {
                name: 'Chrome',
                y: 24.03,
                drilldown: 'Chrome'
            }, {
                name: 'Firefox',
                y: 10.38,
                drilldown: 'Firefox'
            }, {
                name: 'Safari',
                y: 4.77,
                drilldown: 'Safari'
            }, {
                name: 'Opera',
                y: 0.91,
                drilldown: 'Opera'
            }, {
                name: 'Proprietary or Undetectable',
                y: 0.2,
                drilldown: null
            }]
        }],
        drilldown: {
            series: [{
                name: 'Microsoft Internet Explorer',
                id: 'Microsoft Internet Explorer',
                data: [
                    ['v11.0', 24.13],
                    ['v8.0', 17.2],
                    ['v9.0', 8.11],
                    ['v10.0', 5.33],
                    ['v6.0', 1.06],
                    ['v7.0', 0.5]
                ]
            }, {
                name: 'Chrome',
                id: 'Chrome',
                data: [
                    ['v40.0', 5],
                    ['v41.0', 4.32],
                    ['v42.0', 3.68],
                    ['v39.0', 2.96],
                    ['v36.0', 2.53],
                    ['v43.0', 1.45],
                    ['v31.0', 1.24],
                    ['v35.0', 0.85],
                    ['v38.0', 0.6],
                    ['v32.0', 0.55],
                    ['v37.0', 0.38],
                    ['v33.0', 0.19],
                    ['v34.0', 0.14],
                    ['v30.0', 0.14]
                ]
            }, {
                name: 'Firefox',
                id: 'Firefox',
                data: [
                    ['v35', 2.76],
                    ['v36', 2.32],
                    ['v37', 2.31],
                    ['v34', 1.27],
                    ['v38', 1.02],
                    ['v31', 0.33],
                    ['v33', 0.22],
                    ['v32', 0.15]
                ]
            }, {
                name: 'Safari',
                id: 'Safari',
                data: [
                    ['v8.0', 2.56],
                    ['v7.1', 0.77],
                    ['v5.1', 0.42],
                    ['v5.0', 0.3],
                    ['v6.1', 0.29],
                    ['v7.0', 0.26],
                    ['v6.2', 0.17]
                ]
            }, {
                name: 'Opera',
                id: 'Opera',
                data: [
                    ['v12.x', 0.34],
                    ['v28', 0.24],
                    ['v27', 0.17],
                    ['v29', 0.16]
                ]
            }]
        }
    });

});