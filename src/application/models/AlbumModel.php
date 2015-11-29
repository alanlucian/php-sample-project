<?php
/**
 * Created by PhpStorm.
 * User: alanlucian
 * Date: 11/29/15
 * Time: 12:24 AM
 */

class AlbumModel extends BaseModel {


    protected $_table_name = "album";


    public function searchAlbum( $term, $artist_id){

        $this->db->where("artist_id",$artist_id);
        $this->db->like( "name", $term);
        $query=$this->db->get($this->_table_name);

        return $query->result();
    }

}