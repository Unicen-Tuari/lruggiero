$(document).ready(function(){

	"use strict";

// CLASE DADO Y SUS METODOS
	function Dado(id){
		this.id = id;
	};

	Dado.prototype.valor = 6;

	Dado.prototype.Tirar = function(){
		this.valor = Math.floor((Math.random() * 6) + 1);
		document.getElementById(this.id).src = 'imagenes/cara' + this.valor + '.png';
	    return this.valor;
	 };

// CLASE CUBILETE Y SUS METODOS
	function Cubilete(){
		this.dado1 = new Dado('dado1');
		this.dado2 = new Dado('dado2');
		this.dado3 = new Dado('dado3');
		this.dado4 = new Dado('dado4');
		this.dado5 = new Dado('dado5');
	};

	Cubilete.prototype.Tirar = function(){
		this.contador = [0, 0, 0, 0, 0, 0];
		var puntajeJugada = 0;
		this.contador[this.dado1.Tirar()-1]++;
		this.contador[this.dado2.Tirar()-1]++;
		this.contador[this.dado3.Tirar()-1]++;
		this.contador[this.dado4.Tirar()-1]++;
		this.contador[this.dado5.Tirar()-1]++;
		puntajeJugada = this.CalcularPuntosJugada(this.contador);
		return puntajeJugada;
	};

	Cubilete.prototype.CalcularPuntosJugada = function(contador){
		contador.sort();
		if(contador[5] == 5){
			return 50;
		} else if(contador[5] == 4){
			return 40;
		} else if(contador[5] == 3 && contador[4] == 2){
			return 30;
		} else {
			return 0;
		}
	}

// CLASE TIRADOR Y SUS METODOS
	function Tirador() {
		this.cubilete = new Cubilete();
		this.mejorPuntaje = 0;
		this.puntajeActual = 0;
	};

	Tirador.prototype.Tirar = function(cantidadTiros){
		var numeroTirada = 1;
		for(var i = 0 ; i < cantidadTiros ; i++){
			this.puntajeActual = this.cubilete.Tirar();
			if(this.puntajeActual > this.mejorPuntaje){
				this.mejorPuntaje = this.puntajeActual;
				document.getElementById('mejor-puntaje').innerHTML = this.mejorPuntaje;
			}
			document.getElementById('puntaje-actual').innerHTML = this.puntajeActual;
			alert('FIN TIRO NUMERO ' + numeroTirada);
			numeroTirada++;
		}
	}

// SE CREA UN NUEVO TIRADOR
	var tirador = new Tirador();

/* CUANDO SE HACE CLICK EN COMENZAR LEE EL INPUT Y LLAMA A
	TIRADOR.TIRAR PASANDOLE LA CANTIDAD DE TIROS QUE DEBE HACER*/
	$('#comenzar').on('click', function(event){
		event.preventDefault();
		var cantidadTiros = $('#cantidadTiros').val();
		$('#cantidadTiros').val('');
		tirador.Tirar(cantidadTiros);
	});
});