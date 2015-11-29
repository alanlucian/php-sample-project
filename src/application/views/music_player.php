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
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
        <li><a href="#" class="button big special">Learn More</a></li>
    </ul>
</section>

<!-- One -->
<section id="one" class="wrapper style1">
    <div class="inner">
        <article class="feature left">
            <span class="image"><img src="images/pic01.jpg" alt="" /></span>
            <div class="content">
                <h2>Integer vitae libero acrisus egestas placerat  sollicitudin</h2>
                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est.</p>
                <ul class="actions">
                    <li>
                        <a href="#" class="button alt">More</a>
                    </li>
                </ul>
            </div>
        </article>
        <article class="feature right">
            <span class="image"><img src="images/pic02.jpg" alt="" /></span>
            <div class="content">
                <h2>Integer vitae libero acrisus egestas placerat  sollicitudin</h2>
                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est.</p>
                <ul class="actions">
                    <li>
                        <a href="#" class="button alt">More</a>
                    </li>
                </ul>
            </div>
        </article>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper special">
    <div class="inner">
        <header class="major narrow">
            <h2>Aliquam Blandit Mauris</h2>
            <p>Ipsum dolor tempus commodo turpis adipiscing Tempor placerat sed amet accumsan</p>
        </header>
        <div class="image-grid">
            <a href="#" class="image"><img src="images/pic03.jpg" alt="" /></a>
            <a href="#" class="image"><img src="images/pic04.jpg" alt="" /></a>
            <a href="#" class="image"><img src="images/pic05.jpg" alt="" /></a>
            <a href="#" class="image"><img src="images/pic06.jpg" alt="" /></a>
            <a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
            <a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
            <a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
            <a href="#" class="image"><img src="images/pic10.jpg" alt="" /></a>
        </div>
        <ul class="actions">
            <li><a href="#" class="button big alt">Tempus Aliquam</a></li>
        </ul>
    </div>
</section>

<!-- Three -->
<section id="three" class="wrapper style3 special">
    <div class="inner">
        <header class="major narrow	">
            <h2>Magna sed consequat tempus</h2>
            <p>Ipsum dolor tempus commodo turpis adipiscing Tempor placerat sed amet accumsan</p>
        </header>
        <ul class="actions">
            <li><a href="#" class="button big alt">Magna feugiat</a></li>
        </ul>
    </div>
</section>

<!-- Four -->
<section id="four" class="wrapper style2 special">
    <div class="inner">
        <header class="major narrow">
            <h2>Get in touch</h2>
            <p>Ipsum dolor tempus commodo adipiscing</p>
        </header>
        <form action="#" method="POST">
            <div class="container 75%">
                <div class="row uniform 50%">
                    <div class="6u 12u$(xsmall)">
                        <input name="name" placeholder="Name" type="text" />
                    </div>
                    <div class="6u$ 12u$(xsmall)">
                        <input name="email" placeholder="Email" type="email" />
                    </div>
                    <div class="12u$">
                        <textarea name="message" placeholder="Message" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <ul class="actions">
                <li><input type="submit" class="special" value="Submit" /></li>
                <li><input type="reset" class="alt" value="Reset" /></li>
            </ul>
        </form>
    </div>
</section>

<!-- Footer -->
<footer id="footer">
    <div class="inner">
        <ul class="icons">
            <li><a href="#" class="icon fa-facebook">
                    <span class="label">Facebook</span>
                </a></li>
            <li><a href="#" class="icon fa-twitter">
                    <span class="label">Twitter</span>
                </a></li>
            <li><a href="#" class="icon fa-instagram">
                    <span class="label">Instagram</span>
                </a></li>
            <li><a href="#" class="icon fa-linkedin">
                    <span class="label">LinkedIn</span>
                </a></li>
        </ul>
        <ul class="copyright">
            <li>&copy; Untitled.</li>
            <li>Images: <a href="http://unsplash.com">Unsplash</a>.</li>
            <li>Design: <a href="http://templated.co">TEMPLATED</a>.</li>
        </ul>
    </div>
</footer>

<?php $this->load->view("parts/footer"); ?>
<!--	<h1>Welcome to CodeIgniter!</h1>-->
<!---->
<!--	<div id="body">-->
<!--		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>-->
<!---->
<!--		<p>If you would like to edit this page you'll find it located at:</p>-->
<!--		<code>application/views/welcome_message.php</code>-->
<!---->
<!--		<p>The corresponding controller for this page is found at:</p>-->
<!--		<code>application/controllers/Welcome.php</code>-->
<!---->
<!--		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>-->
<!--	</div>-->
<!---->
<!--	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. --><?php //echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?><!--</p>-->
<!---->
