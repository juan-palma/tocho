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
$data_footer_servicio  =  array (
/*
	'name' => 'servicio',
	'value' => '',
*/
	'class' => 'form-control input-lg',
	'autocomplete' => 'off',
	'placeholder' => 'SERVICIO*'
);
//$servArray = explode(",", @$generalDB->servicios);
$servArray = array("null" => "SERVICIO*");

foreach (explode(",", @$generalDB->servicios) as &$valor) {
    $servArray[url_title($valor)] = $valor;
}
$data_footer_servicio_options = $servArray; /*
[
        'null'  => 'SERVICIO*',
        'small'  => 'Small Shirt',
        'med'    => 'Medium Shirt',
        'large'  => 'Large Shirt',
        'xlarge' => 'Extra Large Shirt',
]
*/;

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
			
			<div id="postulate">
				<div class="titulo">
<!-- 					<h3><?php echo(@$generalDB->titulo_postulate); ?></h3> -->
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
			
			
			<!-- sección HOME ALIANZAS -->
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
			
			
			<!-- sección HOME ALIANZAS -->
			<div id="footer_box_terminos" class="mainbox">
				<div class="logoFooter">
					<img src="<?php echo( base_url('assets/public/img/logo_ci_transparente@2x.png') ); ?>" />
				</div>
				<div class="footer_terminos">
					<span class="copyright">© Copyright 2019 </span>
					<a href="<?php echo(base_url('terminos_condiciones') ); ?>" target="_self"><span class="terminos">Términos y Condiciones</span></a>
				</div>
			</div>
		</footer>

		
		
		
		<!-- Carga de librerias !!.. -->
<!-- 		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<!--
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
-->

		<script src="https://player.vimeo.com/api/player.js"></script>
		
		<script src="<?php echo(base_url('assets/common/js/librerias/plugins/sweetalert2.min.js')) ?>" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/min/tiny-slider.js"></script>
		<!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/min/tiny-slider.helper.ie8.js"></script><![endif]-->
		<script src="<?php echo(base_url('assets/common/js/librerias/mootools-core.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/mootools-more.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/plugins.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/common/js/librerias/formvalid.js')) ?>"></script>
		<script src="<?php echo(base_url('assets/public/js/owner/main.js')) ?>"></script>
		
		<?php
		?>

	</body>
</html>