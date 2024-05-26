<?php
	defined( 'ABSPATH' ) || exit;
	global $post, $product;
	$attachment_ids = $product->get_gallery_image_ids();
	$video = trim(get_post_meta($post->ID, 'wpneo_funding_video', true));
	$_rand = wp_rand(6);
?>

<div class="cf-item-media style-default">

	<?php if (!empty($video)) { ?>
		
		<div class="wpneo-post-img">
			<?php echo wpcf_function()->get_embeded_video($video); ?>
		</div>

	<?php } else { ?>
		
		<div class="swiper-slider-wrapper">
			<div class="swiper-content-inner">  
				<div class="init-carousel-swiper swiper" data-carousel='{"items":1,"items_lg":1,"items_md":1,"items_sm":1,"items_xs":1,"items_xx":1,"effect":"slide","space_between":30,"loop":1,"speed":600,"autoplay":1,"autoplay_delay":4500,"autoplay_hover":1,"navigation":1,"pagination":1,"dynamic_bullets":1,"pagination_type":"bullets"}'>
					<div class="swiper-wrapper">
						<?php foreach($attachment_ids as $attachment_id){ 
							echo '<div class="swiper-slide">';
								echo wp_get_attachment_image($attachment_id, 'full');
							echo '</div>';
						} ?>
					</div>
				</div>
			</div>   
			<div class="swiper-pagination"></div>
			<div class="swiper-nav-next"></div><div class="swiper-nav-prev"></div>
		</div>

	<?php } ?>

	<div class="campaign_loved_html">
		<?php echo str_replace(' id=', ' class=', wpcf_function()->campaign_loved(false)); ?>
	</div>
	<div class="campaign-media">
		<div class="campaign-gallery">
			<?php if($attachment_ids){
				$i = 1;
				foreach($attachment_ids as $attachment_id){ 
				   $classes = ($i>1) ? 'hidden' : 'campaign-gallery-link';
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
			 } ?>
		</div>
	</div>	

</div>

<div class="cf-item-short-story">
	<div class="clearfix"></div>
	<div class="wpneo-single-short-description">
		<h2 class="title"><?php echo esc_html__('Short Story','qizon'); ?></h2>
	   <div itemprop="description">
	      <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
	   </div>
	</div>
</div>