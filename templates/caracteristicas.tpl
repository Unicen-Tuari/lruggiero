<article>
	<h1>CARACTERISTICAS</h1>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Descripcion del Juego</h2>
		</div>
		<p>Como un hombre o una mujer, varado desnudo, congelado y pasando hambre sobre las orillas de una isla misteriosa llamada ARK, usa tus habilidades y astucia para matar o domesticar y montar los dinosaurios  y otras criaturas primitivas que vagan por la tierra. Caza, cosecha recursos, construye herramientas, siembra cultivos, investiga tecnologías, y construye refugios para soportar el duro clima, mientras haces equipo o cazas vorazmente a otros jugadores para sobrevivir, dominar... y escapar!.</p>
		<div class="page-header cabecera-seccion">
			<h2>Modificaciones del Server</h2>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-condensed tabla">
				<thead>
					<tr>
						<th>Parametro</th>
						<th>Valor</th>
					</tr>
				</thead>
				<tbody id="lista-modificaciones">
					<!-- ESTE CONTENEDOR SERA
						 LLENADO DESDE JS CON
						 LAS ENTRADAS QUE EL USUARIO
						 VAYA INGRESANDO -->
				</tbody>
				<tfoot>
					<tr>
						<td><input id="parametro" class="form-control" type="text" maxlength="50" placeholder="Parametro"></td>
						<td><input id="valor" class="form-control" type="text" maxlength="50" placeholder="Valor"></td>
					</tr>
				</tfoot>
			</table>
		</div>
		<button id="agregar-modificacion" type="button" class="btn btn-success btn-lg center-block">Agregar Modificacion</button></br></br>
	</section>
</article>
<!--//// JS DE LA TABLA DE ACTIVIDADES ////-->
	<script type="text/javascript" src="js/modificaciones.js"></script>