<?php
$footerDB = new stdClass();
$footerDB->titulo_general = 'COTIZAR';
//$footerDB->direccion = $generalDB->direccion;
$footerDB->mail_destino = $generalDB->correo_form;

if(property_exists($generalDB, "facebook") && $generalDB->facebook !== ''){
	$valor = new stdClass();
	$valor->red = 'facebook';
	$valor->nombre = 'Mi Pagina';
	$valor->liga = $generalDB->facebook;
	$valor->icono = '<svg viewBox="0 0 18.5 19" preserveAspectRatio="xMidYMin slice">
						<use xlink:href="#svg_facebook"/>
				    </svg>
					';
	$footerDB->redes[] = $valor;
}

if(property_exists($generalDB, "behance") && $generalDB->behance !== ''){
	$valor = new stdClass();
	$valor->red = 'behance';
	$valor->nombre = 'Mi Portafolio';
	$valor->liga = $generalDB->behance;
	$valor->icono = '<svg viewBox="0 0 18.5 19" preserveAspectRatio="xMidYMin slice">
						<use xlink:href="#svg_behance"/>
				    </svg>
					';
	$footerDB->redes[] = $valor;
}

if(property_exists($generalDB, "instagram") && $generalDB->instagram !== ''){
	$valor = new stdClass();
	$valor->red = 'instagram';
	$valor->nombre = 'Mi Galeria';
	$valor->liga = $generalDB->instagram;
	$valor->icono = '<svg viewBox="0 0 18.5 19" preserveAspectRatio="xMidYMin slice">
						<use xlink:href="#svg_instagram"/>
				    </svg>
					';
	$footerDB->redes[] = $valor;
}

if(property_exists($generalDB, "linkedin") && $generalDB->linkedin !== ''){
	$valor = new stdClass();
	$valor->red = 'linkedIn';
	$valor->nombre = 'Mi Curriculum';
	$valor->liga = $generalDB->linkedin;
	$valor->icono = '<svg viewBox="0 0 21 19" preserveAspectRatio="xMidYMin slice">
						<use xlink:href="#svg_linkedin"/>
				    </svg>
					';
	$footerDB->redes[] = $valor;
}

if(property_exists($generalDB, "vimeo") && $generalDB->vimeo !== ''){
	$valor = new stdClass();
	$valor->red = 'vimeo';
	$valor->nombre = 'Mi Canal';
	$valor->liga = $generalDB->vimeo;
	$valor->icono = '<svg viewBox="0 0 18.5 19" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_vimeo"/>
				    </svg>
					';
	$footerDB->redes[] = $valor;
}


//Formulario contacto
$data_footer_nombre  =  array ( 
	'name' => 'nombre',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => 'NOMBRE COMPLETO*',
	'data-validar' => 'texto'
);
$data_footer_mail  =  array ( 
	'name' => 'correo',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => 'E-MAIL*',
	'data-validar' => 'correo'
);
$data_footer_tel  =  array ( 
	'name' => 'telefono',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => 'TELÉFONO*',
	'data-validar' => 'telefono'
);
$data_servicio_mensaje  =  array ( 
	'name' => 'mensaje',
	'value' => '',
	'class' => 'validaciones vc form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => 'MENSAJE',
	'data-validar' => 'texto'
);
?>
		</div>
		
		
		
		<footer id="footer" class="mainbox">
			<div id="box_footer_sec1">
				<div class="bl1">
					si quieres mas<br />
					personalizacion<br />
					en tu uniforme o<br />
					tienes alguna<br />
					duda  contactanos
				</div>
				<div class="bl2">
					<form id="footerContactoForm" class="">
						<?php echo form_input( $data_footer_nombre ); ?>
						<?php echo form_input( $data_footer_mail ); ?>
						<?php echo form_textarea( $data_servicio_mensaje ); ?>
						<div id="footerBtnEnviar">
							<div class="celda">
								<span id="footerBtnEnviarAccion">ENVIAR</span>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div id="box_footer_sec2">
				<div id="footer_logo">
					<img src="<?php echo(base_url('assets/public/img/tocho-logo.svg')); ?>"></img>
				</div>
				<div id="footer_redes">
					<div class="redes">
						<?php
							foreach ($footerDB->redes as $i=>$v) {
								if($v->liga !== ''){
							?>
								<div class="red <?php echo($v->red); ?>">
									<a target="_blank" href="<?php echo($v->liga); ?>">
										<?php echo( $v->icono); ?>
									</a>
								</div>
							<?php
								}
							}
						?>
					</div>
					<div id="footer_legales">
						Copyright 2020 TOCHO IS LIFE <a href="aviso_de_privacidad">Aviso de privacidad</a>
					</div>
				</div>
			</div>
