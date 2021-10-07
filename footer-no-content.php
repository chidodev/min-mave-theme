<?php
switch_to_blog( 1 );
$article_ws = get_field('article_ws','options');
switch_to_blog($article_ws);
?>
<!--<script src="--><?php //echo get_template_directory_uri();?><!--/assets/js/jquery.js"></script>-->
<script defer src="<?php echo get_template_directory_uri();?>/assets/js/slick.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/assets/js/jquery.validate.min.js"></script>
<script defer src="<?php echo get_template_directory_uri();?>/assets/js/main.js?v=11"></script>
<?php wp_footer();?>
</body>
</html>
