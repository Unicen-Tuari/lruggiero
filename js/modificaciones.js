// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){

	// Definicion de Variables
	var grupo = 88;

		// Funcion que Agrega una Lista de Modificaciones y refresca la Tabla HTML
		function cargarModificacion(grupo){
			var entradaParametro = $('#parametro').val();
			$('#parametro').val('');
			var entradaValor = $('#valor').val();
			$('#valor').val('');
			var registro = [entradaParametro, entradaValor];
			var registroCompleto = {
					'group': grupo,
					'thing': registro
				};
			if(parametro && valor){
				$.ajax({
					type: 'POST',
					dataType: 'JSON',
					data: JSON.stringify(registroCompleto),
					contentType: 'application/json; charset=utf-8',
					url: 'http://web-unicen.herokuapp.com/api/create',
					success: function(){
								leerGrupo(grupo);
							},
					error: function(){
								alert('La Entrada NO Pudo ser Agregada Correctamente');
							}
				});
			} else {
				alert('Los Campos Deben Contener al Menos 1 Caracter');
			};
		};

	// Funcion que Lee la INFO del GRUPO indicado y la Agrega en la Tabla HTML
	function leerGrupo(grupo){
		$.ajax({
			type: 'GET',
			dataType: 'JSON',
			url: 'http://web-unicen.herokuapp.com/api/group/' + grupo,
			success: function(data){
						var parametro = '';
						var valor = '';
						$('#lista-modificaciones').html('');
						for (var i = 0 ; i < data.information.length ; i++){
							parametro = data.information[i]['thing'][0];
							valor = data.information[i]['thing'][1];
							registro = '<tr><td>' + parametro + '</td><td>' + valor + '</td></tr>';
							$('#lista-modificaciones').append(registro);
						}
					},
			error: function(){
						alert('Error al Cargar la Tabla de Modificaciones');
					}
		});
	};

	// Carga la Tabla al Iniciar la Pagina
	leerGrupo(grupo);

	// Llama a la Funcion cargarModificacion cuando se Presiona el Boton Correspondiente
	$('#agregar-modificacion').on('click', function(event){
		event.preventDefault();
		cargarModificacion(grupo);
	});
});