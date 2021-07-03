<div class="mainbox bl1" style="background-image: url(<?php //echo(base_url( 'assets/public/img/productos/productos_hombres_head.png' )); ?> )">
	<div id="headSec">
		<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_head.png' )); ?>" />
	</div>
</div>



<div class="mainbox bl2">
	<div class="basicoR">
		<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_basico.jpg' )); ?>" />
		<img class="over3 oculto" id="overBasico" src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_basico_over.jpg' )); ?>" />
		<a id="btnBasico" href="<?php echo(base_url( 'productos/'.$genero.'/basico' )); ?>"><div class="btnVerMas">Ver más</div></a>
	</div>
	<div class="basicoR">
		<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_personalizado.jpg' )); ?>" />
		<img class="over3 oculto" id="overPersonalizado" src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_personalizado_over.jpg' )); ?>" />
		<a id="btnPersonalizado" href="<?php echo(base_url( 'productos/'.$genero.'/personalizado' )); ?>"><div class="btnVerMas">Ver más</div></a>
	</div>
</div>

<script type="text/javascript">
	let overGeneros = true;
</script>
