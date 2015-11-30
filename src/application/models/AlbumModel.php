<?php
/**
 * Created by PhpStorm.
 * User: alanlucian
 * Date: 11/29/15
 * Time: 12:24 AM
 */

class AlbumModel extends BaseModel {


    protected $_table_name = "album";


    /**
     * Search for album register with given data
     *  set $term to avoid duplicates
     * @param $term
     * @param $artist_id
     * @return mixed
     */
    public function searchAlbum( $term, $artist_id){

        $this->db->where("artist_id",$artist_id);
        $this->db->like( "LOWER(name)", strtolower($term ));
        $query=$this->db->get($this->_table_name);

        return $query->result();
    }

    /**
     * get a single album record with given data
     *  set $term to avoid duplicates
     * @param $term
     * @param $artist_id
     * @return mixed
     */
    public function getAlbum( $term, $artist_id){

        $this->db->where("artist_id",$artist_id);
        $this->db->where( "LOWER(name)", strtolower($term ));
        $query=$this->db->get($this->_table_name);

        return $query->result();
    }

}