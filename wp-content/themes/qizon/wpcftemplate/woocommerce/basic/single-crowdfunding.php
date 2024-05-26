<?php
   defined( 'ABSPATH' ) || exit;

   get_header(); 
   global $post, $product;

   if ( post_password_required() ) {
      echo get_the_password_form();
      return;
   }
?>

<section id="wp-main-content" class="clearfix main-page">
   <div class="main-page-content">
      <div class="content-page">      
         <div id="wp-content" class="wp-content clearfix">
            <?php 
               if(class_exists('GVA_Layout_Frontend')){
                  do_action('qizon/layouts/single/crowdfunding');
               }else{
                  get_template_part('wpcftemplate/woocommerce/basic/single', 'crowdfunding');
               }
            ?>
         </div>    
      </div>      
   </div>   
</section>

<?php get_footer(); ?>
