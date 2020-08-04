<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Quienes_somos extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('upload');
	}
	
	public $varFlash = 'flashSomos';
	public $success = [];
	public $error = [];
	
	public $status = [];
	public $valores = [];
	public $errores = [];
	
	public function index(){
		isNoLogged();
		
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';				
		
		
		//Consulta - Quienes Somos
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'somos', "contenido_seccion" => '' );
		
		$isInicio = $this->basic_modal->genericSelect('sistema');
		$consulta = (is_array($isInicio) && count($isInicio) > 0) ? $isInicio[0] : '';
		$nuevoValor = (isset($consulta) && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
		$valoresDB = ( is_object(json_decode($nuevoValor)) ) ? json_decode($nuevoValor) : new stdClass();
		$data['somosDB'] = $valoresDB;
		
		
		
		$data['titulo'] = "Quienes Somos";
		$data['actual'] = "somos";
		$data['varFlash'] = $this->varFlash;
		$this->load->view('admin/head2', $data);
		$this->load->view('admin/saveControl', $data);
		$this->load->view('admin/quienes_somos', $data);
		$this->load->view('admin/footer2', $data);
	}
	
	
		
		
		
	
	
	private function loadFiles($s, $it, $a, $c){
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
		
		//::::::  Seccion para procesar informacion de Quienes Somos :::::
		$this->valores['registro'] = [];
		
		$config['upload_path']		= FCPATH.'assets/public/img/somos/';
		$config['allowed_types']	= 'gif|jpg|jpeg|png|svg|svg+xml';
		$config['max_size']			= 2048;
		$config['overwrite']		= true;
		
		
		//subir fotos de imagenes globales de titulo
		$loadPortada = $this->loadFiles('base', 'titulo_fondo', ['null'], $config);
		$loadImagen1 = $this->loadFiles('base', 'texto1_imagen', ['null'], $config);
		$loadImagen2 = $this->loadFiles('base', 'texto2_imagen', ['null'], $config);
		

		
		//subir logos de galeria VISION
		if( isset($_POST['galeriav']['fotov']) ){
			$loadVision = $this->loadFiles('galeriav', 'fotov', $_POST['galeriav']['fotov'], $config);
		} else{
			$loadVision = [];
		}
		
		
		//subir logos de galeria MISION
		if( isset($_POST['galeriam']['fotom']) ){
			$loadMision = $this->loadFiles('galeriam', 'fotom', $_POST['galeriam']['fotom'], $config);
		} else{
			$loadMision = [];
		}
		
		


		if($loadVision !== false && $loadMision !== false){
			//Datos de la seccion Nosotros.			
			$linea = '{"titulo_general":"'.$_POST['registros']['titulo'].'"';
			$linea .= ', "titulo_fondo":"'.$loadPortada[0]['file_name'].'"';
			$linea .= ', "intro":"'.$_POST['registros']['intro'].'"';
			$linea .= ', "vision":"'.$_POST['registros']['vision'].'"';
			$linea .= ', "mision":"'.$_POST['registros']['mision'].'"';
			
			$linea .= ', "titulo1":"'.$_POST['registros']['titulo1'].'"';
			$linea .= ', "texto1":"'.$_POST['registros']['texto1'].'"';
			$linea .= ', "texto1_imagen":"'.$loadImagen1[0]['file_name'].'"';
			
			$linea .= ', "titulo2":"'.$_POST['registros']['titulo2'].'"';
			$linea .= ', "texto2":"'.$_POST['registros']['texto2'].'"';
			$linea .= ', "texto2_imagen":"'.$loadImagen2[0]['file_name'].'"';
			
			


			$linea .= ', "galeriav":[';
			if( isset($_POST['galeriav']['fotov']) ){
				foreach ($_POST['galeriav']['fotov'] as $i=>$v) {
					if($i !== 0){ $linea .= ', '; }
					$linea .= '{"fotov":"'.@$loadVision[$i]['file_name'].'"}';
				}
			}
			
			
			$linea .= '], "galeriam":[';
			if( isset($_POST['galeriam']['fotom']) ){
				foreach ($_POST['galeriam']['fotom'] as $i=>$v) {
					if($i !== 0){ $linea .= ', '; }
					$linea .= '{"fotom":"'.@$loadMision[$i]['file_name'].'"}';
				}
			}
			
			
			$linea .= ']}';
			
/*
			//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - SOMOS
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "id_contenido" => $_POST['registros']['id'] );
			
			$respuesta = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($respuesta) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $_POST['registros']['id']);
				$valores = array('contenido_info' => $linea);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $linea, 'contenido_pagina' => 'somos', 'contenido_seccion' => '', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
				$this->valores['registro']['id'] = $insert;
			}
*/
			
			
			
			//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - SOMOS
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'somos', "contenido_seccion" => '' );
			
			$isInicio = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($isInicio) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $isInicio[0]->id_contenido);
				$valores = array('contenido_info' => $linea);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $linea, 'contenido_pagina' => 'somos', 'contenido_seccion' => '', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
			}
			
			
			
		} else{
			$this->errores[] = 'No se cargaron todas las imágenes de la sección de nosotros.';
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
	
	
	public function delReg($id = ''){
		isNoLogged();
		
		if($id !== ''){
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$valores = array('id_contenido' => $id);
			$insert = $this->basic_modal->genericDelete('sistema', $valores);
			
			header('Location: '. base_url('admin/servicios'));
		}
	}
	
}



