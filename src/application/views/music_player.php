<?php $this->load->view("parts/header"); ?>



<?php $this->load->view("parts/menu"); ?>


<!-- Banner -->

<section id="banner" class="style2">
<!--    <i class="icon fa-music"></i>-->
    <p>Escolha um gênero</p>
    <ul class="actions">
        <?php foreach( $genres as $genre ){
        printf('<li><a href="%s" class="button big special">%s</a></li>',
            site_url()."?genre_id=".$genre->id. "#player",
            $genre->name);
        }?>
    </ul>
</section>


<?php if( isset($musicList) ) {?>
<section class="wrapper style1 " id="player">


    <div class="warp container ">
        <div id="audio-player">

            <h2 ><i class="icon fa-music"></i> <span id="music-name">Queen - Radio Gaga</span></h2>
            <ul class="actions">
                <li><a id="pause" class="button alt icon fa-pause"> </a></li>
                <li><a id="next" class="button alt icon fa-arrow-right">  </a></li>
    <!--            <li><a href="#" class="button alt">Alternate</a></li>-->
            </ul>
        </div>

        <h2>Lista de reprodução:</h2>
        <ul class="alt " id="audio-list" >
            <?php foreach( $musicList as $music) {
                $name = $music->artist . " - " . $music->title ;
                echo
                    "<li
                        data-file-path='". base_url(). $music->file_path . "'
                        data-name='". $name . "'
                    ><a href='#' <i class='icon fa-play'></i> " .
                    $name .
                    "</a></li>";
            }?>

        </ul>
    </div>
<?php } ?>
    </section>


<?php $this->load->view("parts/footer",
    ["add_after"=>["assets/js/music_player.js"]
    ]); ?>
