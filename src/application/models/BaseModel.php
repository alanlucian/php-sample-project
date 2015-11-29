<?php
/**
 * Created by PhpStorm.
 * User: alanlucian
 * Date: 11/29/15
 * Time: 12:24 AM
 */

class BaseModel extends CI_Model {

    protected $_table_name = "";

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getAll(){
        $query = $this->db->get($this->_table_name, 100);
        return $query->result();
    }

    public function searchField($field, $term ){

        $this->db->like( $field , $term);
        $query=$this->db->get($this->_table_name);

        return $query->result();
    }

    public function commit($data){
        if( isset($data["id"]) && is_numeric($data["id"]) ){
            $this->db->where('id', $data["id"]);
            $this->db->update('$this->_table_name', $data);
            return $data["id"];
        }

        $this->db->set($data);
        $this->db->insert($this->_table_name);
        return $this->db->insert_id();
    }

} 