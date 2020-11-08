function paginas_visitadas() {
    $(".paginatr").remove();
    var periodo = $("#paginaselect").val()
    $.getJSON("http://localhost/SBLSH_/relat.php/trafego_por_paginas/" + periodo, function (resposta) {

        var i = 1;
        $.each(resposta, function (key, val) {
            var container = '<tr class="paginatr">';
            container += '<td>' + i + '</td>';
            container += '<td>' + key + '</td>';
            container += '<td>' + val + '</td>';
            container += '</tr>';
            i++;

            $("#pages").append(container);
        });
    });

}
paginas_visitadas();

$("#paginaselect").change(function(){
    paginas_visitadas();
});

//vitas por cidades
function visita_por_cidades() {
    $(".cidtr").remove();
    var periodo = $("#cidadev").val()
    $.getJSON("http://localhost/SBLSH_/relat.php/trafego_por_cidades/" + periodo, function (resposta) {

        var i = 1;
        $.each(resposta, function (key, val) {
            var container = '<tr class="cidtr">';
            container += '<td>' + i   +'</td>';
            container += '<td>' + key + '</td>';
            container += '<td>' + val + '</td>';
            container += '</tr>';
            i++;

            $("#cidades").append(container);
        });
    });

}
visita_por_cidades();

$("#cidadev").change(function(){
    visita_por_cidades();
});

