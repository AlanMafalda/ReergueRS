<?php 
	use Elementor\Icons_Manager;
	$has_icon = !empty($item['selected_icon']['value']);
	$style = $settings['style'];
	$active = $item['active']=='yes' ? ' active' : '';
?>

<div class="icon-box-item elementor-repeater-item-<?php echo $item['_id'] ?>">

	<?php 
		if( $style == 'style-1' ){
			echo '<div class="iconbox-one__single' . $active . '">';
				if($item['title']){ 
					echo '<h3 class="iconbox-one__title">' . $item['title'] . '</h3>';
				}
				if($has_icon){ 
					echo '<div class="iconbox-one__icon">';
						Icons_Manager::render_icon($item['selected_icon'], [ 'aria-hidden' => 'true' ]); 
					echo '</div>';
				}
				if($item['desc']){ 
					echo '<div class="iconbox-one__desc">' .$item['desc'] . '</div>';
				}
		 		$this->gva_render_link_html('', $item['link'], 'iconbox-one__link-overlay');
			echo '</div>';	
		}
	?>

	<?php 
		if( $style == 'style-2' ){
			echo '<div class="iconbox-two__single' . $active . '">';
				echo '<div class="iconbox-two__content">';
					echo '<div class="iconbox-two__icon-wrap">';
						echo '<div class="iconbox-two__number">';
							echo ($inumber < 10 ? '0' . $inumber : $inumber);
						echo '</div>';
						if($has_icon){ 
							echo '<div class="iconbox-two__icon">';
								Icons_Manager::render_icon($item['selected_icon'], [ 'aria-hidden' => 'true' ]); 
							echo '</div>';
						}
					echo '</div>';
					echo '<div class="iconbox-two__content-inner">';
						if($item['title']){ 
							echo '<h3 class="iconbox-two__title">' . $item['title'] . '</h3>';
						}
						if($item['desc']){ 
							echo '<div class="iconbox-two__desc">' .$item['desc'] . '</div>';
						}
					echo '</div>';	
				echo '</div>';	
			 	$this->gva_render_link_html('', $item['link'], 'iconbox-two__link-overlay');
			echo '</div>';	
		}
	?>

	<?php 
		if( $style == 'style-3' ){
			echo '<div class="iconbox-three__single' . $active . '">';
				if($has_icon){ 
					echo '<div class="iconbox-three__icon">';
						Icons_Manager::render_icon($item['selected_icon'], [ 'aria-hidden' => 'true' ]); 
					echo '</div>';
				}
				if($item['title']){ 
					echo '<h3 class="iconbox-three__title">' . $item['title'] . '</h3>';
				}
				if($item['desc']){ 
					echo '<div class="iconbox-three__desc">' .$item['desc'] . '</div>';
				}
		 		$this->gva_render_link_html('', $item['link'], 'iconbox-three__link-overlay');
			echo '</div>';	
		}
	?>

	<?php 
		if( $style == 'style-4' ){
			echo '<div class="iconbox-four__single' . $active . '">';
				echo '<div class="iconbox-four__wrap">';
					if($has_icon){ 
						echo '<div class="iconbox-four__icon">';
							Icons_Manager::render_icon($item['selected_icon'], [ 'aria-hidden' => 'true' ]); 
						echo '</div>';
					}
					echo '<div class="iconbox-four__content">';
						if($item['title']){ 
							echo '<h3 class="iconbox-four__title">' . $item['title'] . '</h3>';
						}
						if($item['desc']){ 
							echo '<div class="iconbox-four__desc">' .$item['desc'] . '</div>';
						}
					echo '</div>';
			 		$this->gva_render_link_html('', $item['link'], 'iconbox-four__link-overlay');
			 	echo '</div>';
			echo '</div>';	
		}
	?>

	<?php 
		if( $style == 'style-5' ){
			echo '<div class="iconbox-five__single' . $active . '">';
				echo '<div class="iconbox-five__content">';
					echo '<div class="iconbox-five__icon-wrap">';
						if($has_icon){ 
							echo '<div class="iconbox-five__icon">';
								Icons_Manager::render_icon($item['selected_icon'], [ 'aria-hidden' => 'true' ]); 
							echo '</div>';
						}
						echo '<div class="iconbox-five__number">';
							echo ($inumber < 10 ? '0' . $inumber : $inumber);
						echo '</div>';
					echo '</div>';
					echo '<div class="iconbox-five__content-inner">';
						if($item['title']){ 
							echo '<h3 class="iconbox-five__title">' . $item['title'] . '</h3>';
						}
						if($item['desc']){ 
							echo '<div class="iconbox-five__desc">' .$item['desc'] . '</div>';
						}
					echo '</div>';	
				echo '</div>';	
			 	$this->gva_render_link_html('', $item['link'], 'iconbox-five__link-overlay');
			echo '</div>';	
		}
	?>

</div>