<article>
	<h1>INFORMACION</h1>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Descripcion del Juego</h2>
		</div>
		<p>Como un hombre o una mujer, varado desnudo, congelado y pasando hambre sobre las orillas de una isla misteriosa llamada ARK, usa tus habilidades y astucia para matar o domesticar y montar los dinosaurios  y otras criaturas primitivas que vagan por la tierra. Caza, cosecha recursos, construye herramientas, siembra cultivos, investiga tecnologías, y construye refugios para soportar el duro clima, mientras haces equipo o cazas vorazmente a otros jugadores para sobrevivir, dominar... y escapar!.</p>
		<div class="page-header cabecera-seccion">
			<h2>Modificaciones del Server</h2>
		</div>
		<p>A continuacion podran ver una lista con todas las modificaciones que se han realizado en el Server, cualquiera que no se detalle a continuacion esta seteada con su valor por defecto.</p>
		<div class="table-responsive">
				<div class="col-xs-12 col-md-10 col-md-offset-1">
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
		</div>
		<button id="agregar-modificacion" type="button" class="btn btn-success btn-lg center-block">Agregar Modificacion</button></br></br>
	</section>
</article>
<!--//// JS DE LA TABLA DE ACTIVIDADES ////-->
	<script type="text/javascript" src="js/modificaciones.js"></script>