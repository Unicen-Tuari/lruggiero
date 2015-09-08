// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){

	/* Funcion que Cambia la Posicion del Footer en base a
		la Altura del Contenido con Respecto a la Ventana */
	function ActualizarPosicionFooter(){
		$('.pie-pagina').css({
				position: 'relative'
		});
		if($(document.body).height() < $(window).height()){
			$('.pie-pagina').css({
				position: 'absolute'
			});
		};
	};

	// Ejecuta la Funcion que Posiciona el Footer
	ActualizarPosicionFooter();
});