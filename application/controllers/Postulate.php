<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Postulate extends CI_Controller {
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
				
		
		
				
		$data['titulo'] = "Postulate | CI";
		$data['actual'] = "page_postulate";
		$data['desc'] = "Postulate | CI | MODELO";
		
		$data['area'] = "modelo";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/postulate', $data);
		$this->load->view('public/footer', $data);
	}
	
	
	
	public function modelo(){
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
				
		
		
				
		$data['titulo'] = "Postulate | CI";
		$data['actual'] = "page_postulate";
		$data['desc'] = "Postulate | CI | MODELO";
		
		$data['area'] = "modelo";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/postulate', $data);
		$this->load->view('public/footer', $data);
	}
	
	
	
	public function alianza(){
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
				
		
		
				
		$data['titulo'] = "Postulate | CI";
		$data['actual'] = "page_postulate";
		$data['desc'] = "Postulate | CI | AlIANZA";
		
		$data['area'] = "alianza";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/postulate', $data);
		$this->load->view('public/footer', $data);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function do_upload(){
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
		
				
		
		
		if($_POST['g-recaptcha-response'] === "" || $_POST['g-recaptcha-response'] === " "){
			$this->status = 'personal';
			$this->errores[] = 'No valido correctamente el reCaptcha, intente de nuevo.';
			echo( json_encode(['status' => $this->status, 'valores' => "", 'errores' => $this->errores]) );
			$this->cleanVar();
			return false;
		}
		
		
		
		$this->status = 'ok';
		
		//::::::  Seccion para procesar informacion de Quienes Somos :::::
		$this->valores['registro'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/postulantes/';
		$config['allowed_types']	= 'gif|jpg|jpeg|png|svg|svg+xml';
		$config['max_size']			= 1048;
		$config['overwrite']		= true;
		
			
			
		if($_POST['pagina'] == "modelo"){
			if($_POST['nombre'] === "" || $_POST['apellido'] === "" || $_POST['correo'] === "" || $_POST['telefono'] === "" || $_POST['compartir'] === ""){
				$this->status = 'personal';
				$this->errores[] = 'Todos los campos deben de estar llenos.';
				echo( json_encode(['status' => $this->status, 'valores' => "", 'errores' => $this->errores]) );
				$this->cleanVar();
				return false;
			}
			
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'postulados';
			$this->basic_modal->campos = 'id_postulado';
			$this->basic_modal->condicion = array( "correo" => $_POST['correo'] );
			
			$isInicio = $this->basic_modal->genericSelect('sistema');
			
			if(count($isInicio) > 0){
				$this->status = 'personal';
				$this->errores[] =  "Ya existe un registro con esta cuenta de correo";
				echo( json_encode(['status' => $this->status, 'valores' => "", 'errores' => $this->errores]) );
				$this->cleanVar();
				return false;
			}


			
			$micarpeta = url_title($_POST['nombre'].'-'.$_POST['apellido'].'-'.date("Y-m-d-His"));
			if (!file_exists(FCPATH.'assets/public/postulantes/modelo/'.$micarpeta)) {
			    mkdir(FCPATH.'assets/public/postulantes/modelo/'.$micarpeta, 0777, true);
			}
			$config['upload_path'] = FCPATH.'assets/public/postulantes/modelo/'.$micarpeta;
			$this->upload->initialize($config);
		
			$rutaImagenes = [];
			
			
			$loadCredencial = false;
			if ( ! $this->upload->do_upload('credencial') ){
				$loadCredencial = false;
				$this->status = 'error';
				$this->errores[] =  $this->upload->display_errors();
				$rutaImagenes[]['file_name'] = '';
			} else{
				$loadCredencial = true;
				$result = $this->upload->data();
				$rutaImagenes[] = $result['file_name'];
			}

			
			//subir fotos del postulante.
			$nameFotos = [];
			$nameFotosError = true;
			for ($i = 0; $i < intval($_POST['fotosTotal']); $i++) {
				if ( ! $this->upload->do_upload('fotos_'.$i) ){
					$this->status = 'error';
					$this->errores[] =  $this->upload->display_errors();
					$nameFotosError = false;
				} else{
					$result = $this->upload->data();
					$nameFotos[] = $result;
				}
			}
		
		
		
			if($loadCredencial !== false && $nameFotosError !== false){
				//Datos de la seccion Nosotros.	
				$linea = '{"nombre":"'.$_POST['nombre'].'"';
				$linea .= ', "apellido":"'.$_POST['apellido'].'"';
				$linea .= ', "correo":"'.$_POST['correo'].'"';
				$linea .= ', "telefono":"'.$_POST['telefono'].'"';
				$linea .= ', "compartir":"'.$_POST['compartir'].'"';
				$linea .= ', "credencial":"'.$rutaImagenes[0].'"';
				$linea .= ', "carpeta":"'.$micarpeta.'"';
	
	
				$linea .= ', "fotos":[';
				if( count($nameFotos) > 0 ){
					foreach ($nameFotos as $i=>$f) {
						if($i !== 0){ $linea .= ', '; }
						$linea .= '{"foto":"'.$f['file_name'].'"}';
					}
				}
				
				
				$linea .= ']}';
				
				
				
				//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
				//Consulta - SOMOS
				$this->basic_modal->clean();
				$this->basic_modal->tabla = 'postulados';
				
				//Consulta INSERT servicios
				$valores = array( 'correo' => $_POST['correo'], 'seccion' => $_POST['pagina'], 'contenido' => $linea);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
				$this->valores[] = "Se agrego con exito tu registro";
				
				$this->load->helper('mail');
				require(VIEWPATH.'admin/customers_parametros.php');
				
				$idaMail_data['destino_mail'][] = $cleanObjecDB->correo;
				$idaMail_data['origen_mail'] = $cleanObjecDB->correo_form;
				$idaMail_data['reply_mail'] = $cleanObjecDB->correo;
				$idaMail_data['username'] = $cleanObjecDB->correo_form;
				$idaMail_data['password'] = $cleanObjecDB->correo_pass;
				$idaMail_data['asunto'] = 'Nuevo postulado para Modelo - sitio WEB Circulo de Imagen';

				
				$idaMail_data['destino_mail'][] = "soporte@idalibre.com";
				$idaMail_data['origen_mail'] = "soporte@idalibre.com";
				$idaMail_data['reply_mail'] = "soporte@idalibre.com";
				$idaMail_data['username'] = "soporte@idalibre.com";
				$idaMail_data['password'] = 'Soporte.libre';
				
				
				$template = FCPATH.'assets/public/template/modeloForm.php';
				$info = array();
				$info['nombre'] = $_POST['nombre'];
				$info['apellido'] = $_POST['apellido'];
				$info['mail'] = $_POST['correo'];
				$info['tel'] = $_POST['telefono'];
				$info['compartir'] = $_POST['compartir'];
				$info['identificacion'] = base_url('assets/public/postulantes/modelo/').$micarpeta.'/'.$rutaImagenes[0];
				$info['logo'] = base_url('assets/public/img/logo_ci.svg');
				$info['empresa'] = 'Circulo Imagen';
				$info['sitio'] = base_url('postulate/modelo');
				
				$fotos = '';
				if( count($nameFotos) > 0 ){
					foreach ($nameFotos as $i=>$f) {
						$fotos .='<div style="width: 25%; display: inline-block; float:left;"><img src="'.base_url('assets/public/postulantes/modelo/').$micarpeta.'/'.$f['file_name'].'" style="width: 100%;"></div>';
					}
				}
				$info['fotos'] = $fotos;
				
				
				$respMail = ida_sendMail($template, $info, $idaMail_data);
				if($respMail){
					$this->valores[] = 'Se envió el correo de manera correcta.';
				} else{
					$this->status = 'error';
					$this->errores[]  = 'Error interno al enviar el correo';
				}
				
				
				
			} else{
				$this->status = 'error';
				$this->errores[] = 'No se cargaron las imágenes completas para el registro.';
			}
		} else if($_POST['pagina'] == "alianza"){
			if($_POST['empresa'] === "" || $_POST['razon'] === "" || $_POST['correo'] === "" || $_POST['telefono'] === "" || $_POST['direccion'] === ""){
				$this->status = 'personal';
				$this->errores[] = 'Todos los campos deben de estar llenos.';
				echo( json_encode(['status' => $this->status, 'valores' => "", 'errores' => $this->errores]) );
				$this->cleanVar();
				return false;
			}
		
		
		
			//Datos de la seccion Nosotros.	
			$linea = '{"empresa":"'.$_POST['empresa'].'"';
			$linea .= ', "razon":"'.$_POST['razon'].'"';
			$linea .= ', "correo":"'.$_POST['correo'].'"';
			$linea .= ', "telefono":"'.$_POST['telefono'].'"';
			$linea .= ', "direccion":"'.$_POST['direccion'].'"';


			$linea .= ', "servicios":[';
			if( count($_POST['servicios']) > 0 ){
				foreach ($_POST['servicios'] as $i=>$f) {
					if($i !== 0){ $linea .= ', '; }
					$linea .= '{"servicio":"'.$f.'"}';
				}
			}
			$linea .= ']}';
			
			
			
			//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - SOMOS
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'postulados';
			$this->basic_modal->campos = 'id_postulado';
			$this->basic_modal->condicion = array( "correo" => $_POST['correo'] );
			
			$isInicio = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'postulados';
			
			if(count($isInicio) > 0){
				//Consulta UPDATE servicios
				//$this->basic_modal->condicion = array('id_contenido', $isInicio[0]->id_contenido);
				//$valores = array('contenido_info' => $linea);
				//$update = $this->basic_modal->genericUpdate('sistema', $valores);
				$this->status = 'personal';
				$this->errores[] =  "Ya existe un registro con esta cuenta de correo";
			} else{
				//Consulta INSERT servicios
				$valores = array( 'correo' => $_POST['correo'], 'seccion' => $_POST['pagina'], 'contenido' => $linea);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
				$this->valores[] = "Se agrego con exito tu registro";
				
				$this->load->helper('mail');
				require(VIEWPATH.'admin/customers_parametros.php');
				
				$idaMail_data['destino_mail'][] = $cleanObjecDB->correo;
				$idaMail_data['origen_mail'] = $cleanObjecDB->correo_form;
				$idaMail_data['reply_mail'] = $cleanObjecDB->correo;
				$idaMail_data['username'] = $cleanObjecDB->correo_form;
				$idaMail_data['password'] = $cleanObjecDB->correo_pass;
				$idaMail_data['asunto'] = 'Nuevo postulado para Alianza - sitio WEB Circulo de Imagen';

				
				$idaMail_data['destino_mail'][] = "soporte@idalibre.com";
				$idaMail_data['origen_mail'] = "soporte@idalibre.com";
				$idaMail_data['reply_mail'] = "soporte@idalibre.com";
				$idaMail_data['username'] = "soporte@idalibre.com";
				$idaMail_data['password'] = 'Soporte.libre';
				
				
				$linea = '{"empresa":"'.$_POST['empresa'].'"';
				$linea .= ', "razon":"'.$_POST['razon'].'"';
				$linea .= ', "correo":"'.$_POST['correo'].'"';
				$linea .= ', "telefono":"'.$_POST['telefono'].'"';
				$linea .= ', "direccion":"'.$_POST['direccion'].'"';
			
				$template = FCPATH.'assets/public/template/alianzaForm.php';
				$info = array();
				$info['empresaAlianza'] = $_POST['empresa'];
				$info['razon'] = $_POST['razon'];
				$info['mail'] = $_POST['correo'];
				$info['tel'] = $_POST['telefono'];
				$info['direccion'] = $_POST['direccion'];
				$info['logo'] = base_url('assets/public/img/logo_ci.svg');
				$info['empresa'] = 'Circulo Imagen';
				$info['sitio'] = base_url('postulate/alianza');
				
				$servicios = '';
				if( count($_POST['servicios']) > 0 ){
					foreach ($_POST['servicios'] as $i=>$f) {
						$servicios .='<div style="width: 100%; display: block;">'.($i + 1).'. '.$f.'</div>';
					}
				}
				$info['servicios'] = $servicios;
				
				
				$respMail = ida_sendMail($template, $info, $idaMail_data);
				if($respMail){
					$this->valores[] = 'Se envió el correo de manera correcta.';
				} else{
					$this->status = 'error';
					$this->errores[]  = 'Error interno al enviar el correo';
				}
			}
				
		}
		
		
		
		//Fin de la operación y retorno de la respuesta JSON a la consulta.
		echo( json_encode(['status' => $this->status, 'valores' => $this->valores, 'errores' => $this->errores]) );
		$this->cleanVar();
	}

	
	
	private function cleanVar(){
		$this->status = [];
		$this->valores = [];
		$this->errores = [];
	}
	
				
	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('inicio'));
	}

	
}



