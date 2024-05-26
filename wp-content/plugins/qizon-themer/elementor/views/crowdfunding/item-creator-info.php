<?php
	if (!defined('ABSPATH')){ exit; }

	global $qizon_post;

	$rand = wp_rand(6);

	if( !$qizon_post ){ return; }
	if( $qizon_post->post_type != 'product' ){ return; }

	$post = $qizon_post;
	$post_id = $post->ID;
	$user_info = get_user_meta($post->post_author);
	$creator = get_user_by('id', $post->post_author);

	$funding_video = trim(get_post_meta($post_id, 'wpneo_funding_video', true)); 

?>

<div class="cf-creator-info">
	<div class="wpneo-campaign-creator-info-wrapper">
	 	<div class="wpneo-campaign-creator-avatar">
		  	<?php 
			  	if($post->post_author){
					$img_src = '';
					$image_id = get_user_meta( $post->post_author,'profile_image_id', true );
					if($image_id){
						$img_src = wp_get_attachment_image_src( $image_id, 'backer-portfo' );
						if( isset($img_src[0]) ){
							$img_src = $img_src[0];
						}
					} 
					if($img_src){ 
						echo '<img width="80" height="80" src="' . esc_url($img_src) . '" alt="'.esc_html__('Creator', 'qizon-themer') . '">';
					} else { 
						echo get_avatar($post->post_author, 80);
					}
		  		} 
		  	?>
	 	</div>

	 	<div class="wpneo-campaign-creator-details">
		  <div class="creator-name">
		  		<span><?php echo esc_html__( 'By', 'qizon-themer' ) ?></span>
		  		<a href="javascript:;" data-author="<?php echo esc_attr($post->post_author); ?>" class="wpneo-fund-modal-btn" >
		  			<?php echo wpcf_function()->get_author_name(); ?>
		  		</a>
		  	</div>
		  	<div class="creator-meta">
		  		<?php echo wpcf_function()->author_campaigns($post->post_author)->post_count; ?>
		  		<?php echo esc_html__("Campaigns","qizon-themer"); ?> | 
		  		<?php echo wpcf_function()->loved_count(); ?>
		  		<?php echo esc_html__('Loved campaigns', 'qizon-themer'); ?>
		  	</div>
		  	<?php if(!empty($user_info['profile_website'][0])){ ?>
				<div>
					<a href="<?php echo wpcf_function()->url($user_info['profile_website'][0]); ?>">
						<strong> <?php echo wpcf_function()->url($user_info['profile_website'][0]); ?></strong>
					</a>
				</div>
		  	<?php } ?>
	 	</div>
	</div>
</div>