<!--
			<div id="fondo_footer">
				<img src="<?php echo(base_url( 'assets/public/img/home_sec4_footer_fondo.png' )); ?>" />
			</div>
-->
			
<!--
			<div class="cotizacion">
				<h3><?php echo($footerDB->titulo_general); ?></h3>
				<form id="footerContactoForm" class="">
					<?php echo form_input( $data_footer_nombre ); ?>
					<?php echo form_input( $data_footer_mail ); ?>
					<?php echo form_input( $data_footer_tel ); ?>
					<?php echo form_dropdown('servicio', $data_footer_servicio_options, 'null', $data_footer_servicio); ?>
					<?php echo form_textarea( $data_servicio_mensaje ); ?>
					<div id="footerBtnEnviar">
						<div class="celda">
							<span>ENVIAR</span>
						</div>
					</div>
				</form>
			</div>
-->
			
<!--
			<div id="postulate">
				<div class="titulo">
					<h3>POSTÚLATE</h3>
				</div>
				<div class="postulate_content">
					<div class="modelo">
						<div class="negro">
							<div class="tituloPostulate">MODELO</div>
							<a href="<?php echo(base_url('postulate/modelo') ); ?>" target="_self"><div class="portafolioTextoBtn btnVerMas">Ver más</div></a>
						</div>
					</div>
					<div class="alianza">
						<div class="negro">
							<div class="tituloPostulate">ALIANZA</div>
							<a href="<?php echo(base_url('postulate/alianza') ); ?>" target="_self"><div class="portafolioTextoBtn btnVerMas">Ver más</div></a>
						</div>
					</div>
				</div>
			</div>
-->
			
			
			<!-- sección HOME ALIANZAS -->
<!--
			<section id="alianzas" class="mainbox alianza">
				<div class="slideMain">
					<?php
						if(property_exists($alianzasDB, "titulo_general") && $alianzasDB->titulo_general !== ''){
					?>
						<h4 class="alianzaTitulos"><?php echo($alianzasDB->titulo_general); ?></h4>
					<?php
						}
					?>
								
					<main class="slideItems">
						<?php
						foreach ($alianzasDB->logos as $i=>$v) {
							?>
							<div class="logo">
								<img src="<?php echo( base_url('assets/public/img/alianzas/'.$v->logo) ); ?>" />
							</div>
							<?php
						}
						?>
					</main>
				</div>
			</section>
-->
			
			
			<!-- sección HOME ALIANZAS -->
<!--
			<div id="footer_box_terminos" class="mainbox">
				<div class="logoFooter">
					<img src="<?php echo( base_url('assets/public/img/logo_ci_transparente@2x.png') ); ?>" />
				</div>
				<div class="footer_terminos">
					<span class="copyright">© Copyright 2019 </span>
					<a href="<?php echo(base_url('terminos_condiciones') ); ?>" target="_self"><span class="terminos">Términos y Condiciones</span></a>
				</div>
			</div>
-->
		</footer>

		
		
		
		<!-- Carga de librerias !!.. -->
		<script src="https://sdks.shopifycdn.com/js-buy-sdk/v2/latest/index.umd.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
		<script src="https://player.vimeo.com/api/player.js"></script>
		
		<script src="<?php echo(base_url('assets/common/js/librerias/plugins/sweetalert2.min.js')) ?>" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/min/tiny-slider.js"></script>
		<!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/min/tiny-slider.helper.ie8.js"></script><![endif]-->
		<script src="<?php echo(base_url('assets/common/js/librerias/rellax.min.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/mootools-core.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/mootools-more.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/plugins.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/formvalid.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/public/js/owner/main.js')) ?>"></script>
		
		<?php
		?>

	</body>
</html>