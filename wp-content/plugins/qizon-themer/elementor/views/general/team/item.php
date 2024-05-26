<?php 
	use Elementor\Group_Control_Image_Size;

	$style = $settings['style'];
	$image_id = isset($item['image']['id']) && $item['image']['id'] ? $item['image']['id'] : 0; 
	$image_url = isset($item['image']['url']) && $item['image']['url'] ? $item['image']['url'] : '';
	$image_alt = $item['name'];
	if($image_id){
		$attach_url = wp_get_attachment_image_src( $image_id, $settings['image_size']);
		if(isset($attach_url[0]) && $attach_url[0]){
			$image_url = $attach_url[0];
		}
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
	}
	$name = $item['name'];
	
	$image = '<img src="' . esc_url($image_url) . '" alt="' . esc_html($image_alt) . '" />';

?>

<?php if($style == 'style-1'){ ?>
	<div class="team-one__single elementor-repeater-item-<?php echo $item['_id'] ?>">
		<?php 
			if($image_url){ 
				echo '<div class="team-one__image">';
					echo $this->gva_render_link_html($image, $item['link'], 'link-content'); 
					echo '<div class="team-one__social">';
						echo '<div class="team-one__social-control"><i class="fas fa-share-alt"></i></div>';
						echo '<div class="team-one__social-link">';
							$this->gva_render_link_html_2('<i class="fa fa-facebook"></i>', $item['facebook']);
							$this->gva_render_link_html_2('<i class="fa fa-twitter"></i>', $item['twitter']);
							$this->gva_render_link_html_2('<i class="fa fa-instagram"></i>', $item['instagram']);
							$this->gva_render_link_html_2('<i class="fa fa-pinterest"></i>', $item['pinterest']);
						echo '</div>';	
					echo '</div>';
			 	echo '</div>';
			} 
		?>	
		<div class="team-one__content">
			<div class="team-one__content-inner">
				<?php 
					if($item['name']){ 
						echo '<h3 class="team-one__name">';
							echo $this->gva_render_link_html($item['name'], $item['link']);
						echo '</h3>';
					} 
					if($item['position']){
						echo '<div class="team-one__job">' . $item['position'] . '</div>';
					} 
				?>
			</div>   
		</div>
	</div>		
<?php } ?>

<?php if($style == 'style-2'){ ?>
	<div class="team-two__single">
		<?php 
			if($image_url){
				echo '<div class="team-two__image">';
					echo '<div class="team-two__image-content">';
						echo $this->gva_render_link_html($image, $item['link'], 'team-two__link-content'); 
					echo '</div>';
					echo '<div class="team-two__socials">';
						echo '<div class="team-two__socials-control"><i class="fa-solid fa-plus"></i></div>';
						echo '<div class="team-two__social-link">';
							$this->gva_render_link_html_2('<i class="fa fa-facebook"></i>', $item['facebook']);
							$this->gva_render_link_html_2('<i class="fa fa-twitter"></i>', $item['twitter']);
							$this->gva_render_link_html_2('<i class="fa fa-instagram"></i>', $item['instagram']);
							$this->gva_render_link_html_2('<i class="fa fa-pinterest"></i>', $item['pinterest']);
						echo '</div>';
					echo '</div>';
				echo '</div>';
			} 
		 ?>  
		<div class="team-two__content">
			<div class="team-two__content-inner">
				<?php 
					if($item['name']){
						echo '<h3 class="team-two__name">';
							echo $this->gva_render_link_html($item['name'], $item['link']);  
						echo '</h3>';
					}
					if($item['position']){
						echo '<div class="team-two__job">';
							echo $item['position'];
						echo '</div>';
					}
					if($item['desc']){
						echo '<div class="team-two__desc">';
							echo $item['desc'];
						echo '</div>';
					} 
				?>
			</div>   
		</div>
	</div>      
<?php } ?>