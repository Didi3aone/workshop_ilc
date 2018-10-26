<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_log extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$data['change'] = $this->Dynamic_model->set_model("tbl_change_log","tcl","change_log_id")->get_all_data(array("debug" => false)
		)['datas'];
		$this->load->view("change_log",$data);	
	}

}

/* End of file Change_log.php */
/* Location: ./application/controllers/Change_log.php */