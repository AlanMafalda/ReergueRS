<?php
   global $product;
   $percent_display = $percent = wpcf_function()->get_raised_percent();
   $percent = ($percent >= 100) ? 100 : $percent;

   $funding_goal = get_post_meta($post->ID, '_nf_funding_goal', true);
   $raised = 0;
   
   $total = wpcf_function()->get_total_fund($post->ID);
   $goal = wpcf_function()->get_total_goal($post->ID);
   if ($total > 0 && $goal > 0  ) {
      $percent_display =  number_format($total / $goal * 100, 2, '.', '');
   }

   $total_raised = wpcf_function()->get_total_fund();
   if ($total_raised){
      $raised = $total_raised;
   }
   $thumbnail = 'qizon_medium';
   if(isset($thumbnail_size) && $thumbnail_size){
      $thumbnail = $thumbnail_size;
   }

?>
<div class="campaign-two__single">
   <div class="campaign-two__image">
      <a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">
         <?php echo woocommerce_get_product_thumbnail($thumbnail); ?>
      </a>
      <a href="<?php echo get_permalink(); ?>" class="campaign-two__overlay"></a>
      <div class="campaign-two__love campaign_loved_html">
         <?php echo str_replace(' id=', ' class=', wpcf_function()->campaign_loved(false)); ?>
      </div>
      <div class="campaign-two__categories">
         <?php echo wc_get_product_category_list( $product->get_id(), ' | ', '<span class="posted_in">', '</span>' ); ?>
      </div>
   </div>
   <div class="campaign-two__content">
      <div class="campaign-two__meta">
         <div class="campaign-two__time_remaining">
            <?php get_template_part( 'wpcftemplate/woocommerce/basic/include/loop/time_remaining'); ?>
         </div>
      </div>

      <h4 class="campaign-two__title">
         <a href="<?php  echo get_permalink(); ?> "><?php echo get_the_title(); ?></a>
      </h4>
      
      <div class="campaign-two__raised">
         <div class="campaign-two__total_raised">
            <span class="campaign-two__raised-value"><?php echo wc_price($raised); ?></span>
            <span class="campaign-two__raised-label"><?php echo esc_html__('raised of ', 'qizon') ?></span>
            <span class="campaign-two__goal"><?php echo wc_price( $funding_goal ); ?></span>
         </div>
         <div class="ccampaign-two__percent-raised"><?php echo esc_html($percent_display); ?>%</div>
      </div>
      <div class="campaign-two__progress">
         <div class="progress">
            <div class="progress-bar" data-progress-animation="<?php echo esc_attr($percent)?>%">
               <span class="percentage"><span></span></span>
            </div>
         </div>
      </div>   
   </div>   
</div>   