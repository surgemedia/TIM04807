<section class="text-center" style="background-image: url('<?php echo $vars['background'] ?>');">
    <div class="container">
    <h2>
        <?php echo $vars['title'] ?>
    </h2>
   <?php

  // WP_Query arguments
$args = array (
  "post_type" => "any",
  "post__in" => $vars['first_row']
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
     /*=============================================
      = Card (Class,Image,Title,Content)
      = @components
        + molecule/card
      =============================================*/
      get_component([ 'template' => 'molecule/card',
              'remove_tags' =>  ['img','h6'],
                      'vars' => [
                            "class" => 'col-md-3 card',
                            "title" => get_the_title(),
                            // "subtitle" => $vars["subtitle"],
                            "content" => get_the_content(),
                            "button" => get_component([
                                'template' => 'atom/button-list',
                                'return_string' => true,
                                'vars' => ["button_list"=>get_field( "button_list")]
                                ])
                            ]
                       ]);
  }
} else {
  // no posts found
}

// Restore original Post Data
wp_reset_postdata();
    ?>

  <?php

  // WP_Query arguments
$args = array (
  "post_type" => "any",
  "post__in" => $vars['second_row']
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
     /*=============================================
      = Card (Class,Image,Title,Content)
      = @components
        + molecule/card
      =============================================*/
      get_component([ 'template' => 'molecule/card',
              'remove_tags' =>  ['img','h6'],
                      'vars' => [
                            "class" => 'col-md-6 card',
                            "title" => get_the_title(),
                            // "subtitle" => $vars["subtitle"],
                            "content" => get_the_content(),
                            "button" => get_component([
                                'template' => 'atom/button-list',
                                'return_string' => true,
                                'vars' => ["button_list"=>get_field( "button_list")]
                                ])
                            ]
                       ]);
  }
} else {
  // no posts found
}

// Restore original Post Data
wp_reset_postdata();

    ?>
    </div>
</section>
