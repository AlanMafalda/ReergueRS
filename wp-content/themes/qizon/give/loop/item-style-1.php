<?php
   $form_id = get_the_ID();
   $form = new Give_Donate_Form( $form_id );
   $goal = apply_filters( 'give_goal_amount_target_output', $form->goal, $form_id, $form );
   $goal_option = give_get_meta( $form_id, '_give_goal_option', true );
   $progress = 0;
   $income = apply_filters( 'give_goal_amount_raised_output', $form->get_earnings(), $form_id, $form );
   $income = empty($income) ? 0 : $income;


   if($goal_option == 'disabled' || !$goal_option){
      $goal = 'unlimited';
      $progress = 100;
      $income = give_currency_filter(give_format_amount( $income, array( 'sanitize' => false ) ));
   }

  if($goal == 'unlimited'){
      $progress_label = esc_html__( '100%' , 'qizon' );
      $progress = 100;
      $togo = esc_html__("Unlimited", 'qizon');
  }else{
      $progress = apply_filters( 'give_goal_amount_funded_percentage_output', round( ( $income / $goal ) * 100, 1 ), $form_id, $form );
      $progress_label = $progress . '%';
      $income = give_currency_filter(give_format_amount( $income, array( 'sanitize' => false ) ));
      $goal = give_currency_filter(give_format_amount( $goal, array( 'sanitize' => false ) ));
      if($progress > 100) $progress = 100;
  }

   $post_category = ''; $separator = ' '; $output = '';
   $item_cats = get_the_terms( get_the_ID(), 'give_forms_category' );
   if(!empty($item_cats) && !is_wp_error($item_cats)){
      foreach((array)$item_cats as $item_cat){
         $output .= '<a href="' . esc_url(get_category_link( $item_cat->term_id )) . '" title="' . esc_attr( sprintf( esc_attr__( "View all campaign in %s", 'qizon' ), $item_cat->name ) ) . '">'.$item_cat->name.'</a>'.$separator;
      }
      $post_category = trim($output, $separator);
   }
   $sale = give_get_meta( $form_id, '_give_form_sales', true );
   $sale = empty($sale) ? '0': $sale;
   $thumbnail = (isset($thumbnail_size) && $thumbnail_size) ? $thumbnail_size : 'qizon_medium';
   $excerpt_words = (isset($excerpt_words) && $excerpt_words) ? $excerpt_words : '30';
?> 

<div class="give-one__single">
      <div class="give-one__image">
         <?php if ( has_post_thumbnail() ) { ?>
            <a class="link-content" href="<?php esc_url(the_permalink()) ?>"><?php the_post_thumbnail( $thumbnail ); ?></a>
         <?php } else { ?>
            <a class="link-content" href="<?php esc_url(the_permalink()) ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/images/no-image.jpg'); ?>" alt="<?php echo the_title_attribute() ?>"/></a>
         <?php } ?>

         <a href="<?php echo get_permalink(); ?>" class="give-one__overlay"></a>

         <div class="give-one__categories">
            <?php echo html_entity_decode($post_category) ?>
         </div> 

         <?php get_template_part( 'give/part', 'media' ); ?>
      </div>

      <div class="give-one__content">
            
         <h2 class="give-one__title"><a href="<?php esc_url(the_permalink()) ?>"><?php the_title() ?></a></h2>
         
         <div class="give-one__info">
            <div class="give-one__info-wrap">
               <div class="give-one__achive">
                  <div class="give-one__achive-icon">
                     <i class="qicon-mission-2"></i>
                  </div>
                  <div class="give-one__achive-content">
                     <span class="give-one__achive-label"><?php echo esc_html__('Achive:', 'qizon') ?></span>
                     <span class="give-one__achive-value"><?php echo esc_html($income); ?></span>
                  </div>
               </div>
               <div class="give-one__goal">
                  <div class="give-one__goal-icon">
                     <i class="qicon-mission-3"></i>
                  </div>
                  <div class="give-one__goal-content">
                     <span class="give-one__goal-label"><?php echo esc_html__('Goal:', 'qizon') ?></span>
                     <span class="give-one__goal-value"><?php echo esc_html($goal); ?></span>
                  </div>
               </div>
            </div>
         </div>  
      </div>

      <?php 
         $progress_class = $progress < 10 ? 'percent-small' : 'percent-default';
         $progress_class .= ($progress == 0 ? ' percent-0' : '');
      ?>
      <div class="give-one__bottom">
         <div class="give-one__bottom-wrap">
            <div class="give-one__raised-label"><?php echo esc_html__('Raised', 'qizon'); ?></div>
            <div class="give-one__progress <?php echo esc_attr($progress_class)?>">
               <div class="progress">
                  <div class="progress-bar" data-progress-animation="<?php echo esc_attr($progress)?>%">
                     <span class="percentage"><span></span></span>
                  </div>
               </div>
            </div>  
            <div class="give-one__percent-raised <?php echo esc_attr($progress_class)?>"><?php echo esc_html($progress_label); ?></div>
         </div>   
      </div> 
</div>

      
