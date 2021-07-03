<?php
	//Consulta - HOME-SECCIONES
	// $this->basic_modal->clean();
	// $this->basic_modal->tabla = 'usuarios';
	// $this->basic_modal->campos = 'id_user';
	// //$this->basic_modal->condicion = array( "contenido_pagina" => $pageMain, "contenido_seccion" => $sector['baseName'] );
	// 
	// $usuarioDB = $this->basic_modal->genericSelect('sistema');
	// print_r($usuarioDB);
	
	
	$userMailTemp = $this->session->userMailTemp;
	$userEquipoTemp = $this->session->userEquipoTemp;
	$userLigaTemp = $this->session->userLigaTemp;
	
	$idUser = $this->session->idUser;
	$userMail = $this->session->userMail;
	
	if($idUser !== NULL && $idUser !== '' && $userMail !== ''){
		$mailDisabled = 'disabled';
	} else{
		$mailDisabled = "";
		$userMail = $userMailTemp;
	}
	$this->session->urlPeticion = $this->uri->uri_string();
	
?>




<div id="mainLoginCustom">
	<form id="formLoginCustom" action="<?php echo(base_url('productos/login')); ?>" method="post">
		<input type="email" name="correo" placeholder="email" required <?php echo($mailDisabled); ?> value="<?php echo($userMail); ?>"></input>
		<input type="text" name="equipo" placeholder="Nombre de equipo"  value="<?php echo($userEquipoTemp); ?>" required></input>
		<input type="text" name="liga" placeholder="Nombr de liga" value="<?php echo($userLigaTemp); ?>" required></input>
		
		<input type="submit" value="Continuar"></input>
	</form>
	
</div>
