<!-- Pagina QUIENES SOMOS -->
<div class="mainbox bl1" style="background-image: url(<?php echo(base_url( 'assets/public/img/somos/'.@$somosDB->titulo_fondo )); ?> )">
	<h2 class="titulo"><span class="onlyDesktop">&nbsp;&nbsp;</span><?php echo(@$somosDB->titulo_general); ?></h2>
</div>



<!-- Pagina Servicios INTRO -->
<div class="mainbox bl2">
	<p class="intro"><?php echo(@$somosDB->intro); ?></p>
</div>


<!-- Pagina Servicios INTRO -->
<div class="mainbox bl3">
	<div class="linea">
		<div id="galeriav" class="galeria">
			<div class="slideMain">
				<main class="slideItems">
					<?php
					foreach ($somosDB->galeriav as $i=>$v) {
						?>
						<article class="slideLine" style="background-image: url(<?php echo( base_url('assets/public/img/somos/'.$v->fotov) ); ?>)">
							
						</article>
						<?php
					}
					?>
				</main>
			</div>
		</div>
		
		<div class="bloques">
			<article class="item">
				<div class="info">
					<h4 class="servicioTitulo">VISIÓN</h4>
					<p class="texto"><?php echo(@$somosDB->vision); ?></p>
				</div>
			</article>
		</div>
	</div>
	
	<div class="linea">
		<div class="bloques">
			<article class="item">
				<div class="info">
					<h4 class="servicioTitulo">MISIÓN</h4>
					<p class="texto"><?php echo(@$somosDB->mision); ?></p>
				</div>
			</article>
		</div>
		
		<div id="galeriam" class="galeria">
			<div class="slideMain">
				<main class="slideItems">
					<?php
					foreach ($somosDB->galeriam as $i=>$v) {
						?>
						<article class="slideLine" style="background-image: url(<?php echo( base_url('assets/public/img/somos/'.$v->fotom) ); ?>)">
							
						</article>
						<?php
					}
					?>
				</main>
			</div>
		</div>
	</div>
</div>




<!-- Pagina Bloques de informacion -->
<div class="mainbox bl4">
	<div class="info1">
		<article class="slideLine" style="background-image: url(<?php echo( base_url('assets/public/img/somos/'.@$somosDB->texto1_imagen) ); ?>)">
			
		</article>
		
		<article class="item">
			<div class="info">
				<h4 class="servicioTitulo"><?php echo(@$somosDB->titulo1); ?></h4>
				<p class="texto"><?php echo(@$somosDB->texto1); ?></p>
			</div>
		</article>
	</div>
	
	<div class="info2">
		<article class="slideLine" style="background-image: url(<?php echo( base_url('assets/public/img/somos/'.@$somosDB->texto2_imagen) ); ?>)">
			
		</article>
		
		<article class="item">
			<div class="info">
				<h4 class="servicioTitulo"><?php echo(@$somosDB->titulo2); ?></h4>
				<p class="texto"><?php echo(@$somosDB->texto2); ?></p>
			</div>
		</article>
	</div>
</div>






