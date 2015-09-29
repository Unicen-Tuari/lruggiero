// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){
	// Definicion de Variable
	var inicio = 'inicio';


	/* Funcion que Carga en el Contenedor Principal la 
		Seccion que se le pase como Parametro */
	function cargarSeccion(seccion, id){
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: 'index.php?action=' + seccion + '&id=' + id,
			success: function(data){
						$('#contenedor-principal').html(data);
					},
			error: function(){
						alert('Error al Cargar la Pagina de ' + seccion + 'Con la Noticia' + id);
					}
		});
	};

	// Carga la Seccion de Inicio con la Noticia Indicada
	$('.noticia').on('click', function(event){
		event.preventDefault();
		cargarSeccion(inicio, $(this).val());
	});

});