<?php
Redux::setSection( $opt_name, array(
  'title'     	=> esc_html__('Typography & Styling', 'qizon'),
  'icon'      	=> 'el-icon-pencil',
  'fields' 		=> array(

  		array (
         'id'     => 'main_font_info',
         'type'   => 'info',
         'icon'   => true,
         'raw'    => '<h3 class="margin-bottom-0">' . esc_html__('Main Font', 'qizon') . '</h3>',
      ),
      array(
         'id'        => 'main_font_source',
         'type'      => 'radio',
         'title'     => esc_html__('Font Source', 'qizon'),
         'options'   => array(
            '0'   => esc_html__('(none)', 'qizon'),
            '1'   => esc_html__('Standard + Google Webfonts', 'qizon'), 
         ),
         'default'   => '1'
      ),
      
      // Main font: Standard + Google Webfonts
      array (
         'id'           => 'main_font',
         'type'         => 'typography',
         'title'        => esc_html__('Font Face', 'qizon'),
         'line-height'  => false,
         'text-align'   => false,
         'font-style'   => false,
         'font-weight'  => false,
         'font-size'    => false,
         'color'        => false,
         'default'      => array (
            'font-family'  => 'Open Sans',
            'subsets'      => '',
         ),
         'required'     => array('main_font_source', '=', '1')
      ),
   
      // Secondary font
      array (
         'id'     => 'secondary_font_info',
         'icon'   => true,
         'type'   => 'info',
         'raw'    => '<h3 class="margin-bottom-0">' . esc_html__('Secondary Font', 'qizon') . '</h3>',
      ),
      array(
         'id'        => 'secondary_font_source',
         'type'      => 'radio',
         'title'     => esc_html__('Font Source', 'qizon'),
         'options'   => array(
            '0'   => esc_html__('(none)', 'qizon'),
            '1'   => esc_html__('Standard + Google Webfonts', 'qizon'), 
         ),
         'default'   => '0'
      ),
      // Secondary font: Standard + Google Webfonts
      array (
         'id'           => 'secondary_font',
         'type'         => 'typography',
         'title'        => esc_html__('Font Face', 'qizon'),
         'line-height'  => false,
         'text-align'   => false,
         'font-style'   => false,
         'font-weight'  => false,
         'font-size'    => false,
         'color'        => false,
         'default'      => array (
            'font-family'  => 'Open Sans',
            'subsets'      => '',
         ),
         'required'     => array('secondary_font_source', '=', '1')
      ),

      //Styling
	 	array(
			'id'  	=> 'colors_info_styling',
			'type'   => 'info',
			'raw' 	=> '<h3 class="margin-bottom-0">' . esc_html__('Body Colors', 'qizon') . '</h3>'
	 	),
	 	array(
         'id'           => 'body_color',
         'type'         => 'color',
         'title'        => esc_html__('Body Color', 'qizon'),
         'default'      => '',
         'transparent'  => false,
         'validate'     => 'color'
      ),
      array(
         'id'           => 'color_link',
         'type'         => 'color',
         'title'        => esc_html__('Link Color', 'qizon'),
         'default'      => '',
         'transparent'  => false,
         'validate'     => 'color'
      ),
      array(
         'id'           => 'color_link_hover',
         'type'         => 'color',
         'title'        => esc_html__('Link Hover Color', 'qizon'),
         'default'      => '',
         'transparent'  => false,
         'validate'     => 'color'
      ),
      array(
         'id'           => 'color_heading',
         'type'         => 'color',
         'title'        => esc_html__('Heading Color', 'qizon'),
         'default'      => '',
         'transparent'  => false,
         'validate'     => 'color'
      ),
	 	array(
         'id'     => 'info_background',
         'type'   => 'info',
         'raw'    => '<h3 class="margin-bottom-0">' . esc_html__('Background', 'qizon') . '</h3>'
      ),
      array(
         'id'           => 'main_background_color',
         'type'         => 'color',
         'title'        => esc_html__('Background Color', 'qizon'),
         'desc'         => esc_html__('Used for the main site background.', 'qizon'),
         'default'      => '',
         'transparent'  => false,
         'validate'     => 'color'
      ),
      array(
         'id'     => 'main_background_image',
         'type'   => 'media', 
         'url'    => true,
         'title'  => esc_html__('Background Image', 'qizon'),
         'desc'   => esc_html__('Upload a background image or specify a URL (boxed layout).', 'qizon')
      ),
      array(
         'id'        => 'main_background_image_type',
         'type'      => 'select',
         'title'     => esc_html__('Background Type', 'qizon'),
         'desc'      => esc_html__('Select the background-image type (fixed image or repeat pattern/texture).', 'qizon'),
         'options'   => array( 
            'fixed' => esc_html__('Fixed (Full)', 'qizon'), 
            'repeat' => esc_html__('Repeat (Pattern)', 'qizon')
         ),
         'default'   => 'fixed'
      ),
      
      array(
         'id'        => 'footer_info_styling',
         'type'      => 'info',
         'raw'       => '<h3 class="margin-bottom-0">' . esc_html__('Footer Default Styling', 'qizon') . '</h3>'
      ),
      array(
         'id'        => 'footer_bg_color',
         'type'      => 'color',
         'title'     => esc_html__('Background Color', 'qizon'),
         'default'   => '',
         'validate'  => 'color'
      ),
      array(
         'id'        => 'footer_color',
         'type'      => 'color',
         'title'     => esc_html__('Text Color', 'qizon'),
         'default'   => '',
         'validate'  => 'color'
      ),
      array(
         'id'        => 'footer_color_link',
         'type'      => 'color',
         'title'     => esc_html__('Link Color', 'qizon'),
         'default'   => '',
         'validate'  => 'color'
      ),
      array(
         'id'        => 'footer_color_link_hover',
         'type'      => 'color',
         'title'     => esc_html__('Link Hover Color', 'qizon'),
         'default'   => '',
         'validate'  => 'color'
      )
  	)
));