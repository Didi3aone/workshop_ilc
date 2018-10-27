<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_manager extends CI_Controller
{
    //set variable protect and private;
    protected  $_currentUser;
    protected $_header;
    protected $_footer;
    protected $_data;

    private    $_view = 'dashboard/';
    private    $_load_js = 'dashboard/javascript/';

	public function __construct() {
        parent::__construct();
        //cek session
        if( $this->session->userdata("IS_LOGIN") == FALSE) {
        	redirect('manager/login','refresh');
        }
    }


    /**
     * [index description]
     * @param  [type] $slug [description]
     * @return [type]       [description]
     */
	public function index($slug = null)
	{
        $total = $this->Dynamic_model->set_model("tbl_pendaftaran")->get_all_data(array("count_all_first" => true));
        //set all properties
        $this->_header = array(
            "title"      => "Dashboard",   
                'css' => array(
                    'asset/css/sweetalert2.css'
            )
        );

        $this->_data = array(
             "title_page" =>  "Dashboard", 
        );

       $this->_footer = array();

		$data = array(
            "title"      => "Dashboard",
            "title_page" => "Dashboard",
            "breadcrumb" => "<li> Dashboard </li>",
            "total"      => $total
        );

		$this->load->view(HEADER_MANAGER,$this->_header);
        $this->load->view($this->_view.'index',$data);
        $this->load->view(FOOTER_MANAGER);
	} 
}

/* End of file dashboard.php */
/* Location: ./application/controllers/user/dashboard.php */