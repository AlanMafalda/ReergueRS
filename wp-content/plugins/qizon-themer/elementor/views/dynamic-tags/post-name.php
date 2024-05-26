<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $qizon_post;
   if (!$qizon_post){
      return;
   }
   $html_tag = $settings['html_tag'];
?>

<div class="qizon-post-title">
   <<?php echo esc_attr($html_tag) ?> class="post-title">
      <span><?php echo get_the_title($qizon_post) ?></span>
   </<?php echo esc_attr($html_tag) ?>>
</div>   