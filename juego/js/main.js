$(document).ready(function(){

	"use strict";

// OBJETO DADO Y SUS METODOS
	function Dado(id){
		this.id = id;
	};

	Dado.prototype.valor = 6;

	Dado.prototype.Tirar = function(){
		this.valor = Math.floor((Math.random() * 6) + 1);
		document.getElementById(this.id).src = 'imagenes/cara' + this.valor + '.png';
	    return this.valor;
	 };

// OBJETO CUBILETE Y SUS METODOS
	function Cubilete(){
		this.dado1 = new Dado('dado1');
		this.dado2 = new Dado('dado2');
		this.dado3 = new Dado('dado3');
		this.dado4 = new Dado('dado4');
		this.dado5 = new Dado('dado5');
	};

	Cubilete.prototype.Tirar = function(){
		this.dado1.Tirar();
		this.dado2.Tirar();
		this.dado3.Tirar();
		this.dado4.Tirar();
		this.dado5.Tirar();
	};

// OBJETO TIRADOR Y SUS METODOS
	function Tirador() {
		this.cubilete = new Cubilete();
		this.contador = [0, 0, 0, 0, 0, 0];
	};

	Tirador.prototype.Tirar = function (cantidadTiros){
		for(var i = 0 ; i < cantidadTiros ; i++){
			this.cubilete.Tirar();
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