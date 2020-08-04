<?php

//Datos de formualirio servicios
$data  =  array ( 
	'name' => 'servicios[titulo]',
	'value' => @$serviciosDB->titulo_general,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
); 
$data_fondo_titulo =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'fondo_titulo'
); 


// los elementos del clone de servicio general
$data_servicio_foto  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'foto',
	'data-conteovalin' =>"servicio",
	'data-conteovalfin' => "_foto",
	'data-conteoval' => "name"
);
$data_servicio_icono  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'icono',
	'data-conteovalin' =>"servicio",
	'data-conteovalfin' => "_icono",
	'data-conteoval' => "name"
);
$data_servicio_titulo  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"servicios[servicio][",
	'data-conteovalfin' => "][titulo]",
	'data-conteoval' => "name"
);

$data_servicio_texto  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg hl2 conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"servicios[servicio][",
	'data-conteovalfin' => "][texto]",
	'data-conteoval' => "name"
);

$data_servicio_enlace  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"servicios[servicio][",
	'data-conteovalfin' => "][enlace]",
	'data-conteoval' => "name"
);




?>



<div class="container area_scroll" data-page="<?php echo($actual); ?>">
	
	
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		<?php 
			echo form_upload( $data_video_portada );
			echo form_upload( $data_servicio_foto );
			
			$data['classAdd'] = 'conteo';
			$data['propertyAdd'] = ' data-conteovalin="servicio" data-conteovalfin="_icono" data-conteoval="name"';
			$this->load->view('admin/plantillas/img_block', $data);
		?>
									
		<div id="servicio_base" class="registro" data-cloneinfo="formServicio">
			<div class="valHead">
				<h5>servicio<span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-5">
					<div class="servicio_foto">
						<label>Foto de fondo:</label>
						<div class="cleanBox" data-clonetype="foto">
							<?php echo form_upload( $data_servicio_foto ); ?>
						</div>
					</div>
					
					<div class="servicio_icono">
						<label>Icono:</label>
						<div class="cleanBox" data-clonetype="icono">
							<?php echo form_upload( $data_servicio_icono ); ?>
						</div>
					</div>
				</div>
				
				<div class="col-md-7">
					<div class="servicio_titulo">
						<label>Titulo del servicio:</label>
						<?php echo form_input( $data_servicio_titulo ); ?>
					</div>
					<div class="servicio_texto">
						<label>Texto del servicio</label>
						<?php echo form_textarea( $data_servicio_texto ); ?>
					</div>
					<div class="servicio_enlace">
						<label>Nombre del enlace del servicio:</label>
						<?php echo form_input( $data_servicio_enlace ); ?>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!-- 	Seccion de servicios general -->
	<div id="servicios_g" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">servicios:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<div class="contenedor">
					<div class="row">
						<div class="col-12">
							<label>Titulo de la sección:</label>
							<?php echo form_input( $data ); ?>
						</div>
						
<!--
						<div class="col-12 col-sm-6">
							<label>Video general:</label>
							<?php echo form_textarea( $data_video ); ?>
						</div>
-->
				
						<div class="col-12 col-sm-12">
							<label>Imagen Servicio:</label>
							<div class="fondo_titulo cleanBox" data-clonetype="fondo_titulo">
							<?php
								if(isset($serviciosDB)){
									if(property_exists($serviciosDB, "fondo_titulo") && $serviciosDB->fondo_titulo !== ""){
										$data['img'] = base_url('assets/public/img/servicios/'.$serviciosDB->fondo_titulo);
										$data['name'] = $serviciosDB->fondo_titulo;
										$data['hname'] = 'base0_fondo_titulo';
										$this->load->view('admin/plantillas/img_block', $data);
									} else{
										$data_fondo_titulo['name'] = 'base0_fondo_titulo';
										echo form_upload( $data_fondo_titulo );
									}
								} else{
									$data_fondo_titulo['name'] = 'base0_fondo_titulo';
									echo form_upload( $data_fondo_titulo );
								}
							?>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar un servicio: <div id="servicio_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(property_exists($serviciosDB, "servicios") && count($serviciosDB->servicios) > 0 ){
						foreach ($serviciosDB->servicios as $i=>$v) {
							
							?>
							<div class="registro">
								<div class="valHead">
									<h5>servicio <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></h5>
									<div class="controlCloneRegistro">
										<div class="clone menos"><i class="far fa-trash-alt"></i></div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-5">
										<div class="servicio_foto">
											<label>Foto:</label>
											<div class="cleanBox"  data-clonetype="foto">
											<?php
												if(property_exists($v, "foto") && $v->foto !== ""){
													$data['img'] = base_url('assets/public/img/servicios/'.$v->foto);
													$data['name'] = $v->foto;
													$data['hname'] = 'servicio'.$i.'_foto';
													$data['classAdd'] = 'conteo';
													$data['propertyAdd'] = ' data-conteovalin="servicio" data-conteovalfin="_foto" data-conteoval="name"';
													$this->load->view('admin/plantillas/img_block', $data);
												} else{
													$data_servicio_foto['name'] = 'servicio'.$i.'_foto';
													echo form_upload( $data_servicio_foto );
												}
											?>
											</div>
										</div>
										
										<div class="servicio_icono">
											<label>Icono:</label>
											<div class="cleanBox"  data-clonetype="icono">
											<?php
												if(property_exists($v, "icono") && $v->icono !== ""){
													$data['img'] = base_url('assets/public/img/servicios/'.$v->icono);
													$data['name'] = $v->icono;
													$data['hname'] = 'servicio'.$i.'_icono';
													$data['classAdd'] = 'conteo';
													$data['propertyAdd'] = ' data-conteovalin="servicio" data-conteovalfin="_icono" data-conteoval="name"';
													$this->load->view('admin/plantillas/img_block', $data);
												} else{
													$data_servicio_icono['name'] = 'servicio'.$i.'_icono';
													echo form_upload( $data_servicio_icono );
												}
											?>
											</div>
										</div>
									</div>
										
																		
									<div class="col-md-7">
										<div class="servicio_titulo">
											<label>Titulo del servicio:</label>
											<?php
												$data_servicio_titulo['name'] = 'servicios[servicio]['.$i.'][titulo]';
												$data_servicio_titulo['value'] = $v->titulo;
												echo form_input( $data_servicio_titulo );
											?>
										</div>
										<div class="servicio_texto">
											<label>Texto del Servicios:</label>
											<?php
												$data_servicio_texto['name'] = 'servicios[servicio]['.$i.'][texto]';
												$data_servicio_texto['value'] = $v->texto;
												echo form_textarea( $data_servicio_texto );
											?>
										</div>
										<div class="servicio_enlace">
											<label>Nombre del enlace del servicio:</label>
											<?php
												$data_servicio_enlace['name'] = 'servicios[servicio]['.$i.'][enlace]';
												$data_servicio_enlace['value'] = $v->enlace;
												echo form_input( $data_servicio_enlace );
											?>
										</div>
									</div>
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