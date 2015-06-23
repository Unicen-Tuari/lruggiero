// Solo Ejecuta Codigo cuando el DOM esta Totalmente Cargado
$('document').ready(function(){

	// Definicion de Variables
	grupo = '36';

	// Funcion que Agrega una Lista de Actividades para todo el MES y refresca la Tabla HTML
	function cargarActividades(grupo){
		var mes = $('#mes').val();
		var semana1 = $('#semana1').val();
		var semana2 = $('#semana2').val();
		var semana3 = $('#semana3').val();
		var semana4 = $('#semana4').val();
		var registro = [mes, semana1, semana2, semana3, semana4];
		var registroCompleto = {
				'grupo': grupo,
				'registro': registro
			};

		$.ajax({
			type: 'GET',
			dataType: 'JSON',
			data: JSON.stringify(registroCompleto),
			url: 'http://web-unicen.herokuapp.com/api/create',
			success: function(data){
						alert('Las Actividades Pudieron ser Agregadas Correctamente');
						leerGrupo(grupo);
					},
			error: function(){
						alert('Las Actividades NO Pudieron ser Agregadas Correctamente');
					}
		});
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
						for (var i = 0 ; i < data.information.length ; i++){
							mes = data.information[i]['thing'][0];
							semana1 = data.information[i]['registro'][1];
							semana2 = data.information[i]['registro'][2];
							semana3 = data.information[i]['registro'][3];
							semana4 = data.information[i]['registro'][4];
							registro = '<tr><td>' + mes + '</td><td>' + semana1 + '</td><td>' + semana2
									+ '</td><td>' + semana3 + '</td><td>' + semana4 + '</td></tr>';
							$("#actividades").html(registro);
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
	$('#agregarActividad').on('click', function(event){
		event.preventDefault();
		cargarActividades(grupo);
	});
});