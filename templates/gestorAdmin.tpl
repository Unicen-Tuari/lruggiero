<article>
	<h1>GESTOR DE NOTICIAS</h1>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Categorias</h2>
		</div>
		<h3>Completa el Formulario para Poder Agregar una Nueva Categoria</h3>
		<div class="gestor-admin">
			<form id="form_categoria" class="form-horizontal" role="form">
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<input class="form-control" type="text" maxlength="40" id="categoria" name="categoria" placeholder="Nombre de la Categoria (Minimo 5 Caracteres)">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<button type="reset" class="btn btn-danger">Restablecer</button>
						<button type="submit" class="btn btn-success" id="agregarCategoria" disabled="disabled">Agregar Categoria</button>
					</div>
				</div>
			</form>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-condensed tabla">
				<thead>
					<tr>
						<th>ID</th>
						<th>CATEGORIA</th>
					</tr>
				</thead>
				<tbody>
					{if !empty($categorias)}
						{foreach $categorias as $categoria}
							<tr>
								<td>{$categoria.id}</td>
								<td>{$categoria.nombre}</td>
							</tr>
						{/foreach}
					{else}
						<tr>
							<td>No Existen Categorias</td>
						</tr>
					{/if}
				</tbody>
			</table>
		</div>
	</section>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Noticias</h2>
		</div>
		<h3>Completa el Formulario para Poder Agregar una Nueva Noticia</h3>
		<div class="gestor-admin">
			<form  id="form_noticia" class="form-horizontal" role="form">
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<select id="id_categoria" name="id_categoria">
							{if !empty($categorias)}
								<option value="0">Seleccione la Categoria de la Noticia</option>
								{foreach $categorias as $categoria}
									<option value="{$categoria.id}">{$categoria.nombre}</option>
								{/foreach}
							{else}
								<option value="0">No Existen Categorias</option>
							{/if}
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<input class="form-control" type="text" maxlength="80" id="titulo" name="titulo" placeholder="Titulo de la Noticia (Minimo 10 Caracteres)">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<textarea class="form-control" maxlength="5000" rows="8" id="contenido" name="contenido" placeholder="Texto de la Noticia (Minimo 140 Caracteres)"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<input class="btn btn-default" type="file" id="imagenes" name="imagenes[]" multiple>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<button type="reset" class="btn btn-danger">Restablecer</button>
						<button type="submit" class="btn btn-success" id="agregarNoticia" disabled="disabled">Agregar Noticia</button>
					</div>
				</div>
			</form>
			<form id="form_imagen_ajax">
				<input type="file" id="imagenesAjax" name="imagenesAjax[]" multiple>
			</form>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-condensed tabla">
				<thead>
					<tr>
						<th>ID</th>
						<th>CATEGORIA</th>
						<th>TITULO</th>
						<th>IMAGENES</th>
						<th>FECHA</th>
						<th>HORA</th>
						<th>VISUALIZAR</th>
					</tr>
				</thead>
				<tbody>
					{if !empty($noticias)}
						{foreach $noticias as $noticia}
							<tr>
								<td>{$noticia.id}</td>
								<td>{$noticia.nombreCategoria}</td>
								<td>{$noticia.titulo}</td>
								<td>{if isset($noticia.imagenes)}
										{$noticia.imagenes|count} 
									{else}
										0
									{/if}
									<button class="btn btn-default boton-imagen-ajax" value="{$noticia.id}"><span class="glyphicon glyphicon-plus"></span></button></td>
								<td>{$noticia.fecha}</td>
								<td>{$noticia.hora}</td>
								<td><button class="btn btn-default noticia" value="{$noticia.id}">Ver</button></td>
							</tr>
						{/foreach}
					{else}
						<tr>
							<td>No Existen Noticias</td>
						</tr>
					{/if}
				</tbody>
			</table>
		</div>
	</section>
</article>
<!--//// JS DEL GESTOR DEL ADMINISTRADOR////-->
	<script type="text/javascript" src="js/gestorAdmin.js"></script>
<!--//// JS DE LAS NOTICIAS ////-->
	<script type="text/javascript" src="js/noticias.js"></script>