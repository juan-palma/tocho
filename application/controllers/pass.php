<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pass extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	
	public function index(){
		print_r($this->ida_protect->encrypt_decrypt('encrypt', 'C0n7ol'));
		//print_r($this->ida_protect->encrypt_decrypt('decrypt', $result[0]->user_pass));
		//echo('<br />');
		//print_r(uuid());
	}
	
}