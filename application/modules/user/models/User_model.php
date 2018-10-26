<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $_table = 'tbl_user';
    private $_pk_field = 'user_id';
    private $_table_alias = 'us';

    public function __construct() {
        parent::__construct();
    }

    /**
     *  function insert data
     * @param $data [mixed]
     * @return insert_id(); 
     */
    public function insert($datas)
    {
        $this->db->insert($this->_table, $datas);
        return $this->db->insert_id();
    }

   	/**
     *  function insert data
     * @param $data [mixed]
     * @return insert_id();
     */
    public function update($datas, $condition)
    {
        return $this->db->update($this->_table, $datas, $condition);
    }

    /**
     *  function check user login
     * @param $username, $password [mixed]
     * @return array 
     */
    public function check_login($username, $password) {
        $this->db->select($this->_table_alias.".*, tur.*");
        $this->db->from($this->_table.'  '.$this->_table_alias);
        $this->db->join("tbl_user_role tur", "tur.role_id =".$this->_table_alias.".role_Id");
        $this->db->where('username',$username);
        $this->db->where('password', $password);

        return $this->db->get()->row_array();
    }
}

/* End of file User_model.php */
/* Location: ./application/modules/user/models/User_model.php */