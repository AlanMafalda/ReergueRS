<?php
   if (!defined('ABSPATH')){ exit; }

   global $qizon_post, $post;

   if( !$qizon_post ){ return; }
   if( $qizon_post->post_type != 'product' ){ return; }

   if(\Elementor\Plugin::$instance->editor->is_edit_mode() || $post->post_type == 'gva__template'){
      global $post, $product;
      $post_id = $qizon_post->ID;
      $post = $qizon_post;
      $product = wc_get_product($post_id);
   }

   $this->add_render_attribute('block', 'class', [ 'cf-item-button-donate' ]);
?>

<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
   <?php wpcf_function()->template('include/fund-campaign-btn'); ?>
</div>   