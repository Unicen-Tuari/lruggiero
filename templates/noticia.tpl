<article>
	<h1>NOTICIAS</h1>
		{if !empty($noticia)}
			<section class="noticia">
				<div class="page-header cabecera-seccion">
					<h2>{$noticia.titulo}</h2>
					<h4>Publicado el {$noticia.fecha} a las {$noticia.hora} UTC-03:00 en {$noticia.nombreCategoria}</h4>
				</div>
				{if isset($noticia.imagenes)}
					{if count($noticia.imagenes) > 1}
						<div id="myCarousel2" class="carousel slide" data-ride="carousel">

							<!-- BOTONES SLIDES -->
							<ol class="carousel-indicators">
								{foreach $noticia.imagenes as $key => $imagen}
									{if $key == 0}
										<li data-target="#myCarousel2" data-slide-to="{$key}" class="active"></li>
									{else}
										<li data-target="#myCarousel2" data-slide-to="{$key}"></li>
									{/if}
								{/foreach}
							</ol>
							<!-- FIN BOTONES SLIDES -->

							<!-- IMAGENES SLIDES-->
							<div class="carousel-inner" role="listbox">
								{foreach $noticia.imagenes as $key => $imagen}
									{if $key == 0}
										<div class="item active">
									{else}
										<div class="item">
									{/if}
								 		<img src="{$imagen}" alt="Imagen Noticia">
									</div>
								{/foreach}
							</div>
							<!-- FIN IMAGENES SLIDEES -->
							<a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Anterior</span>
							</a>
							<a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Siguiente</span>
							</a>
						</div>
					{elseif count($noticia.imagenes) > 0}
						<img class="img-responsive" src="{$noticia.imagenes.0}" alt="Imagen Noticia">
					{/if}
				{/if}
				<p>{$noticia.contenido}</p>
			</section>
		{else}
			<section>
				<div class="page-header cabecera-seccion">
					<h2>No Se Pudo Cargar la Noticia</h2>
				</div>
				<p>Sin Contenido</p>
			</section>
		{/if}
</article>