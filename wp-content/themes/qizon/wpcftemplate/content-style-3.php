<?php
   global $product;
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
   $thumbnail = 'qizon_medium';
   if(isset($thumbnail_size) && $thumbnail_size){
      $thumbnail = $thumbnail_size;
   }
?>
<div class="campaign-three__single">
   <div class="campaign-three__wrap">
      <div class="campaign-three__image">
         <div class="campaign-three__image-content"><?php echo woocommerce_get_product_thumbnail($thumbnail); ?></div>
         <a href="<?php echo get_permalink(); ?>" class="campaign-three__overlay"></a>
         <div class="campaign-three__love campaign_loved_html">
            <?php echo str_replace(' id=', ' class=', wpcf_function()->campaign_loved(false)); ?>
         </div>
      </div>
      
      <div class="campaign-three__content">
         <div class="campaign-three__categories">
            <?php echo wc_get_product_category_list( $product->get_id(), ' | ', '<span class="posted_in">', '</span>' ); ?>
         </div>

         <h4 class="campaign-three__title">
            <a href="<?php  echo get_permalink(); ?> "><?php echo get_the_title(); ?></a>
         </h4>

         <div class="campaign-three__raised">
            <div class="campaign-three__total-raised">
               <span class="campaign-three__raised-label"><?php echo esc_html__('Raised: ', 'qizon') ?></span>
               <span class="campaign-three__raised-value"><?php echo wc_price($raised); ?></span>
            </div>
            <div class="campaign-three__percent-raised"><?php echo esc_html($percent_display); ?>%</div>
         </div>

         <div class="campaign-progress campaign-three__progress">
            <div class="progress">
               <div class="progress-bar" data-progress-animation="<?php echo esc_attr($percent)?>%">
                  <span class="percentage"><span></span></span>
               </div>
            </div>
         </div>   

         <div class="campaign-three__goal">
            <span class="campaign-three__goal-label"><?php echo esc_html__('Goal:', 'qizon'); ?></span>
            <span class="campaign-three__goal-value"><?php echo wc_price( $funding_goal ); ?></span>
         </div>  

         <div class="campaign-three__bottom">
            <div class="campaign-three__bottom-content">
               <div class="campaign-three__time-remaining">
                  <?php get_template_part( 'wpcftemplate/woocommerce/basic/include/loop/time_remaining'); ?>
               </div>
               <div class="campaign-three__link">
                  <a class="campaign-three__link-content" href="<?php  echo get_permalink(); ?> "><?php echo esc_html__('Explore', 'qizon') ?></a>
               </div>
            </div>   
         </div> 
      </div>   
   </div>   
</div>   