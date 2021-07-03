<?php
	$prenda = new stdClass;
	
	if(isset($baseDB)){
		if(property_exists($baseDB, 'tipo_corte')){
			$prenda->corte = [];
			//$prenda->corte[] = "Fit";
			$cortes = explode(",", $baseDB->tipo_corte);
			foreach ($cortes as $i=>$v) {
				$prenda->corte[] = trim($v);
			}
		}
	}
	
	
	
	
	$prenda->estampados = [];
	
	if(isset($estampadosDB)){
		if(property_exists($estampadosDB, 'portada')){
			foreach ($estampadosDB->portada->clone as $i=>$v) {
				$estampados = new stdClass;
				$estampados->titulo = $v->estampado_name;
				$estampados->imagen = "imagen";
				
				$val = "";
				$fotoName = "portada";
				if(is_object($estampadosDB->imgs->{$fotoName})){
					$num = strval($i+1);
					if(isset($estampadosDB->imgs->{$fotoName}->{$num})){
						$val = $estampadosDB->imgs->{$fotoName}->{$num};
					}
				}
				if(is_array($estampadosDB->imgs->{$fotoName})){
					if(isset($estampadosDB->imgs->{$fotoName}[(int)$i])){
						$val = $estampadosDB->imgs->{$fotoName}[(int)$i];
					}
				}
				if($val !== ""){
					$estampados->portada = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/frente/estampado/'.$val );
				}
				
				$estampados->modelos = [];
					for ($im = 1; $im <= 4; $im++) {
						$modelos = new stdClass;
						$modelos->titulo = "Modelo ".$im;
						$val = "";
						$fotoName = "model".$im;
						if(is_object($estampadosDB->imgs->{$fotoName})){
							$num = strval($i+1);
							if(isset($estampadosDB->imgs->{$fotoName}->{$num})){
								$val = $estampadosDB->imgs->{$fotoName}->{$num};
							}
						}
						if(is_array($estampadosDB->imgs->{$fotoName})){
							if(isset($estampadosDB->imgs->{$fotoName}[(int)$i])){
								$val = $estampadosDB->imgs->{$fotoName}[(int)$i];
							}
						}
						if($val !== ""){
							$modelos->imagen = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/frente/estampado/'.$val );
							$estampados->modelos[] = $modelos;
						}
						
					}
					
				$estampados->modelosP = [];
					for ($im = 1; $im <= 4; $im++) {
						$modelosP = new stdClass;
						$modelosP->titulo = "Prenda del Modelo ".$im;
						$val = "";
						$fotoName = "model".$im."p";
						if(is_object($estampadosDB->imgs->{$fotoName})){
							$num = strval($i+1);
							if(isset($estampadosDB->imgs->{$fotoName}->{$num})){
								$val = $estampadosDB->imgs->{$fotoName}->{$num};
							}
						}
						if(is_array($estampadosDB->imgs->{$fotoName})){
							if(isset($estampadosDB->imgs->{$fotoName}[(int)$i])){
								$val = $estampadosDB->imgs->{$fotoName}[(int)$i];
							}
						}
						if($val !== ""){
							$modelosP->imagen = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/frente/estampado/'.$val );
							$estampados->modelosP[] = $modelosP;
						}
						
					}
					
					
				$prenda->estampados[] = $estampados;
			}
		}
	}
	
	
	
	if(isset($lateral_estampadosDB)){
		//print_r($lateral_estampadosDB);
		if(property_exists($lateral_estampadosDB, 'model1p_lateral')){
			foreach ($lateral_estampadosDB->model1p_lateral->clone as $i=>$v) {
				$estampados = new stdClass;
				//$estampados->titulo = $v->lateral_estampado_name;
				//$estampados->imagen = "imagen";
				
				$val = "";
				
				$estampados->modelosP = [];
					for ($im = 1; $im <= 4; $im++) {
						$modelosP = new stdClass;
						$modelosP->titulo = "Prenda del Modelo ".$im;
						$val = "";
						$fotoName = "model".$im."p_lateral";
						if(is_object($lateral_estampadosDB->imgs->{$fotoName})){
							$num = strval($i+1);
							if(isset($lateral_estampadosDB->imgs->{$fotoName}->{$num})){
								$val = $lateral_estampadosDB->imgs->{$fotoName}->{$num};
							}
						}
						if(is_array($lateral_estampadosDB->imgs->{$fotoName})){
							if(isset($lateral_estampadosDB->imgs->{$fotoName}[(int)$i])){
								$val = $lateral_estampadosDB->imgs->{$fotoName}[(int)$i];
							}
						}
						if($val !== ""){
							$modelosP->imagen = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/lateral/estampado/'.$val );
							$estampados->modelosP[] = $modelosP;
						}
						
					}
					
					
				$prenda->estampados_lateral[] = $estampados;
				//print_r($prenda->estampados_lateral);
			}
		}
	}
	
	
	
	if(isset($espalda_estampadosDB)){
		//print_r($lateral_estampadosDB);
		if(property_exists($espalda_estampadosDB, 'model1p_espalda')){
			foreach ($espalda_estampadosDB->model1p_espalda->clone as $i=>$v) {
				$estampados = new stdClass;
				//$estampados->titulo = $v->lateral_estampado_name;
				//$estampados->imagen = "imagen";
				
				$val = "";
				
				$estampados->modelosP = [];
					for ($im = 1; $im <= 4; $im++) {
						$modelosP = new stdClass;
						$modelosP->titulo = "Prenda del Modelo ".$im;
						$val = "";
						$fotoName = "model".$im."p_espalda";
						if(is_object($espalda_estampadosDB->imgs->{$fotoName})){
							$num = strval($i+1);
							if(isset($espalda_estampadosDB->imgs->{$fotoName}->{$num})){
								$val = $espalda_estampadosDB->imgs->{$fotoName}->{$num};
							}
						}
						if(is_array($espalda_estampadosDB->imgs->{$fotoName})){
							if(isset($espalda_estampadosDB->imgs->{$fotoName}[(int)$i])){
								$val = $espalda_estampadosDB->imgs->{$fotoName}[(int)$i];
							}
						}
						if($val !== ""){
							$modelosP->imagen = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/espalda/estampado/'.$val );
							$estampados->modelosP[] = $modelosP;
						}
						
					}
					
					
				$prenda->estampados_espalda[] = $estampados;
				//print_r($prenda->estampados_espalda);
			}
		}
	}
	
	
	
	
	
	if(isset($colorDB)){
		if(property_exists($colorDB, 'prenda')){
			$prenda->sombra = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/frente/color/'.$colorDB->imgs->sombra );//$colorDB->imgs->sombra;
			$prenda->color = [];
			//$prenda->color[] = "Equipo 1";
			foreach ($colorDB->prenda->clone as $i=>$v) {
				$prendacolor = new stdClass;
				$prendacolor->nombre = $v->color_name;
				$prendacolor->color = $v->color_valor;
				$prendacolor->imagen = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/frente/color/'.$colorDB->imgs->prenda[$i] );
				
				$prenda->color[] = $prendacolor;
			}
		}
	}
	
	
	if(isset($lateral_colorDB)){
		//print_r($lateral_colorDB);
		if(property_exists($lateral_colorDB, 'prenda_lateral')){
			$prenda->sombra_lateral = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/lateral/color/'.$lateral_colorDB->imgs->sombra_lateral );//$lateral_colorDB->imgs->sombra_lateral;
			$prenda->color_lateral = [];
			foreach ($lateral_colorDB->prenda_lateral->clone as $i=>$v) {
				$prendacolor = new stdClass;
				$prendacolor->nombre = $v->lateral_color_name;
				$prendacolor->imagen = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/lateral/color/'.$lateral_colorDB->imgs->prenda_lateral[$i] );
				
				$prenda->color_lateral[] = $prendacolor;
			}
			//print_r($prenda->color_lateral);
		}
	}
	
	
	if(isset($espalda_colorDB)){
		//print_r($espalda_colorDB);
		if(property_exists($espalda_colorDB, 'prenda_espalda')){
			$prenda->sombra_espalda = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/espalda/color/'.$espalda_colorDB->imgs->sombra_espalda );//$espalda_colorDB->imgs->sombra_espalda;
			$prenda->color_espalda = [];
			//$prenda->color[] = "Equipo 1";
			foreach ($espalda_colorDB->prenda_espalda->clone as $i=>$v) {
				$prendacolor = new stdClass;
				$prendacolor->nombre = $v->espalda_color_name;
				$prendacolor->imagen = base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/espalda/color/'.$espalda_colorDB->imgs->prenda_espalda[$i] );
				
				$prenda->color_espalda[] = $prendacolor;
			}
		}
	}
	
	
	
	if(isset($baseDB)){
		if(property_exists($baseDB, 'tipo_ubicacion')){
			$prenda->ubicacion = [];
			//$prenda->corte[] = "Fit";
			$cortes = explode(",", $baseDB->tipo_ubicacion);
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
	
	
	$prenda->tipografia = [];
	$prenda->tipografia[] = "Arial";
	$prenda->tipografia[] = "serif";
	$prenda->tipografia[] = "Dreamwalker";
	$prenda->tipografia[] = "Leto";

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
			<div id="prendaVistas">
				<div id="vistaFrente">Frente</div>
				<div id="vistaLateral">Lateral</div>
				<div id="vistaEspalda">Espalda</div>
			</div>
			
			<div class="boxAllEffect">
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
					<div class="posDerecha">
						<span></span>
					</div>
					<div class="posIzquierda">
						<span></span>
					</div>
				</div>
				
				<div id="prendaSombra" class="">
					<img src="<?php echo($prenda->sombra ); ?>" />
				</div>
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
					<div class="optionTitulo">Color</div>
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
									<div class="prendaColeccionImg" style="background-image: url(<?php echo( base_url( 'assets/public/img/'.$genero.'/'.$valorA.'/frente/estampado/sinColeccion.png' ) ); ?>)">
										 
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