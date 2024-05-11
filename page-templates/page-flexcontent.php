<?php
/*
Template Name: Flex Content Page
*/



get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part('template-parts/flexible-content'); ?>


<!-- .wrapper end -->

<?php
get_footer();
