<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class General extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
	}
	
	public $varFlash = 'flashHome';
	public $success = [];
	public $error = [];
	
	public $status = [];
	public $valores = [];
	public $errores = [];
	
	public function index(){
		isNoLogged();
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';


		
		//Consulta - GENERAL
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'general' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanObjecDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['generalDB'] = $cleanObjecDB;
		
		
		
		
		
		//Consulta - FOOTER-ALIANZAS
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'footer', "contenido_seccion" => 'alianzas' );
		
		$respuesta = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($respuesta) && count($respuesta) > 0) ? $respuesta[0] : '';
		$clean = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$cleanAlianzasDB = ( is_object(json_decode($clean)) ) ? json_decode($clean) : new stdClass();
		$data['alianzasDB'] = $cleanAlianzasDB;
		
				
		
		
		
		$data['titulo'] = "Información General";
		$data['actual'] = "general";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('admin/head2', $data);
		$this->load->view('admin/saveControl', $data);
		$this->load->view('admin/general', $data);
		$this->load->view('admin/footer2', $data);
	}		
		
		
	
	//loadFiles('general', 'fondo', ['null'], $config);
/*
	private function loadFiles($s, $it, $a, $c){
		$this->load->library('upload', $c);
		
		$todasCargaron = true;
		$rutaImagenes = [];
		$count = count($a);
		$this->valores[$s][$it] = [];
		
		for ($i = 0; $i < $count; $i++) {
			if( !isset($_POST[$s.$i.'_'.$it]) ){
				if(isset($_FILES[$s.$i.'_'.$it])){
					if($_FILES[$s.$i.'_'.$it]['name'] !== "" && $_FILES[$s.$i.'_'.$it]['error'] == 0){
						if ( ! $this->upload->do_upload($s.$i.'_'.$it) ){
							$todasCargaron = false;
							$this->status = 'error';
							$this->errores[] =  $this->upload->display_errors();
							$rutaImagenes[]['file_name'] = '';
							$this->valores[$s][$it][$i] = '';
						} else{
							$result = $this->upload->data();
							$rutaImagenes[] = $result;
							$this->valores[$s][$it][$i] = $result['file_name'];
						}
					} else{
						$rutaImagenes[]['file_name'] = '';
						$this->valores[$s][$it][$i] = '';
					}
				} else{
					$rutaImagenes[]['file_name'] = '';
					$this->valores[$s][$it][$i] = '';
				}
			} else{
				$rutaImagenes[]['file_name'] = $_POST[$s.$i.'_'.$it];
				$this->valores[$s][$it][$i] = 'nop';
			}
		}
		
		if($todasCargaron === true){
			return $rutaImagenes;
		} else{
			return false;
		}
	}
*/
	
	
	private function loadFiles($s, $it, $a, $c){
		//$this->load->library('upload', $c);
		$this->upload->initialize($c);
		
		$todasCargaron = true;
		$rutaImagenes = [];
		$count = count($a);
		$this->valores[$s][$it] = [];
		
		for ($i = 0; $i < $count; $i++) {
			if( !isset($_POST[$s.$i.'_'.$it]) ){
				if(isset($_FILES[$s.$i.'_'.$it])){
					if($_FILES[$s.$i.'_'.$it]['name'] !== "" && $_FILES[$s.$i.'_'.$it]['error'] == 0){
						if ( ! $this->upload->do_upload($s.$i.'_'.$it) ){
							$todasCargaron = false;
							$this->status = 'error';
							$this->errores[] =  $this->upload->display_errors();
							$rutaImagenes[]['file_name'] = '';
							$this->valores[$s][$it][$i] = '';
						} else{
							$result = $this->upload->data();
							$rutaImagenes[] = $result;
							$this->valores[$s][$it][$i] = $result['file_name'];
						}
					} else{
						$rutaImagenes[]['file_name'] = '';
						$this->valores[$s][$it][$i] = '';
					}
				} else{
					$rutaImagenes[]['file_name'] = '';
					$this->valores[$s][$it][$i] = '';
				}
			} else{
				$rutaImagenes[]['file_name'] = $_POST[$s.$i.'_'.$it];
				$this->valores[$s][$it][$i] = 'nop';
			}
		}
		
		if($todasCargaron === true){
			return $rutaImagenes;
		} else{
			return false;
		}
	}
	
	
	
	public function do_upload(){
		$this->status = 'ok';
		
		// GENERAL
		//::::::  Seccion para procesar informacion de GENERAL :::::
		$this->valores['general'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/img/general';
		$config['allowed_types']	= 'gif|jpg|jpeg|png|svg|svg+xml';
		$config['max_size']			= 1024;
		$config['overwrite']		= true;
		
		if( isset($_FILES['general0_fondo']) ){
			$loadBodyFondo = $this->loadFiles('general', 'fondo', ['null'], $config);
		} else{
			$loadBodyFondo = [];
		}
		


		if($loadBodyFondo !== false && $loadBodyFondo !== false){
			//Datos de la seccion Nosotros.
			$linea = '{';
			$linea .= '"desc_global":"'.$_POST['general']['desc_global'].'",';
			$linea .= '"mapa":"'.$_POST['general']['mapa'].'",';
			$linea .= '"direccion":"'.$_POST['general']['direccion'].'",';
			$linea .= '"facebook":"'.$_POST['general']['facebook'].'",';
			$linea .= '"instagram":"'.$_POST['general']['instagram'].'",';
			$linea .= '"linkedin":"'.$_POST['general']['linkedin'].'",';
			$linea .= '"behance":"'.$_POST['general']['behance'].'",';
			$linea .= '"vimeo":"'.$_POST['general']['vimeo'].'",';
			$linea .= '"telefono":"'.$_POST['general']['telefono'].'",';
			$linea .= '"correo":"'.$_POST['general']['correo'].'",';
			$linea .= '"correo_pass":"'.$_POST['general']['correo_pass'].'",';
			$linea .= '"correo_form":"'.$_POST['general']['correo_form'].'",';
			$linea .= '"servicios":"'.$_POST['general']['servicios'].'",';
			$linea .= '"color_fondo":"'.$_POST['general']['color_fondo'].'",';
			$linea .= '"color_principal":"'.$_POST['general']['color_principal'].'",';
			$linea .= '"color_contraste":"'.$_POST['general']['color_contraste'].'",';
			$linea .= '"fondo" : [';
			$linea .= '{"img":"'.@$loadBodyFondo[0]['file_name'].'"}';
			$linea .= ']}';
			
			
			//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - HOME-SECCIONES
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'general' );
			
			$respuesta = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($respuesta) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $respuesta[0]->id_contenido);
				$valores = array('contenido_info' => $linea);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $linea, 'contenido_pagina' => 'general', 'contenido_seccion' => '', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
			}
		} else{
			$this->errores[] = 'No se cargaron todas las imágenes de la sección de general.';
		}
		
		
		
		
		
		
		
		
		// ALIANZAS
		//::::::  Seccion para procesar informacion de ALIANZAS :::::
		$this->valores['alianza'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/img/alianzas';
		$config['allowed_types']	= 'gif|jpg|jpeg|png|svg|svg+xml';
		$config['max_size']			= 1024;
		$config['overwrite']		= true;
		
		if( isset($_POST['alianzas']['logos']) ){
			$loadAlianza = $this->loadFiles('alianza', 'logo', $_POST['alianzas']['logos'], $config);
		} else{
			$loadAlianza = [];
		}
		

		if($loadAlianza !== false && $loadAlianza !== false){
			//Datos de la seccion Servicios.
			$linea_registros = '{"titulo_general":"'.$_POST['alianzas']['titulo'].'", "logos":[';
			
			if( isset($_POST['alianzas']['logos']) ){
				foreach ($_POST['alianzas']['logos'] as $i=>$v) {
					if($i !== 0){ $linea_registros .= ', '; }
					$linea_registros .= '{"logo":"'.@$loadAlianza[$i]['file_name'].'"}';
				}
			}
			$linea_registros .= ']}';
			
			//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - HOME-SECCIONES
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'footer', "contenido_seccion" => 'alianzas' );
			
			$respuesta = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($respuesta) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $respuesta[0]->id_contenido);
				$valores = array('contenido_info' => $linea_registros);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $linea_registros, 'contenido_pagina' => 'footer', 'contenido_seccion' => 'alianzas', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
			}
		} else{
			$this->errores[] = 'No se cargaron todas las imágenes de alianzas.';
		}
		
		
		
		
		
		
		
		
		//Fin de la operación y retorno de la respuesta JSON a la consulta.
		echo( json_encode(['status' => $this->status, 'valores' => $this->valores, 'errores' => $this->errores]) );
		$this->cleanVar();
	}
	
	
	
	
	
	
	private function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('admin/home'));
	}
	
	
	private function cleanVar(){
		$this->status = [];
		$this->valores = [];
		$this->errores = [];
	}
	
}



