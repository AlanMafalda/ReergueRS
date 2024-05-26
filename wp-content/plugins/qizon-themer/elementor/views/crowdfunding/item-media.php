<?php
	if (!defined('ABSPATH')){ exit; }
	$_rand = wp_rand(6);
	
	global $qizon_post, $post;

	if( !$qizon_post ){ return; }
	if( $qizon_post->post_type != 'product' ){ return; }
	$post_id = $qizon_post->ID;
	
	if(\Elementor\Plugin::$instance->editor->is_edit_mode() || $post->post_type == 'gva__template'){
		global $post, $product;
		$post = $qizon_post;
		$product = wc_get_product($post_id);
	}

	$style = $settings['style'];
	$classes = array();
	$classes[] = 'swiper-slider-wrapper';
	$classes[] = $settings['space_between'] < 15 ? 'margin-disable': '';
	$this->add_render_attribute('wrapper_slider', 'class', $classes);

	$product = wc_get_product($post_id);

	$video = trim(get_post_meta($post_id, 'wpneo_funding_video', true)); 
	$attachment_ids = $product->get_gallery_image_ids();

?>

<?php if($style == 'style-1'): ?>
	<div class="cf-item-media style-default">

	<?php if (!empty($video)) { ?>
		
		<div class="wpneo-post-img">
			<?php echo wpcf_function()->get_embeded_video($video); ?>
		</div>

	<?php } else { ?>
		
		<div <?php echo $this->get_render_attribute_string('wrapper_slider') ?>>
			<div class="swiper-content-inner">  
				<div class="init-carousel-swiper swiper" data-carousel="<?php echo $this->get_carousel_settings() ?>">
					<div class="swiper-wrapper">
						<?php foreach($attachment_ids as $attachment_id){ 
							echo '<div class="swiper-slide">';
								echo wp_get_attachment_image($attachment_id, $settings['image_size']);
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
							   echo '<i class="qicon-video-camera-2"></i>';
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

<?php endif; ?>

<?php if($style == 'style-2'): ?>
	<div class="cf-item-media style-2">
		<?php if($attachment_ids){ ?>
			<div <?php echo $this->get_render_attribute_string('wrapper_slider') ?>>
				<div class="swiper-content-inner">
					<div class="init-carousel-swiper swiper" data-carousel="<?php echo $this->get_carousel_settings() ?>">
						<div class="swiper-wrapper">
							<?php foreach($attachment_ids as $attachment_id){ 
								echo '<div class="swiper-slide">';
									echo wp_get_attachment_image($attachment_id, $settings['image_size']);
								echo '</div>';
							} ?>
						</div>
					</div>
				</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-nav-next"></div><div class="swiper-nav-prev"></div>
			</div>
		<?php }else{ ?>
			<?php the_post_thumbnail( 'full', array( 'alt' => get_the_title() ) ); ?>
		<?php } ?>

		<div class="campaign_loved_html">
			<?php echo str_replace(' id=', ' class=', wpcf_function()->campaign_loved(false)); ?>
		</div>

		<div class="campaign-media">
			
			<?php 
				if($attachment_ids){
					echo '<div class="campaign-gallery">';
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
					echo '</div>';
				 } 
			 ?>

			<?php if($video){ ?>
	       	<a class="campaign-video popup-video" href="<?php echo esc_url($video) ?>"><i class="qicon-video-camera-2"></i></a>
	   	<?php } ?>
		</div>	
	</div>
<?php endif; ?>