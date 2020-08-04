<?php
//Datos de formualirio NOSOTROS
$data_registro_titulo_general  =  array ( 
	'name' => 'registros[titulo]',
	'value' => @$articuloDB->titulo_general,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_nombre =  array ( 
	'name' => 'registros[nombre]',
	'value' => @$articuloDB->nombre,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_url =  array ( 
	'name' => 'registros[url]',
	'value' => @$articuloDB->url,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_intro  =  array ( 
	'name' => 'registros[intro]',
	'value' => @$articuloDB->intro,
	'class' => 'validaciones vc form-control input-lg hl2',
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
$data_registro_pie  =  array ( 
	'name' => 'registros[pie]',
	'value' => @$articuloDB->pie,
	'class' => 'validaciones vc form-control input-lg hl2',
	'autocomplete' => 'off',
	'placeholder' => ''
);
/*
$data_registro_titulo_general  =  array ( 
	'name' => 'registros[titulo]',
	'value' => @$articuloDB->titulo_general,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_enlace =  array ( 
	'name' => 'registros[enlace]',
	'value' => @$articuloDB->enlace,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_video_general  =  array ( 
	'name' => 'registros[video]',
	'value' => @$articuloDB->video,
	'class' => 'validaciones vc form-control input-lg hl2',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_video_portada =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'video_portada'
);
$data_bloque_fondo =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'bloque_fondo',
	'data-conteovalin' =>"bloque",
	'data-conteovalfin' => "_fondo",
	'data-conteoval' => "name"
);
*/





$data_bloque_titulo1  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo hl1',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"registros[bloque][",
	'data-conteovalfin' => "][titulo1]",
	'data-conteoval' => "name"
);
$data_bloque_texto1  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo hl2',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"registros[bloque][",
	'data-conteovalfin' => "][texto1]",
	'data-conteoval' => "name"
);






//Datos de formualirio GALERIA TITULO
$data_galeriaT_fotoT  =  array (
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'galeriaTFotoT',
	'data-conteovalin' =>"galeriaT",
	'data-conteovalfin' => "_fotoT",
	'data-conteoval' => "name"
);






//Datos de formualirio GALERIA
$data_galeria_foto  =  array (
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'galeriaFoto',
	'data-conteovalin' =>"galeria",
	'data-conteovalfin' => "_foto",
	'data-conteoval' => "name"
);




?>












<div class="container area_scroll" data-page="<?php echo($actual); ?>">



<!-- Lista de registros ya existentes. -->
<div id="boxListaRegistros">
	<div class="contenedor clearfix container-fluid">
		<label>Puede editar algún registro anterior de esta lista:</label>
		<div class="row">
			<div class="lista col -md-12">
				<select id="listaRegistros">
					<option value="">- -</option>
					<?php 
					foreach($registroDB as $l){
						?>
						<option value="<?php echo($l->url); ?>"><?php echo($l->nombre); ?></option>
						<?php
					}
					?>
				</select>
				
				<div id="btnListaReg">Cargar:</div>
				<div id="btnListaRegDel" onclick="delReg('servicios');">Borrar</div>
			</div>
		</div>
	</div>
</div>






	
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		
		<!-- 	Clones para la seccion NOSOTROS -->	
		<?php
			echo form_upload( $data_titulo_fondo );
			
			$data['classAdd'] = 'conteo';
			$data['propertyAdd'] = ' data-conteovalin="bloque" data-conteovalfin="_fondo" data-conteoval="name"';
			$this->load->view('admin/plantillas/img_block', $data);
		?>
		
		
		
		<div id="formRegistro" class="registro" data-cloneinfo="formRegistro">
			<div class="valHead">
				<h5>Bloque <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"></span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
			</div>
			
			<div class="contenedor">
				<div class="col1">
					<div class="bloque_titulo1">
						<label>Titulo para el bloque:</label>
						<?php
							echo form_textarea( $data_bloque_titulo1 );
						?>
					</div>
					<div class="bloque_texto1">
						<label>Cuerpo de texto para bloque:</label>
						<?php
							echo form_textarea( $data_bloque_texto1 );
						?>
					</div>					
				</div>
			</div>
		</div>
		
		
		
		
<!-- 	Clones para la seccion GALERIA Titulo -->
		<?php
			echo form_upload( $data_galeriaT_fotoT );
		?>
		
		<div class="registro" data-cloneinfo="fotoT">
			<input type="hidden" name="" class="conteo" data-conteovalin="galeriaT[fotoT][" data-conteovalfin="]" data-conteoval="name"></input>
			<label>Foto: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></label>
			<div class="controlCloneRegistro">
				<div class="clone menos"><i class="far fa-trash-alt"></i></div>
			</div>
			<div class="galeriaT_fotoT cleanBox" data-clonetype="galeriaTFotoT">
				<label>Foto:</label>
				<?php echo form_upload( $data_galeriaT_fotoT ); ?>
			</div>
		</div>
		
		
		
		
<!-- 	Clones para la seccion GALERIA -->
		<?php
			echo form_upload( $data_galeria_foto );
		?>
		
		<div class="registro" data-cloneinfo="foto">
			<input type="hidden" name="" class="conteo" data-conteovalin="galeria[foto][" data-conteovalfin="]" data-conteoval="name"></input>
			<label>Foto: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></label>
			<div class="controlCloneRegistro">
				<div class="clone menos"><i class="far fa-trash-alt"></i></div>
			</div>
			<div class="galeria_foto cleanBox" data-clonetype="galeriaFoto">
				<label>Foto:</label>
				<?php echo form_upload( $data_galeria_foto ); ?>
			</div>
		</div>		
		
		
		
	</div>
	
	
	
	
	
	
	
	
	
	




<!-- 	Seccion de nosotros -->
	<div id="servicios" class="row"><br/>
		<input type="hidden" id="idRegistro" name="registros[id]" value="<?php echo(@$articuloDB->id) ?>"></input>
		
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">servicios - Registros:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<div class="contenedor">
					<div class="row">
						<div class="col-12">
							<label>Titulo General:</label>
							<?php echo form_input( $data_registro_titulo_general ); ?>
						</div>
						<div class="col-12 col-sm-6">
							<label>Nombre del Proyecto:</label>
							<?php echo form_input( $data_registro_nombre ); ?>
						</div>
						<div class="col-12 col-sm-6">
							<label>Nombre para la url:</label>
							<?php echo form_input( $data_registro_url ); ?>
						</div>
						<div class="col-12 col-sm-12">
							<label>Texto de introduccion:</label>
							<?php echo form_textarea( $data_registro_intro ); ?>
						</div>
						<div class="col-12 col-sm-12">
							<label>Texto de Pie o Cierre:</label>
							<?php echo form_textarea( $data_registro_pie ); ?>
						</div>
						
<!--
						<div class="col-12 col-sm-6">
							<label>Imagen de fondo del titulo:</label>
							<div class="titulo_fondo cleanBox" data-clonetype="titulo_fondo">
							<?php
								if(isset($articuloDB)){
									if(property_exists($articuloDB, "titulo_fondo") && $articuloDB->titulo_fondo !== ""){
										$data['img'] = base_url('assets/public/img/servicios/registros/'.$articuloDB->titulo_fondo);
										$data['name'] = $articuloDB->titulo_fondo;
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
-->
						
					</div>
					<hr class="colorgraph">
				</div>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un bloque: <div id="bloque_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($articuloDB)){
						if(property_exists($articuloDB, "bloques") && count($articuloDB->bloques) > 0 ){
							foreach ($articuloDB->bloques as $i=>$v) {
								
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
				
			</div>
		</div>
	</div>













<!-- 	Seccion de Galeria Titulo -->
	<div id="galeriaT" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Galeria del Titulo:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un foto a la galeria del titulo: <div id="galeriaT_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($articuloDB) && property_exists($articuloDB, "galeriaT") && count($articuloDB->galeriaT) > 0 ){
						foreach ($articuloDB->galeriaT as $i=>$v) {
							
							?>
							<div class="registro">
								<input type="hidden" name="galeriaT[fotoT][<?php echo($i); ?>]" class="conteo" data-conteovalin="galeriaT[fotoT][" data-conteovalfin="]" data-conteoval="name"></input>
								<label>Foto: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></label>
								<div class="controlCloneRegistro">
									<div class="clone menos"><i class="far fa-trash-alt"></i></div>
								</div>
								
								<div class="galeriaT_fotoT cleanBox" data-clonetype="galeriaTFotoT">
								<label>Foto:</label>
								<?php
										if($v->fotoT !== ''){
											$data['img'] = base_url('assets/public/img/servicios/registros/'.$v->fotoT);
											$data['name'] = $v->fotoT;
											$data['hname'] = 'galeriaT'.$i.'_fotoT';
											$data['classAdd'] = 'conteo';
											$data['propertyAdd'] = ' data-conteovalin="galeriaT" data-conteovalfin="_fotoT" data-conteoval="name"';
											$this->load->view('admin/plantillas/img_block', $data);
										} else{
											$data_galeriaT_fotoT['name'] = 'galeriaT'.$i.'_fotoT';
											echo form_upload( $data_galeriaT_fotoT );
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










<!-- 	Seccion de Galeria -->
	<div id="galeria" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Galeria:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un foto a la galeria: <div id="galeria_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(isset($articuloDB) && property_exists($articuloDB, "galeria") && count($articuloDB->galeria) > 0 ){
						foreach ($articuloDB->galeria as $i=>$v) {
							
							?>
							<div class="registro">
								<input type="hidden" name="galeria[foto][<?php echo($i); ?>]" class="conteo" data-conteovalin="galeria[foto][" data-conteovalfin="]" data-conteoval="name"></input>
								<label>Foto: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></label>
								<div class="controlCloneRegistro">
									<div class="clone menos"><i class="far fa-trash-alt"></i></div>
								</div>
								
								<div class="galeria_foto cleanBox" data-clonetype="galeriaFoto">
								<label>Foto:</label>
								<?php
										if($v->foto !== ''){
											$data['img'] = base_url('assets/public/img/servicios/registros/'.$v->foto);
											$data['name'] = $v->foto;
											$data['hname'] = 'galeria'.$i.'_foto';
											$data['classAdd'] = 'conteo';
											$data['propertyAdd'] = ' data-conteovalin="galeria" data-conteovalfin="_foto" data-conteoval="name"';
											$this->load->view('admin/plantillas/img_block', $data);
										} else{
											$data_galeria_foto['name'] = 'galeria'.$i.'_foto';
											echo form_upload( $data_galeria_foto );
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