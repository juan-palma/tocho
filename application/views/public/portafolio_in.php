<!-- Pagina Portafolios ARTICULO -->

<!-- Pagina Portafolios TITULO -->
<div class="mainbox bl1" style="background-image: url(<?php echo(base_url( 'assets/public/img/portafolios/registros/'.@$articuloDB->titulo_fondo )); ?> )">
	<h2 class="titulo"><span class="onlyDesktop">&nbsp;</span><?php echo(@$articuloDB->titulo_general); ?></h2>
	<h1 class="nombre">&nbsp;<?php echo(@$articuloDB->nombre); ?></h1>
</div>



<!-- Pagina Portafolios INTRO -->
<div class="mainbox bl2">
	<p class="intro"><span class="onlyDesktop">&nbsp;</span><?php echo(@$articuloDB->intro); ?></p>
</div>





<!-- Pagina Portafolio BLOQUES DE INFO -->
<div class="mainbox bl3">
	<main class="contenedor">
		<?php
		if(count(@$articuloDB->bloques) > 0){
			foreach (@$articuloDB->bloques as $i=>$v) {
				?>
				<article class="item">
					<div class="img <?php if($v->opcion === 'fondo'){ echo('fondo'); } ?>">
						<div class="recorte">
							<img src="<?php echo(base_url('assets/public/img/portafolios/registros/'.@$v->imagen )); ?>"></img>
						</div>
					</div>
					<div class="info">
						<h4 class="servicioTitulo"><?php echo(@$v->titulo1); ?></h4>
						<p class="texto"><?php echo($v->texto1); ?></p>
					</div>
				</article>
				<?php
			}
		}
		?>
	</main>
</div>






<!-- Pagina Portafolio GALERIA -->
<section id="portafolios" class="mainbox bl4">
	<div class="slideMain">
		<main class="slideItems">
			<?php
			foreach ($articuloDB->galeria as $i=>$v) {
				?>
				<article class="slideLine" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/registros/'.$v->foto) ); ?>)">
<!-- 					<img src="<?php echo( base_url('assets/public/img/portafolios/registros/'.$v->foto) ); ?>"></img> -->
				</article>
				<?php
			}
			?>
		</main>
	</div>
</section>







