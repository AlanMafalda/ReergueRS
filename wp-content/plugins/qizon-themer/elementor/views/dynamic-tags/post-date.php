<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $qizon_post;
   if (!$qizon_post){
      return;
   }
   ?>
   
   <div class="post-date">
         <?php 
            if($settings['show_icon']){ 
               echo '<i class="far fa-calendar"></i>';
            }
            echo get_the_date( get_option('date_format'), $qizon_post->ID);
         ?>
   </div>      

