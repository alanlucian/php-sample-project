
<?php $this->load->view("parts/header"); ?>
<?php $this->load->view("parts/menu"); ?>



<section class="wrapper style2 ">
    <div class="container 75%">

        <?php if(isset($_GET["deleted"])){
           echo '<p class="icon fa-info-circle" style="animation:"> Musica removida com sucesso</p>';
        }?>

    <h3>Lista de Músicas</h3>

    <div class="table-wrapper">
        <table>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Gênero</th>
                <th>Album</th>
                <th>Artista</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($musics as $music){ ?>
                <tr>
                    <td><?php echo $music->title;?></td>
                    <td><?php echo $music->genre;?></td>
                    <td><?php echo $music->album;?></td>
                    <td><?php echo $music->artist;?></td>
                    <td>
                        <ul class="icons">
                            <li>
                                <a href="<?php echo site_url("MusicManagement/edit/?music_id=". $music->id) ;?>" class="icon fa-pencil">
                                    <span class="label">Editar</span>
                                </a>
                            </li>
                            <li>
                                <a  href="<?php echo site_url("MusicManagement/delete/?music_id=". $music->id) ;?>" class="delete icon fa-trash">
                                    <span class="label">Excluir</span>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            <?php }?>

            </tbody>

        </table>
    </div>
        </div>

</section>

<?php  $this->load->view("parts/footer",
    ["add_after"=>["assets/js/music_management_list.js"]
    ]); ?>
