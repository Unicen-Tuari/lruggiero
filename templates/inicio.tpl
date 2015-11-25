<article>
	<h1>NOTICIAS</h1>
		<form  id="form_noticia" class="form-horizontal" role="form">
			<div class="form-group">
				<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
					<select id="id_categoria" name="id_categoria" class="form-control">
						<option selected disabled>Seleccione Para Filtrar Por Categoria</option>
						{if !empty($categorias)}
							<option value="0">Todas</option>
							{foreach $categorias as $categoria}
								<option value="{$categoria.id}">{$categoria.nombre}</option>
							{/foreach}
						{else}
							<option disabled>No Existen Categorias</option>
						{/if}
					</select>
				</div>
			</div>
		</form>
		{if !empty($noticias)}
			{foreach $noticias as $noticia}
				<section>
					<div class="page-header cabecera-seccion">
						<button class="center-block noticia-link ver-noticia" value="{$noticia.id}"><h2>{$noticia.titulo}</h2></button>
						<h4>Publicado el {$noticia.fecha} a las {$noticia.hora} UTC-03:00 en {$noticia.nombreCategoria}</h4>
					</div>
					<p>{$noticia.contenido|truncate:500:"... <button class=\"btn btn-default ver-noticia\" value=\"{$noticia.id}\">Ver Completa</button>"}</p>
				</section>
			{/foreach}
		{else}
			<section>
				<div class="page-header cabecera-seccion">
					<h2>No Existen Noticias</h2>
				</div>
				<p>Sin Contenido</p>
			</section>
		{/if}
</article>
<!--//// JS DE LAS NOTICIAS ////-->
	<script type="text/javascript" src="js/noticiaFull.js"></script>
<!--//// JS DE LAS NOTICIAS ////-->
	<script type="text/javascript" src="js/noticiasCategoria.js"></script>