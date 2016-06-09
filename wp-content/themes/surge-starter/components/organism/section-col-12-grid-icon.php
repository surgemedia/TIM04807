<section class="text-center">
    <h2>
        <?php echo $vars['title'] ?>
    </h2>
    <div class="container">
      <ul class="list-inline">
        <?php

        foreach ($vars['icon_list'] as $item) {?>
          <li>
            <img alt="<?php echo  $item['description']; ?>" src="<?php echo $item['icon']; ?>"></img>
            <small class="col-xs-12"><?php echo  $item['description']; ?></small>
          </li>
        <?php }

        ?>
      </ul>
    </div>
    <?php echo apply_filters('the_content',  $vars["content"]); ?>
    <?php get_component([       'template' => 'atom/link',
                                'vars' => [
                                      "class" => 'btn text-uppercase pull-left',
                                      "text" => $vars['button_text'],
                                      "url" => $vars['url'],
                                      ]
                                ]); ?>
</section>
