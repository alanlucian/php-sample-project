
<?php $this->load->view("parts/header"); ?>
<?php $this->load->view("parts/menu"); ?>

<!-- Four -->
<section id="four" class="wrapper style2 special">
    <div class="inner">
        <header class="major narrow">
            <h2>Enviar nova Música</h2>
        </header>
        <form action="<?php echo site_url("MusicManagement/doRegister") ; ?>" method="POST" enctype="multipart/form-data">
            <input type="file" id="fileInput" name="file" style="display: none" />
            <input type="hidden" name="id" value="<?php echo ( isset($musicData["id"])?$musicData["id"]: "" ); ?>">
            <input type="hidden" name="genre_id" value="<?php echo ( isset($musicData["genre_id"])?$musicData["genre_id"]: "" ); ?>">
            <input type="hidden" name="artist_id" value="<?php echo ( isset($musicData["artist_id"])?$musicData["artist_id"]: "" ); ?>">
            <input type="hidden" name="album_id" value="<?php echo ( isset($musicData["album_id"])?$musicData["album_id"]: "" ); ?>">



            <div class="container 75%">

                <?php if( isset($error) ) { ?>
                    <h3> Favor verificar as seguintes informações:</h3>
                    <blockquote>

                        <?php   echo implode("<br/>", $error); ?>

                    </blockquote>

                <?php } ?>



                <ul class="actions vertical">
                    <li>
                        <a href="#" id="fileUploadClick" class="button alt fit">clique para selecionar um arquivo</a>
                    </li>

                    <li >
                        <h2 id="fileName"></h2>
                    </li>
                </ul>

                <div class="row uniform 50%">
                    <div class="12u">
                        <input name="title" value="<?php echo ( isset($musicData["title"])?$musicData["title"]: "" ); ?>" placeholder="Nome" type="text" />
                    </div>
                    <div class="12u">
                        <input name="year" value="<?php echo ( isset($musicData["year"])?$musicData["year"]: "" ); ?>" placeholder="Ano" type="text" />
                    </div>


                    <div class="12u">
                        <input class="dinamic_autocomplete"  name="genre" value="<?php echo ( isset($musicData["genre"])?$musicData["genre"]: "" ); ?>" placeholder="Gênero" type="text" />
                    </div>

                    <div class="12u">
                        <input class="dinamic_autocomplete" name="artist" value="<?php echo ( isset($musicData["artist"])?$musicData["artist"]: "" ); ?>" placeholder="Artista" type="text" />
                    </div>

                    <div class="12u">
                        <input name="album" class="dinamic_autocomplete" data-dependency="artist_id" value="<?php echo ( isset($musicData["album"])?$musicData["album"]: "" ); ?>" placeholder="Álbum" type="text" />
                    </div>


                </div>
            </div>
            <ul class="actions">
                <li><input type="submit" class="special" value="Enviar" /></li>
                <li><input type="reset" class="alt" value="Reset" /></li>
            </ul>
        </form>
    </div>
</section>

<?php
    $this->load->view("parts/footer",
        ["add_after"=>["assets/js/music_management_register.js"]
    ]); ?>