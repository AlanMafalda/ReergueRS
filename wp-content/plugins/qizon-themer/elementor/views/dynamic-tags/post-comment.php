<?php
   if (!defined('ABSPATH')){ exit; }

   global $qizon_post, $post;

   if(!$qizon_post){ return; }
   $post = $qizon_post;
?>
   
<div class="post-comment">
   <?php
      if(comments_open($qizon_post->ID)){
         comments_template();
      }else{
         if(\Elementor\Plugin::$instance->editor->is_edit_mode()){
            echo '<div class="alert alert-info">' . esc_html__('This Post Disabled Comment', 'qizon-themer') . '</div>';
         }
      }
   ?>
</div>      

