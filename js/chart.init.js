

function ret(param){
    var  valor= [];
    $.each(param, function(key, val){
        valor.push(val);
    })
    return valor;
}
/*********************************** GRÁFICO DE LINHAS (por) ***********************************/
$(function() {
    "use strict";
    var periodo = '-1 days';
    $.getJSON("http://localhost/SBLSH_/relat.php/horas_trafego/"+ periodo, function(resposta){
    var data = {
        labels: Object.keys(resposta),
        datasets: [
            {
                label: "My First dataset",
                fillColor: "#04354c",
                strokeColor: "#0b6c70",
                pointColor: "#f31212",
                pointStrokeColor: "#ff1b03",
                pointHighlightFill: "#ff1b03",
                pointHighlightStroke: "#2b03f7",
                data: ret(resposta)
            }
        ]
    };

    new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
        responsive : true,
        maintainAspectRatio: false
    });
   });
});
// Chart.defaults.global.responsive = true;

///*********************************** GRÁFICO DE BARRAS (semanal) ***********************************/
$(function () {
    var ctx, data, myBarChart, option_bars;
    Chart.defaults.global.responsive = true;
    ctx = $('#semanal').get(0).getContext('2d');
    ctx.canvas.height = 130;
    option_bars = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: false,
        barShowStroke: true,
        barStrokeWidth: 1,
        barValueSpacing: 5,
        barDatasetSpacing: 3,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
    };
    var periodo = '-7 days';
    $.getJSON("http://localhost/SBLSH_/relat.php/trafego_semanal/" + periodo, function(resposta) {
    data = {
        labels: Object.keys(resposta),
        datasets: [
            {
                label: "My First dataset",
                fillColor: "#8df900",
                strokeColor: "#1ABC9C",
                pointColor: "#1ABC9C",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#1ABC9C",
                data: ret(resposta)
            }
        ]
    };
   myBarChart = new Chart(ctx).Bar(data, option_bars);
    });
});
//**********************************Grafico de Linhas (Mensal***********************************)
$(function () {
    var ctx, data, myLineChart, options;
    Chart.defaults.global.responsive = true;
    ctx = $('#mensal').get(0).getContext('2d');
    ctx.canvas.height = 180;
    options = {
        showScale: true,
        scaleShowGridLines: false,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 0,
        scaleShowHorizontalLines: false,
        scaleShowVerticalLines: true,
        bezierCurve: false,
        bezierCurveTension: 0.4,
        pointDot: false,
        pointDotRadius: 0,
        pointDotStrokeWidth: 2,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 4,
        datasetFill: true,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
    };
    $.getJSON("http://localhost/SBLSH_/relat.php/trafego_mensal/", function(resposta) {
        data = {
            labels: Object.keys(resposta),
            datasets: [
                {
                    label: "Lucrecio Daniel Barnabe",
                    fillColor: "#8df900",
                    strokeColor: "#22A7F0",
                    pointColor: "#22A7F0",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "#a14015",
                    data: ret(resposta)
                }
            ]
        };
        myLineChart = new Chart(ctx).Line(data, options);
    });
});

/*********************************** GRÁFICO EM PIZZA ***********************************/
$(function () {
    var ctx, data, myPieChart, options;
    Chart.defaults.global.responsive = true;
    ctx = $('#plataforma').get(0).getContext('2d');
    ctx.canvas.height = 110;
    options = {
        showScale: false,
        scaleShowGridLines: false,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 0,
        scaleShowHorizontalLines: false,
        scaleShowVerticalLines: false,
        bezierCurve: false,
        bezierCurveTension: 0.4,
        pointDot: false,
        pointDotRadius: 0,
        pointDotStrokeWidth: 2,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 4,
        datasetFill: true,
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    var periodo = "-90 days";
    $.getJSON("http://localhost/SBLSH_/relat.php/trafego_por_plataforma/" + periodo, function(resposta) {
        data = resposta;

        var myPieChart = new Chart(ctx).Pie(data, options);
    });
});

 


