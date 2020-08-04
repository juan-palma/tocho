<?php
//Datos de formualirio NOSOTROS
$data_registro_titulo_general  =  array ( 
	'name' => 'registros[titulo]',
	'value' => @$somosDB->titulo_general,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_titulo_fondo =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'titulo_fondo'
);
$data_registro_intro  =  array ( 
	'name' => 'registros[intro]',
	'value' => @$somosDB->intro,
	'class' => 'validaciones vc form-control input-lg hl2',
	'autocomplete' => 'off',
	'placeholder' => ''
);



$data_registro_vision  =  array ( 
	'name' => 'registros[vision]',
	'value' => @$somosDB->vision,
	'class' => 'validaciones vc form-control input-lg hl2',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_mision  =  array ( 
	'name' => 'registros[mision]',
	'value' => @$somosDB->mision,
	'class' => 'validaciones vc form-control input-lg hl2',
	'autocomplete' => 'off',
	'placeholder' => ''
);



$data_registro_titulo1  =  array ( 
	'name' => 'registros[titulo1]',
	'value' => @$somosDB->titulo1 ,
	'class' => 'validaciones vc form-control input-lg ',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_texto1  =  array ( 
	'name' => 'registros[texto1]',
	'value' => @$somosDB->texto1 ,
	'class' => 'validaciones vc form-control input-lg hl2',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_texto1_imagen =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'texto1_imagen'
);



$data_registro_titulo2  =  array ( 
	'name' => 'registros[titulo2]',
	'value' => @$somosDB->titulo2 ,
	'class' => 'validaciones vc form-control input-lg ',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_texto2  =  array ( 
	'name' => 'registros[texto2]',
	'value' => @$somosDB->texto2 ,
	'class' => 'validaciones vc form-control input-lg hl2',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_texto2_imagen =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'texto2_imagen'
);





//Datos de formualirio GALERIA Vision
$data_galeriav_fotov  =  array (
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'galeriaVFoto',
	'data-conteovalin' =>"galeriav",
	'data-conteovalfin' => "_fotov",
	'data-conteoval' => "name"
);





//Datos de formualirio GALERIA Mision
$data_galeriam_fotom  =  array (
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'galeriaMFoto',
	'data-conteovalin' =>"galeriam",
	'data-conteovalfin' => "_fotom",
	'data-conteoval' => "name"
);

?>












<div class="container area_scroll" data-page="<?php echo($actual); ?>">
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		<!-- 	Clones para la seccion General -->	
		<?php
			echo form_upload( $data_titulo_fondo );
			
			$data['classAdd'] = 'conteo';
			$data['propertyAdd'] = ' data-conteovalin="bloque" data-conteovalfin="_fondo" data-conteoval="name"';
			$this->load->view('admin/plantillas/img_block', $data);
		?>		
		
		
<!-- 	Clones para la seccion GALERIA Vision -->
		<?php
			echo form_upload( $data_galeriav_fotov );
		?>
		
		<div class="registro" data-cloneinfo="fotov">
			<input type="hidden" name="" class="conteo" data-conteovalin="galeriav[fotov][" data-conteovalfin="]" data-conteoval="name"></input>
			<label>Foto: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></label>
			<div class="controlCloneRegistro">
				<div class="clone menos"><i class="far fa-trash-alt"></i></div>
			</div>
			<div class="galeriav_fotov cleanBox" data-clonetype="galeriaVFoto">
				<label>Foto:</label>
				<?php echo form_upload( $data_galeriav_fotov ); ?>
			</div>
		</div>
		
		
		<?php
			echo form_upload( $data_galeriam_fotom );
		?>
		
		<div class="registro" data-cloneinfo="fotom">
			<input type="hidden" name="" class="conteo" data-conteovalin="galeriam[fotom][" data-conteovalfin="]" data-conteoval="name"></input>
			<label>Foto: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></label>
			<div class="controlCloneRegistro">
				<div class="clone menos"><i class="far fa-trash-alt"></i></div>
			</div>
			<div class="galeriam_fotom cleanBox" data-clonetype="galeriaMFoto">
				<label>Foto:</label>
				<?php echo form_upload( $data_galeriam_fotom ); ?>
			</div>
		</div>		
	</div>
	
	
	
	
	
	
	
	
	
	



<!-- 	Seccion de nosotros -->
	<div id="somos" class="row"><br/>
		<input type="hidden" id="idRegistro" name="registros[id]" value="<?php echo(@$somosDB->id) ?>"></input>
		
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">servicios - Registros:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<div class="contenedor">
					<div class="">
						<div class="row">
							<div class="container">
							<div class="row">
								<div class="col-12 col-sm-6">
									<label>Titulo General:</label>
									<?php echo form_input( $data_registro_titulo_general ); ?>
								</div>
								<div class="col-12 col-sm-6">
									<label>Imagen de fondo del titulo:</label>
									<div class="titulo_fondo cleanBox" data-clonetype="titulo_fondo">
									<?php
										if(isset($somosDB)){
											if(property_exists($somosDB, "titulo_fondo") && $somosDB->titulo_fondo !== ""){
												$data['img'] = base_url('assets/public/img/somos/'.$somosDB->titulo_fondo);
												$data['name'] = $somosDB->titulo_fondo;
												$data['hname'] = 'base0_titulo_fondo';
												$this->load->view('admin/plantillas/img_block', $data);
											} else{
												$data_titulo_fondo['name'] = 'base0_titulo_fondo';
												echo form_upload( $data_titulo_fondo );
											}
										} else{
											$data_titulo_fondo['name'] = 'base0_titulo_fondo';
											echo form_upload( $data_titulo_fondo );
										}
									?>
									</div>
								</div>
							</div>
							</div>
							
							<div class="col-12 col-sm-12">
								<label>Texto de Introducción:</label>
								<?php echo form_textarea( $data_registro_intro ); ?>
							</div>
						
							<div class="col-12 col-sm-12">
								<label>Texto de Visión:</label>
								<?php echo form_textarea( $data_registro_vision ); ?>
							</div>
							
							<div class="col-12 col-sm-12">
								<label>Texto de Misión:</label>
								<?php echo form_textarea( $data_registro_mision ); ?>
							</div>
							
							
							<div class="container">
							<div class="row">
								<div class="col-12 col-sm-6">
									<label>Titulo para el bloque 1:</label>
									<?php echo form_input( $data_registro_titulo1 ); ?>
									
									<label>Texto para el bloque 1:</label>
									<?php echo form_textarea( $data_registro_texto1 ); ?>
								</div>
								
								<div class="col-12 col-sm-6">
									<label>Imagen para el bloque 1:</label>
									<div class="texto1_imagen cleanBox" data-clonetype="texto1_imagen">
									<?php
										if(isset($somosDB)){
											if(property_exists($somosDB, "texto1_imagen") && $somosDB->texto1_imagen !== ""){
												$data['img'] = base_url('assets/public/img/somos/'.$somosDB->texto1_imagen);
												$data['name'] = $somosDB->texto1_imagen;
												$data['hname'] = 'base0_texto1_imagen';
												$this->load->view('admin/plantillas/img_block', $data);
											} else{
												$data_registro_texto1_imagen['name'] = 'base0_texto1_imagen';
												echo form_upload( $data_registro_texto1_imagen );
											}
										} else{
											$data_titulo_fondo['name'] = 'base0_texto1_imagen';
											echo form_upload( $data_registro_texto1_imagen );
										}
									?>
									</div>
								</div>
							</div>
							</div>
							
							
							<div class="container">
							<div class="row">
								<div class="col-12 col-sm-6">
									<label>Titulo para el bloque 2:</label>
									<?php echo form_input( $data_registro_titulo2 ); ?>
									
									<label>Texto para el bloque 2:</label>
									<?php echo form_textarea( $data_registro_texto2 ); ?>
								</div>
								<div class="col-12 col-sm-6">
									<label>Imagen para el bloque 2:</label>
									<div class="texto2_imagen cleanBox" data-clonetype="texto2_imagen">
									<?php
										if(isset($somosDB)){
											if(property_exists($somosDB, "texto2_imagen") && $somosDB->texto2_imagen !== ""){
												$data['img'] = base_url('assets/public/img/somos/'.$somosDB->texto2_imagen);
												$data['name'] = $somosDB->texto2_imagen;
												$data['hname'] = 'base0_texto2_imagen';
												$this->load->view('admin/plantillas/img_block', $data);
											} else{
												$data_registro_texto2_imagen['name'] = 'base0_texto2_imagen';
												echo form_upload( $data_registro_texto2_imagen );
											}
										} else{
											$data_registro_texto2_imagen['name'] = 'base0_texto2_imagen';
											echo form_upload( $data_registro_texto2_imagen );
										}
									?>
									</div>
								</div>
							</div>
							</div>
							
						</div>
					</div>
					<hr class="colorgraph">
				</div>
				
<!--
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un bloque: <div id="bloque_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($somosDB)){
						if(property_exists($somosDB, "bloques") && count($somosDB->bloques) > 0 ){
							foreach ($somosDB->bloques as $i=>$v) {
								
								?>
								<div class="registro">
									<div class="valHead">
										<h5>Bloque <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></h5>
										<div class="controlCloneRegistro">
											<div class="clone menos"><i class="far fa-trash-alt"></i></div>
										</div>
									</div>
									
									<div class="contenedor">
										
										<div class="col1">
											<div class="bloque_titulo1">
												<label>Titulo para bloque 1:</label>
												<?php
													$data_bloque_titulo1['name'] = 'registros[bloque]['.$i.'][titulo1]';
													$data_bloque_titulo1['value'] = $v->titulo1;
													echo form_input( $data_bloque_titulo1 );
												?>
											</div>
											<div class="bloque_texto1">
												<label>Cuerpo de texto para bloque 1:</label>
												<?php
													$data_bloque_texto1['name'] = 'registros[bloque]['.$i.'][texto1]';
													$data_bloque_texto1['value'] = $v->texto1;
													echo form_textarea( $data_bloque_texto1 );
												?>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
						}
					}
					?>

				</div>
-->				
			</div>
		</div>
	</div>













<!-- 	Seccion de Galeria Vision -->
	<div id="galeriav" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Galeria Vision:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un foto a la galeria de Visión: <div id="galeriav_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($somosDB) && property_exists($somosDB, "galeriav") && count($somosDB->galeriav) > 0 ){
						foreach ($somosDB->galeriav as $i=>$v) {
							
							?>
							<div class="registro">
								<input type="hidden" name="galeriav[fotov][<?php echo($i); ?>]" class="conteo" data-conteovalin="galeriav[fotov][" data-conteovalfin="]" data-conteoval="name"></input>
								<label>Marca: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></label>
								<div class="controlCloneRegistro">
									<div class="clone menos"><i class="far fa-trash-alt"></i></div>
								</div>
								
								<div class="galeriav_fotov cleanBox" data-clonetype="galeriaVFoto">
								<label>Foto:</label>
								<?php
										if($v->fotov !== ''){
											$data['img'] = base_url('assets/public/img/somos/'.$v->fotov);
											$data['name'] = $v->fotov;
											$data['hname'] = 'galeriav'.$i.'_fotov';
											$data['classAdd'] = 'conteo';
											$data['propertyAdd'] = ' data-conteovalin="galeriav" data-conteovalfin="_fotov" data-conteoval="name"';
											$this->load->view('admin/plantillas/img_block', $data);
										} else{
											$data_galeriav_fotov['name'] = 'galeriav'.$i.'_fotov';
											echo form_upload( $data_galeriav_fotov );
										}
								?>
								</div>
							</div>
							<?php
						}
					}
					?>
				</div>
				
			</div>
		</div>
	</div>
	
	
	
	
	
	
<!-- 	Seccion de Galeria Mision -->
	<div id="galeriam" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Galeria Mision:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un foto a la galeria de Mision: <div id="galeriam_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($somosDB) && property_exists($somosDB, "galeriam") && count($somosDB->galeriam) > 0 ){
						foreach ($somosDB->galeriam as $i=>$v) {
							
							?>
							<div class="registro">
								<input type="hidden" name="galeriam[fotom][<?php echo($i); ?>]" class="conteo" data-conteovalin="galeriam[fotom][" data-conteovalfin="]" data-conteoval="name"></input>
								<label>Marca: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></label>
								<div class="controlCloneRegistro">
									<div class="clone menos"><i class="far fa-trash-alt"></i></div>
								</div>
								
								<div class="galeriam_fotom cleanBox" data-clonetype="galeriaMFoto">
								<label>Foto:</label>
								<?php
										if($v->fotom !== ''){
											$data['img'] = base_url('assets/public/img/somos/'.$v->fotom);
											$data['name'] = $v->fotom;
											$data['hname'] = 'galeriam'.$i.'_fotom';
											$data['classAdd'] = 'conteo';
											$data['propertyAdd'] = ' data-conteovalin="galeriam" data-conteovalfin="_fotom" data-conteoval="name"';
											$this->load->view('admin/plantillas/img_block', $data);
										} else{
											$data_galeriam_fotom['name'] = 'galeriam'.$i.'_fotom';
											echo form_upload( $data_galeriam_fotom );
										}
								?>
								</div>
							</div>
							<?php
						}
					}
					?>
				</div>
				
			</div>
		</div>
	</div>



	
	
	
	
	
	
	
	
	
	
</div>


</form>