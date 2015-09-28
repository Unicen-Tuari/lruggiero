<article>
	<h1>NOTICIAS</h1>
		{if !empty($noticias)}
			{foreach $noticias as $noticia}
				<section>
					<div class="page-header cabecera-seccion">
						<h2>{$noticia.titulo}</h2>
						<h4>Publicado el {$noticia.fecha} a las {$noticia.hora} UTC-03:00 en {$noticia.nombreCategoria}</h4>
					</div>
					<p>{$noticia.contenido|truncate:500:" ... <button id=\"noticia\" class=\"btn btn-success\" value=\"{$noticia.id}\">Leer Mas</button>"}</p>
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
	<script type="text/javascript" src="js/noticias.js"></script>