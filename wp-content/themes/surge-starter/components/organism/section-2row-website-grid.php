
<?php $options = $vars["padding"].' '.$vars["background_color"].' '.$vars["margin"].' '.$vars["padding"].' '.$vars['section_width']?>


<section id="<?php echo $vars["id"]?>" class="text-center bg-cover <?php echo $options ?>" style="background-image: url('<?php echo $vars['background_image'] ?>');">
    <div class="col-lg-10 col-lg-offset-1">
    <h1>
        <?php echo $vars['title'] ?>
    </h1>
 
   <?php

  // WP_Query arguments
$args = array (
  "post_type" => "any",
  "post__in" => $vars['first_row'],
  "orderby" => "post__in"
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
      get_component([ 'template' => 'molecule/card-wrapper',
              'remove_tags' =>  ['img'],
                      'vars' => [
                            "class" => 'col-xs-12 col-sm-6 col-lg-3 style-4 '. get_field("color"),
                            "subtitle" => get_field("subtitle"),
                            "title" => get_field("title"),
                            "content" => truncate(get_field("excerpt"),12,""),
                            "button" => array([
                                    "class" => "",
                                    "text" => "Overview",
                                    "link" => get_permalink(),
                              ],
                              [
                                    "class" => "",
                                    "text" => "Book Now",
                                    "link" => get_permalink(),
                              ]
                              )
                            ]
                       ]);
  }
} else {
  // no posts found`
}

// Restore original Post Data
wp_reset_postdata();
    ?>

  <?php

// WP_Query arguments
$args = array (
  "post_type" => "any",
  "post__in" => $vars['second_row'],
  "orderby" => "post__in"
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
      get_component([ 'template' => 'molecule/card-wrapper',
              'remove_tags' =>  ['img'],
                      'vars' => [
                            "class" => 'col-xs-12 col-md-6 style-4 '. get_field("color"),
                            "subtitle" => get_field("subtitle"),
                            "title" => get_field("title"),
                            "content" => truncate(get_field("excerpt"),20,""),
                            "button" => array([
                                    "class" => "",
                                    "text" => "Overview",
                                    "link" => get_permalink(),
                              ],
                              [
                                    "class" => "",
                                    "text" => "Book Now",
                                    "link" => "",
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
