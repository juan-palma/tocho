<!-- sección HOME INICIO -->
<div class="mainbox bl1" style="background-image: url(<?php echo(base_url( 'assets/public/img/home_bl1_fondo.jpg' )); ?> )">
	<div class="homeTitulo"><?php echo(@$inicioDB->inicio_titulo); ?></div>
	<div class="homeSubtext"><?php echo(@$inicioDB->inicio_subtexto); ?></div>
</div>





<!-- sección HOME QUINES SOMOS -->
<div class="mainbox bl2" style="background-image: url(<?php /* echo(base_url( 'assets/public/img/home_bl1_fondo.jpg' )); */ ?> )">
	<div class="somosTitulo"><?php echo(@$somosDB->titulo); ?></div>
	<div class="somosTexto"><?php echo(@$somosDB->texto); ?></div>
	<a href="<?php echo( base_url('quienes_somos') ); ?>" target="_self"><div class="somosTextoBtn btnVerMas"><?php echo(@$somosDB->textoBtn); ?></div></a>
</div>





<!-- sección HOME SERVICIOS -->
<section id="servicios" class="mainbox bl3">
	<div class="box2">
		<?php
			if(property_exists($serviciosDB, "titulo") && $serviciosDB->titulo !== ''){
		?>
			<h1 class="titulos colDin1"><?php echo($serviciosDB->titulo); ?></h1>
		<?php
			}
		?>
		<main class="contenedor">
			<?php
			foreach ($serviciosDB->servicios as $i=>$v) {
				?>
				<article class="servicioItem">
					<div class="icono">
						<img src="<?php echo( base_url('assets/public/img/servicios/'.$v->icono) ); ?>" alt="servicio_icono_<?php echo($v->icono); ?>" />
					</div>
					<h4 class="servicioTitulo"><?php echo($v->titulo); ?></h4>
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
		<a href="<?php echo( base_url('servicios') ); ?>" target="_self"><div class="servicioTextoBtn btnVerMas"><?php echo(@$serviciosDB->textoBtn); ?></div></a>
	</div>
</section>






<!-- sección HOME PORTAFOLIO -->
<section id="portafolios" class="mainbox bl4">
	<div class="slideMain">
		<main class="slideItems">
			<?php
			foreach ($portafolioDB->portafolios as $i=>$v) {
				?>
				<article class="slideLine" style="background-image: url(<?php echo( base_url('assets/public/img/portafolios/'.$v->imagen) ); ?>)">
					<div class="contenedor">
					<?php
						if(property_exists($portafolioDB, "titulo") && $portafolioDB->titulo !== ''){
					?>
						<h5 class="portafolioTitulos"><?php echo($portafolioDB->titulo); ?></h5>
					<?php
						}
					?>
					<?php
						if(property_exists($v, "nombre") && $v->nombre !== ''){
					?>
						<h2 class="nombreProyecto"><?php echo($v->nombre); ?></h2>
					<?php
						}
					?>
					</div>
					
					<a href="<?php echo(base_url('portafolio/articulo/'.url_title(@$v->enlace))); ?>" target="_self"><div class="portafolioTextoBtn btnVerMas"><?php echo(@$portafolioDB->textoBtn); ?></div></a>
				</article>
				<?php
			}
			?>
		</main>
	</div>
</section>







<!-- sección HOME CLIENTES -->
<section id="clientes" class="mainbox bl5">
	<div class="slideMain">
		<?php
			if(property_exists($clientesDB, "titulo_general") && $clientesDB->titulo_general !== ''){
		?>
			<h4 class="clienteTitulos"><?php echo($clientesDB->titulo_general); ?></h4>
		<?php
			}
		?>
					
		<main class="slideItems">
			<?php
			foreach ($clientesDB->logos as $i=>$v) {
				?>
				<div class="logo">
					<img src="<?php echo( base_url('assets/public/img/clientes/'.$v->logo) ); ?>" />
				</div>
				<?php
			}
			?>
		</main>
	</div>
</section>








