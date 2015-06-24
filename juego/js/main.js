'use strict';

var cuenta = [0, 0, 0, 0, 0, 0];

function tirarDados(){
  cuenta = [0, 0, 0, 0, 0, 0]; 

  var caraDado1 = Math.floor((Math.random() * 6) + 1);
  cuenta[caraDado1-1]++;
  document.getElementById('dado1').src = 'imagenes/cara' + caraDado1 + '.png';

  var caraDado2 = Math.floor((Math.random() * 6) + 1);
  cuenta[caraDado2-1]++;
  document.getElementById('dado2').src = 'imagenes/cara' + caraDado2 + '.png';

  var caraDado3 = Math.floor((Math.random() * 6) + 1);
  cuenta[caraDado3-1]++;
  document.getElementById('dado3').src = 'imagenes/cara' + caraDado3 + '.png';

  var caraDado4 = Math.floor((Math.random() * 6) + 1);
  cuenta[caraDado4-1]++;
  document.getElementById('dado4').src = 'imagenes/cara' + caraDado4 + '.png';

  var caraDado5 = Math.floor((Math.random() * 6) + 1);
  cuenta[caraDado5-1]++;
  document.getElementById('dado5').src = 'imagenes/cara' + caraDado5 + '.png';

/*  for(var j = 0 ; j < cantidadTiros ; j++){
    if(){

    };
  }*/
}

function tirarCantidadVeces(cantidadTiros){
  for(var i = 0 ; i < cantidadTiros ; i++){
    tirarDados();
  }
}

$('#comenzar').on('click', function(event){
    event.preventDefault();
    var cantidadTiros = $('#cantidadTiros').val();
    $('#cantidadTiros').val('');
    tirarCantidadVeces(cantidadTiros);
  });