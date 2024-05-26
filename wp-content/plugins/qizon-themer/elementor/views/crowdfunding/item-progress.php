<?php
   if (!defined('ABSPATH')){ exit; }

   global $qizon_post;
   if( !$qizon_post ){ return; }
   if( $qizon_post->post_type != 'product' ){ return; }

   $post_id = $qizon_post->ID;

   $end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);
   $percent_display = $percent = wpcf_function()->get_raised_percent(); 
   if( $percent >= 100 ){ 
      $percent = 100; 
   }
   $total = wpcf_function()->get_total_fund($post_id);
   $goal = wpcf_function()->get_total_goal($post_id);
   if ($total > 0 && $goal > 0) {
      $percent_display =  number_format($total / $goal * 100, 2, '.', '');
   }
   $funding_goal = get_post_meta($post_id, '_nf_funding_goal', true);

   $size = $settings['size'];
   $thickness = $settings['thickness'];
   $empty_fill = !empty($settings['empty_fill']) ? $settings['empty_fill'] : '#EEF5F7';
   $color = !empty($settings['color']) ? $settings['color'] : '#57ADBF';

   $this->add_render_attribute('block', 'class', [ 'cf-item-progress', 'end_method-' . esc_attr($end_method), $settings['style'] ]);
?>

<?php if($settings['style'] == 'style-1'){ ?>
   <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
      <div class="campaign-raised">
         <div class="campaign-raised-label"><?php echo esc_html__('Raised: ', 'qizon-themer') ?></div>
         <div class="campaign-percent_raised"><?php echo esc_html($percent_display); ?>%</div>
      </div>
      <div class="campaign-progress clearfix">
         <div class="progress">
            <div class="progress-bar" data-progress-animation="<?php echo esc_attr($percent)?>%">
               <span class="percentage"><span></span></span>
            </div>
         </div>
      </div>
      <div class="campaign-goal">
         <span class="label-goal"><?php echo esc_html__('Goal:', 'qizon-themer'); ?></span>
         <span class="value-goal"><?php echo wc_price( $funding_goal ); ?></span>
      </div> 
   </div>
<?php } ?>

<!-- Style II -->
<?php if($settings['style'] == 'style-2'){ 
   $value = $percent ? $percent/100 : 0; 
?>
   <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
      <div class="content-inner">
         <div class="box-left">
            <div class="circle-progress" data-value="<?php echo esc_attr($value); ?>"  data-thickness="<?php echo $thickness ?>" data-empty-fill="<?php echo $empty_fill ?>" data-lineCap="square" data-size="<?php echo esc_attr($size) ?>" data-fill="{ &quot;color&quot;: &quot;<?php echo $color ?>&quot; }">
               <strong></strong>
            </div>
         </div>
         <div class="box-right">
            <div class="content-item">
               <span class="title"><?php echo esc_html__('Current', 'qizon-themer') ?></span>
               <span class="value"><?php echo wc_price($total) ?></span>
            </div>
            <div class="content-item">
               <span class="title"><?php echo esc_html__('Target', 'qizon-themer') ?></span>
               <span class="value"><?php echo wc_price($goal) ?></span>
            </div>
            <div class="content-item">
               <span class="title"><?php echo esc_html__('Backers', 'qizon-themer') ?></span>
               <span class="value"><?php echo wpcf_function()->get_total_backers(); ?></span>
            </div>
         </div>   
      </div>   
   </div>
<?php } ?>