<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="es" class="no-js lt-ie9 lt-ie8 lt-ie7" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 7]>         <html lang="es" class="no-js lt-ie9 lt-ie8" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if IE 8]>         <html lang="es" class="no-js lt-ie9" prefix="og: http://ogp.me/ns#"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es" class="no-js"> <!--<![endif]-->
	<head itemscope itemtype="http://schema.org/Person" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# profile: http://ogp.me/ns/profile#">
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0" />
		
		<meta http-equiv="Content-Encoding" content="gzip" />
		<meta http-equiv="Accept-Encoding" content="gzip, deflate" />
				
		<link rel="shortcut icon" href="<?php echo(base_url('assets/public/img/favicon.ico')); ?>?v1" />
		<link rel="icon" href="<?php echo(base_url('assets/public/img/favicon.ico')); ?>?v1" />
		<link rel="apple-touch-icon" href="<?php echo(base_url('assets/public/img/apple-touch-icon.png')); ?>" />
				
		<title><?php echo($titulo); ?></title>
		<meta name="description" content="<?php echo($generalDB->desc_global); ?>" />
	
					
		<meta name="dcterms.audience" content="Global" />
		<meta name="rating" content="General" />
		
	
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		
	<!-- 		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
	    <link href="<?php echo(base_url('assets/admin/css/light-bootstrap-dashboard.css?v=2.0.1')) ?>" rel="stylesheet" />
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.1/tiny-slider.css">
		
		<link href="<?php echo(base_url('assets/public/css/main.css')) ?>" rel="stylesheet" type="text/css">
				
		
		<!-- Meta Data de verificacion de sitios web. -->
		<meta name="msvalidate.01" content="ED387E3F99B5758EB607324E9928F951" />
		<meta name="p:domain_verify" content="92115dc4d60becb13618274218b951f2"/>
		
		
		<?php if(isset($actual) && $actual !== ''){
			?>
		<script type="text/javascript"> 
			var pageActual = '<?php echo($actual); ?>';
			var baseDir = '<?php echo(base_url()); ?>';
		</script>
			<?php
		}
		?>
		
		
<?php
$headerDB = new stdClass();
//$headerDB->titulo_general = 'CONTÁCTANOS';
//$headerDB->direccion = $generalDB->direccion;
//$headerDB->mail_destino = $generalDB->correo;

if(property_exists($generalDB, "facebook") && $generalDB->facebook !== ''){
	$valor = new stdClass();
	$valor->red = 'facebook';
	$valor->nombre = 'Mi Pagina';
	$valor->liga = $generalDB->facebook;
	$valor->icono = '<svg viewBox="0 0 18.5 19" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_facebook"/>
				    </svg>
					';
	$headerDB->redes[] = $valor;
}

if(property_exists($generalDB, "behance") && $generalDB->behance !== ''){
	$valor = new stdClass();
	$valor->red = 'behance';
	$valor->nombre = 'Mi Portafolio';
	$valor->liga = $generalDB->behance;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_behance"/>
				    </svg>
					';
	$headerDB->redes[] = $valor;
}

if(property_exists($generalDB, "instagram") && $generalDB->instagram !== ''){
	$valor = new stdClass();
	$valor->red = 'instagram';
	$valor->nombre = 'Mi Galeria';
	$valor->liga = $generalDB->instagram;
	$valor->icono = '<svg viewBox="0 0 18.5 19" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_instagram"/>
				    </svg>
					';
	$headerDB->redes[] = $valor;
}

if(property_exists($generalDB, "linkedin") && $generalDB->linkedin !== ''){
	$valor = new stdClass();
	$valor->red = 'linkedIn';
	$valor->nombre = 'Mi Curriculum';
	$valor->liga = $generalDB->linkedin;
	$valor->icono = '<svg viewBox="0 0 21 19" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_linkedin"/>
				    </svg>
					';
	$headerDB->redes[] = $valor;
}	

if(property_exists($generalDB, "vimeo") && $generalDB->vimeo !== ''){
	$valor = new stdClass();
	$valor->red = 'vimeo';
	$valor->nombre = 'Mi Canal';
	$valor->liga = $generalDB->vimeo;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_vimeo"/>
				    </svg>
					';
	$headerDB->redes[] = $valor;
}

