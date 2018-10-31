<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	protected $_dm;
	private $_view = 'setting/';
	//table init
    private $_table = "tbl_pelatihan";
    private $_table_alias = "tp";
    private $_pk_field    = "PelatihanId";

	
	public function __construct() {
		parent::__construct();
		$this->_dm = new Dynamic_model;
	} 

	public function index() {}

	public function tutorial_daftar()
	{
		$data['tutor'] = $this->_dm->set_model("tbl_tutorial","tt","tutor_id")->get_all_data(array(
			"conditions"  => array("tutor_type_id"  => 1),
			"row_array" => true
		))['datas']; 

		$this->load->view(LAYOUT_WEB_HEADER);
		$this->load->view($this->_view."tutor", $data);	
		$this->load->view(LAYOUT_WEB_FOOTER);	
	}

	public function tutorial_bayar()
	{
		$data['tutor'] = $this->_dm->set_model("tbl_tutorial","tt","tutor_id")->get_all_data(array(
			"conditions"  => array("tutor_type_id"  => 2),
			"row_array" => true
		))['datas']; 

		$this->load->view(LAYOUT_WEB_HEADER);
		$this->load->view($this->_view."tutor", $data);	
		$this->load->view(LAYOUT_WEB_FOOTER);	
	}


	public function about()
	{
		$data['about'] = $this->_dm->set_model("tbl_about","ta","about_id")->get_all_data(array(
			"row_array" => true
		))['datas']; 

		$this->load->view(LAYOUT_WEB_HEADER);
		$this->load->view($this->_view."about", $data);	
		$this->load->view(LAYOUT_WEB_FOOTER);	
	}

	public function syarat_ketentuan()
	{
		$data['sk'] = $this->_dm->set_model("tbl_s_&_k","sk","id")->get_all_data(array(
			"row_array" => true
		))['datas']; 

		$this->load->view(LAYOUT_WEB_HEADER);
		$this->load->view($this->_view."sk", $data);	
		$this->load->view(LAYOUT_WEB_FOOTER);	
	}

	public function contact_us()
	{
		$data['sk'] = $this->_dm->set_model("tbl_contact_us","tc","cont_id")->get_all_data(array(
			"row_array" => true
		))['datas']; 

		$this->load->view(LAYOUT_WEB_HEADER);
		$this->load->view($this->_view."contact-us", $data);	
		$this->load->view(LAYOUT_WEB_FOOTER);	
	}

	public function save_form_contact()
	{
		$message['is_error'] = true;

		$id 		= $this->input->post('id');
		$name 		= $this->input->post('name');
		$subject    = $this->input->post('subject');
		$email 		= $this->input->post('email');
		$content 	= $this->input->post('content');


		$_save_data = array(
			"name"    => $name,
			"email"   => $email,
			"subject" => $subject,
			"content" => $content
		);


		if( $id == "") {
			
			$result = $this->Dynamic_model->set_model("tbl_contact_form","tcf","id")->insert($_save_data);

			$message['is_error']  = false;
			$message['notif']     = "Success";
			$message['notif_msg'] = "Terima kasih telah menghubungi kami";
		} else {
			$result = $this->Dynamic_model->set_model("tbl_contact_form","tcf","id")->update($_save_data,
				array("id" => $id)
			);

			$message['is_error']  = false;
			$message['notif']     = "Success";
			$message['notif_msg'] = "Terima kasih telah menghubungi kami";		
		}

		$this->output->set_content_type('application/json');
		echo json_encode($message);
		exit;
	}
}

/* End of file Setting.php */
/* Location: ./application/modules/setting/controllers/Setting.php */