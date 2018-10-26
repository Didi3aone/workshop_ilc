<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	protected $_dm;
	private $_view = 'register/';
	//table init
    private $_table = "tbl_pelatihan";
    private $_table_alias = "tp";
    private $_pk_field    = "PelatihanId";

	
	public function __construct() {
		parent::__construct();
		$this->_dm = new Dynamic_model;
	}

	public function index()
	{
		$this->load->view(LAYOUT_WEB_HEADER);
		$this->load->view($this->_view."register");	
		$this->load->view(LAYOUT_WEB_FOOTER);	
	}
}

/* End of file Register.php */
/* Location: ./application/modules/register/controllers/Register.php */