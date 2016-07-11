<?php //debug($vars) ?>
<div class="<?php echo $vars['class'] ?> image-grid molecule">
  <ul class="list-inline">
        <?php

        foreach ($vars['image_list'] as $item) {?>
          <li class='col-xs-12 col-sm-6 col-md-<?php echo $vars['column_number']?>' >
            <img alt="<?php echo  $item['description']; ?>" src="<?php echo $item['image']; ?>"></img>
            <small class="col-xs-12"><?php echo  $item['description']; ?></small>
          </li>
        <?php }

        ?>
      </ul>
</div>