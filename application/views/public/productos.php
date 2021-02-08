<?php
	$prenda = new stdClass;
	$prenda->estampados = [];
	
	//print_r($sudadera_generalDB);
	//print_r($sudadera_colorDB);
	//print_r($sudadera_estampadosDB);
	
	if(isset($sudadera_estampadosDB)){
		if(property_exists($sudadera_estampadosDB, 'portada')){
			foreach ($sudadera_estampadosDB->portada->clone as $i=>$v) {
				$estampados = new stdClass;
				$estampados->titulo = $v->sudadera_estampado_name;
				$estampados->imagen = "imagen";
				
				$val = "";
				$fotoName = "portada";
				if(is_object($sudadera_estampadosDB->imgs->{$fotoName})){
					$num = strval($i+1);
					if(isset($sudadera_estampadosDB->imgs->{$fotoName}->{$num})){
						$val = $sudadera_estampadosDB->imgs->{$fotoName}->{$num};
					}
				}
				if(is_array($sudadera_estampadosDB->imgs->{$fotoName})){
					if(isset($sudadera_estampadosDB->imgs->{$fotoName}[(int)$i])){
						$val = $sudadera_estampadosDB->imgs->{$fotoName}[(int)$i];
					}
				}
				if($val !== ""){
					$estampados->portada = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/estampado/'.$val );
				}
				
				$estampados->modelos = [];
					for ($im = 1; $im <= 4; $im++) {
					    $modelos = new stdClass;
						$modelos->titulo = "Modelo ".$im;
						$val = "";
						$fotoName = "model".$im;
						if(is_object($sudadera_estampadosDB->imgs->{$fotoName})){
							$num = strval($i+1);
							if(isset($sudadera_estampadosDB->imgs->{$fotoName}->{$num})){
								$val = $sudadera_estampadosDB->imgs->{$fotoName}->{$num};
							}
						}
						if(is_array($sudadera_estampadosDB->imgs->{$fotoName})){
							if(isset($sudadera_estampadosDB->imgs->{$fotoName}[(int)$i])){
								$val = $sudadera_estampadosDB->imgs->{$fotoName}[(int)$i];
							}
						}
						if($val !== ""){
							$modelos->imagen = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/estampado/'.$val );
							$estampados->modelos[] = $modelos;
						}
						
					}
					
				$estampados->modelosP = [];
					for ($im = 1; $im <= 4; $im++) {
					    $modelosP = new stdClass;
						$modelosP->titulo = "Prenda del Modelo ".$im;
						$val = "";
						$fotoName = "model".$im."p";
						if(is_object($sudadera_estampadosDB->imgs->{$fotoName})){
							$num = strval($i+1);
							if(isset($sudadera_estampadosDB->imgs->{$fotoName}->{$num})){
								$val = $sudadera_estampadosDB->imgs->{$fotoName}->{$num};
							}
						}
						if(is_array($sudadera_estampadosDB->imgs->{$fotoName})){
							if(isset($sudadera_estampadosDB->imgs->{$fotoName}[(int)$i])){
								$val = $sudadera_estampadosDB->imgs->{$fotoName}[(int)$i];
							}
						}
						if($val !== ""){
							$modelosP->imagen = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/estampado/'.$val );
							$estampados->modelosP[] = $modelosP;
						}
						
					}
					
					
				$prenda->estampados[] = $estampados;
			}
		}
	}
	
	
	
	if(isset($sudadera_generalDB)){
		if(property_exists($sudadera_generalDB, 'sudadera_tipo_corte')){
			$prenda->corte = [];
			//$prenda->corte[] = "Fit";
			$cortes = explode(",", $sudadera_generalDB->sudadera_tipo_corte);
			foreach ($cortes as $i=>$v) {
				$prenda->corte[] = trim($v);
			}
		}
	}
	
	
	
	if(isset($sudadera_colorDB)){
		if(property_exists($sudadera_colorDB, 'prenda')){
			$prenda->sombra = $sudadera_colorDB->imgs->sombra;
			$prenda->color = [];
			//$prenda->color[] = "Equipo 1";
			foreach ($sudadera_colorDB->prenda->clone as $i=>$v) {
				$prendacolor = new stdClass;
				$prendacolor->nombre = $v->sudadera_color_name;
				$prendacolor->color = $v->sudadera_color_valor;
				$prendacolor->imagen = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/color/'.$sudadera_colorDB->imgs->prenda[$i] );
				
				$prenda->color[] = $prendacolor;
			}
		}
	}
	
	
	
	if(isset($sudadera_generalDB)){
		if(property_exists($sudadera_generalDB, 'sudadera_tipo_ubicacion')){
			$prenda->ubicacion = [];
			//$prenda->corte[] = "Fit";
			$cortes = explode(",", $sudadera_generalDB->sudadera_tipo_ubicacion);
			foreach ($cortes as $i=>$v) {
				$prenda->ubicacion[] = trim($v);
			}
		}
	}
	
		
	
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
	
	
/*
	$prenda->ubicacion = [];
	$prenda->ubicacion[] = "centro";
	$prenda->ubicacion[] = "derecha";
	$prenda->ubicacion[] = "izquierda";
	$prenda->ubicacion[] = "lateral";
*/
	
	
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
				prenda = <?php print_r(json_encode($prenda)); ?>
			</script>
			
			<div id="prenda_inter_fondo" style="background-image: url(<?php echo(base_url( 'assets/public/img/productos/prendas_fondo.jpg' )); ?> )">
				<div class="mainbox bl1 bl1pi" style="background-image: url(<?php //echo(base_url( 'assets/public/img/productos/productos_hombres_head.png' )); ?> )">
					<h1><?php echo($valorA); ?></h1>
				</div>
				
				<div class="mainbox bl3 bl3pi">
					<div id="prendaI">
						<div id="prendaBaseColor" class="prendaSuperPuesta">
 							
						</div>
						
						<div id="prendaEstampado" class="prendaSuperPuesta">
							
						</div>
						
						<div id="prendaLogo" class="prendaSuperPuesta">
							
						</div>
						
						<div id="prendaNumero" class="prendaSuperPuesta">
							<div class="posCentro">
								<span></span>
							</div>
							<div class="posDerecha">
								<span></span>
							</div>
							<div class="posIzquierda">
								<span></span>
							</div>
						</div>
						
						<div id="prendaNombre" class="prendaSuperPuesta">
							<div class="posCentro">
								<span></span>
							</div>
						</div>
						
						<div id="prendaSombra" class="">
							<img src="<?php echo(base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/color/'.$prenda->sombra )); ?>" />
						</div>
					</div>
					
					<div id="prendaV">
						<div id="prendaVDinamica"></div>
						<div id="prendaVFija">
							<div class="mainBoxOptionCorte">
								<div class="optionTitulo">Tipo de Corte</div>
								<div class="optionBoxMainValores">
									<?php
										foreach($prenda->corte as $i=>$e){
											?>
											<div class="">
												<span class="optionValue"><?php echo($e) ?></span>
											</div>
											<?php
										}
									?>
								</div>
							</div>
							
							<div class="mainBoxOptionColor">
								<div class="optionTitulo">Base de sudadera - Color</div>
								<div class="optionBoxMainValores">
									<?php
										foreach($prenda->color as $i=>$e){
											?>
											<div class="miniBoxColor" data-color="<?php echo($e->nombre) ?>">
												<div class="circuloColor" style="background-color:<?php echo($e->color) ?>;"></div>
												<span class="optionValue optionColor"><?php echo($e->nombre) ?></span>
											</div>
											<?php
										}
									?>
								</div>
							</div>
							
							
							<div class="mainBoxOptionEstampado">
								<div class="optionTitulo">Estampados</div>
								<div class="optionBoxColValores">
									<div id="sinEstampado">
										<div class="prendaBoxColeccion">
											<div class="btnPrendaColec">
												<div class="prendaColeccionImg" style="background-image: url(<?php echo( base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/estampado/sinColeccion.png' ) ); ?>)">
 													
												</div>
												<div class="prendaColeccionTitulo">Sin coleccion</div>
											</div>
										</div>
									</div>
									<?php
										foreach($prenda->estampados as $i=>$e){
											?>
											<div class="prendaBoxColeccion">
												<div class="btnPrendaColec">
													<div class="prendaColeccionImg" style="background-image: url(<?php echo($e->portada); ?>)">
	 												<!--	<img src="<?php echo($e->imagen) ?>" /> -->
													</div>
													<div class="prendaColeccionTitulo"><?php echo($e->titulo) ?></div>
												</div>
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
			
			<script type="text/javascript">
				let overGeneros = true;
			</script>
		<?php
	}
?>

			