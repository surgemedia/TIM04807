<?php if(strlen($vars['id']) == 0){ $vars['id'] = rand(); } ?>
<div id="<?php echo $vars['id'] ?>" class="carousel slide <?php echo $vars['class'] ?>" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php for ($vars['slider_nav_count']=0; $vars['slider_nav_count'] < sizeof($vars['slides']); $vars['slider_nav_count']++) { ?>
  	<?php if($vars['slider_nav_count']===0){ $vars['slider_nav_active'] = 'active'; } else { unset($vars['slider_nav_active']); } ?>
     <li data-target="#<?php echo $vars['id'] ?>" data-slide-to="<?php echo $vars['slider_nav_count']; ?>" class="<?php echo $vars['slider_nav_active']; ?>"></li>
    <?php } ?>
  </ol>

  <div class="carousel-inner" role="listbox">
 <?php 
 $vars['slider_count'];
 for ($vars['slider_count']=0; $vars['slider_count'] < sizeof($vars['slides']); $vars['slider_count']++) { ?>
  	<?php if($vars['slider_count']===0){ $vars['slider_active'] = 'active'; } else { unset($vars['slider_active']); } ?>
    <div class="item <?php echo $vars['slider_active']; ?>">
      <img src="<?php echo $vars['slides'][$vars['slider_count']]['image'] ?>" alt=" <?php echo $vars['slides'][$slider_count]['title'] ?>">
      <div class="carousel-caption">
       <?php echo $vars['slides'][$vars['slider_count']]['caption'] ?>
      </div>
    </div>
  <?php } ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#<?php echo $vars['id']; ?>" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#<?php echo $vars['id']; ?>" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>