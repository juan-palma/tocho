<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Portafolio extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
		
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
		
		
		
		
		//Consulta - portafolios general
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'portafolio', "contenido_seccion" => 'general' );
		
		$isPortafolio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isPortafolio) && count($isPortafolio) > 0) ? $isPortafolio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['portafoliosDB'] = $valoresDB;
		
		
		
		
		$data['titulo'] = "Portafolios | CI";
		$data['actual'] = "portafolio_general";
		$data['desc'] = "Nuestro portafolios de trabajo | CI";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/portafolio_general', $data);
		$this->load->view('public/footer', $data);
		
		
	}
	
	
	
	public function articulo($peticion = ''){
		
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
		
		
		
		
				

		
		$data['titulo'] = "Portafolio Articulo";
		$data['actual'] = "portafolio_in";
		$data['desc'] = "Nuestro portafolios de trabajo | CI";
		
		
		
		//Consulta - Valor - Portafolios
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'id_contenido, contenido_info';
		$this->basic_modal->like = array("contenido_info" => '"url":"'.$peticion.'"');
		$this->basic_modal->condicion = array( "contenido_pagina" => "portafolios",  "contenido_seccion" => "registro");
		
		$respuesta2 = $this->basic_modal->genericSelect('sistema');
		if(is_array($respuesta2) && count($respuesta2) > 0){
			$clean2 = ($respuesta2[0] && property_exists($respuesta2[0], 'contenido_info')) ? str_replace($encontrar, $remplazar, $respuesta2[0]->contenido_info) : '';
			$cleanObjecDB2 = ( is_object(json_decode($clean2)) ) ? json_decode($clean2) : new stdClass();
			$cleanObjecDB2->id = $respuesta2[0]->id_contenido;
			$data['articuloDB'] = $cleanObjecDB2;
			
			if($cleanObjecDB2->privado === 'si'){
				if( (!isset($_SESSION['accesoPortafolio']) || $_SESSION['accesoPortafolio'] === '') || (!isset($_SESSION['articulo']) || $_SESSION['articulo'] !== $peticion)){
					session_destroy();
					$data['articulo'] = $peticion;
					$data['ruta'] = base_url('portafolio/');
					$this->load->view('public/head', $data);
					$this->load->view('public/portafolio_in_login', $data);
					$this->load->view('public/footer', $data);
				} else{
					$this->load->view('public/head', $data);
					$this->load->view('public/portafolio_in', $data);
					$this->load->view('public/footer', $data);
				}
			} else{
				$this->load->view('public/head', $data);
				$this->load->view('public/portafolio_in', $data);
				$this->load->view('public/footer', $data);
			}
			
		} else{
			$data['message'] = '¡Hola!...  al parecer '.$peticion.' no se encuentra por el momento en este espacio';
			$this->load->view('errors/html/error_404', $data);
		}
	}
	
	
	public function login(){
		$json = array();
		$json['status'] = 'ok';
		$json['valores'] = array();
		$json['errores']  = array();
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';
		
		$peticion = $_POST['articuloP'];
		
		//Consulta - Valor - Portafolios
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'id_contenido, contenido_info';
		$this->basic_modal->like = array("contenido_info" => '"url":"'.$peticion.'"');
		$this->basic_modal->condicion = array( "contenido_pagina" => "portafolios",  "contenido_seccion" => "registro");
		
		$respuesta2 = $this->basic_modal->genericSelect('sistema');
		$clean2 = ($respuesta2[0] && property_exists($respuesta2[0], 'contenido_info')) ? str_replace($encontrar, $remplazar, $respuesta2[0]->contenido_info) : '';
		$cleanObjecDB2 = ( is_object(json_decode($clean2)) ) ? json_decode($clean2) : new stdClass();
		$cleanObjecDB2->id = $respuesta2[0]->id_contenido;
		$data['articuloDB'] = $cleanObjecDB2;
		
		if($_POST['password'] === $cleanObjecDB2->privado_pass){
			$userData = array(
				'accesoPortafolio' => 'yes',
				'articulo' => $peticion,
			);
			$this->session->set_userdata($userData);
						
			$json['valores'][] = 'Se envió el correo de manera correcta.';
		} else{
			$json['status'] = 'error';
			$json['errores'][]  = 'Error interno al enviar el correo';
		}
		echo( json_encode($json) );
	}
	

	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('inicio'));
	}

	
}



