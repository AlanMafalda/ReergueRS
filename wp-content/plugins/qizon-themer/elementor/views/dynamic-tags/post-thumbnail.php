<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $qizon_post;
   if (!$qizon_post){
      return;
   }
?>

<?php 
   $thumbnail_size = $settings['qizon_image_size'];

   if(has_post_thumbnail($qizon_post)){
      echo get_the_post_thumbnail($qizon_post, $thumbnail_size);
   }
?>

