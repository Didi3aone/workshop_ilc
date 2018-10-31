<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_manager extends CI_Controller {

	private $_title       = "Setting";
    private $_title_page  = 'Setting ';
    private $_breadcrumb  = "<li><a href='/'>Home</a></li>";
    private $_active_page = "setting";
    private $_dm;
    private $_view        = "setting/";
    private $_js_view     = "setting/javascript/";
    private $_header;
    private $_footer;

    public function __construct() {
    	parent::__construct();
    	//new class model
        $this->load->helper('form');
        $this->_dm = new Dynamic_model();
        if( $this->session->userdata("IS_LOGIN") == FALSE) {
            redirect('manager/login','refresh');
        }
    }

	/*
    * list data
    */
    public function index()
    {
        $this->_header = array( 
            "title"      => $this->_title,   
            "title_page" => $this->_title_page,
            "breadcrumb" => $this->_breadcrumb ."<li>Setting</li>",
            "active_page"=> $this->_active_page,
            "css" => array(
                "assets/js/plugins/lightbox/css/lightbox.css"
            )
        );

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.tableTools.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/plugins/lightbox/js/lightbox.js",
                // "assets/js/pages/background/list.js"
            ),
            "script_js"   => $this->_js_view."list_js"
        );
       
       $this->load->view(HEADER_MANAGER, $this->_header);
       $this->load->view($this->_view. 'index');
       $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /*
    * list data
    */
    public function tutor_list()
    {
        $this->_header = array( 
            "title"      => $this->_title,   
            "title_page" => $this->_title_page,
            "breadcrumb" => $this->_breadcrumb ."<li>Setting Tutorial</li>",
            "active_page"=> $this->_active_page."-tutor",
            "css" => array(
                "assets/js/plugins/lightbox/css/lightbox.css"
            )
        );

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.tableTools.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/plugins/lightbox/js/lightbox.js",
            ),
            "script_js"   => $this->_js_view."list_tutor_js"
        );
       
       $this->load->view(HEADER_MANAGER, $this->_header);
       $this->load->view($this->_view. 'index-tutor');
       $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /*
    * list data
    */
    public function payment_list()
    {
        $this->_header = array( 
            "title"      => $this->_title,   
            "title_page" => $this->_title_page,
            "breadcrumb" => $this->_breadcrumb ."<li>Setting Payment</li>",
            "active_page"=> $this->_active_page."-payment",
            "css" => array(
                "assets/js/plugins/lightbox/css/lightbox.css"
            )
        );

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/datatables/jquery.dataTables.min.js",
                "assets/js/plugins/datatables/dataTables.tableTools.min.js",
                "assets/js/plugins/datatables/dataTables.bootstrap.min.js",
                "assets/js/plugins/datatable-responsive/datatables.responsive.min.js",
                "assets/js/plugins/lightbox/js/lightbox.js",
            ),
            "script_js"   => $this->_js_view."list_payment_js"
        );
       
       $this->load->view(HEADER_MANAGER, $this->_header);
       $this->load->view($this->_view. 'index-payment');
       $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /*
    * list data
    */
    public function tautan_list()
    {
        $this->_header = array( 
            "title"      => $this->_title,   
            "title_page" => $this->_title_page,
            "breadcrumb" => $this->_breadcrumb ."<li>Setting Tautan</li>",
            "active_page"=> $this->_active_page."-tautan",
            "css" => array(
                "assets/js/plugins/lightbox/css/lightbox.css"
            )
        );

        $data['data'] = $this->_dm->set_model("tbl_tautan","ta","tautan_id")->get_all_data(array(
            "conditions" => array("tautan_is_active" => STATUS_ACTIVE)
        ))['datas'];

        $this->_footer = array();
       
       $this->load->view(HEADER_MANAGER, $this->_header);
       $this->load->view($this->_view. 'index-tautan', $data);
       $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function create_tutor()
    {

        $this->_header = array(
            "title"         => $this->_title ."-create-tutorial",    
            "title_page"    => $this->_title_page."-create-tutorial",
            "breadcrumb"    => $this->_breadcrumb. "<li> create Tutorial </li>",
            "active_page"   => $this->_active_page ."-create-tutorial",
        );
        
        $data['type'] = $this->_dm->set_model("tbl_tutor_type","ttt","type_id")->get_all_data()['datas'];

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),
            "script_js" => $this->_js_view ."create_tutor_js",
            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'create-tutor',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function create_payment()
    {

        $this->_header = array(
            "title"         => $this->_title ."-create-payment",    
            "title_page"    => $this->_title_page."-create-payment",
            "breadcrumb"    => $this->_breadcrumb. "<li> create payment </li>",
            "active_page"   => $this->_active_page ."-payment",
        );
        
        $data['type'] = $this->_dm->set_model("tbl_tutor_type","ttt","type_id")->get_all_data()['datas'];

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),
            "script_js" => $this->_js_view ."create_payment_js",
            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'create-payment',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function edit_tutor($id = null)
    {
        if($id == null || !is_numeric($id)) {
            show_404();
        }

        $data['datas'] = $this->_dm->set_model("tbl_tutorial","tt","tutor_id")->get_all_data(array(
        	"select"	 => "tt.*, ttt.*",
        	"joined"	 => array("tbl_tutor_type ttt" => array("ttt.type_id" => "tt.tutor_type_id")),
            "conditions" => array("tutor_id" => $id), 
            "row_array"  => true))['datas'];

        $this->_header = array(
            "title"         => $this->_title ."-edit-tutorial",    
            "title_page"    => $this->_title_page."-edit-tutorial",
            "breadcrumb"    => $this->_breadcrumb. "<li> edit Tutorial </li>",
            "active_page"   => $this->_active_page ."-edit-tutorial",
        );

        $data['type'] = $this->_dm->set_model("tbl_tutor_type","ttt","type_id")->get_all_data()['datas'];

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),

            "script_js" => $this->_js_view ."create_tutor_js",

            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'create-tutor',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function edit_payment($id = null)
    {
        if($id == null || !is_numeric($id)) {
            show_404();
        }

        $data['datas'] = $this->_dm->set_model("tbl_payment","tp","payment_id")->get_all_data(array(
            "conditions" => array("payment_id" => $id), 
            "row_array"  => true))['datas'];

        $this->_header = array(
            "title"         => $this->_title ."-edit-payment",    
            "title_page"    => $this->_title_page."-edit-payment",
            "breadcrumb"    => $this->_breadcrumb. "<li> edit payment </li>",
            "active_page"   => $this->_active_page ."-payment",
        );

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),

            "script_js" => $this->_js_view ."create_payment_js",

            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'create-payment',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function edit_about()
    {
        $this->_header = array(
            "title"         => $this->_title ."-edit-about",    
            "title_page"    => $this->_title_page."-edit-about",
            "breadcrumb"    => $this->_breadcrumb. "<li> edit about </li>",
            "active_page"   => $this->_active_page ."-tautan",
        );

        $data['datas'] = $this->_dm->set_model("tbl_about","ta","about_id")->get_all_data(array(
        	"row_array" => true
        ))['datas'];

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),

            "script_js" => $this->_js_view ."create_about_js",

            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'edit-about',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function view_about()
    {
        $this->_header = array(
            "title"         => $this->_title ."-edit-about",    
            "title_page"    => $this->_title_page."-edit-about",
            "breadcrumb"    => $this->_breadcrumb. "<li> edit about </li>",
            "active_page"   => $this->_active_page ."-tautan",
        );

        $data['datas'] = $this->_dm->set_model("tbl_about","ta","about_id")->get_all_data(array(
        	"row_array" => true
        ))['datas'];

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),

            "script_js" => $this->_js_view ."create_about_js",

            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'view_about',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function edit_syarat()
    {
        $this->_header = array(
            "title"         => $this->_title ."-edit-s&k",    
            "title_page"    => $this->_title_page."-edit-s&k",
            "breadcrumb"    => $this->_breadcrumb. "<li> edit s&k </li>",
            "active_page"   => $this->_active_page ."-tautan",
        );

        $data['datas'] = $this->_dm->set_model("tbl_s_&_k","ts","id")->get_all_data(array(
        	"row_array" => true
        ))['datas'];

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),

            "script_js" => $this->_js_view ."create_about_js",

            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'edit-sk',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function view_syarat()
    {
        $this->_header = array(
            "title"         => $this->_title ."-view-about",    
            "title_page"    => $this->_title_page."-view-about",
            "breadcrumb"    => $this->_breadcrumb. "<li> view about </li>",
            "active_page"   => $this->_active_page ."-tautan",
        );

        $data['datas'] = $this->_dm->set_model("tbl_s_&_k","ts","id")->get_all_data(array(
        	"row_array" => true
        ))['datas'];

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),

            "script_js" => $this->_js_view ."create_about_js",

            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'view-syarat',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function edit_contact()
    {
        $this->_header = array(
            "title"         => $this->_title ."-edit-contact",    
            "title_page"    => $this->_title_page."-edit-contact",
            "breadcrumb"    => $this->_breadcrumb. "<li> edit contact </li>",
            "active_page"   => $this->_active_page ."-tautan",
        );

        $data['datas'] = $this->_dm->set_model("tbl_contact_us","tc","cont_id")->get_all_data(array(
        	"row_array" => true
        ))['datas'];

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),

            "script_js" => $this->_js_view ."create_about_js",

            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'edit-contact',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function view_contact()
    {
        $this->_header = array(
            "title"         => $this->_title ."-view-contact",    
            "title_page"    => $this->_title_page."-view-contact",
            "breadcrumb"    => $this->_breadcrumb. "<li> view contact </li>",
            "active_page"   => $this->_active_page ."-tautan",
        );

        $data['datas'] = $this->_dm->set_model("tbl_contact_us","tc","cont_id")->get_all_data(array(
        	"row_array" => true
        ))['datas'];

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),

            "script_js" => $this->_js_view ."create_about_js",

            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'view-contact',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
     * create new article
     */
    public function view_tutor($id = null)
    {
        if($id == null || !is_numeric($id)) {
            show_404();
        }

        $data['datas'] = $this->_dm->set_model("tbl_tutorial","tt","tutor_id")->get_all_data(array(
        	"select"	 => "tt.*, ttt.*",
        	"joined"	 => array("tbl_tutor_type ttt" => array("ttt.type_id" => "tt.tutor_type_id")),
            "conditions" => array("tutor_id" => $id), 
            "row_array"  => true))['datas'];

        $this->_header = array(
            "title"         => $this->_title ."-view-tutorial",    
            "title_page"    => $this->_title_page."-view-tutorial",
            "breadcrumb"    => $this->_breadcrumb. "<li> view Tutorial </li>",
            "active_page"   => $this->_active_page ."-view-tutorial",
        );

        $data['type'] = $this->_dm->set_model("tbl_tutor_type","ttt","type_id")->get_all_data()['datas'];

        $this->_footer = array(
            "script" => array(
                "assets/js/plugins/cropper/cropper.min.js",
                "assets/js/crop-master.js",
                "assets/js/plugins/tinymce/tinymce.min.js"
            ),

            "script_js" => $this->_js_view ."create_tutor_js",

            "css"   => array(
                "assets/js/plugins/cropper/crop.css",
                "assets/js/plugins/cropper/cropper.css"
            ),
        );

        //load views
        $this->load->view(HEADER_MANAGER, $this->_header);
        $this->load->view($this->_view. 'view-tutor',$data);
        $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
    * ajax get data
    */
    public function list_all_data_tutor()
    {
       //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
            exit('No direct script access allowed');
        }

        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
        $sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
        $limit = sanitize_str_input($this->input->get("length"), "numeric");
        $start = sanitize_str_input($this->input->get("start"), "numeric");
        $search = sanitize_str_input($this->input->get("search")['value']);
        $filter = $this->input->get("filter");

        $select = array("tutor_id","tutor_name","ttt.type_name");
        $joined = array("tbl_tutor_type ttt" => array("ttt.type_id" => "tt.tutor_type_id"));

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array();

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = ($value);
                switch ($key) {
                    case 'id':
                        if ($value != "") {
                            $data_filters['lower(tutor_id)'] = $value;
                        }
                        break;
                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->_dm->set_model("tbl_tutorial","tt","tutor_id")->get_all_data(array(
            'select'            => $select,
            'joined'			=> $joined,
            'order_by'          => array($column_sort => $sort_dir),
            'limit'             => $limit,
            'start'             => $start,
            'conditions'        => $conditions,
            'filter'            => $data_filters,
            "count_all_first"   => true,
            "debug"             => false
        ));

        //get total rows
        $total_rows = $datas['total'];

        $output = array(
            "data" => $datas['datas'],
            "draw" => intval($this->input->get("draw")),
            "recordsTotal" => $total_rows,
            "recordsFiltered" => $total_rows,
        );

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($output);
        exit;
    }

    /**
    * ajax get data
    */
    public function list_all_data_payment()
    {
       //must ajax and must get.
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "GET") {
            exit('No direct script access allowed');
        }

        $sort_col = sanitize_str_input($this->input->get("order")['0']['column'], "numeric");
        $sort_dir = sanitize_str_input($this->input->get("order")['0']['dir']);
        $limit = sanitize_str_input($this->input->get("length"), "numeric");
        $start = sanitize_str_input($this->input->get("start"), "numeric");
        $search = sanitize_str_input($this->input->get("search")['value']);
        $filter = $this->input->get("filter");

        $select = array("payment_id","payment_bank","payment_image");

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array();

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = ($value);
                switch ($key) {
                    case 'id':
                        if ($value != "") {
                            $data_filters['lower(tutor_id)'] = $value;
                        }
                        break;
                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->_dm->set_model("tbl_payment","tp","payment_id")->get_all_data(array(
            'select'            => $select,
            'order_by'          => array($column_sort => $sort_dir),
            'limit'             => $limit,
            'start'             => $start,
            'conditions'        => $conditions,
            'filter'            => $data_filters,
            "count_all_first"   => true,
            "debug"             => false
        ));

        //get total rows
        $total_rows = $datas['total'];

        $output = array(
            "data" => $datas['datas'],
            "draw" => intval($this->input->get("draw")),
            "recordsTotal" => $total_rows,
            "recordsFiltered" => $total_rows,
        );

        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($output);
        exit;
    }

    /**
     * ajax form
     */
    public function process_form_tutor()
    {
        // Must AJAX and POST
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //initital
        $message['is_error'] = true;
        $message['redirect_to'] = '';

        // pr($this->input->post());exit;
        $id         = $this->input->post('id');
        $title      = $this->input->post('name');
        $type       = $this->input->post('type_id');
        $desc       = $this->input->post('desc');

        $author     = $this->session->userdata("user_id");
 
        //begin transaction
        $this->db->trans_begin();

        //prepare save to DB
        $_save_data = array(
        	"tutor_name"    => $title,
        	"tutor_type_id" => $type,
        	"tutor_desc"    => $desc
        );

        //insert or update
        if($id == "") {

        	$_save_data['tutor_author_id'] = $author;

            $result = $this->_dm->set_model("tbl_tutorial","tt","tutor_id")->insert($_save_data);

            //end transaction.
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $message['error_msg'] = 'Insert failed! Please try again.';
            } else {
                $this->db->trans_commit();
                //growler.
                $message['is_error']        = false;
                $message['notif_title']     = "Excellent!";
                $message['notif_message']   = "Tutorial has been added.";

                //on update, redirect.
                $message['redirect_to']     = site_url('manager/setting/tutor-list');
            }
        } else {

            $conditions = array("tutor_id" => $id);
            $_save_data['tutor_author_id'] = $author;

            $result = $this->_dm->set_model("tbl_tutorial","tt","tutor_id")->update($_save_data, $conditions);

            //end transaction
            if($this->db->trans_status() == false ) {
                //balikin jangan di insert
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                //success
                $message['is_error']        = false;
                $message['notif_title']     = 'Good!';
                $message['notif_message']   = 'Tutorial has been been updated';
                $message['redirect_to']     = site_url('manager/setting/tutor-list');
            }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * ajax form
     */
    public function process_form_payment()
    {
        // Must AJAX and POST
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //initital
        $message['is_error'] = true;
        $message['redirect_to'] = '';

        $id         = $this->input->post('id');
        $bank 	    = $this->input->post('name');
        $desc       = $this->input->post('desc');
 
        //begin transaction
        $this->db->trans_begin();

        //prepare save to DB
        $_save_data = array(
        	"payment_bank"  => $bank,
        	"payment_desc"  => $desc
        );

        if(isset($_FILES['real_image']['name']) ) {
            $upload_real_image = $this->upload_file("real_image", "payment-".date('Ymd').time()  , false,"upload/payment/",$id);
        } 

        if(isset($upload_real_image['uploaded_path'])) {
            $_save_data['payment_image'] = $upload_real_image['uploaded_path'];
        }

        //insert or update
        if($id == "") {

            $result = $this->_dm->set_model("tbl_payment","tp","payment_id")->insert($_save_data);

            //end transaction.
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $message['error_msg'] = 'Insert failed! Please try again.';
            } else {
                $this->db->trans_commit();
                //growler.
                $message['is_error']        = false;
                $message['notif_title']     = "Excellent!";
                $message['notif_message']   = "Payment has been added.";

                //on update, redirect.
                $message['redirect_to']     = site_url('manager/setting/payment-list');
            }
        } else {

        	$get_data = $this->_dm->set_model("tbl_payment","tp","payment_id")->get_all_data(array(
                "conditions" => array("payment_id" => $id),
                "row_array"  => true
            ))['datas'];

            if(!empty($upload_real_image['uploaded_path']) && isset($get_data['payment_image'])) {
                unlink( FCPATH .$get_data['payment_image']);
            }

            $conditions = array("payment_id" => $id);
            $result = $this->_dm->set_model("tbl_payment","tp","payment_id")->update($_save_data, $conditions);

            //end transaction
            if($this->db->trans_status() == false ) {
                //balikin jangan di insert
                $this->db->trans_rollback();
            } else {
                $this->db->trans_commit();
                //success
                $message['is_error']        = false;
                $message['notif_title']     = 'Good!';
                $message['notif_message']   = 'Payment has been been updated';
                $message['redirect_to']     = site_url('manager/setting/payment-list');
            }
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * ajax form
     */
    public function process_form_about()
    {
        // Must AJAX and POST
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //initital
        $message['is_error'] = true;
        $message['redirect_to'] = '';

        $id         = $this->input->post('id');
        $desc       = $this->input->post('desc');
 
        //begin transaction
        $this->db->trans_begin();

        //prepare save to DB
        $_save_data = array(
        	"about_desc"  => $desc
        );
        if( $id == "" ){
	        $result = $this->_dm->set_model("tbl_about","ta","about_id")->insert($_save_data);
        } else {
        	$result = $this->_dm->set_model("tbl_about","ta","about_id")->update($_save_data,
        		array("about_id" => $id)
        	);
        }

        //end transaction.
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $message['error_msg'] = 'Insert failed! Please try again.';
        } else {
            $this->db->trans_commit();
            $note = ($id == "") ? "About has been added." : "About has been updated.";
            //growler.
            $message['is_error']        = false;
            $message['notif_title']     = "Excellent!";
            $message['notif_message']   = $note;

            //on update, redirect.
            $message['redirect_to']     = site_url('manager/setting/tautan-list');
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * ajax form
     */
    public function process_form_syarat()
    {
        // Must AJAX and POST
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //initital
        $message['is_error'] = true;
        $message['redirect_to'] = '';

        $id         = $this->input->post('id');
        $desc       = $this->input->post('desc');
 
        //begin transaction
        $this->db->trans_begin();

        //prepare save to DB
        $_save_data = array(
        	"description"  => $desc
        );

        if( $id == "" )
        {
	        $result = $this->_dm->set_model("tbl_s_&_k","ts","id")->insert($_save_data);
        } else {
        	$result = $this->_dm->set_model("tbl_s_&_k","ts","id")->update($_save_data,
        		array("id" => $id)
        	);
        }


        //end transaction.
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $message['error_msg'] = 'Insert failed! Please try again.';
        } else {
            $this->db->trans_commit();
            $note = ($id == "") ? "Syarat & ketentuan has been added." : "Syarat & ketentuan has been updated.";

            //growler.
            $message['is_error']        = false;
            $message['notif_title']     = "Excellent!";
            $message['notif_message']   = $note;

            //on update, redirect.
            $message['redirect_to']     = site_url('manager/setting/tautan-list');
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    /**
     * ajax form
     */
    public function process_form_contact()
    {
        // Must AJAX and POST
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //initital
        $message['is_error'] = true;
        $message['redirect_to'] = '';

        $id           = $this->input->post('id');
        $hp           = $this->input->post('hp');
        $telp         = $this->input->post('telp');
        $email        = $this->input->post('email');
        $maps         = $this->input->post('link');
        $address      = $this->input->post('desc');
 
        //begin transaction
        $this->db->trans_begin();

        //prepare save to DB
        $_save_data = array(
        	"cont_hp" 		 => $hp,
        	"cont_telp"  	 => $telp,
        	"cont_email"	 => $email,
        	"cont_maps" 	 => $maps,
        	"cont_address"	 => $address
        );

        if( $id == "" )
        {
	        $result = $this->_dm->set_model("tbl_contact_us","tc","cont_id")->insert($_save_data);
        } else {
        	$result = $this->_dm->set_model("tbl_contact_us","tc","cont_id")->update($_save_data,
        		array("cont_id" => $id)
        	);
        }


        //end transaction.
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $message['error_msg'] = 'Insert failed! Please try again.';
        } else {
            $this->db->trans_commit();
            $note = ($id == "") ? "Contact us has been added." : "Contact us has been updated.";

            //growler.
            $message['is_error']        = false;
            $message['notif_title']     = "Excellent!";
            $message['notif_message']   = $note;

            //on update, redirect.
            $message['redirect_to']     = site_url('manager/setting/tautan-list');
        }
        //encoding and returning.
        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }


    /**
     * delete 
     */
    public function delete_payment() {
        // Must AJAX and POST
        if (!$this->input->is_ajax_request() || $this->input->method(true) != "POST") {
            exit('No direct script access allowed');
        }

        //load model

        $message['is_error'] = true;

        $id = $this->input->post('id');

        if($id == "" || !is_numeric($id)) {
            show_404();
        } else {

            $get_data = $this->_dm->set_model("tbl_payment")->get_all_data(array(
                "find_by_pk" => array($id),
                "row_array"  => true
            ))['datas'];

            if($get_data['payment_image'] != '') {
                unlink( FCPATH .$get_data['payment_image']);
            }
            
            $conditions = array("payment_id" => $id);
            
            $result = $this->_dm->set_model("tbl_payment")->delete($conditions);

            if($this->db->trans_status() == false) {

                $this->db->trans_rollback();
                $message['error_msg'] = "Database operation failed.";
            } else {

                $this->db->trans_commit();
                $message['is_error']      = false;
                $message['notif_title']   = "Excellent !!.";
                $message['notif_message'] = "Payment has been deleted.";
                $message['redirect_to']   = "";
            }
        }

        $this->output->set_content_type('application/json');
        echo json_encode($message);
        exit;
    }

    protected function upload_file ($key, $file_name, $multiple = false, $upload_path, $id) {
        $message['is_error'] = true;
        $message['error_msg'] = "";
        $message['redirect_to'] = "";

        //load the uploader library.
        $this->load->library('Uploader');

        $config = array(
            "allowed_types"         =>  FILE_TYPE_UPLOAD,
            "file_ext_tolower"      =>  true,
            "overwrite"             =>  false,
            "max_size"              =>  MAX_UPLOAD_FILE_SIZE_IN_KB,
            "upload_path"           =>  $upload_path,
        );

        if (!empty($file_name)) {
            $config['filename_overwrite'] = $file_name;
        }

        //try to upload the image.
        $upload_result = $this->uploader->upload_files($key, $multiple, $config);

        if ($upload_result['is_error']) {
            if ($upload_result['is_error']) {
                if (($id == "" && $upload_result['result'][0]['error_code'] == 0) || $upload_result['result'][0]['error_code'] != 0) {
                    //file upload error of something.
                    //show the error.
                    $message['error_msg'] = $upload_result['result'][0]['error_msg'];

                    //encoding and returning.
                    $this->output->set_content_type('application/json');
                    echo json_encode($message);
                    exit;
                }

            }
        }

        return $upload_result['result'];
    }

}

/* End of file Setting_manager.php */
/* Location: ./application/modules/setting/controllers/Setting_manager.php */ 