<?php

//Datos de formualirio PORTAFOLIOS
$data_desc_global  =  array ( 
	'name' => 'general[desc_global]',
	'value' => @$generalDB->desc_global,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_team_fondo =  array ( 
	'name' => 'general0_fondo',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'general_fondo',
	'data-conteovalin' =>"general",
	'data-conteovalfin' => "_fondo",
	'data-conteoval' => "name"
);
$data_general_telefono  =  array ( 
	'name' => 'general[telefono]',
	'value' => @$generalDB->telefono,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_correo  =  array ( 
	'name' => 'general[correo]',
	'value' => @$generalDB->correo,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_correo_pass  =  array ( 
	'name' => 'general[correo_pass]',
	'value' => @$generalDB->correo_pass,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_servicios  =  array ( 
	'name' => 'general[servicios]',
	'value' => @$generalDB->servicios,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_mapa  =  array ( 
	'name' => 'general[mapa]',
	'value' => @$generalDB->mapa,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_correo_form  =  array ( 
	'name' => 'general[correo_form]',
	'value' => @$generalDB->correo_form,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_direccion  =  array ( 
	'name' => 'general[direccion]',
	'value' => @$generalDB->direccion,
	'class' => 'validaciones vc form-control input-lg hl2',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_facebook  =  array ( 
	'name' => 'general[facebook]',
	'value' => @$generalDB->facebook,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_instagram  =  array ( 
	'name' => 'general[instagram]',
	'value' => @$generalDB->instagram,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_linkedin  =  array ( 
	'name' => 'general[linkedin]',
	'value' => @$generalDB->linkedin,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_behance  =  array ( 
	'name' => 'general[behance]',
	'value' => @$generalDB->behance,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general_vimeo  =  array ( 
	'name' => 'general[vimeo]',
	'value' => @$generalDB->vimeo,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);
$data_general  =  array ( 
	'name' => 'general[behance]',
	'value' => @$generalDB->behance,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
);








//Datos de formualirio ALIANNZAS
$data_alianza_titulo_general  =  array ( 
	'name' => 'alianzas[titulo]',
	'value' => @$alianzasDB->titulo_general,
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => ''
); 
$data_alianza_logo  =  array ( 
	'name' => '',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg conteo',
	'autocomplete' => 'off',
	'placeholder' => '',
	'data-cloneinfo' => 'logoIMG',
	'data-conteovalin' =>"alianza",
	'data-conteovalfin' => "_logo",
	'data-conteoval' => "name"
);



?>



<div class="container area_scroll" data-page="<?php echo($actual); ?>">
	
	
<!-- 	elementos para clonar en el codigo -->
	<div class="hiden boxClones">
		<?php 
			echo form_upload( $data_team_fondo );
			
			$data['classAdd'] = '';
			$data['propertyAdd'] = ' data-conteovalin="general" data-conteovalfin="_fondo" data-conteoval="name"';
			$this->load->view('admin/plantillas/img_block', $data);
		?>
		
		
		<!-- 		Clones para la seccion ALIANZAS -->
		<?php
			echo form_upload( $data_alianza_logo );
		?>
		
		<div class="registro" data-cloneinfo="logo">
			<input type="hidden" name="" class="conteo" data-conteovalin="alianzas[logos][" data-conteovalfin="]" data-conteoval="name"></input>
			<label>logo: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text">1</span></label>
			<div class="controlCloneRegistro">
				<div class="clone menos"><i class="far fa-trash-alt"></i></div>
			</div>
			<div class="cleanBox" data-clonetype="logoIMG">
				<?php echo form_upload( $data_alianza_logo ); ?>
			</div>
		</div>
		
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
<!-- 	Seccion de informacion General -->
	<div id="nosotros" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Información general del sitio WEB:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
			<?php
			if(isset($generalDB)){
			?>
				<div class="registro">
					<div class="row">
						<div class="col -md-3">
							<div class="general_desc_global">
								<label>Descripción breve para el header general del sitio web:</label>
								<?php
									$data_desc_global['name'] = 'general[desc_global]';
									$data_desc_global['value'] = @$generalDB->desc_global;
									echo form_input( $data_desc_global );
								?>
							</div>
							<div class="general_color_fondo">
								<label>Color de fondo:</label>
								<?php
									$data_general['name'] = 'general[color_fondo]';
									$data_general['value'] = @$generalDB->color_fondo;
									echo form_input( $data_general );
								?>
							</div>
							<div class="body_fondo">
								<label>Fondo del sitio web:</label>
								<div class="cleanBox" data-clonetype="general_fondo">
								<?php
									if(property_exists($generalDB, "fondo") && $generalDB->fondo[0]->img !== ""){
										$data['img'] = base_url('assets/public/img/general/'.$generalDB->fondo[0]->img);
										$data['name'] = @$generalDB->fondo[0]->img;
										$data['hname'] = 'general0_fondo';
										$data['classAdd'] = 'conteo';
										$data['propertyAdd'] = ' data-conteovalin="general" data-conteovalfin="_fondo" data-conteoval="name"';
										$this->load->view('admin/plantillas/img_block', $data);
									} else{
										$data_team_fondo['name'] = 'general0_fondo';
										echo form_upload( $data_team_fondo );
									}
								?>
								</div>
							</div>
							<div class="general_color_principal">
								<label>Color Principal para titulos y texto sobre el fondo: (user # al inicio del color)</label>
								<?php
									$data_general['name'] = 'general[color_principal]';
									$data_general['value'] = @$generalDB->color_principal;
									echo form_input( $data_general );
								?>
							</div>
							<div class="general_color_contraste">
								<label>Color de contraste al color principal para elementos que están dentro del color principal. (user # al inicio del color)</label>
								<?php
									$data_general['name'] = 'general[color_contraste]';
									$data_general['value'] = @$generalDB->color_contraste;
									echo form_input( $data_general );
								?>
							</div>
							
						</div>
						
						<div class="col -md-9">
							<div class="general_telefono">
								<label>Telefono:</label>
								<?php
									$data_general_telefono['name'] = 'general[telefono]';
									$data_general_telefono['value'] = @$generalDB->telefono;
									echo form_input( $data_general_telefono );
								?>
							</div>
							<div class="general_correo">
								<label>Correo:</label>
								<?php
									$data_general_correo['name'] = 'general[correo]';
									$data_general_correo['value'] = @$generalDB->correo;
									echo form_input( $data_general_correo );
								?>
							</div>
							<div class="general_correo_pass">
								<label>Contraseña del Correo:</label>
								<?php
									$data_general_correo_pass['name'] = 'general[correo_pass]';
									$data_general_correo_pass['value'] = @$generalDB->correo_pass;
									echo form_input( $data_general_correo_pass );
								?>
							</div>
							<div class="general_servicios">
								<label>Servicios para el formulario de cotización (separar por comas):</label>
								<?php
									$data_general_servicios['name'] = 'general[servicios]';
									$data_general_servicios['value'] = @$generalDB->servicios;
									echo form_input( $data_general_servicios );
								?>
							</div>
							<div class="team_correo_form">
								<label>Correo donde el formulario del sitio enviara la consulta:</label>
								<?php
									$data_general_correo_form['name'] = 'general[correo_form]';
									$data_general_correo_form['value'] = @$generalDB->correo_form;
									echo form_input( $data_general_correo_form );
								?>
							</div>
							<div class="team_nombre">
								<label>liga de mapa:</label>
								<?php
									$data_general_mapa['name'] = 'general[mapa]';
									$data_general_mapa['value'] = @$generalDB->mapa;
									echo form_input( $data_general_mapa );
								?>
							</div>
							<div class="team_direccion">
								<label>Direccion:</label>
								<?php
									$data_general_direccion['name'] = 'general[direccion]';
									$data_general_direccion['value'] = @$generalDB->direccion;
									echo form_textarea( $data_general_direccion );
								?>
							</div>
							<div class="team_facebook">
								<label>Facebook</label>
								<?php
									$data_general_facebook['name'] = 'general[facebook]';
									$data_general_facebook['value'] = @$generalDB->facebook;
									echo form_input( $data_general_facebook );
								?>
							</div>
							<div class="team_facebook">
								<label>Instagram</label>
								<?php
									$data_general_instagram['name'] = 'general[instagram]';
									$data_general_instagram['value'] = @$generalDB->instagram;
									echo form_input( $data_general_instagram);
								?>
							</div>
							<div class="team_facebook">
								<label>LinkedIn</label>
								<?php
									$data_general_linkedin['name'] = 'general[linkedin]';
									$data_general_linkedin['value'] = @$generalDB->linkedin;
									echo form_input( $data_general_linkedin );
								?>
							</div>
							<div class="team_facebook">
								<label>Behance</label>
								<?php
									$data_general_behance['name'] = 'general[behance]';
									$data_general_behance['value'] = @$generalDB->behance;
									echo form_input( $data_general_behance );
								?>
							</div>
							<div class="team_vimeo">
								<label>Vimeo</label>
								<?php
									$data_general_behance['name'] = 'general[vimeo]';
									$data_general_behance['value'] = @$generalDB->vimeo;
									echo form_input( $data_general_vimeo );
								?>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
			?>
			</div>
		</div>
	</div>
	
	
	
	
	
	<!-- 	Seccion de alianza -->
	<div id="alianzas" class="row"><br/>
		<div class="card stacked-form col-md-12">
			<div class="card-header block">
				<h5 class="tituloBlock">Alianzas:</h5>
				<hr class="colorgraph">
			</div>
			
			<div class="valueBox">
				<label>Titulo de la sección:</label>
				<?php echo form_input( $data_alianza_titulo_general ); ?>
				
				<div class="boxRepeat">
					<div class="boxMainClone">Agregar una alianza: <div id="alianzas_clonemas" class="clone mas"><i class="fas fa-plus-circle"></i></div></div>
					<div class="boxDrag">
					<?php
					if(property_exists($alianzasDB, "logos") && count($alianzasDB->logos) > 0 ){
						foreach ($alianzasDB->logos as $i=>$v) {
							
							?>
							<div class="registro">
								<input type="hidden" name="alianzas[logos][<?php echo($i); ?>]" class="conteo" data-conteovalin="alianzas[logos][" data-conteovalfin="]" data-conteoval="name"></input>
								<label>logo: <span class="valNum conteo"  data-conteovalin="" data-conteovalfin="" data-conteoval="text"><?php echo($i+1); ?></span></label>
								<div class="controlCloneRegistro">
									<div class="clone menos"><i class="far fa-trash-alt"></i></div>
								</div>
								<div class="cleanBox" data-clonetype="logoIMG">
								<?php
										$data['img'] = base_url('assets/public/img/alianzas/'.$v->logo);
										$data['name'] = $v->logo;
										$data['hname'] = 'alianza'.$i.'_logo';
										$data['classAdd'] = 'conteo';
										$data['propertyAdd'] = ' data-conteovalin="alianza" data-conteovalfin="_logo" data-conteoval="name"';
										$this->load->view('admin/plantillas/img_block', $data);
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

	
	
	
	
	
	
	
	
	
	
</div>


</form>