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
