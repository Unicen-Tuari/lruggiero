<article>
	<h1>GESTOR DE NOTICIAS</h1>
	<section>
		<div class="page-header cabecera-seccion">
			<h2>Categorias</h2>
		</div>
		<h3>Completa el Formulario para Poder Agregar una Nueva Categoria</h3>
		<div class="gestor-admin">
			<form class="form-horizontal" role="form" action="index.php?action=agregarCategoria" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<input class="form-control" type="text" maxlength="40" id="categoria" name="categoria" placeholder="Nombre de la Categoria">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<button type="reset" class="btn btn-danger">Restablecer</button>
						<button type="submit" class="btn btn-success">Agregar Categoria</button>
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
			<form class="form-horizontal" role="form" action="index.php?action=agregarNoticia" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<select id="categoria" name="categoria">
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
						<input class="form-control" type="text" maxlength="80" id="titulo" name="titulo" placeholder="Titulo de la Noticia">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<textarea class="form-control" maxlength="5000" rows="8" id="contenido" name="contenido" placeholder="Texto de la Noticia"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<input class="btn btn-default" type="file" name="imagen">
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<button type="reset" class="btn btn-danger">Restablecer</button>
						<button type="submit" class="btn btn-success">Agregar Noticia</button>
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
						<th>TITULO</th>
						<th>CONTENIDO</th>
						<th>IMAGEN</th>
						<th>FECHA</th>
						<th>HORA</th>
					</tr>
				</thead>
				<tbody>
					{if !empty($noticias)}
						{foreach $noticias as $noticia}
							<tr>
								<td>{$noticia.id}</td>
								<td>{$noticia.nombreCategoria}</td>
								<td>{$noticia.titulo}</td>
								<td><button type="button" class="btn btn-default">Ver</button></td>
								<td><a href="{$noticia.imagen}" target=""><button type="button" class="btn btn-default">Ver</button></a></td>
								<td>{$noticia.fecha}</td>
								<td>{$noticia.hora}</td>
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