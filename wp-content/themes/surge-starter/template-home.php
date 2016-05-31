<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('components/molecule/page', 'header'); ?>
  <?php get_template_part('components/molecule/content', 'page'); ?>
<?php endwhile; ?>