if(property_exists($generalDB, "youtube") && $generalDB->youtube !== ''){
	$valor = new stdClass();
	$valor->red = 'youtube';
	$valor->nombre = 'Mi Canal';
	$valor->liga = $generalDB->youtube;
	$valor->icono = '<svg viewBox="0 0 40 40" preserveAspectRatio="xMidYMin slice" class="">
						<use xlink:href="#svg_youtube"/>
				    </svg>
					';
	$headerDB->redes[] = $valor;
}	
	

?>
						
	</head>
	<body id="<?php echo($actual); ?>" itemscope="itemscope" itemtype="http://schema.org/WebPage" >
<!-- 		<div id="bodyBackFix" style="background-image: url(<?php echo(base_url( 'assets/public/img/general/'.$generalDB->fondo[0]->img )); ?>);"></div> -->
		<style type="text/css">
			<?php 
				if(property_exists($generalDB, "color_fondo") && $generalDB->color_fondo !== ''){ echo('body{background-color:'.$generalDB->color_fondo.' !important;}'); }
				if(property_exists($generalDB, "color_principal") && $generalDB->color_principal !== ''){
					echo('.colDin1{color:'.$generalDB->color_principal.' !important; fill:'.$generalDB->color_principal.' !important;}');
					echo('.colDin1-back{background-color:'.$generalDB->color_principal.' !important;}');
					//echo('#menu .red svg{color:'.$generalDB->color_principal.' !important; fill:'.$generalDB->color_principal.' !important;}');
					echo(':root{ --colorPrincipal: '.$generalDB->color_principal.' !important; }');
				}
				if(property_exists($generalDB, "color_contraste") && $generalDB->color_contraste !== ''){
					echo('.colDin1-op{color:'.$generalDB->color_contraste.' !important; fill:'.$generalDB->color_contraste.' !important;}');
					echo('.colDin1-back-op{background-color:'.$generalDB->color_contraste.' !important;}');
				}
			?>
		</style>


