<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	//set variable ptotected
	protected $_dm;
	private $_view = 'index/';
	
	public function __construct() {
		parent::__construct();
		$this->_dm = new Dynamic_model;
	}

	public function index()
	{
		$this->load->view(LAYOUT_WEB_HEADER);
		$this->load->view($this->_view."index");	
		$this->load->view(LAYOUT_WEB_FOOTER);	
	}

}

/* End of file Index.php */
/* Location: ./application/modules/index/controllers/Index.php */