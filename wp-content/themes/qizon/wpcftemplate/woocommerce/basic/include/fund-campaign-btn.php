<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="wpneo-single-sidebar ASA">
	<?php
	global $post, $product;
	$currency = '$';
	if ($product->get_type() == 'crowdfunding') {
		if (wpcf_function()->is_campaign_valid()) {
			$recomanded_price = get_post_meta($post->ID, 'wpneo_funding_recommended_price', true);
			$min_price = get_post_meta($post->ID, 'wpneo_funding_minimum_price', true);
			$max_price = get_post_meta($post->ID, 'wpneo_funding_maximum_price', true);
			$predefined_price = get_post_meta($post->ID, 'wpcf_predefined_pledge_amount', true);
			if ( ! empty($predefined_price)){
				$predefined_price = apply_filters('wpcf_predefined_pledge_amount_array_a', explode(',', $predefined_price));
			}

			if(function_exists( 'get_woocommerce_currency_symbol' )){
				$currency = get_woocommerce_currency_symbol();
			}

			if (! empty($_GET['reward_min_amount'])){
				$recomanded_price = (int) esc_html($_GET['reward_min_amount']);
			} ?>

            <span class="wpneo-tooltip">
                <span class="wpneo-tooltip-min"><?php echo esc_html__('Minimum amount is ','qizon'); echo esc_html($currency . $min_price); ?></span>
                <span class="wpneo-tooltip-max"><?php echo esc_html__('Maximum amount is ','qizon'); echo esc_html($currency . $max_price); ?></span>
            </span>

			<?php
			if (is_array($predefined_price) && count($predefined_price)){
				echo '<ul class="wpcf_predefined_pledge_amount">';
				foreach ($predefined_price as $price){
					$price = trim($price);
					$wooPrice = wc_price($price);
					echo " <li><a href='javascript:;' data-predefined-price='{$price}'> {$wooPrice}</a> </li> ";
				}
				echo "</ul>";
			}
			?>

			<?php $extra_link = get_post_meta( $post->ID, 'qizon_project_link', true ); ?>

				<?php if( empty($extra_link) ){ ?>

	            <form enctype="multipart/form-data" method="post" class="cart_form AA">
					<?php do_action('before_wpneo_donate_field'); ?>
					<?php echo get_woocommerce_currency_symbol(); ?>
	                
	                <input oninput="this.value = this.value.replace(/[^0-9\.]/g, '').split(/\./).slice(0, 2).join('.')" type="number" step="any" min="0" placeholder="<?php echo esc_attr($recomanded_price); ?>" name="wpneo_donate_amount_field" class="input-text amount wpneo_donate_amount_field text" value="<?php echo esc_attr($recomanded_price); ?>" data-min-price="<?php echo esc_attr($min_price) ?>" data-max-price="<?php echo esc_attr($max_price) ?>" >

					<?php do_action('after_wpneo_donate_field'); ?>
	                <input type="hidden" value="<?php echo esc_attr($post->ID); ?>" name="add-to-cart">
	                <button type="submit" class="btn-back-campaign btn-theme <?php echo apply_filters('add_to_donate_button_class', 'wpneo_donate_button'); ?>"><span><?php echo esc_html__('Back Campaign', 'qizon'); ?></span></button>
	            </form>

	         <?php }else{ ?>
	         	<a href="<?php echo esc_url($extra_link) ?>" class="btn-back-campaign btn-theme"><span><?php echo esc_html__('Back Campaign', 'qizon'); ?></span></a>
	         <?php } ?>


		<?php
		} else {
			if ( ! wpcf_function()->is_campaign_started()){
				wpcf_function()->campaign_start_countdown();
			}else{
				if( wpcf_function()->is_reach_target_goal() ){
					echo esc_html__('The campaign is successful.','qizon');
				}else{
					echo esc_html__('This campaign has been invalid or not started yet.','qizon');
				}
			}
		}
	}

	?>
</div>