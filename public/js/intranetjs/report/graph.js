

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
    var arrayInvEstadoPXEsp = [];
    var arrayProfEstadoPXEsp = [];
    //Creacion de arrray que contiene los porcentajes de inv por esp
    var arrayInvXEsp = [];
    var arrayProfXEsp = [];
    var totalInv = 0;
    var totalProf = 0;
    var totalProyI = 0;
    var totalProyP = 0;
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
    for (var i=1; i < numOptions ; i ++){
        var arrayEstadoPCant = [];
        for (var j=1; j<numEstados; j++){
            arrayEstadoPCant.push(0);
        }
        arrayInvEstadoPXEsp.push(arrayEstadoPCant);
    }
    for (var i=1; i < numOptions ; i ++){
        var arrayEstadoPCant = [];
        for (var j=1; j<numEstados; j++){
            arrayEstadoPCant.push(0);
        }
        arrayProfEstadoPXEsp.push(arrayEstadoPCant);
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
      var cellEsp = row.cells[4];
      //var cellNumP = row.firstElementChild.cells[5];
      var cellNumP = row.cells[5];
      for(var esp=0; esp<arrayEsp.length; esp++){
            var espNombre = cellEsp.textContent;
            if(arrayEsp[esp] == espNombre){
                //Es un investigador de la especialidad
                //Celda que contiene el numero de proyectos = 5
                arrayProyXInvXEsp[esp] = arrayProyXInvXEsp[esp] + parseInt(cellNumP.textContent);
                arrayInvXEsp[esp] = arrayInvXEsp[esp] + 1;
                totalInv = totalInv + 1;
                break;
            }
      }

      //sacar el index de la especialidad
      var indexE=0;
      for(var e=0; e<arrayEsp.length; e++){
        var espNombre = cellEsp.textContent ;
        if (espNombre == arrayEsp[e]){
            indexE = e;
            break;
        }
      }

      indexRow = (i*2)+1;
      var subRows = tableI.tBodies[0].children[indexRow].cells[0].children[0];
      var numSubRows = (subRows.rows.length)-1;
      for (var j=1; j<=numSubRows; j++){
        //Nombre del proyecto cel = 0,
        //Estado del proyecto cel = 4
        var nombreP = subRows.rows[j].cells[0].textContent;
        var estadoP = subRows.rows[j].cells[3].textContent;
        for (var k=0; k < arrayEstado.length ; k ++){
            var estado = arrayEstado[k];
            if (estadoP == estado){
                arrayInvEstadoPXEsp[indexE][k] = arrayInvEstadoPXEsp[indexE][k] + 1;
                totalProyI = totalProyI + 1;
            }
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
      var cellEsp = row.cells[4];
      //var cellNumP = row.firstElementChild.cells[5];
      var cellNumP = row.cells[5];
      //var cellNumP = row.children[5];
      for(var esp=0; esp<arrayEsp.length; esp++){
            var espNombre = cellEsp.textContent;
            if(arrayEsp[esp] == cellEsp.textContent){
                //Celda que contiene el numero de proyectos = 5
                arrayProyXProfXEsp[esp] = arrayProyXProfXEsp[esp] + parseInt(cellNumP.textContent);
                arrayProfXEsp[esp] = arrayProfXEsp[esp] + 1;
                totalProf = totalProf + 1;
                break;
            }
      }

      //sacar el index de la especialidad
      var indexE=0;
      for(var e=0; e<arrayEsp.length; e++){
        var espNombre = cellEsp.textContent ;
        if (espNombre == arrayEsp[e]){
            indexE = e;
            break;
        }
      }

      indexRow = (i*2)+1;
      var subRows = tableP.tBodies[0].children[indexRow].cells[0].children[0];
      var numSubRows = (subRows.rows.length)-1;
      for (var j=1; j<=numSubRows; j++){
        //Nombre del proyecto cel = 0,
        //Estado del proyecto cel = 4
        var nombreP = subRows.rows[j].cells[0].textContent;
        var estadoP = subRows.rows[j].cells[3].textContent;
        for (var k=0; k < arrayEstado.length ; k ++){
            var estado = arrayEstado[k];
            if (estadoP == estado){
                arrayProfEstadoPXEsp[indexE][k] = arrayProfEstadoPXEsp[indexE][k] + 1;
                totalProyP = totalProyP + 1;
            }
        }
      }
    }

    Highcharts.chart('container', {

        chart: {
            type: 'column'
        },

        title: {
            text: 'Total de proyectos asignados, agrupados por especialidad'
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

    var arrayInvXEstadoPXEsp = [];
    for (var i=0; i < arrayEsp.length ; i ++){
        var arrayEstadoPXEspPorc = [];
        for (var j=0; j < numEstados; j++){
            var porc = (arrayInvEstadoPXEsp[i][j]/totalProyI)*100;
            arrayEstadoPXEspPorc.push(porc);
        }
        arrayInvXEstadoPXEsp.push(arrayEstadoPXEspPorc);
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
            drilldown_data_esp.data.push([arrayEstado[j],arrayInvXEstadoPXEsp[i][j]]);    
        }
        drilldownI.push(drilldown_data_esp);
    }    


    // Create the chart
    var fechaIni = document.getElementById("fecha_ini");
    var fechaFin = document.getElementById("fecha_fin");
    var textPieI = 'Estado de los proyectos. Del ' + fechaIni.value + ' al ' + fechaFin.value;
    Highcharts.chart('pieI', {
        chart: {
            type: 'pie'
        },
        title: {
            //text: 'Browser market shares. January, 2015 to May, 2015'
            text: textPieI
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
            name: 'Especialidades',
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

    var pieP = [];

    for(var i=0; i<arrayEsp.length; i++){
        var data = {};
        data.name = arrayEsp[i];
        data.y = arrayProfXEspPorc[i];
        data.drilldown = arrayEspId[i];
        pieP.push(data);
    }

    var arrayProfXEstadoPXEsp = [];
    for (var i=0; i < arrayEsp.length ; i ++){
        var arrayEstadoPXEspPorc = [];
        for (var j=0; j < numEstados; j++){
            var porc = (arrayProfEstadoPXEsp[i][j]/totalProyP)*100;
            arrayEstadoPXEspPorc.push(porc);
        }
        arrayProfXEstadoPXEsp.push(arrayEstadoPXEspPorc);
    }

    //Array drilldown

    var drilldownP = [];

    for(var i=0; i<arrayEsp.length; i++){
        //name, id, data
        var drilldown_data_esp = {};
        drilldown_data_esp.name = arrayEsp[i];
        drilldown_data_esp.id = arrayEspId[i];
        drilldown_data_esp.data = [];
        for(var j=0; j<arrayEstado.length; j++){
            drilldown_data_esp.data.push([arrayEstado[j],arrayProfXEstadoPXEsp[i][j]]);    
        }
        drilldownP.push(drilldown_data_esp);
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
            name: 'Especialidades',
            colorByPoint: true,
            data: pieP
        }],
        drilldown: {
            series: drilldownP
        }
    });

});