<?php
	$prenda = new stdClass;
	$prenda->estampados = [];
	
	$estampados = new stdClass;
	$estampados->titulo = "Colección 1";
	$estampados->imagen = "imagen";
		$estampados->modelos = [];
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 1";
			$modelos->imagen = base_url( 'assets/public/img/productos/prenda_hombres_sudaderas_equipo1_m1.jpg' );
			$estampados->modelos[] = $modelos;
			
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 2";
			$modelos->imagen = base_url( 'assets/public/img/productos/prenda_hombres_sudaderas_equipo1_m2.jpg' );
			$estampados->modelos[] = $modelos;
			
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 3";
			$modelos->imagen = base_url( 'assets/public/img/productos/prenda_hombres_sudaderas_equipo1_m3.jpg' );
			$estampados->modelos[] = $modelos;
			
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 4";
			$modelos->imagen = base_url( 'assets/public/img/productos/prenda_hombres_sudaderas_equipo1_m4.jpg' );
			$estampados->modelos[] = $modelos;
	$prenda->estampados[] = $estampados;
	
	$estampados = new stdClass;
	$estampados->titulo = "Colección 2";
	$estampados->imagen = "imagen2";
		$estampados->modelos = [];
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 1";
			$modelos->imagen = "imagenm";
			$estampados->modelos[] = $modelos;
			
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 2";
			$modelos->imagen = "imagenm";
			$estampados->modelos[] = $modelos;
			
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 3";
			$modelos->imagen = "imagenm";
			$estampados->modelos[] = $modelos;
			
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 4";
			$modelos->imagen = "imagenm";
			$estampados->modelos[] = $modelos;
	$prenda->estampados[] = $estampados;
	
	$estampados = new stdClass;
	$estampados->titulo = "Colección 3";
	$estampados->imagen = "imagen3";
		$estampados->modelos = [];
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 1";
			$modelos->imagen = "imagenm";
			$estampados->modelos[] = $modelos;
			
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 2";
			$modelos->imagen = "imagenm";
			$estampados->modelos[] = $modelos;
			
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 3";
			$modelos->imagen = "imagenm";
			$estampados->modelos[] = $modelos;
			
			$modelos = new stdClass;
			$modelos->titulo = "Modelo 4";
			$modelos->imagen = "imagenm";
			$estampados->modelos[] = $modelos;
	$prenda->estampados[] = $estampados;
		
	
	$prenda->equipo = [];
	$prenda->equipo[] = "Equipo 1";
	$prenda->equipo[] = "Equipo 2";
	$prenda->equipo[] = "Equipo 3";
	$prenda->equipo[] = "Equipo 4";
	$prenda->equipo[] = "Equipo 5";
	
	$prenda->liga = [];
	$prenda->liga[] = "Liga 1";
	$prenda->liga[] = "Liga 2";
	$prenda->liga[] = "Liga 3";
	$prenda->liga[] = "Liga 4";
	$prenda->liga[] = "Liga 5";
	
	
	$prenda->ubicacion = [];
	$prenda->ubicacion[] = "centro";
	$prenda->ubicacion[] = "derecha";
	$prenda->ubicacion[] = "izquierda";
	$prenda->ubicacion[] = "lateral";
	
	
	$prenda->tipografia = [];
	$prenda->tipografia[] = "Arial";
	$prenda->tipografia[] = "serif";
	$prenda->tipografia[] = "Dreamwalker";
	$prenda->tipografia[] = "Leto";
	
	
	
	if($area !== 0 && $valorA !== 0){
		?>
			<script type="text/javascript">
				var prendaSi = true;
				var genero = "<?php echo($genero); ?>";
				var area = "<?php echo($area); ?>";
				var valorA = "<?php echo($valorA); ?>";
				var prenda = {};
				prenda.estampado = <?php print_r(json_encode($prenda->estampados)); ?>
			</script>
			
			<div id="prenda_inter_fondo" style="background-image: url(<?php echo(base_url( 'assets/public/img/productos/prendas_fondo.jpg' )); ?> )">
				<div class="mainbox bl1 bl1pi" style="background-image: url(<?php //echo(base_url( 'assets/public/img/productos/productos_hombres_head.png' )); ?> )">
					<h1><?php echo($valorA); ?></h1>
				</div>
				
				<div class="mainbox bl3 bl3pi">
					<div id="prendaI"></div>
					<div id="prendaV">
						<div id="prendaVDinamica"></div>
						<div id="prendaVFija">
							<div class="mainBoxOption">
								<div class="optionTitulo">Estampados</div>
								<div class="optionBoxColValores">
									<?php
										foreach($prenda->estampados as $i=>$e){
											?>
											<div class="prendaBoxColeccion">
												<div class="prendaColeccionImg" style="background-image: url(<?php echo(base_url( 'assets/public/img/productos/prenda_hombres_sudaderas_equipo'.($i+1).'.jpg' )); ?>)">
 												<!--	<img src="<?php echo($e->imagen) ?>" /> -->
												</div>
												<div class="prendaColeccionTitulo"><?php echo($e->titulo) ?></div>
											</div>
											<?php
										}
									?>
								</div>
								<div id="valoresBoxColeccionModelos">
									
								</div>
							</div>
							
							
							<div class="mainBoxOptionCol">
								<div class="bl bl1">
									<div class="mainBoxOption">
										<div class="optionTitulo">Nombre</div>
										<div class="optionBoxMainValores">
											<input type="text" name="nombre"></input>
										</div>
									</div>
									
									<div class="mainBoxOption">
										<div class="optionTitulo">Número</div>
										<div class="optionBoxMainValores">
											<input type="text" name="numero"></input>
										</div>
									</div>
									
									<div class="mainBoxOption">
										<div class="optionTitulo">Tipografía</div>
										<div class="optionBoxMainValores">
											<select name="tipografia">
											<?php
												foreach($prenda->tipografia as $o){
													?>
													<option value="<?php echo($o) ?>"><?php echo($o) ?></option>
													<?php
												}
											?>
											</select>
										</div>
									</div>
								</div>
								
								<div class="bl bl1">
									<div class="mainBoxOption">
										<div class="optionTitulo">Logo</div>
										<div class="optionBoxMainValores">
											<input type="file" name="logo"></input>
										</div>
									</div>
									
									<div class="mainBoxOption">
										<div class="optionTitulo">Ubicación</div>
										<div class="optionBoxMainValores">
											<select name="ubicacion">
											<?php
												foreach($prenda->ubicacion as $o){
													?>
													<option value="<?php echo($o) ?>"><?php echo($o) ?></option>
													<?php
												}
											?>
											</select>
										</div>
									</div>
								</div>
							</div>
							
							<div class="mainBoxOption">
								<div class="optionBoxMainValores">
									<select name="Equipo">
										<?php
											foreach($prenda->equipo as $o){
												?>
												<option value="<?php echo($o) ?>"><?php echo($o) ?></option>
												<?php
											}
										?>
									</select>
								</div>
								
								<div class="optionBoxMainValores">
									<select name="liga">
										<?php
											foreach($prenda->liga as $o){
												?>
												<option value="<?php echo($o) ?>"><?php echo($o) ?></option>
												<?php
											}
										?>
									</select>
								</div>
								
								<div class="optionBoxMainValores">
									<input type="submit" value="Guardar"></input>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
					<a href="<?php echo(base_url( 'productos/'.$genero.'/'.$area.'/'.$prenda )); ?>"><div class="btnVerMas">Personalizar</div></a>
				</div>
				<div class="basicoP">
					<?php $prenda = "licra"; ?>
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_'.$area.'_'.$prenda.'.png' )); ?>" />
					<a href="<?php echo(base_url( 'productos/'.$genero.'/'.$area.'/'.$prenda )); ?>"><div class="btnVerMas">Personalizar</div></a>
				</div>
				<div class="basicoP">
					<?php $prenda = "short"; ?>
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_'.$area.'_'.$prenda.'.png' )); ?>" />
					<a href="<?php echo(base_url( 'productos/'.$genero.'/'.$area.'/'.$prenda )); ?>"><div class="btnVerMas">Personalizar</div></a>
				</div>
				<div class="basicoP">
					<?php $prenda = "playera"; ?>
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_'.$area.'_'.$prenda.'.png' )); ?>" />
					<a href="<?php echo(base_url( 'productos/'.$genero.'/'.$area.'/'.$prenda )); ?>"><div class="btnVerMas">Personalizar</div></a>
				</div>
				<div class="basicoP">
					<?php $prenda = "sudadera"; ?>
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_'.$area.'_'.$prenda.'.png' )); ?>" />
					<a href="<?php echo(base_url( 'productos/'.$genero.'/'.$area.'/'.$prenda )); ?>"><div class="btnVerMas">Personalizar</div></a>
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
					<img class="over3 oculto" id="overBasico" src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_basico_over.jpg' )); ?>" />
					<a id="btnBasico" href="<?php echo(base_url( 'productos/'.$genero.'/basico' )); ?>"><div class="btnVerMas">Ver más</div></a>
				</div>
				<div class="basicoR">
					<img src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_personalizado.jpg' )); ?>" />
					<img class="over3 oculto" id="overPersonalizado" src="<?php echo(base_url( 'assets/public/img/productos/productos_'.$genero.'_personalizado_over.jpg' )); ?>" />
					<a id="btnPersonalizado" href="<?php echo(base_url( 'productos/'.$genero.'/personalizado' )); ?>"><div class="btnVerMas">Ver más</div></a>
				</div>
			</div>
		<?php
	}
?>

			