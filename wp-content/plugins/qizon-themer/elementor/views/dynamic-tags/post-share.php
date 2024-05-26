<?php
   if (!defined('ABSPATH')) {
      exit; 
   }
   global $qizon_post;
   if (!$qizon_post){
      return;
   }
   $style = $settings['style'];
   $post_id = $qizon_post->ID;
   $post_title = $qizon_post->post_title;
   $post_permalink = get_permalink($post_id);
?>

<div class="qizon-post-share <?php echo $settings['style'] ?>">
   
   <?php if($style == 'style-2'){ ?>
      <div class="share-button">
         <a href="#" class="btn-control-share btn-gray-icon">
            <i class="fas fa-share"></i><?php echo esc_html__('Share', 'qizon-themer') ?>
         </a>
      </div>
         <div class="share-content">
   <?php } ?>
      
      <ul class="social-networks-post clearfix">  
         <li class="title-share"><?php echo esc_html__( "Share This Post: ", "qizon-themer" ) ?></li>
         <li class="facebook">
            <a data-toggle="tooltip" data-placement="top" data-animation="true"  data-original-title="Facebook" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode($post_permalink); ?>&title=<?php echo urlencode($post_title); ?>" target="_blank">
               <i class="fab fa-facebook-f"></i>
            </a>
         </li>

         <li class="twitter">
            <a data-toggle="tooltip" data-placement="top" data-animation="true"  data-original-title="Twitter" href="http://twitter.com/share?text=<?php echo urlencode($post_title); ?>&url=<?php echo urlencode($post_permalink); ?>" target="_blank">
               <i class="fab fa-twitter"></i>
            </a>
         </li>

         <li class="linkedin">
            <a data-toggle="tooltip" data-placement="top" data-animation="true"  data-original-title="LinkedIn" href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode($post_permalink); ?>&amp;title=<?php echo urlencode($post_title); ?>" target="_blank">
               <i class="fab fa-linkedin-in"></i>
            </a>
         </li>

         <li class="tumblr">
            <a data-toggle="tooltip" data-placement="top" data-animation="true"  data-original-title="Tumblr" href="http://www.tumblr.com/share/link?url=<?php echo urlencode($post_permalink); ?>&amp;name=<?php echo urlencode($post_title); ?>&amp;description=<?php echo urlencode(get_the_excerpt()); ?>" target="_blank">
               <i class="fab fa-tumblr"></i>
            </a>
         </li>
      </ul>

   <?php if($style == 'style-2'){ ?>
      </div>
   <?php } ?>

</div>   
