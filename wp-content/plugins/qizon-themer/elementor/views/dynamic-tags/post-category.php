<?php
	if (!defined('ABSPATH')) {
		exit; 
	}
	global $qizon_post;
	if (!$qizon_post){
		return;
	}
	?>
	
	<div class="post-category">
		<?php 
			if($settings['show_icon']){ 
				echo '<i class="fas fa-folder-open"></i>';
			}
			echo '<span>' . get_the_category_list( ", ", '', $qizon_post->ID ) . '</span>';
		?>
	</div>      

