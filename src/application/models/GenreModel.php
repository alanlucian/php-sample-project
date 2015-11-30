<?php
/**
 * Created by PhpStorm.
 * User: alanlucian
 * Date: 11/29/15
 * Time: 12:24 AM
 */

class GenreModel extends BaseModel {


    protected $_table_name = "genre";

    /**
     * Get All genres that have at least on song to play
     * @return mixed
     */
    public function getWithMusic(){
        $query   = $this->db->query("SELECT genre.* FROM genre INNER JOIN music ON music.genre_id = genre.id GROUP BY genre.id");
        return $query->result();
    }

}