<!-- 	Elementos SVG a utilizar en el sitio web. -->
		<div class="hide">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 18.5 19" xml:space="preserve" class="colDin1">
				<symbol id="svg_facebook" >
					<path id="Facebook_Icon" class="st0" d="M17.4,9.5h-2.1V19h-3.2V9.5h-2.1V6.3h2.1V4.2c0-1.6-0.3-4.2,3.2-4.2h3.2v3.2h-2.1
	c-0.6,0-1,0.5-1.1,1.1v2.1h3.2L17.4,9.5z"/>
				</symbol>
			</svg>
			
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" xml:space="preserve" class="colDin1">
				<symbol id="svg_behance" >
					<g>
						<path class="st0" d="M20,40C9,40,0,31,0,20S9,0,20,0s20,9,20,20S31,40,20,40z M20,1C9.5,1,1,9.5,1,20s8.5,19,19,19s19-8.5,19-19
							S30.4,1,20,1z"/>
					</g>
					<g>
						<path id="Behance" class="st0" d="M28.9,15h-5.6v-1.4h5.6V15L28.9,15z M19.7,20.7c0.4,0.6,0.5,1.2,0.5,2s-0.2,1.6-0.6,2.2
							c-0.3,0.4-0.6,0.8-1,1.1c-0.4,0.3-1,0.6-1.6,0.7s-1.2,0.2-1.9,0.2H8.9V13.1h6.7c1.7,0,2.9,0.5,3.6,1.5c0.4,0.6,0.6,1.3,0.6,2.1
							c0,0.8-0.2,1.5-0.6,2c-0.2,0.3-0.6,0.5-1.1,0.8C18.8,19.7,19.3,20.1,19.7,20.7z M12.1,18.5H15c0.6,0,1.1-0.1,1.5-0.3
							c0.4-0.2,0.6-0.6,0.6-1.2s-0.2-1.1-0.7-1.3c-0.4-0.1-1-0.2-1.6-0.2h-2.6L12.1,18.5L12.1,18.5z M17.3,22.5c0-0.7-0.3-1.2-0.9-1.5
							c-0.3-0.2-0.8-0.2-1.4-0.2h-3v3.7h3c0.6,0,1.1-0.1,1.4-0.2C17,23.9,17.3,23.4,17.3,22.5z M31,20.3c0.1,0.5,0.1,1.1,0.1,2h-7.2
							c0,1,0.4,1.7,1,2.1c0.4,0.2,0.9,0.4,1.4,0.4c0.6,0,1.1-0.1,1.4-0.5c0.2-0.2,0.4-0.4,0.5-0.7h2.6c-0.1,0.6-0.4,1.2-1,1.8
							c-0.9,1-2.1,1.4-3.7,1.4c-1.3,0-2.5-0.4-3.5-1.2c-1-0.8-1.5-2.1-1.5-4c0-1.7,0.5-3,1.4-3.9s2.1-1.4,3.5-1.4c0.9,0,1.6,0.2,2.3,0.5
							c0.7,0.3,1.3,0.8,1.7,1.5C30.6,18.8,30.9,19.5,31,20.3z M28.4,20.5c0-0.7-0.3-1.2-0.7-1.6c-0.4-0.4-0.9-0.5-1.5-0.5
							c-0.7,0-1.2,0.2-1.5,0.6c-0.4,0.4-0.6,0.9-0.7,1.5H28.4L28.4,20.5z"/>
					</g>
				</symbol>
			</svg>
			
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 18.5 19" xml:space="preserve" class="colDin1">
				<symbol id="svg_instagram" >
					<g>
						<path class="st0" d="M9.3,6.1C7.5,6.1,6,7.6,6,9.4s1.5,3.3,3.3,3.3s3.3-1.5,3.3-3.3C12.6,7.5,11.1,6.1,9.3,6.1"/>
						<path class="st0" d="M13.1,0H5.4C2.5,0,0,2.4,0,5.4v8.2C0,16.5,2.4,19,5.4,19h7.7c2.9,0,5.4-2.4,5.4-5.4V5.4
							C18.5,2.4,16.1,0,13.1,0 M9.3,14.5c-2.8,0-5.1-2.3-5.1-5.1s2.3-5.1,5.1-5.1s5.1,2.3,5.1,5.1S12.1,14.5,9.3,14.5 M14.5,5.4
							c-0.7,0-1.2-0.5-1.2-1.2S13.8,3,14.5,3s1.2,0.5,1.2,1.2C15.7,4.9,15.1,5.4,14.5,5.4"/>
					</g>
					
				</symbol>
			</svg>
			
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 21 19" xml:space="preserve" class="colDin1">
				<symbol id="svg_linkedin" >
					<rect id="Rectangle-path" y="5.4" class="st0" width="4.2" height="13.6"/>
					<path id="Shape" class="st0" d="M19.7,7c-1-1-2.4-1.6-3.9-1.5c-0.6,0-1,0.1-1.6,0.2c-0.5,0.1-0.8,0.3-1.3,0.6
						c-0.2,0.2-0.6,0.5-0.8,0.7c-0.2,0.2-0.3,0.5-0.6,0.7V5.7H7v0.7c0,0.5,0,1.7,0,4s0,5.1,0,8.7h4.6v-7.4c0-0.3,0-0.7,0.1-1.1
						c0.2-0.5,0.5-0.8,0.9-1.1s0.9-0.5,1.5-0.5c0.7,0,1.4,0.2,1.8,0.8c0.5,0.7,0.6,1.4,0.6,2.2V19H21v-7.7C21.3,9.7,20.7,8.1,19.7,7z"/>
					<path id="Shape-2" class="st0" d="M2.2,0C1.6,0,1,0.2,0.7,0.6C0.2,0.9,0,1.5,0,2.1c0,0.6,0.2,1,0.6,1.5C0.9,3.9,1.5,4.1,2.1,4l0,0
						c0.6,0,1.1-0.2,1.6-0.6C4,3.1,4.2,2.5,4.2,1.9c0-0.6-0.2-1-0.6-1.5C3.2,0.1,2.7,0,2.2,0z"/>
				</symbol>
			</svg>
			
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" xml:space="preserve" class="colDin1">
				<symbol id="svg_vimeo" >
					<g>
						<path class="st0" d="M20,40C9,40,0,31,0,20S9,0,20,0s20,9,20,20S31,40,20,40z M20,1C9.5,1,1,9.5,1,20s8.5,19,19,19s19-8.5,19-19
							S30.4,1,20,1z"/>
					</g>
					<g>
						<path class="st0" d="M30.7,16.1c-0.1,0.4-0.2,0.9-0.3,1.3c-0.3,1.2-0.9,2.3-1.5,3.4c-1.3,2.1-2.8,4.1-4.5,6c-0.9,1-1.8,1.9-3,2.6
							c-0.6,0.4-1.2,0.7-1.9,0.8c-1,0.2-1.8-0.1-2.4-0.9c-0.8-1-1.3-2.2-1.6-3.4c-0.5-2-1.1-4.1-1.7-6.1c-0.2-0.8-0.5-1.5-1-2.2
							c-0.1-0.1-0.2-0.3-0.3-0.4c-0.3-0.3-0.5-0.3-0.9-0.1c-0.5,0.3-0.9,0.6-1.4,0.9c0,0,0,0-0.1-0.1c-0.3-0.4-0.6-0.8-0.9-1.2
							c0,0,0,0,0-0.1c1.3-1.2,2.6-2.3,4-3.5c0.5-0.4,1-0.7,1.5-1c1.2-0.6,2.5-0.2,3.2,1c0.4,0.7,0.5,1.4,0.7,2.2c0.3,1.8,0.7,3.7,1,5.5
							c0.1,0.7,0.4,1.4,0.7,2c0.4,0.7,0.8,0.8,1.4,0.2c0.5-0.5,0.9-1.1,1.2-1.6c0.5-0.8,1-1.7,1.4-2.6c0.2-0.4,0.2-0.9,0.2-1.4
							c-0.1-0.6-0.4-1-1.1-1.1c-0.6-0.1-1.1,0-1.6,0.2c-0.1,0-0.2,0.1-0.3,0.1c0.1-0.4,0.3-0.7,0.4-1.1c0.4-1,1-1.9,1.8-2.7
							c0.8-0.7,1.8-1.1,3-1.2c0.6-0.1,1.2-0.1,1.7,0.1c1.1,0.3,1.8,1,2.1,2c0.1,0.4,0.1,0.7,0.2,1.1C30.7,15.4,30.7,15.8,30.7,16.1z"/>
					</g>
				</symbol>
			</svg>
			
			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" xml:space="preserve" class="colDin1">
				<symbol id="svg_youtube" >
					<g>
						<path d="M20,40C9,40,0,31,0,20S9,0,20,0s20,9,20,20S31,40,20,40z M20,1C9.5,1,1,9.5,1,20s8.5,19,19,19s19-8.5,19-19S30.4,1,20,1z"/>
					</g>
					<g>
						<path d="M20,12.4c0.8,0,1.7,0,2.5,0c0.9,0,1.8,0,2.6,0.1c0.8,0,1.6,0.1,2.4,0.1c0.5,0,1,0.1,1.5,0.4c0.6,0.3,1.1,0.9,1.3,1.6
							c0.2,0.6,0.3,1.1,0.3,1.7c0,0.7,0.1,1.4,0.1,2.1c0,0.2,0,0.3,0,0.5c0,0.9,0,1.9,0,2.8c0,0.6-0.1,1.1-0.1,1.7c0,0.5-0.1,0.9-0.2,1.4
							c-0.1,0.5-0.2,1.1-0.6,1.5c-0.4,0.7-1.1,1.1-1.8,1.2c-0.5,0.1-1,0.1-1.5,0.1c-0.8,0-1.7,0.1-2.5,0.1c-0.4,0-0.9,0-1.3,0
							c-1.1,0-2.1,0-3.2,0c-1,0-2,0-3,0c-0.7,0-1.5,0-2.2-0.1c-0.6,0-1.2-0.1-1.9-0.1c-0.4,0-0.7-0.1-1.1-0.2c-0.9-0.2-1.6-0.8-1.9-1.7
							c-0.2-0.6-0.3-1.2-0.4-1.8c0-0.5-0.1-1-0.1-1.6c0-0.3,0-0.7,0-1c0-0.9,0-1.9,0-2.8c0-0.7,0.1-1.4,0.1-2.1c0-0.6,0.1-1.1,0.3-1.7
							c0.4-1.2,1.2-1.9,2.5-2c0.7-0.1,1.4-0.1,2.1-0.1c1,0,1.9-0.1,2.9-0.1c0.6,0,1.3,0,1.9,0C19.4,12.4,19.7,12.4,20,12.4
							C20,12.4,20,12.4,20,12.4z M17.8,22.8c2-1,3.9-2,5.9-3c-2-1-3.9-2-5.9-3.1C17.8,18.8,17.8,20.8,17.8,22.8z"/>
					</g>
				</symbol>
			</svg>
			
		</div>
