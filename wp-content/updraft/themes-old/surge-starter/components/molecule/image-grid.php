<div class="<?php echo $vars['class'] ?> image-grid molecule">
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