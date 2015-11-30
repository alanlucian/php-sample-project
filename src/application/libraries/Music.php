<?php
/**
 * Created by PhpStorm.
 * User: alanlucian
 * Date: 11/29/15
 * Time: 12:51 PM
 */


class Music {

    /**
     * Validate music information before insert/update on system
     * @param $musicData
     * @param $fileData
     * @return object
     */
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


        if( $fileData['type'] != "audio/mp3" && !is_numeric($musicData["id"])){
            $rt['msg'][] =  "Formato de arquivo inválido, envie em MP3";
        }

        if( strlen($fileData['type']) > 0 &&  $fileData['size'] > $CI->config->item("upload_max_size")*1024 ){
            $rt['msg'][] =  "Arquivo selecionado é muito grande";
        }

        // Change succes result if any erro message
        $rt["success"] = (count($rt["msg"])==0);
        return (object)$rt;


    }

    /**
     * Delete music record and file ( file only optional )
     * @param $music_id
     * @param bool $fileOnly
     */
    public function delete( $music_id , $fileOnly = false ){
        $CI =& get_instance();
        $CI->load->model("MusicModel");
        $musicData = $CI->MusicModel->selectByID( $music_id ) ;

        if(file_exists($musicData->file_path)){
            unlink($musicData->file_path);
        }

        if(!$fileOnly) {
            $CI->MusicModel->deleteByID($music_id);
        }

    }

    public function saveUploadedFile(){
        $CI =& get_instance();
        if(!is_dir($CI->config->item("upload_folder"))){
            mkdir($CI->config->item("upload_folder"));
        }

        $config['upload_path'] = './'.$CI->config->item("upload_folder").'/';
        $config['allowed_types'] = '*';
        $config['max_size']	= $CI->config->item("upload_max_size");//'20480';
        $CI->load->library('upload', $config);


        if ( !  $CI->upload->do_upload("file"))
        {
            $rt = ['success'=>false,"msg"=>$CI->upload->display_errors()];

        }else{
            $rt = ['success'=>true,"data"=>$CI->upload->data()];

        }
        return (object)$rt;
    }

    /**
     * Save music information on Database
     * @param $musicData
     * @param $fileData
     * @return mixed
     */
    public function commitMusic( $musicData, $fileData){
        $CI =& get_instance();
        $CI->load->model("GenreModel");
        $CI->load->model("ArtistModel");
        $CI->load->model("AlbumModel");
        $CI->load->model("MusicModel");

        if( !is_numeric($musicData["genre_id"])){

            $genre = $CI->GenreModel->getByField( "name" , $musicData["genre"] );
            if(isset($genre[0]->id)){
                $musicData["genre_id"] = $genre[0]->id;
            }else {
                $musicData["genre_id"] = $CI->GenreModel->commit(["name" => $musicData["genre"]]);
            }
        }

        if( !is_numeric($musicData["artist_id"])){
            $artist = $CI->ArtistModel->getByField( "name" , $musicData["artist"] );
            if(isset($artist[0]->id)){
                $musicData["artist_id"] = $artist[0]->id;
            }else {
                $musicData["artist_id"] = $CI->ArtistModel->commit(["name" => $musicData["artist"]]);
            }

        }


        if( !is_numeric($musicData["album_id"])){

            $album = $CI->AlbumModel->getAlbum(  $musicData["album"], $musicData["artist_id"]  );

            if(isset($album[0]->id)) {
                $musicData["album_id"]  = $album[0]->id;
            }else{
                $musicData["album_id"] = $CI->AlbumModel->commit(
                [
                    "name"=>$musicData["album"],
                    "artist_id"=>$musicData["artist_id"]
                ] );
            }
        }

        $musicCommitData = [
            "title"=> $musicData["title"],
            "year"=> $musicData["year"],
            "genre_id"=> $musicData["genre_id"],
            "album_id"=> $musicData["album_id"]

        ];


        if( $fileData != null ) {
            $musicCommitData["file_path"] = $CI->config->item("upload_folder") . '/' . $fileData["file_name"];

            if (isset($musicData["id"])) {
                //delete old Music file if updating exists
                $this->delete($musicData["id"], true);
            }
        }

        if( isset($musicData["id"]) ){
            $musicCommitData["id"]  = $musicData["id"];
        }

        return $CI->MusicModel->commit( $musicCommitData);

    }

} 