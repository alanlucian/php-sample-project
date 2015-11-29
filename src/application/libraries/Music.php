<?php
/**
 * Created by PhpStorm.
 * User: alanlucian
 * Date: 11/29/15
 * Time: 12:51 PM
 */


class Music {


    public function ValidateMusicData( $musicData, $fileData ){
        $CI =& get_instance();

        $rt=['success'=>true,"msg"=>[]];
        if( strlen( $musicData["title"] ) == 0  ){
            $rt["msg"][]= "Nome da música ";
        }
        if( strlen( $musicData["genre"] ) == 0  && !is_numeric($musicData["genre_id"])){
            $rt["msg"][]= "Gênero deve ser preenchido";
        }
        if( strlen( $musicData["artist"] ) == 0  && !is_numeric($musicData["artist_id"])){
            $rt["msg"][]= "Artista não informado";
        }
        if( strlen( $musicData["album"] ) == 0  && !is_numeric($musicData["album_id"])){
            $rt["msg"][]= "Álbum desconhecido";
        }

        if( $fileData['type'] != "audio/mp3" ){
            $rt['msg'][] =  "Formato de arquivo inválido, envie em MP3";
        }

        if( $fileData['size'] > $CI->config->item("upload_max_size")*1024 ){
            $rt['msg'][] =  "Arquivo selecionado é muito grande";
        }

        // Change succes result if any erro message
        $rt["success"] = (count($rt["msg"])==0);
        return (object)$rt;


    }

    public function UploadMusicFile(){

    }

    /**
     * Save music information on Database
     * @param $musicData
     * @param $fileData
     * @return mixed
     */
    public function RegisterUploadedMusic( $musicData, $fileData){
        $CI =& get_instance();
        $CI->load->model("GenreModel");
        $CI->load->model("ArtistModel");
        $CI->load->model("AlbumModel");
        $CI->load->model("MusicModel");

        if( !is_numeric($musicData["genre_id"])){
            $musicData["genre_id"] = $CI->GenreModel->commit( ["name"=>$musicData["genre"]] );
        }

        if( !is_numeric($musicData["artist_id"])){
            $musicData["artist_id"] = $CI->ArtistModel->commit( ["name"=>$musicData["artist"]] );
        }


        if( !is_numeric($musicData["album_id"])){
            $musicData["album_id"] = $CI->AlbumModel->commit(
                [
                    "name"=>$musicData["album"],
                    "artist_id"=>$musicData["artist_id"]
                ] );
        }

        return $CI->MusicModel->commit([
            "file_path" => $CI->config->item("upload_folder").'/' .$fileData["file_name"],
            "title"=> $musicData["title"],
            "year"=> $musicData["year"],
            "genre_id"=> $musicData["genre_id"],
            "album_id"=> $musicData["album_id"]

        ]);

    }

} 