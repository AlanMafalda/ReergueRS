<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $qizon_post;
   if (!$qizon_post){
      return;
   }
   ?>
   
   <div class="post-content">
         <?php 
            echo apply_filters ('the_content', $qizon_post->post_content); 
         ?>
   </div>      

