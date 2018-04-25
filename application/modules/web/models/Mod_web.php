<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Mod_web extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
}
?>