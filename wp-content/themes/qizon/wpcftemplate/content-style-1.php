<?php
   global $product;
   $post_id = get_the_ID();
   $_rand = wp_rand(6);
   $percent_display = $percent = wpcf_function()->get_raised_percent(); 
   $percent = ($percent >= 100) ? 100 : $percent;
   $total = wpcf_function()->get_total_fund($post->ID);
   $goal = wpcf_function()->get_total_goal($post->ID);
   if ($total > 0 && $goal > 0  ) {
      $percent_display =  number_format($total / $goal * 100, 2, '.', '');
   }
   $funding_goal = get_post_meta($post->ID, '_nf_funding_goal', true);
   $raised = 0;
   $total_raised = wpcf_function()->get_total_fund();
   if ($total_raised){
      $raised = $total_raised;
   }
   $thumbnail = 'post-thumbnail';
   if(isset($thumbnail_size) && $thumbnail_size){
      $thumbnail = $thumbnail_size;
   }

   $video = trim(get_post_meta($post_id, 'wpneo_funding_video', true)); 
   $attachment_ids = $product->get_gallery_image_ids();
?>

<div class="campaign-one__single">
   <div class="campaign-one__image">
      <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"> <?php echo woocommerce_get_product_thumbnail($thumbnail); ?></a>
      <a href="<?php echo get_permalink(); ?>" class="campaign-one__overlay"></a>
      
      <div class="campaign-one__love campaign_loved_html">
         <?php echo str_replace(' id=', ' class=', wpcf_function()->campaign_loved(false)); ?>
      </div>

      <div class="campaign-one__categories">
         <?php echo wc_get_product_category_list( $product->get_id(), ' | ', '<span class="posted_in">', '</span>' ); ?>
      </div>

      <div class="campaign-one__media wcf-media__one">
         <?php 
            if($attachment_ids){
               echo '<div class="wcf-media__gallery">';
               $i = 1;
               foreach($attachment_ids as $attachment_id){ 
                  $classes = ($i>1) ? 'hidden' : 'wcf-media__gallery-link';
                  $image_src = wp_get_attachment_image_src($attachment_id, 'full');
                  if( isset($image_src[0]) ){ ?>
                    <a class="<?php echo esc_attr($classes) ?>" href="<?php echo esc_url($image_src[0]) ?>" data-elementor-lightbox-slideshow="<?php echo esc_attr($_rand) ?>">
                      <?php 
                        if($i == 1){
                           echo '<i class="qicon-camera-1"></i>';
                           echo '<span>' . count($attachment_ids) . '</span>';
                        }
                      ?>
                    </a>
                  <?php }  
                  $i = $i + 1;
               }
               echo '</div>';
             } 
          ?>
         <?php if($video){ ?>
            <a class="wcf-media__video popup-video" href="<?php echo esc_url($video) ?>"><i class="qicon-video-camera-2"></i></a>
         <?php } ?>
      </div>   

   </div>
   
   <div class="campaign-one__content">
      <div class="campaign-one__time-remaining">
         <?php get_template_part( 'wpcftemplate/woocommerce/basic/include/loop/time_remaining'); ?>
      </div> 

      <h4 class="campaign-one__title">
         <a href="<?php  echo get_permalink(); ?> "><?php echo get_the_title(); ?></a>
      </h4>
      
      <div class="campaign-one__info">
         <div class="campaign-one__info-wrap">
            <div class="campaign-one__achive">
               <div class="campaign-one__achive-icon">
                  <i class="qicon-mission-2"></i>
               </div>
               <div class="campaign-one__achive-content">
                  <span class="campaign-one__achive-label"><?php echo esc_html__('Achive:', 'qizon') ?></span>
                  <span class="campaign-one__achive-value"><?php echo wc_price($raised); ?></span>
               </div>
            </div>
            <div class="campaign-one__goal">
               <div class="campaign-one__goal-icon">
                  <i class="qicon-mission-3"></i>
               </div>
               <div class="campaign-one__goal-content">
                  <span class="campaign-one__goal-label"><?php echo esc_html__('Goal:', 'qizon') ?></span>
                  <span class="campaign-one__goal-value"><?php echo wc_price($funding_goal); ?></span>
               </div>
            </div>
         </div>
      </div>   
   </div> 

   <?php 
      $progress_class = $percent < 10 ? 'percent-small' : 'percent-default';
      $progress_class .= ($percent == 0 ? ' percent-0' : '');

   ?>
   <div class="campaign-one__bottom">
      <div class="campaign-one__bottom-wrap">
         <div class="campaign-one__raised-label"><?php echo esc_html__('Raised', 'qizon'); ?></div>
         <div class="campaign-one__progress <?php echo esc_attr($progress_class)?>">
            <div class="progress">
               <div class="progress-bar" data-progress-animation="<?php echo esc_attr($percent)?>%">
                  <span class="percentage"><span></span></span>
               </div>
            </div>
         </div>  
         <div class="campaign-one__percent-raised <?php echo esc_attr($progress_class)?>"><?php echo esc_html($percent_display); ?>%</div>
      </div>   
   </div> 

</div>   