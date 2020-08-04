<!-- sección Servicios General TITULO -->
<div class="mainbox bl1" style="background-image: url(<?php echo(base_url( 'assets/public/img/servicios/'.@$serviciosDB->fondo_titulo )); ?> )">
	<h1 class="titulo"><span class="onlyDesktop">&nbsp;</span><?php echo(@$serviciosDB->titulo_general); ?></h1>
</div>

<div class="mainbox bl2">
	<main class="contenedor">
		<?php
		if(count(@$serviciosDB->servicios) > 0){
			foreach (@$serviciosDB->servicios as $i=>$v) {
				?>
				<article class="item">
					<div class="img">
						<img src="<?php echo(base_url('assets/public/img/servicios/'.@$v->foto )); ?>"></img>
					</div>
					<div class="info">
						<div class="icono">
							<img src="<?php echo(base_url('assets/public/img/servicios/'.@$v->icono )); ?>"></img>
						</div>
						
						<h4 class="servicioTitulo"><?php echo(@$v->titulo); ?></h4>
						
						<div class="texto"><span><?php echo($v->texto); ?></span></div>
						
						<div class="enlace">
							<input type="button" onclick="window.location.href = '<?php echo(base_url('servicios/articulo/'.url_title(@$v->enlace) )); ?>'" value="Ver más"></input>
						</div>
					</div>
				</article>
				<?php
			}
		}
		?>
	</main>
</div>