<footer id="footer" class="content-info">
  <div class="container">
	<span> &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></span> 
	 <?php
        if (has_nav_menu('footer')) :
           wp_nav_menu(['theme_location' => 'footer']);
        endif;
        ?>
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>