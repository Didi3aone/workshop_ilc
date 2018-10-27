<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training_model extends CI_Model {

	private $_table = "tbl_pelatihan";
	private $_alias = "tp";
	private $_pk_field = "PelatihanId";

	public function __construct() {
		parent::__construct();
	}
	
	public function get_all_data( $params = array() )
	{
		if( isset($params['start_date']) && isset($params['end_date']) )
		{
			$this->db->where("PelatihanStartDate >=", date('Y-m-d',strtotime($params['start_date'])));
			$this->db->where("PelatihanStartDate <=", date('Y-m-d',strtotime($params['end_date'])));
		}

		if( isset($params['judul']) )
		{
			$this->db->like("PelatihanTitle", $params['judul']);
		}

		if( isset($params['tempat']) )
		{
			$this->db->like("PelatihanLokasi", $params['tempat']);
		}

		if( isset($params['limit']) && isset($params['offset']) )
		{
			$this->db->limit($params['limit'], ($params['offset'] == 1) ? 0 : $params['offset']);
		}

		$this->db->select("*");
		$this->db->from($this->_table);
		// echo $this->db->last_query();
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function count_all_data()
    {
        $this->db->select("count($this->_pk_field) as total");

        return $this->db->get($this->_table)->row()->total;   
    }

}

/* End of file Training_model.php */
/* Location: ./application/modules/training/models/Training_model.php */