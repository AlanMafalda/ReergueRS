<?php
   if (!defined('ABSPATH')){ exit; }
  
   global $qizon_post;

   if (!$qizon_post){ return; }

   if ($qizon_post->post_type != 'give_forms'){ return;}

   $form_id = $qizon_post->ID;

   $args = array(
      'show_title' => $settings['show_title'],
      'id'         => $form_id
   )
?>

<div class="givewp-content-form">
   <?php echo give_form_shortcode($args); ?>
</div>

