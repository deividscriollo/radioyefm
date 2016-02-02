<?php get_header(); ?>
<?php dt_storage('have_sidebar', true); ?>

<?php get_template_part('top-bg'); ?>

<div id="wrapper">

<?php get_template_part('nav'); ?>




<div id="contenido">
<div id="container">
<?php
if( have_posts() ) {
    while( have_posts() ) {
		echo "<div class='titulopagina'>";
				the_title();
		echo "</div>";

        the_post();
        the_content();
        comments_template();
    }
}
?>
</div>
<?php get_sidebar(); ?>
</div>




</div>

<?php get_footer(); ?>