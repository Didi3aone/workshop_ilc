<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	protected $_dm;
	private $_view = 'register/';
	//table init
    private $_table 	  = "tbl_pendaftaran";
    private $_table_alias = "tp";
    private $_pk_field    = "pendaftaran_id";

	private $_data;

	public function __construct() {
		parent::__construct();
		$this->_dm = new Dynamic_model;
	}

	public function index() {}

	public function form($pelatihan_id = null)
	{
		$workshop = $this->_dm->set_model("tbl_pelatihan","tp","PelatihanId")->get_all_data(
			array(
				"row_array" => true,
				"conditions" => array("PelatihanId" => $pelatihan_id)
			))['datas'];

		$this->_data['workshop'] = $workshop;

		$this->load->view(LAYOUT_WEB_HEADER);
		$this->load->view($this->_view."register", $this->_data);	
		$this->load->view(LAYOUT_WEB_FOOTER);	
	}

	public function success_regis() 
	{
		$this->load->view(LAYOUT_WEB_HEADER);
		$this->load->view($this->_view."register");	
		$this->load->view(LAYOUT_WEB_FOOTER);	
	}

	private function _set_rule_validation()
	{
		$this->form_validation->set_error_delimiters(" ", "");
        $this->form_validation->set_rules("company", "Nama Perusahaan", "required");
	}

	/**
     * process form 
     * server validation
     */
    public function process_form()
    {
    	// Must AJAX and POST
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //initial
        $message['is_error']  = true;
        $message['error_msg'] = "";

        //load library form validation
        $this->load->library('form_validation');

        //post data master
        $id 			= $this->input->post('id');
        $training_id    = $this->input->post('train_id');
        $company     	= $this->input->post('company');
        $name_1			= $this->input->post('name_1');
        $name_2			= $this->input->post('name_2');
        $name_3			= $this->input->post('name_3');
        $name_4			= $this->input->post('name_4');
        $name_5			= $this->input->post('name_5');
        $jabatan_1		= $this->input->post('jabatan_1');
        $jabatan_2		= $this->input->post('jabatan_2');
        $jabatan_3		= $this->input->post('jabatan_3');
        $jabatan_4		= $this->input->post('jabatan_4');
        $jabatan_5		= $this->input->post('jabatan_5');
        $phone_1        = $this->input->post('phone_1');
        $phone_2        = $this->input->post('phone_2');
        $phone_3        = $this->input->post('phone_3');
        $phone_4        = $this->input->post('phone_4');
        $phone_5        = $this->input->post('phone_5');
        $email_1		= $this->input->post('email_1');
        $email_2		= $this->input->post('email_2');
        $email_3		= $this->input->post('email_3');
        $email_4		= $this->input->post('email_4');
        $email_5		= $this->input->post('email_5');

        //post data detail 1
        $pen_name       = $this->input->post('pen_name');
        $pen_jabatan    = $this->input->post('pen_jabatan');
        $pen_telp       = $this->input->post('pen_telp');
        $pen_fax 		= $this->input->post('pen_fax');
        $pen_phone      = $this->input->post('pen_phone');
        $pen_email      = $this->input->post('email');
        //post data detail 2
        $bayar_name     = $this->input->post('bayar_name');
        $bayar_jabatan  = $this->input->post('bayar_jabatan');
        $bayar_telp     = $this->input->post('bayar_telp');
        $bayar_fax      = $this->input->post('bayar_fax');
        $bayar_phone    = $this->input->post('bayar_phone');
        $bayar_address  = $this->input->post('bayar_address');

        $now 			= date('Y-m-d H:i:s');

        
        // pr($this->input->post());exit;
        $this->_set_rule_validation();

        if($this->form_validation->run($this) == false) {
        	$message['error_msg'] = validation_errors();
        }
        else {
            $this->db->trans_begin();

            //prepare save data master
        	$_save_data = array(
                "pendaftaran_training_id" => $training_id,
                "pendaftaran_company"     => $company,
                "pendaftaran_name_1"      => $name_1,
                "pendaftaran_name_2"      => $name_2,
                "pendaftaran_name_3"      => $name_3,
                "pendaftaran_name_4"      => $name_4,
                "pendaftaran_name_5"      => $name_5,
                "pendaftaran_jabatan_1"   => $jabatan_1,
                "pendaftaran_jabatan_2"   => $jabatan_2,
                "pendaftaran_jabatan_3"   => $jabatan_3,
                "pendaftaran_jabatan_4"   => $jabatan_4,
                "pendaftaran_jabatan_5"   => $jabatan_5,
                "pendaftaran_phone_1"     => $phone_1,
                "pendaftaran_phone_2"     => $phone_2,
                "pendaftaran_phone_3"     => $phone_3,
                "pendaftaran_phone_4"     => $phone_4,
                "pendaftaran_phone_5"     => $phone_5,
                "pendaftaran_email_1"     => $email_1,
                "pendaftaran_email_2"     => $email_2,
                "pendaftaran_email_3"     => $email_3,
                "pendaftaran_email_4"     => $email_4,
                "pendaftaran_email_5"     => $email_5
        	);

        	if($id == "") {
        		$_save_data['pendaftaran_created_date'] = $now;
        		// pr($this->input->post());exit();
        		$result = $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->insert($_save_data);

        		if( $result )
        		{
        			$this->_save_detail_1($result, $pen_name, $pen_jabatan, $pen_telp, $pen_fax, $pen_phone, $pen_email);
        			$this->_save_detail_2($result, $bayar_name, $bayar_jabatan, $bayar_telp, $bayar_fax, $bayar_phone, $bayar_address);
        		}
        		if($this->db->trans_status() == false) {

        			$this->db->trans_rollback();
        			$message['is_error'] = true;
        			$message['error_msg'] = "Database operation failed.";
        		} else {

        			$this->db->trans_commit();
        			$message['is_error']      = false;
        			$message['notif_title']   = "Good !!.";
        			$message['notif_message'] = "Terima kasih pendaftaran anda akan segera kami prosess.";
        			$message['redirect_to']   = "";
        		}
        	} else {

        		$result = $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->update($arrayToDb, $conditions);

        		if($this->db->trans_status() == false) {

        			$this->db->trans_rollback();
        			$message['error_msg'] = "Database operation failed.";
        		} else {

        			$this->db->trans_commit();
        			$message['is_error']      = false;
        			$message['notif_title']   = "Excellent !!.";
        			$message['notif_message'] = "Background SLide has been update.";
        			$message['redirect_to']   = site_url("manager/background");
        		}
        	}
	        $this->output->set_content_type('application/json');
	        echo json_encode($message);
        }
    }

    private function _save_detail_1($id, $name=null, $jabatan=null, $telp=null, $fax=null, $phone=null, $email=null)
    {
    	$array = array(
    		"pendaftaran_id"      => $id,
    		"penanggung_name"     => $name,
    		"penanggung_jabatan"  => $jabatan,
    		"penanggung_telp_ext" => $telp,
    		"penanggung_fax"      => $fax,
    		"penanggung_phone"    => $phone,
    		"penanggung_email"    => $email
    	);

    	$result = $this->_dm->set_model("tbl_penanggung_jawab")->insert($array);

    	return $result;
    }

    private function _save_detail_2($id, $name=null, $jabatan=null, $telp=null, $fax=null, $phone=null, $email=null)
    {
    	$array = array(
    		"pendaftaran_id"      		=> $id,
    		"bayar_name"     			=> $name,
    		"bayar_jabatan"  			=> $jabatan,
    		"bayar_telp_ext" 			=> $telp,
    		"bayar_fax"      			=> $fax,
    		"bayar_phone"    			=> $phone,
    		"bayar_address_invoice"    	=> $email
    	);

    	$result = $this->_dm->set_model("tbl_penanggung_bayar")->insert($array);

    	return $result;
    }

}

/* End of file Register.php */
/* Location: ./application/modules/register/controllers/Register.php */