<?php
	use Elementor\Icons_Manager;
	$this->add_render_attribute( 'icon', 'class', [ 'icon icon-font'] );
	$has_icon = ! empty( $settings['selected_icon']['value']);
?>

<?php if($settings['style'] == 'style-1'){ ?>
	<div class="widget gsc-search-box">
		<div class="content-inner">
			<div class="main-search gva-search">
				<?php if($has_icon){ ?>
					<a class="control-search">
						<?php Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</a>
				<?php } ?>   

				<div class="gva-search-content search-content">
				  <div class="search-content-inner">
					 <div class="content-inner"><?php get_search_form(); ?></div>  
				  </div>  
				</div>
			</div>
			
		</div>
	</div>
<?php } ?>

<?php if($settings['style'] == 'style-2'){ ?>
	<div class="search-two__block gva-search search-align-<?php echo $settings['search_align'] ?>">
		<div class="search-two__wrap">
			<div class="search-two__content">
				<a class="search-two__control control-search">
					<?php 
						if($has_icon){
							Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
						}
						if($settings['title_text']){
							echo ('<span>' . $settings['title_text'] . '</span>');
						}
					?> 
				</a>
				<div class="search-two__popup main-search">
				  <div class="search-two__popup-content">
					 <div class="search-two__form"><?php get_search_form(); ?></div>  
				  </div>  
				</div>
			</div>
			
		</div>
	</div>
<?php } ?>
