// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){

	// Definicion de Variables
	var grupo = 69;

		// Funcion que Agrega una Lista de Actividades para todo el MES y refresca la Tabla HTML
		function cargarActividades(grupo){
			var mes = $('#mes').val();
			$('#mes').val('');
			var semana1 = $('#semana1').val();
			$('#semana1').val('');
			var semana2 = $('#semana2').val();
			$('#semana2').val('');
			var semana3 = $('#semana3').val();
			$('#semana3').val('');
			var semana4 = $('#semana4').val();
			$('#semana4').val('');
			var registro = [mes, semana1, semana2, semana3, semana4];
			var registroCompleto = {
					'group': grupo,
					'thing': registro
				};
			if(mes && semana1 && semana2 && semana3 && semana4){
				$.ajax({
					type: 'POST',
					dataType: 'JSON',
					data: JSON.stringify(registroCompleto),
					contentType: 'application/json; charset=utf-8',
					url: 'http://web-unicen.herokuapp.com/api/create',
					success: function(data){
								leerGrupo(grupo);
							},
					error: function(){
								alert('Las Actividades NO Pudieron ser Agregadas Correctamente');
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
						var mes = '';
						var semana1 = '';
						var semana2 = '';
						var semana3 = '';
						var semana4 = '';
						var registro = '';
						$('#lista-actividades').html('');
						for (var i = 0 ; i < data.information.length ; i++){
							mes = data.information[i]['thing'][0];
							semana1 = data.information[i]['thing'][1];
							semana2 = data.information[i]['thing'][2];
							semana3 = data.information[i]['thing'][3];
							semana4 = data.information[i]['thing'][4];
							registro = '<tr><td class="mes">' + mes + '</td><td>' + semana1 + '</td><td>' + semana2
									+ '</td><td>' + semana3 + '</td><td>' + semana4 + '</td></tr>';
							$('#lista-actividades').append(registro);
						}
					},
			error: function(){
						alert('Error al Cargar la Tabla de Actividades');
					}
		});
	};

	// Carga la Tabla al Iniciar la Pagina
	leerGrupo(grupo);

	// Llama a la Funcion cargarActividades cuando se Presiona el Boton Correspondiente
	$('#agregar-actividad').on('click', function(event){
		event.preventDefault();
		cargarActividades(grupo);
	});
});