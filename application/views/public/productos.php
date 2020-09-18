<?php
	if($area !== 0 && $valorA !== 0){
		?>
		
		<?php
	} else if($area !== 0){
		?>
			<div class="mainbox bl1" style="background-image: url(<?php //echo(base_url( 'assets/public/img/productos/productos_hombres_head.png' )); ?> )">
				<div id="headSec">
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_'.$area.'_head.png' )); ?>" />
				</div>
				<div class="ligaRapida">
					<a href="<?php echo(base_url()); ?>">home > </a>
					<a href="<?php echo(base_url( 'productos/'.$genero )); ?>"><?php echo($genero); ?> > </a>
					<?php echo($area); ?>
				</div>
			</div>
			
			<div class="mainbox bl2 bl2p">
				<div class="basicoP">
					<?php $prenda = "body"; ?>
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_'.$area.'_'.$prenda.'.png' )); ?>" />
					<a href="<?php echo(base_url( 'productos/'.$genero.'/'.$area.'/'.$prenda )); ?>"><div class="btnVerMas">Ver más</div></a>
				</div>
				<div class="basicoP">
					<?php $prenda = "licra"; ?>
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_'.$area.'_'.$prenda.'.png' )); ?>" />
					<a href="<?php echo(base_url( 'productos/'.$genero.'/'.$area.'/'.$prenda )); ?>"><div class="btnVerMas">Ver más</div></a>
				</div>
				<div class="basicoP">
					<?php $prenda = "short"; ?>
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_'.$area.'_'.$prenda.'.png' )); ?>" />
					<a href="<?php echo(base_url( 'productos/'.$genero.'/'.$area.'/'.$prenda )); ?>"><div class="btnVerMas">Ver más</div></a>
				</div>
				<div class="basicoP">
					<?php $prenda = "playera"; ?>
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_'.$area.'_'.$prenda.'.png' )); ?>" />
					<a href="<?php echo(base_url( 'productos/'.$genero.'/'.$area.'/'.$prenda )); ?>"><div class="btnVerMas">Ver más</div></a>
				</div>
				<div class="basicoP">
					<?php $prenda = "sudadera"; ?>
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_'.$area.'_'.$prenda.'.png' )); ?>" />
					<a href="<?php echo(base_url( 'productos/'.$genero.'/'.$area.'/'.$prenda )); ?>"><div class="btnVerMas">Ver más</div></a>
				</div>
			</div>
		<?php
	} else{
		?>
			<div class="mainbox bl1" style="background-image: url(<?php //echo(base_url( 'assets/public/img/productos/productos_hombres_head.png' )); ?> )">
				<div id="headSec">
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_head.png' )); ?>" />
				</div>
			</div>
			
			
			
			<div class="mainbox bl2">
				<div class="basicoR">
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_basico.jpg' )); ?>" />
					<a href="<?php echo(base_url( 'productos/'.$genero.'/basico' )); ?>"><div class="btnVerMas">Ver más</div></a>
				</div>
				<div class="basicoR">
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_personalizado.jpg' )); ?>" />
					<a href="<?php echo(base_url( 'productos/'.$genero.'/personalizado' )); ?>"><div class="btnVerMas">Ver más</div></a>
				</div>
			</div>
		<?php
	}
?>

			