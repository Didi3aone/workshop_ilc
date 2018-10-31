<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		
	}

	public function form_subscribe ()
	{
		$message['is_error'] = true;

		$this->load->library('form_validation');
		$email = $this->input->post('email');

		$this->form_validation->set_rules("email","Email","required");

		if( $this->form_validation->run() == FALSE ) {
			$message['error_msg'] = validation_errors();
		} else {

			$save = array(
				"sub_email" => $email
			);

			$result = $this->Dynamic_model->set_model("tbl_subscribe","ts","sub_id")->insert($save);

			if( $result )
			{
				$message['is_error']  = false;
				$message['notif']     = "Success";
				$message['notif_msg'] = "Thanks for subscribe";
			}
		}

		$this->output->set_content_type('application/json');
		echo json_encode($message);
		exit;
	}
}

/* End of file Contact.php */
/* Location: ./application/modules/contact/controllers/Contact.php */