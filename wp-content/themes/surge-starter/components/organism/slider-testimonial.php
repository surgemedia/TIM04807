<section class="container-fluid text-center">
  <h1><?php echo $vars['title'] ?></h1>

 <div class="owl-carousel">

<?php //debug($vars); ?>
  <?php 


    if($vars['slide_objects'] == 'Website Items') { 
      //debug($vars['website_items']);


  $args = array(
          'post_type' => 'any',
          'post__in'      => $vars['website_items'],
        );

        // The Query
        $vars['slider_core'] = new WP_Query( $args );

        // The Loop
        if ( $vars['slider_core']->have_posts() ) {
          while ( $vars['slider_core']->have_posts() ) {
            $vars['slider_core']->the_post();
              get_component([
              'template' => 'molecule/img-text',
              'remove_tags' => [],
               'vars' => [
                    'class' => 'item active text-center',
                    'title' =>   get_the_title(),
                    'content' => get_the_content(),
                    'img' => get_field('image')
                    ]
                  ]);
          }
        } else {
          // no posts found
        }

        // Restore original Post Data
        wp_reset_postdata();

  } elseif($vars['slide_objects'] == 'manual_slider') {
      for ($vars['i']=0; $vars['i'] < sizeof($vars['manual_slider']); $vars['i']++) {

               get_component([
              'template' => 'molecule/img-text',
              'remove_tags' => ['img'],
              'vars' => [
                    'class' => 'item active text-center',
                    'title' => $vars['manual_slider'][$vars['i']]['title'],
                    'content' => $vars['manual_slider'][$vars['i']]['content'],
                    ]
                  ]);
      }
  } 
    ?>
  </div>
</section>