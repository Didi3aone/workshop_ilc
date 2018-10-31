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
	}

    /**
     * [index description]
     * @param  pagination, filter
     * @return array      
     */
	public function index()
	{
        $this->load->model('Training_model');
        $this->load->library('pagination');

        $total_rows = $this->Training_model->count_all_data();
        // var_dump($total_rows);exit;
        $config['base_url']     = site_url('training/index'); //site url
        $config['total_rows']   =  $total_rows;//total row
        $config['enable_query_strings'] = TRUE;
        $config['per_page']     = 10;  //show record per halaman
        $config["uri_segment"]  = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"]    = floor($choice);


        $this->pagination->initialize($config);

        $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $start  = $this->input->get("start_date");
        $end    = $this->input->get("end_date");
        $judul  = $this->input->get("judul");
        $tempat = $this->input->get('tempat');

        // $start = date("Y-m-d", strtotime($start));

        if( !empty($start) && !empty($end) ) {
            $data['start_date'] = $start;
            $data['end_date'] = $end;
        }

        // if( !empty($start) ) {
        //     $data['start_date'] = $start;
        // }

        if( !empty($judul) ) {
            $data['judul']      = $judul;
        }

        if( !empty($tempat) ) {
            $data['tempat']     = $tempat;
        }

        $data['limit']  = $config['per_page']; 
        $data['offset'] = $offset;

        $data['datas'] = $this->Training_model->get_all_data($data);
        var_dump($this->db->last_query());
        $data['pagination'] = $this->pagination->create_links();
        // var_dump($data['pagination']);exit;
		$this->load->view(LAYOUT_WEB_HEADER);
		$this->load->view($this->_view."index", $data);	
		$this->load->view(LAYOUT_WEB_FOOTER);	
	}

    /**
     * [view description]
     * @param  mixed $id [default null]
     * @return row array      
     */
    public function view($id = null)
    {
        $this->load->model('Training_model');

        $data['other'] = $this->Dynamic_model->set_model("tbl_pelatihan")->get_all_data(array(
            "conditions" => array("PelatihanId NOT IN(".$id.")" => NULL),
            "limit"      => 2
        ))['datas'];
        $data['datas'] = $this->Training_model->get_all_data(array("id" => $id));

        $this->load->view(LAYOUT_WEB_HEADER);
        $this->load->view($this->_view."detail", $data); 
        $this->load->view(LAYOUT_WEB_FOOTER);
    }
}

/* End of file Training.php */
/* Location: ./application/modules/training/contollers/Training.php */