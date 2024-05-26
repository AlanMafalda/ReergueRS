<?php
	if (!defined('ABSPATH')){ exit; }

	global $qizon_post;
	if( !$qizon_post ){ return; }
	if( $qizon_post->post_type != 'product' ){ return; }

	$end_method = get_post_meta(get_the_ID(), 'wpneo_campaign_end_method', true);
?>

<div class="cf-item-info end_method-<?php echo esc_attr($end_method) ?>">
	<?php foreach ($settings['info_content'] as $item): ?>
		<?php 
			$type = $item['type'];
			$title = $item['title'];
		?>
		<div class="item-info">
			<div class="content-inner">
				<div class="meta-value">
					<?php 
						if($type == 'pledged'){
							$raised = 0;
							$total_raised = wpcf_function()->get_total_fund();
							$raised = $total_raised ? $total_raised : 0;
							echo wc_price($raised);
						}

						if($type == 'backers'){
							echo wpcf_function()->get_total_backers();
						}

						if($type == 'days_left'){
							if($end_method != 'never_end'){ 
		                  echo '<div class="camapign-time_remaining info-item">';
		                     wpcf_function()->template('include/loop/time_remaining');
		                  echo '</div>';
		                }else{
		               	echo esc_html__('Never End', 'qizon-themer');
		               } 
						}
					?>
				</div>
				<?php if($title){ ?>
					<div class="title"><?php echo esc_html($title) ?></div>
				<?php } ?>
			</div>	
		</div>
	<?php endforeach; ?>	
</div>