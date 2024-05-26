<?php
defined( 'ABSPATH' ) || exit;


if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
global $post, $product;

$percent = wpcf_function()->get_raised_percent(); if( $percent >= 100 ){ $percent = 100; }
$funding_goal = get_post_meta($post->ID, '_nf_funding_goal', true);
$raised = 0;
$total_raised = wpcf_function()->get_total_fund();
if ($total_raised){
	 $raised = $total_raised;
}

$days_remaining = apply_filters('date_expired_msg', esc_html__('0', 'qizon'));
if (wpcf_function()->get_date_remaining()){
	 $days_remaining = apply_filters('date_remaining_msg', esc_html__(wpcf_function()->get_date_remaining() . '', 'qizon'));
}

$end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);
do_action( 'wpcf_before_single_campaign' );

?>

<div class="wpneo-list-details cf-single-content-only">
	<div itemscope itemtype="http://schema.org/ItemList">
		<div class="campaign-top">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="campaign-single-left">
							<?php wpcf_function()->template('include/feature-image'); ?>
						</div>	
					</div> 

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="campaign-single-summary campaign-single-right">
							<div class="wpneo-campaign-summary-inner" itemscope itemtype="http://schema.org/DonateAction">
								
								<div class="campaign-meta clearfix">
									<div class="cf-item-category">
										<div class="campaign-categories">
											<?php echo wc_get_product_category_list( $product->get_id(), ' | ', '<span class="posted_in">' . _n( '', '', count( $product->get_category_ids() ), 'qizon' ) . ' ', '</span>' ); ?>
										</div>
									</div>	
									<?php wpcf_function()->template('include/location'); ?>
								</div>
										
								<h2 class="wpneo-campaign-title"><?php the_title(); ?></h2>
								
								<div class="cf-creator-info">
									<?php wpcf_function()->template('include/creator-info'); ?>
								</div>	

								<div class="campaign-info cf-item-info">
									<div class="campaign-pledged item-info">
										<div class="content-inner">
											 <div class="meta-value"><?php echo wc_price($raised); ?></div>
											 <div class="title"><?php echo esc_html__( 'PPrometido', 'qizon' ) ?></div>
										</div>   
									</div>
									<div class="campaign-backers item-info">
										<div class="content-inner">
										 	<div class="meta-value"><?php echo wpcf_function()->get_total_backers(); ?></div>
										 	<div class="title"><?php echo esc_html__( 'BApoiadores', 'qizon' ) ?></div>
										</div>
									</div>
									<div class="camapign-time_remaining item-info">
										<?php wpcf_function()->template('include/loop/time_remaining'); ?>
									</div>
								</div>

								<div class="cf-item-progress">

									<!-- Campaign Raised -->
									<div class="campaign-raised">
										<div class="campaign-raised-label"><?php echo esc_html__('Raised: ', 'qizon') ?></div>
										<div class="campaign-percent_raised"><?php echo number_format($percent, 1); ?>%</div>
									</div>
									<div class="campaign-progress clearfix">
										<div class="progress">
											<div class="progress-bar" data-progress-animation="<?php echo esc_attr($percent)?>%">
												<span class="percentage"><span></span></span>
											</div>
										</div>
									</div>
								 	<!-- End Campaign Raised -->

									<div class="campaign-goal">
										<span class="label-goal"><?php echo esc_html__('Goal:', 'qizon'); ?></span>
										<span class="value-goal"><?php echo wc_price( $funding_goal ); ?></span>
									</div> 
								</div>	

								<div class="cf-item-button-donate">
								 	<?php wpcf_function()->template('include/fund-campaign-btn'); ?>
								</div> 	

								 
							</div>
						</div>
					</div>  

					 </div>

				</div>
		 </div>         
		 
		 <div class="campaign-bottom">
				<div class="container">
					<div class="row">
						<!-- Main content -->
						<div class="col-12">
							 <?php do_action( 'wpcf_after_single_campaign_summary' ); ?>
							 <meta itemprop="url" content="<?php the_permalink(); ?>" />
						</div>  
						<!-- End Main content -->
					</div>   
				</div>   
		 </div> 
	</div>
	<?php do_action( 'wpcf_after_single_campaign' ); ?>
	<?php do_action( 'wpcf_after_main_content' ); ?>
</div>    