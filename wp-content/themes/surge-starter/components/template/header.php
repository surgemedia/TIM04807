<style>
  <?php 
    $colors=array(
    "blue"  => "#0077bf;",
    "blue-light" => "#7caadb;",
    "purple" => "#512850;",
    "grey" => "#c7caca;",
    "dark" => "#303a3a;",
    "yellow" => "#e5ba07;");

    $args = array(
        'post_type'   => 'program',
    );
    $the_query = new WP_Query( $args );
    if( $the_query->have_posts() ):
      while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        header.banner nav.nav-primary ul.navbar-nav > li.menu-item .dropdown-menu .post-id-<?php echo get_the_id()?>.active a{
          border: 2px solid <?php echo $colors[get_field('color')]?>
        } 
        header.banner nav.nav-primary ul.navbar-nav > li.menu-item .dropdown-menu .post-id-<?php echo get_the_id()?>:hover a{
          color: #fff;
        } 
        header.banner nav.nav-primary ul.navbar-nav > li.menu-item .dropdown-menu .post-id-<?php echo get_the_id()?>:hover {
          background: <?php echo $colors[get_field('color')]?>
        } 
    <?php    endwhile; 
           endif;
       wp_reset_query(); ?>

</style>
<header class="banner">
  <div class="container-fluid">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>">
      <img src="<?php echo get_field("logo","option")?>" width="202" height="auto" alt="<?php bloginfo('name'); ?>">
    </a>
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <nav class="nav-primary">
        <?php
        if (has_nav_menu('primary_navigation')) :
           wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav ']);
        endif;
        ?>
      </nav>
    </div>
  </div>
</header>
