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