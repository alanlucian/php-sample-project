<script type="text/javascript">

    var BASE_URL = '<?php echo site_url(); ?>' ;

</script>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>

<?php if(isset($add_after)) {
    foreach ($add_after as $path) {
        printf('<script src="%s"></script>',$path);
    }
}?>

</body>
</html>