<!-- 	FIN SVG -->
		
		<nav id="nav" class="onlyDesktop">
			<div id="logo"><a href="<?php echo(base_url()); ?>"><img src="<?php echo(base_url('assets/public/img/logo_ci_fondo.svg')); ?>"></img></a></div>
			<div id="menus">
				<a id="btnMenuHome" href="<?php echo(base_url()); ?>"><div class="menu">Home</div></a>
				<a href="<?php echo(base_url('servicios')); ?>"><div class="menu">servicios</div></a>
				<a href="<?php echo(base_url('portafolio')); ?>"><div class="menu">portafolio</div></a>
				<a id="btnMenuCliente" href="javascript:void(0);"><div class="menu">clientes</div></a>
				<a href="<?php echo(base_url('quienes_somos')); ?>"><div class="menu">quiénes somos</div></a>
				<a href="<?php echo(base_url('postulate')); ?>"><div class="menu">postúlate</div></a>
			</div>
			<div id="dir">
				<div class="tel"><a href="tel:<?php echo($generalDB->telefono); ?>">Tel:<?php echo($generalDB->telefono); ?></a></div>
				<div class="mail"><a href="mailto:<?php echo($generalDB->correo); ?>"><?php echo($generalDB->correo); ?></a></div>
				<div class="redes">
					<?php
						foreach ($headerDB->redes as $i=>$v) {
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
			</div>
		</nav>
		
		<nav id="navMobile" class="onlyMobile">
			<div id="logo"><a href="<?php echo(base_url()); ?>"><img src="<?php echo(base_url('assets/public/img/logo_ci_fondo.svg')); ?>"></img></a></div>
			<div id="navMobileOpen">
				<img src="<?php echo(base_url('assets/public/img/navMobileOpenBtn.svg')); ?>" />
			</div>
		</nav>
		
		<nav id="navExtend" class="onlyMobile extendNav">
			<div id="menus">
				<a id="btnMenuHome" href="<?php echo(base_url()); ?>"><div class="menu">Home</div></a>
				<a href="<?php echo(base_url('servicios')); ?>"><div class="menu">servicios</div></a>
				<a href="<?php echo(base_url('portafolio')); ?>"><div class="menu">portafolio</div></a>
<!-- 				<a id="btnMenuCliente" href="javascript:void(0);"><div class="menu">clientes</div></a> -->
				<a href="<?php echo(base_url('quienes_somos')); ?>"><div class="menu">quienes somos</div></a>
<!-- 				<a href="<?php echo(base_url('postulate')); ?>"><div class="menu">postulate</div></a> -->
				<div class="menu postulateAcordeon">postulate</div>
				<div class="postulateInfo">
					<a href="<?php echo(base_url('postulate')); ?>"><div class="menu">modelo</div></a>
					<a href="<?php echo(base_url('postulate/alianza')); ?>"><div class="menu">alianza</div></a>
				</div>
				
				<div id="dir">
					<div class="tel"><a href="tel:<?php echo($generalDB->telefono); ?>">Tel:<?php echo($generalDB->telefono); ?></a></div>
					<div class="mail"><a href="mailto:<?php echo($generalDB->correo); ?>"><?php echo($generalDB->correo); ?></a></div>
					<div class="redes">
						<?php
							foreach ($headerDB->redes as $i=>$v) {
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
				</div>

			</div>
			
			<div id="navMobileClose">
				<img src="<?php echo(base_url('assets/public/img/navMobileCloseBtn.svg')); ?>" />
			</div>
		</nav>
		
		
		
		
<!--
		<div id="menuItems" class="dnone">
			<div id="menuItemClose"><i class="fas fa-times"></i></div>
			
			<div class="redes">
				<?php
					foreach ($headerDB->redes as $i=>$v) {
						if($v->liga !== ''){
					?>
						<div class="red">
							<a target="_blank" href="<?php echo($v->liga); ?>">
								//<?php echo( $v->icono); ?>
							</a>
						</div>
					<?php
						}
					}
				?>
			</div>
				
			<div class="boxCentro">
				<div class="boxCentrado">
					<div class="menuHi"><a href="<?php echo(base_url('servicios') ); ?>">SERVICIOS</a></div><br />
					<?php
					/* foreach ($serviciosDB->servicios as $i=>$v) {
						?>
						<div class="menuLow"><a href="<?php echo(base_url('servicios/articulo/'.url_title($v->enlace) )); ?>"><?php echo($v->titulo); ?></a></div><br />
						<?php
					} */
					?>
					<div id="menuPortafolio" class="menuHi"><a href="<?php echo(base_url('portafolio') ); ?>">PORTAFOLIO</a></div><br />
				</div>
			</div>
		</div>
-->
		
		
		<!-- Add your site or application content here -->
        <div id="primaryContainer">

