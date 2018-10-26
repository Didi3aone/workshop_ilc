<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	protected $_dm;
	private $_view = 'event/';
	
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

/* End of file Event.php */
/* Location: ./application/modules/event/controllers/Event.php */