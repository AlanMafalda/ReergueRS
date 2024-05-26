<?php
   if (!defined('ABSPATH')){ exit; }

   global $qizon_post;
   if( !$qizon_post || $qizon_post->post_type != 'product' ){ return; }
   
   $post_id = $qizon_post->ID;
   $this->add_render_attribute('block', 'class', [ 'cf-item-social-share' ]);
?>

<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
   <?php wpcf_function()->template('include/social-share'); ?>
</div>