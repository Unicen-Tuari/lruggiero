<article>
	<h1>ACTIVIDADES</h1>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Cronograma de Actividades</h2>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-condensed tabla-actividades">
				<thead>
					<tr>
						<th>Mes</th>
						<th>1° Semana</th>
						<th>2° Semana</th>
						<th>3° Semana</th>
						<th>4° Semana</th>
					</tr>
				</thead>
				<tbody id="lista-actividades">
					<!-- ESTE CONTENEDOR SERA
						 LLENADO DESDE JS CON
						 LAS ENTRADAS QUE EL USUARIO
						 VAYA INGRESANDO -->
				</tbody>
				<tfoot>
					<tr>
						<td><input id="mes" class="form-control" type="text" maxlength="20" placeholder="Mes"></td>
						<td><input id="semana1" class="form-control" type="text" maxlength="20" placeholder="Act. 1° Semana"></td>
						<td><input id="semana2" class="form-control" type="text" maxlength="20" placeholder="Act. 2° Semana"></td>
						<td><input id="semana3" class="form-control" type="text" maxlength="20" placeholder="Act. 3° Semana"></td>
						<td><input id="semana4" class="form-control" type="text" maxlength="20" placeholder="Act. 4° Semana"></td>
					</tr>
				</tfoot>
			</table>
		</div>
		<button id="agregar-actividad" type="button" class="btn btn-success btn-lg center-block">Agregar Actividad</button></br></br>
		<div class="page-header cabecera-seccion">
			<h2>Descripcion de las Actividades</h2>
		</div>
		<p>Las actividades realizadas en la ciudad de Tandil comienzan siempre a las 14hs los dias sabados y domingos en el estacionamiento del Lago del Fuerte a menos que se aclare lo contrario.</br>
		En cambio las actividades realizadas fuera de la ciudad por lo general abarcan sabado y domingo con horario de salida y regreso a coordinarse previamente por parte de los participantes.</p>
	</section>
</article>
<!--//// JS DE LA TABLA DE ACTIVIDADES ////-->
	<script type="text/javascript" src="js/actividades.js"></script>