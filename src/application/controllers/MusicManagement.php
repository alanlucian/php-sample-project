<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MusicManagement extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }


    /**
     * List all musics - optional filter by genre
     *
     */
    public function index()
	{
        $this->load->model('GenreModel');
        $this->load->model("MusicModel");
        if( isset($_GET["genre_id"]) && is_numeric($_GET["genre_id"])){
            $data["musics"]  = $this->MusicModel->getByField("genre_id", $_GET["genre_id"]);
        }else{
            $data["musics"] = $this->MusicModel->getAll();
        }

        $data["genres"] = $this->GenreModel->getWithMusic();

        $this->load->view('music_management/list', $data);
	}

    public function register(){
        $this->load->view('music_management/upload');
    }

    public function doRegister(){
        $this->load->library("Music");
        $fileUploadData = null;
        $musicData = $_POST;
        $validationResult = $this->music->ValidateMusicData( $musicData , $_FILES["file"]);

        $data["error"] = $validationResult->msg;

        // verifica necessidade de upload de arquivo
        if($validationResult->success && $_FILES["file"]["size"]>0){

            $result = $this->music->saveUploadedFile();


            if($result->success){
                $fileUploadData = $result->data;
            }else{
                $data['error'][] = $result->msg;
            }


        }

        if($validationResult->success ){
            $this->music->commitMusic( $musicData, $fileUploadData  );
            redirect("MusicManagement/");
        }

        $data["musicData"]  = $musicData ;



        $this->load->view('music_management/upload', $data);
    }

    public  function edit(){

        $this->load->model("MusicModel");

        $musicData = $this->MusicModel->selectByID($_GET["music_id"] );

        $data["musicData"]  = (Array) $musicData ;

        $this->load->view('music_management/upload', $data  );

    }

    public function delete(){
        $this->load->library("Music");

        $this->music->delete( $_GET["music_id"] );

        redirect("MusicManagement/?deleted=1");

    }

    public function listFieldOptions(){
        switch( $_GET["fieldName"] ){
            case "genre":
                $this->load->model('GenreModel');
                $data =  $this->GenreModel->searchField( "name", $_GET["term"] );
                break;

            case "artist":
                $this->load->model('ArtistModel');
                $data =  $this->ArtistModel->searchField( "name", $_GET["term"] );
                break;
            case "album":
                $this->load->model('AlbumModel');
                $data =  $this->AlbumModel->searchAlbum(  $_GET["term"], $_GET["dependencyData"] );
                break;
            default:
                $data = [];
        }

        echo json_encode($data);
    }

}
