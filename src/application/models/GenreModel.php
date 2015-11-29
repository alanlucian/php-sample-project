<?php
/**
 * Created by PhpStorm.
 * User: alanlucian
 * Date: 11/29/15
 * Time: 12:24 AM
 */

class GenreModel extends CI_Model {

    const TABLE_NAME =  "genre";

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function getAll(){
        $query = $this->db->get(GenreModel::TABLE_NAME, 10);
        return $query->result();
    }

} 