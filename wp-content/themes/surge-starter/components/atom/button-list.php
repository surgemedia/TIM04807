<?php 
 //debug($vars);
if (is_array($vars)) {
$button_size= sizeof($vars);
if (1<$button_size) : ?>
<div class="button-list">
<?php endif; ?>
	<?php foreach ($vars as $key=>$button) {?>
		<?php switch ($button['link_type']) {
			case 'internal':
				$link = $button['internal_link'];
				break;
			case 'external':
				$link = $button['external_link'];
				break;
			case 'anchor':
				$link = "#".$button['anchor_link'];
				break;
			default:
				$link = $button['link'];
				break;
		}  ?>
		<a class="btn text-uppercase <?php echo $button['class']?>" href="<?php echo $link?>" <?php echo $button['extra-data'] ?>> <?php echo $button['text']; ?> </a>
	<?php } ?>
<?php if (1<$button_size) : ?>
</div>
<?php endif; ?>
<?php } ?>