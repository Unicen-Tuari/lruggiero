// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){

	/* Funcion que Carga en el Contenedor Principal la 
		Seccion que se le pase como Parametro */
	function cargarNoticia(id){
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: 'index.php?action=noticia&id=' + id,
			success: function(data){
						$('#contenedor-principal').html(data);
					},
			error: function(){
						alert('Error al Cargar la Noticia.');
					}
		});
	};

	// Carga la Seccion de Inicio con la Noticia Indicada
	$('#contenedor-principal').on('click', '.ver-noticia', function(event){
		event.preventDefault();
		cargarNoticia($(this).val());
	});

});