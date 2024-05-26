<?php
   if (!defined('ABSPATH')){ exit; }

   global $qizon_post;
   if( !$qizon_post || $qizon_post->post_type != 'product' ){ return; }
   
   $post_id = $qizon_post->ID;
   $product = wc_get_product($post_id);

   $this->add_render_attribute('block', 'class', ['cf-item-category']);
?>

<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
   <div class="campaign-categories">
      <?php echo wc_get_product_category_list( $product->get_id(), ' | ', '<span class="posted_in">' . _n( '', '', count( $product->get_category_ids() ), 'qizon-themer' ) . ' ', '</span>' ); ?>
   </div>
</div>