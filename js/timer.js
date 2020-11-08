$(function(){

	function num (number){
		return (number >= 10) ? number: '0'+mumber;
	}

	function converteEmTempo(segundos){
		var hora = Math.floor((segundos/3600));
		var qtdSec = hora * 3600;
		var restante = segundos - qtdSec;

		var minutos = Math.floor((restante/60));
		qtdSec = minutos*60;

		var segundos = restante -qtdSec;

		return num(hora)+':'+num(minutos)+':'+num(segundos);
	}
	alert(converteEmTempo(120));

});