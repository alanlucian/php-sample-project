<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MusicManagement extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
	public function index()
	{
//        $this->load->model('GenreModel');
//
//        $data["genres"] = $this->GenreModel->getAll();
//
//        $this->load->view('music_player' , $data);
	}

    public function register(){
        $this->load->view('music_management/upload');
    }

    public function doRegister(){
        $this->load->library("Music");

        $musicData = $_POST;
        $validationResult = $this->music->ValidateMusicData( $musicData , $_FILES["file"]);

        $data["error"] = $validationResult->msg;

        if($validationResult->success){

            $config['upload_path'] = './'.$this->config->item("upload_folder").'/';
            $config['allowed_types'] = '*';
            $config['max_size']	= $this->config->item("upload_max_size");//'20480';
            $this->load->library('upload', $config);
            if (  $this->upload->do_upload("file"))
            {
                $registeredMusicID = $this->music->RegisterUploadedMusic( $musicData,  $this->upload->data());
                redirect("MusicManagement/list/". $registeredMusicID);
            }
            $data['error'] =  $this->upload->display_errors();
        }
        $data["musicData"]  = $musicData ;



        $this->load->view('music_management/upload', $data);
    }

    public function ListFieldOptions(){
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
