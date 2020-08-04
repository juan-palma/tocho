<?php

//Datos de formualirio portafolios
$data  =  array ( 
	'name' => 'portafolios[titulo]',
	'value' => @$portafoliosDB->titulo_general,
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


// los elementos del clone de portafolio general
$data_portafolio_foto  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'foto',
	'data-conteovalin' =>"portafolio",
	'data-conteovalfin' => "_foto",
	'data-conteoval' => "name"
);
$data_portafolio_titulo_home  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"portafolios[portafolio][",
	'data-conteovalfin' => "][titulo_home]",
	'data-conteoval' => "name"
);

$data_portafolio_titulo_general  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"portafolios[portafolio][",
	'data-conteovalfin' => "][titulo_general]",
	'data-conteoval' => "name"
);

$data_portafolio_enlace  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-conteovalin' =>"portafolios[portafolio][",
	'data-conteovalfin' => "][enlace]",
	'data-conteoval' => "name"
);




?>



<div class="container area_scroll" data-page="<?php echo($actual); ?>">
	
	
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		<?php 
			echo form_upload( $data_video_portada );
			echo form_upload( $data_portafolio_foto );
			
			$data['classAdd'] = 'conteo';
			$data['propertyAdd'] = ' data-conteovalin="portafolio" data-conteovalfin="_icono" data-conteoval="name"';
			$this->load->view('admin/plantillas/img_block', $data);
		?>
									
		<div id="portafolio_base" class="registro" data-cloneinfo="formPortafolio">
			<div class="valHead">
				<h5>portafolio<span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></h5>
				<div class="controlCloneRegistro">
					<div class="clone menos"><i class="far fa-trash-alt"></i></div>
				</div>
			</div>
			
			<div class="row">
				<div class="col -md-3">
					<div class="portafolio_foto">
						<label>Foto de fondo:</label>
						<div class="cleanBox" data-clonetype="foto">
							<?php echo form_upload( $data_portafolio_foto ); ?>
						</div>
					</div>
				</div>
				
				<div class="col -md-9">
					<div class="portafolio_titulo">
						<label>Titulo para la aparición en el HOME:</label>
						<?php echo form_input( $data_portafolio_titulo_home ); ?>
					</div>
					<div class="portafolio_texto">
						<label>Titulo para la aparición en la General de Portafolios:</label>
						<?php echo form_input( $data_portafolio_titulo_general ); ?>
					</div>
					<div class="portafolio_enlace">
						<label>nombre del enlace del portafoloio:</label>
						<?php echo form_input( $data_portafolio_enlace ); ?>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
<!-- 	Seccion de portafolios general -->
	<div id="portafolios_g" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">portafolios:</h5>
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
							<label>Fondo del titulo:</label>
							<div class="fondo_titulo cleanBox" data-clonetype="fondo_titulo">
							<?php
								if(isset($portafoliosDB)){
									if(property_exists($portafoliosDB, "fondo_titulo") && $portafoliosDB->fondo_titulo !== ""){
										$data['img'] = base_url('assets/public/img/portafolios/'.$portafoliosDB->fondo_titulo);
										$data['name'] = $portafoliosDB->fondo_titulo;
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
					<div class="boxMainClone">Agregar un portafolio: <div id="portafolio_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					
					<?php
					if(property_exists($portafoliosDB, "portafolios") && count($portafoliosDB->portafolios) > 0 ){
						foreach ($portafoliosDB->portafolios as $i=>$v) {
							
							?>
							<div class="registro">
								<div class="valHead">
									<h5>portafolio <span class="valNum conteo" data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></h5>
									<div class="controlCloneRegistro">
										<div class="clone menos"><i class="far fa-trash-alt"></i></div>
									</div>
								</div>
								
								<div class="row">
									<div class="col -md-3">
										<div class="portafolio_foto">
											<label>Foto:</label>
											<div class="cleanBox"  data-clonetype="foto">
											<?php
												if(property_exists($v, "foto") && $v->foto !== ""){
													$data['img'] = base_url('assets/public/img/portafolios/'.$v->foto);
													$data['name'] = $v->foto;
													$data['hname'] = 'portafolio'.$i.'_foto';
													$data['classAdd'] = 'conteo';
													$data['propertyAdd'] = ' data-conteovalin="portafolio" data-conteovalfin="_foto" data-conteoval="name"';
													$this->load->view('admin/plantillas/img_block', $data);
												} else{
													$data_portafolio_foto['name'] = 'portafolio'.$i.'_foto';
													echo form_upload( $data_portafolio_foto );
												}
											?>
											</div>
										</div>
									</div>
																		
									<div class="col -md-9">
										<div class="portafolio_titulo">
											<label>Titulo para la aparición en el HOME:</label>
											<?php
												$data_portafolio_titulo_home['name'] = 'portafolios[portafolio]['.$i.'][titulo_home]';
												$data_portafolio_titulo_home['value'] = $v->titulo_home;
												echo form_input( $data_portafolio_titulo_home );
											?>
										</div>
										<div class="portafolio_texto">
											<label>Titulo para la aparición en la General de Portafolios:</label>
											<?php
												$data_portafolio_titulo_general['name'] = 'portafolios[portafolio]['.$i.'][titulo_general]';
												$data_portafolio_titulo_general['value'] = $v->titulo_general;
												echo form_input( $data_portafolio_titulo_general );
											?>
										</div>
										<div class="portafolio_enlace">
											<label>nombre del enlace del portafoloio:</label>
											<?php
												$data_portafolio_enlace['name'] = 'portafolios[portafolio]['.$i.'][enlace]';
												$data_portafolio_enlace['value'] = $v->enlace;
												echo form_input( $data_portafolio_enlace );
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