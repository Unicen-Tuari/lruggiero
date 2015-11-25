// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){

	// Carga en la Seccion de Inicio las Noticias Correspondientes a la Categoria Indicada
	function cargarNoticiasPorCategoria(id){
		$.ajax({
			type: 'GET',
			dataType: 'HTML',
			url: 'index.php?action=noticias&id=' + id,
			success: function(data){
						$('#contenedor-principal').html(data);
						$('#id_categoria').val(id);
					},
			error: function(){
						alert('Error al Cargar la Pagina de ' + seccion);
					}
		});
	};

	// Dispara la Funcion que Carga las Noticias por Categoria
	$('#id_categoria').on('change', function(event){
		event.preventDefault();
		cargarNoticiasPorCategoria($(this).val());
	});

});