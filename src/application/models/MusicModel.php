<?php
/**
 * Created by PhpStorm.
 * User: alanlucian
 * Date: 11/29/15
 * Time: 12:24 AM
 */

class MusicModel extends BaseModel {

    protected $_table_name = "music";


    /**
     * Overrides default method to use VIEW on SELECTS
     * @param $id
     * @return null
     */
    public function selectByID($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->_table_name . "_view");
        $rt = $query->result();

        return count($rt)>0?$rt[0]:null;
    }

    /**
     * Overrides default method to use VIEW on SELECTS
     * @return mixed
     */
    public function getAll( $limit = 100){

        $query = $this->db->get($this->_table_name."_view", $limit );
        return $query->result();
    }

} 