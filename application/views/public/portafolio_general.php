<!-- sección Portafolios General TITULO -->
<div class="mainbox bl1" style="background-image: url(<?php echo(base_url( 'assets/public/img/portafolios/'.@$portafoliosDB->fondo_titulo )); ?> )">
	<h1 class="titulo"><span class="onlyDesktop">&nbsp;</span><?php echo(@$portafoliosDB->titulo_general); ?></h1>
</div>

<div class="mainbox bl2">
	<main class="contenedor">
		<?php
		foreach ($portafoliosDB->portafolios as $i=>$v) {
			?>
			<article class="item" style="background-image: url(<?php echo(base_url( 'assets/public/img/portafolios/'.@$v->foto )); ?> )">
				<h4 class="servicioTitulo"><?php echo($v->titulo_general); ?></h4>
				
				<div class="enlace">
					<input type="button" onclick="window.location.href = '<?php echo(base_url('portafolio/articulo/'.url_title($v->enlace) )); ?>'" value="+"></input>
				</div>
<!--
				<div class="texto"><span><?php echo($v->texto); ?></span></div>
				<div class="enlace">
					<input type="button" onclick="window.location.href = '<?php echo(base_url('servicios/articulo/'.url_title($v->enlace) )); ?>'" value="ver más"></input>
				</div>
-->
			</article>
			<?php
		}
		?>
	</main>
</div>