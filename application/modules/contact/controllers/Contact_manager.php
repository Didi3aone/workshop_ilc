<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_manager extends CI_Controller {

	private $_title       = "Contact Us";
    private $_title_page  = 'Contact Us ';
    private $_breadcrumb  = "<li><a href='#'>Home</a></li>";
    private $_active_page = "contact";
    private $_dm;
    private $_view        = "contact/";
    private $_js_view     = "contact/javascript/";
    private $_header;
    private $_footer;
    private $_data;
    
    //table init
    private $_table = "tbl_contact_form";
    private $_table_alias = "tcf";
    private $_pk_field    = "id";

    public function __construct() {
    	parent::__construct();
    	//new class model
        $this->load->helper('form');
        $this->_dm = new Dynamic_model();
    }

	/*
    * list data
    */
    public function index()
    {
        $this->_header = array( 
            "title"      => $this->_title,   
            "title_page" => $this->_title_page,
            "breadcrumb" => $this->_breadcrumb ."<li>User Register</li>",
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
                "assets/js/plugins/lightbox/js/lightbox.js"
            ),
            "script_js"   => $this->_js_view."list_js"
        );
       
       $this->load->view(HEADER_MANAGER, $this->_header);
       $this->load->view($this->_view. 'index');
       $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /*
    * detail data
    */
    public function detail($regis_id = null)
    {
    	$contact = $this->_dm->set_model($this->_table,$this->_table_alias,$this->_pk_field)->get_all_data(
    		array("row_array" => true)
    	)['datas'];

		$this->_data['contact'] = $contact;

       	$this->_header = array( 
            "title"      => $this->_title,   
            "title_page" => $this->_title_page,
            "breadcrumb" => $this->_breadcrumb ."<li>Detail</li>",
            "active_page"=> $this->_active_page
        );

       $this->load->view(HEADER_MANAGER, $this->_header);
       $this->load->view($this->_view. 'detail', $this->_data);
       $this->load->view(FOOTER_MANAGER, $this->_footer);
    }

    /**
    * ajax get data
    */
    public function list_all_data()
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

        $select = array("id","name","email","subject");

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array();
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = ($value);
                switch ($key) {
                    case 'id':
                        if ($value != "") {
                            $data_filters['lower(name)'] = $value;
                        }
                        break;

                    case 'email':
                        if ($value != "") {
                            $data_filters['lower(email)'] = $value;
                        }
                        break;

                    default:
                        break;
                }
            }
        }

        //get data
        $datas = $this->_dm->set_model($this->_table, $this->_table_alias, $this->_pk_field)->get_all_data(array(
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

}

/* End of file Contact_manager.php */
/* Location: ./application/modules/contact/controllers/Contact_manager.php */