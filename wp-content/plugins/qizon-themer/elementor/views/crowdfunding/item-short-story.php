<?php
   if (!defined('ABSPATH')){ exit; }

   global $qizon_post;
   if( !$qizon_post || $qizon_post->post_type != 'product' ||  !$qizon_post->post_excerpt ){ return; }
   
   $post_id = $qizon_post->ID;
   $this->add_render_attribute('block', 'class', [ 'cf-item-short-story' ]);
?>

<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
	<div class="clearfix"></div>
	<div class="wpneo-single-short-description">
		<?php if($settings['title']){ ?>
			<h2 class="title"><?php echo esc_html($settings['title']); ?></h2>
		<?php } ?>
	   <div class="desc" itemprop="description">
	      <?php echo apply_filters( 'woocommerce_short_description', $qizon_post->post_excerpt ) ?>
	   </div>
	</div>
</div>