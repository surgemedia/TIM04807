<section class="text-center" style="background-image: url('<?php echo $vars['background'] ?>');">
    <div class="container">
    <h1>
        <?php echo $vars['title'] ?>
    </h1>
 

<?php
      //debug($vars);
      /*=============================================
      = Card (Class,Image,Title,Content)
      = @components
        + molecule/card
      =============================================*/
      get_component([ 'template' => 'molecule/card',
                      'remove_tags' => ['img'],
                      'vars' => [
                            "class" => 'col-md-6 card',
                            "title" => $vars["title"],
                            "subtitle" => $vars["subtitle"],
                            "content" => apply_filters('the_content',  $vars["content"]),
                              "button" => get_component([
                                'template' => 'atom/link',
                                'return_string' => true,
                                'vars' => [
                                      "class" => 'btn text-uppercase pull-left',
                                      "text" => $vars['button'][0]['text'],
                                      "url" => $vars['button'][0]['link'],
                                      ]
                                ])
                            ]
                       ]);
?>

   <?php

  // WP_Query arguments
$args = array (
  "post_type" => "any",
  "post__in" => $vars['upcoming']
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();?>

<article class="upcoming card">
  <hgroup>
    <h1>Upcoming Workshop</h1>
    <small><?php echo get_the_title(); ?></small>
    <!-- <small><?php echo get_field('location') ?></small> -->
    <h1>Remaining Seats: <?php// echo get_field('seats') ?> </h1>
  </hgroup>
  <?php 
        get_component([
                'template' => 'atom/link',
                'vars' => [
                  "class" => 'btn text-uppercase',
                  "text" => "overview",
                  "url" => "",
                  ]
        ]);
         get_component([
                'template' => 'atom/link',
                'vars' => [
                  "class" => 'btn text-uppercase',
                  "text" => "book now",
                  "url" => "",
                  ]
        ]);
                                 ?>

</article>

<?php  }
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
  // no posts found`
}

// Restore original Post Data
wp_reset_postdata();
    ?>

  <?php

// WP_Query arguments
$args = array (
  "post_type" => "any",
  "post__in" => $vars['third_row']
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
