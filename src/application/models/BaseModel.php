<?php
/**
 * Created by PhpStorm.
 * User: alanlucian
 * Date: 11/29/15
 * Time: 12:00 AM
 */

class BaseModel extends CI_Model {

    protected $_table_name = "";

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }


    /**
     * Delete record using ID column
     * @param $id
     */
    public function deleteByID($id){
        $this->db->where('id', $id);
        $this->db->delete($this->_table_name);
    }


    /**
     * Search for a single record using - ID column
     * @param $id
     * @return null
     */
    public function selectByID($id){
        $rt =  $this->getByField("id",$id);
        return count($rt)==1?$rt[0]:null;
    }


    /**
     * Get using a custom field
     * @param $field
     * @param $value
     * @return mixed
     */
    public function  getByField($field, $value){
        $this->db->where($field, $value);
        $query = $this->db->get($this->_table_name);

        return $query->result();
    }


    /**
     * Select all recods with no criteria -  has limit param
     * @param int $limit
     * @return mixed
     */
    public function getAll( $limit = 100 ){
        $query = $this->db->get($this->_table_name, $limit);
        return $query->result();
    }

    /**
     * Search using a custom field
     * @param $field
     * @param $term
     * @return mixed
     */
    public function searchField($field, $term ){

        $this->db->like( $field , $term);
        $query = $this->db->get($this->_table_name);

        return $query->result();
    }

    /**
     * Commit data to database insert or update
     * @param $data
     * @return mixed
     */
    public function commit($data){
        if( isset($data["id"]) && is_numeric($data["id"]) ){
            $this->db->where('id', $data["id"]);
            $this->db->update($this->_table_name, $data);
            return $data["id"];
        }

        $this->db->set($data);
        $this->db->insert($this->_table_name);
        return $this->db->insert_id();
    }

} 