function cambiar_fecha_grafica(){

    var anio_sel=$("#anio_sel").val();
    var mes_sel=$("#mes_sel").val();

 
    cargar_grafica_user(anio_sel,mes_sel);
   // cargar_grafica_barras1(anio_sel,mes_sel);
   // cargar_grafica_barras(anio_sel,mes_sel);
    //cargar_grafica_lineas(anio_sel,mes_sel);
   
}

function cargar_grafica_user(anio,mes){



$("#morris-bar-chart2").html('');

var url = "graficas_user/"+anio+"/"+mes+"";


$.get(url,function(resul){

    var datos= jQuery.parseJSON(resul);
    var totaldias=datos.totaldias;
    var registrosdia=datos.registrosdia;
    console.log("llega",datos.dias);



    //var i=0; 

      /*  for(i=1;i<=totaldias;i++){
            
            options.series[0].data.push( registrosdia[i] );
            options.xAxis.categories.push(i);


        }*/

       Morris.Bar({
        element: 'morris-bar-chart2',
        data:datos.dias,
        xkey: 'x',
        ykeys: ['y'],
        labels: ['Usuarios Registrados',],
        hideHover: 'auto',
        resize: true
    });

    });
}

function cargar_grafica_barras1(anio,mes){

var options={
     chart: {
            renderTo: 'div_grafica_barras1',
            type: 'column'
        },
        title: {
            text: 'Numero de Registros de Inmuebles de la Construccion en el Mes '
        },
        subtitle: {
            text: 'dias del mes'
        },
        xAxis: {
            categories: [],
             title: {
                text: 'dias del mes'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'REGISTROS AL DIA'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'registros',
            data: []

        }]
}

$("#div_grafica_barras1").html( $("#cargador_empresa").html() );

var url = "grafica_hoja2/"+anio+"/"+mes+"";


$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var totaldias=datos.totaldias;
var registrosdia=datos.registrosdia;
var i=0;
    for(i=1;i<=totaldias;i++){
    
    options.series[0].data.push( registrosdia[i] );
    options.xAxis.categories.push(i);


    }


 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}


function cargar_grafica_barras2(anio,mes){

var options={
     chart: {
            renderTo: 'div_grafica_barras2',
            type: 'column'
        },
        title: {
            text: 'Numero de Registros de Inmuebles de la Medidas en el Mes '
        },
        subtitle: {
            text: 'dias del mes'
        },
        xAxis: {
            categories: [],
             title: {
                text: 'dias del mes'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'REGISTROS AL DIA'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'registros',
            data: []

        }]
}

$("#div_grafica_barras2").html( $("#cargador_empresa").html() );

var url = "grafica_hoja3/"+anio+"/"+mes+"";


$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var totaldias=datos.totaldias;
var registrosdia=datos.registrosdia;
var i=0;
    for(i=1;i<=totaldias;i++){
    
    options.series[0].data.push( registrosdia[i] );
    options.xAxis.categories.push(i);


    }


 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}




function cargar_grafica_barras(anio,mes){


var options={
     chart: {
            renderTo: 'div_grafica_barras',
            type: 'column'
        },
        title: {
            text: 'Numero de Registros en el Mes hoja1 Terreno.'
        },
        subtitle: {
            text: 'Inmuebles',
        },
        xAxis: {
            categories: [],
             title: {
                text: 'dias del mes'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'REGISTROS AL DIA'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'registros',
            data: []

        }]
}

$("#div_grafica_barras").html( $("#cargador_empresa").html() );

var url = "grafica_registros/"+anio+"/"+mes+"";


$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var totaldias=datos.totaldias;
var registrosdia=datos.registrosdia;
var i=0;
    for(i=1;i<=totaldias;i++){
    
    options.series[0].data.push( registrosdia[i] );
    options.xAxis.categories.push(i);


    }


 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}



function cargar_grafica_lineas(anio,mes){

var options={
     chart: {
            renderTo: 'div_grafica_lineas',
           
        },
          title: {
            text: 'Numero de Registros de Inmuebles ',
            x: -20 //center
        },
        subtitle: {
            text: 'Inmuebles',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'REGISTROS POR DIA'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' registros'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'registros',
            data: []
        }]
}

$("#div_grafica_lineas").html( $("#cargador_empresa").html() );
var url = "grafica_registros/"+anio+"/"+mes+"";
$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var totaldias=datos.totaldias;
var registrosdia=datos.registrosdia;
var i=0;
    for(i=1;i<=totaldias;i++){
    
    options.series[0].data.push( registrosdia[i] );
    options.xAxis.categories.push(i);


    }
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}



function cargar_grafica_pie(){

var options={
     // Build the chart
     
            chart: {
                renderTo: 'div_grafica_pie',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Gráfica de Vulnerabilidad del Terreno'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Porcentaje',
                colorByPoint: true,
                data: [
                ]
            }]
     
}


$("#div_grafica_pie").html( $("#cargador_empresa").html() );

var url = "grafica_publicaciones";


$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var tipos=datos.tipos;
var totattipos=datos.totaltipos;
var numeropublicaciones=datos.numerodepubli;

    for(i=0;i<=totattipos-1;i++){  
    var idTP=tipos[i].nombre;
    var objeto= {name: tipos[i].nombre, y:numeropublicaciones[idTP] };   


    options.series[0].data.push( objeto );  
    }
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}

function cargar_grafica_pie1(){

var options={
     // Build the chart
     
            chart: {
                renderTo: 'div_grafica_pie1',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Gráfica de Vulnerabilidad de la Construcción'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Porcentaje',
                colorByPoint: true,
                data: [
                ]
            }]
     
}


$("#div_grafica_pie1").html( $("#cargador_empresa").html() );

var url = "grafica_publicaciones1";


$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var tipos=datos.tipos;
var totattipos=datos.totaltipos;
var numeropublicaciones=datos.numerodepubli;

    for(i=0;i<=totattipos-1;i++){  
    var idTP=tipos[i].nombre;
    var objeto= {name: tipos[i].nombre, y:numeropublicaciones[idTP] };   


    options.series[0].data.push( objeto );  
    }
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})

}







