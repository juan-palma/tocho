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

$data_registro_privado =  array ( 
	'name' => 'registros[privado]',
	'value' => 'si',
	'class' => '',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_registro_privado_pass =  array ( 
	'name' => 'registros[privado_pass]',
	'value' => @$articuloDB->privado_pass,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);


/*
$data_bloque_fondo_general =  array ( 
	'name' => 'registro0_fondo',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'registro_fondo'
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
$data_bloque_imagen =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'bloque_imagen',
	'data-conteovalin' =>"bloque",
	'data-conteovalfin' => "_imagen",
	'data-conteoval' => "name"
);
$data_bloque_imagen_opcion  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"registros[bloque][",
	'data-conteovalfin' => "][opcion]",
	'data-conteoval' => "name"
);
$opArray = array("grafico" => "Gráfico", "fondo" => "Fondo");
$data_bloque_imagen_opcion_options = $opArray;











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
			<div class="lista col-md-12">
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
				<div id="btnListaRegDel" onclick="delReg('portafolios');">Borrar</div>
			</div>
		</div>
	</div>
</div>






	
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		
		<!-- 	Clones para la seccion Portafolios registros general -->	
		<?php
			echo form_upload( $data_titulo_fondo );
			//echo form_upload( $data_bloque_imagen );
			
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
				
				<div class="col2 row">
					<div class="bloque_imagen col-md-8">
						<label>Imagen:</label>
						<div class="cleanBox" data-clonetype="bloque_imagen">
						<?php echo form_upload( $data_bloque_imagen );?>
						</div>
					</div>
					<div class="col-md-4" style="margin-top: 2rem;">
						<label>¿ La imagen se comportara como fondo o como gráfico ?</label>
						<div class="" data-clonetype="">
						<?php
							echo form_dropdown('', $data_bloque_imagen_opcion_options, 'null', $data_bloque_imagen_opcion);
						?>
						</div>
					</div>
				</div>
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
	
	
	
	
	
	
	
	
	
	




<!-- 	Seccion de PORTAFOLIOS -->
	<div id="portafolios" class="row"><br/>
		<input type="hidden" id="idRegistro" name="registros[id]" value="<?php echo(@$articuloDB->id) ?>"></input>
		
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Portafolios - Registros:</h5>
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
						
						<div class="col-12 col-sm-6">
							<label>Imagen de fondo del titulo:</label>
							<div class="titulo_fondo cleanBox" data-clonetype="titulo_fondo">
							<?php
								if(isset($articuloDB)){
									if(property_exists($articuloDB, "titulo_fondo") && $articuloDB->titulo_fondo !== ""){
										$data['img'] = base_url('assets/public/img/portafolios/registros/'.$articuloDB->titulo_fondo);
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
						
						<div class="col-12 col-sm-6 makePrivate">
							<label>¿Este portafolio sera privado?:</label>
							<?php
								if(isset($articuloDB) && property_exists($articuloDB, "privado") && $articuloDB->privado === 'si' ){
									echo form_checkbox($data_registro_privado, 'si', TRUE);
								} else{
									echo form_checkbox($data_registro_privado, 'si', FALSE);
								}
							?>
							<label class="col-12">Contraseña para el acceso:</label>
							<?php echo form_input( $data_registro_privado_pass ); ?>
						</div>
						
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
										
										
										<div class="col2 row">
											<div class="bloque_imagen col-md-8">
												<label>Imagen:</label>
												<div class="cleanBox" data-clonetype="bloque_imagen">
												<?php
													if(property_exists($v, "imagen") && $v->imagen !== ""){
														$data['img'] = base_url('assets/public/img/portafolios/registros/'.$v->imagen);
														$data['name'] = $v->imagen;
														$data['hname'] = 'bloque'.$i.'_imagen';
														$data['classAdd'] = 'conteo';
														$data['propertyAdd'] = ' data-conteovalin="bloque" data-conteovalfin="_imagen" data-conteoval="name"';
														$this->load->view('admin/plantillas/img_block', $data);
													} else{
														$data_bloque_imagen['name'] = 'bloque'.$i.'_imagen';
														echo form_upload( $data_bloque_imagen );
													}
												?>
												</div>
											</div>
											<div class="col-md-4" style="margin-top: 2rem;">
												<label>¿ La imagen se comportara como fondo o como gráfico ?</label>
												<div class="" data-clonetype="">
												<?php
													$nameOp = 'registros[bloque]['.$i.'][opcion]';
													$valroOp = $v->opcion;
													echo form_dropdown($nameOp, $data_bloque_imagen_opcion_options, $valroOp, $data_bloque_imagen_opcion);
												?>
												</div>
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
								<label>Marca: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></label>
								<div class="controlCloneRegistro">
									<div class="clone menos"><i class="far fa-trash-alt"></i></div>
								</div>
								
								<div class="galeria_foto cleanBox" data-clonetype="galeriaFoto">
								<label>Foto:</label>
								<?php
										if($v->foto !== ''){
											$data['img'] = base_url('assets/public/img/portafolios/registros/'.$v->foto);
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