<?php
  	$query = $this->query_posts();
  	if ( ! $query->found_posts ) {
	 	return;
  	}
	$this->add_render_attribute('wrapper', 'class', ['wpgive-form clearfix']);
	//add_render_attribute grid
?>
  
<div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
	<div class="form-content"> 
		<?php
			global $post;
			while ( $query->have_posts() ) { 
			  	$query->the_post();
				$this->qizon_get_template_part('give/loop/item', $settings['style'], array(
					'left_sub_title' 	=> $settings['left_sub_title'],
					'left_title' 		=> $settings['left_title'],
					'right_title' 		=> $settings['right_title'],
					'right_desc' 		=> $settings['right_desc']
				));
			}
		?>

	</div>
</div>

<?php
wp_reset_postdata();