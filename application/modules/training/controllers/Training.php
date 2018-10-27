<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends CI_Controller {

	protected $_dm;
	private $_view = 'training/';
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
        $this->load->model('Training_model');
        $this->load->library('pagination');

        $total_rows = $this->Training_model->count_all_data();
        // var_dump($total_rows);exit;
        $config['base_url']     = site_url('training/index'); //site url
        $config['total_rows']   =  $total_rows;//total row
        $config['enable_query_strings'] = TRUE;
        $config['per_page']     = 5;  //show record per halaman
        $config["uri_segment"]  = 3;  // uri parameter
        // $config['display_pages'] = TRUE;
        // $config['use_page_numbers'] = TRUE;
        $choice = $config["total_rows"] / $config["per_page"];
        // pr($choice);exit;
        $config["num_links"]    = floor($choice);


        $this->pagination->initialize($config);

        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $start  = $this->input->get("start_date");
        $end    = $this->input->get("end_date");
        $judul  = $this->input->get("judul");
        $tempat = $this->input->get('tempat');

        // $start = date("Y-m-d", strtotime($start));

        if( !empty($start) ) {
            $data['start_date'] = $start;
        }

        if( !empty($end) ) {
            $data['end_date'] = $end;
        }

        if( !empty($judul) ) {
            $data['judul']      = $judul;
        }

        if( !empty($tempat) ) {
            $data['tempat']     = $tempat;
        }
        
        // $data['end_date']   = $this->input->post("end");
        $data['limit']  = $config['per_page']; 
        $data['offset'] = $offset;

        $data['datas'] = $this->Training_model->get_all_data($data);
        // var_dump($this->db->last_query());
        $data['pagination'] = $this->pagination->create_links();
        // var_dump($data['pagination']);exit;
		$this->load->view(LAYOUT_WEB_HEADER);
		$this->load->view($this->_view."index", $data);	
		$this->load->view(LAYOUT_WEB_FOOTER);	
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

        $select = array("PelatihanId","PelatihanTitle","PelatihanDesc");

        $conditions = array("PelatihanIsActive" => STATUS_ACTIVE);

        $column_sort = $select[$sort_col];

        //initialize.
        $data_filters = array();
        $conditions = array();
        $status = STATUS_ACTIVE;

        if (count ($filter) > 0) {
            foreach ($filter as $key => $value) {
                $value = ($value);
                switch ($key) {
                    case 'PelatihanTitle':
                        if ($value != "") {
                            $data_filters['lower(PelatihanTitle)'] = $value;
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

/* End of file Training.php */
/* Location: ./application/modules/training/contollers/Training.php */