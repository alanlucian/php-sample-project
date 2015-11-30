<?php $this->load->view("parts/header"); ?>



<?php $this->load->view("parts/menu"); ?>

<!-- Banner -->
<section id="banner">
    <i class="icon fa-music"></i>
    <h2>Tocador de música</h2>
    <p>Escolha um gênero</p>
    <ul class="actions">
        <?php foreach( $genres as $genre ){
        printf('<li><a href="#" class="button big special">%s</a></li>', $genre->name);
        }?>
    </ul>
</section>

<?php $this->load->view("parts/footer"); ?>
