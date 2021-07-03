<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * IDA Helper Login
 *
 */

// ------------------------------------------------------------------------

if ( ! function_exists('isLogged'))
{
	/**
	 * Is Logged
	 *
	 * Chek if user date is set in session an login ok redirecto tu panel else redirect to login again.
	 *
	 * @return	redirect to login or redirecto to panel
	 */
	function isLogged(){
	    if( (isset($_SESSION['userID']) && $_SESSION['userID'] !== '') && (isset($_SESSION['finger']) && $_SESSION['finger'] !== '') ){
			redirect(base_url('admin/panel'));
		}
	}
}


if ( ! function_exists('isNoLogged'))
{
	/**
	 * Is Logged
	 *
	 * Chek if user date is set in session an login ok redirecto tu panel else redirect to login again.
	 *
	 * @return	redirect to login or redirecto to panel
	 */
	function isNoLogged(){
	    if( (!isset($_SESSION['userID']) || $_SESSION['userID'] === '') || (!isset($_SESSION['finger']) || $_SESSION['finger'] === '') ){
			session_destroy();
			redirect(base_url('admin/login'));
		}
	}
}



if ( ! function_exists('isNoLoggedCustom'))
{
	/**
	 * Is Logged
	 *
	 * revisa si el usuario que desea enrar a personalizar un uniforme se encuenra logueado
	 *
	 * @return	redirect to login or redirecto to panel
	 */
	function isNoLoggedCustom(){
		if( (!isset($_SESSION['idUser']) || $_SESSION['idUser'] === '') ){
			//session_destroy();
			return false;
		} else{
			return true;
		}
	}
}
if ( ! function_exists('isLoggedNoDataCustom'))
{
	/**
	 * Is Logged
	 *
	 * revisa si el usuario que desea enrar a personalizar un uniforme ha ingresado los datos de equipo y liga para poder continuar con la siguente ventana
	 *
	 * @return	redirect to login or redirecto to panel
	 */
	function isLoggedNoDataCustom(){
		if( (!isset($_SESSION['userEquipo']) || $_SESSION['userEquipo'] === '') || (!isset($_SESSION['userLiga']) || $_SESSION['userLiga'] === '') ){
			return false;
		} else{
			return true;
		}
	}
}




if ( ! function_exists('isNoLoggedProfile'))
{
	/**
	 * Is Logged
	 *
	 * Chek if user date is set in session an login ok redirecto tu panel else redirect to login again.
	 *
	 * @return	redirect to login or redirecto to panel
	 */
	function isNoLoggedProfile(){
	    if( (!isset($_SESSION['userIDProfile']) || $_SESSION['userIDProfile'] === '') || (!isset($_SESSION['fingerProfile']) || $_SESSION['fingerProfile'] === '') ){
			session_destroy();
			redirect(base_url('portafolio/login'));
		}
	}
}







?>