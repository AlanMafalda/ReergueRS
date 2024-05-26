<?php
Redux::setSection( $opt_name, array(
	'title' => esc_html__('General Options', 'qizon'),
	'icon' => 'el-icon-wrench',
	'fields' => array(
		array(
			'id'           => 'page_layout',
			'type'         => 'button_set',
			'title'        => esc_html__('Page Layout', 'qizon'),
			'subtitle'     => esc_html__('Select the page layout type', 'qizon'),
			'options'      => array(
				'boxed'     => esc_html__('Boxed', 'qizon'),
				'fullwidth' => esc_html__('Fullwidth', 'qizon')
			),
			'default' => 'fullwidth'
		),
      array(
        'id' => 'map_api_key',
        'type' => 'text',
        'title' => esc_html__('Google Map API key', 'qizon'),
        'default' => ''
      ),

      // Logo Default Settings
      array(
         'id'     => 'logo_default',
         'type'   => 'info',
         'icon'   => true,
         'raw'    => '<h3 class="margin-bottom-0">' . esc_html__('Logo Default', 'qizon') . '</h3>',
      ),
      array(
        'id'      => 'header_logo', 
        'type'    => 'media',
        'url'     => true,
        'title'   => esc_html__('Logo in header default', 'qizon'), 
        'default' => ''
      ), 
         
		// Breadcrumb Default Settings
		array(
         'id'     => 'breadcrumb_default',
         'type'   => 'info',
         'icon'   => true,
         'raw'    => '<h3 class="margin-bottom-0">' . esc_html__('Breadcrumb Settings Without Elementor', 'qizon') . '</h3>',
      ),
		array(
         'id'        => 'breadcrumb_title',
         'type'      => 'button_set',
         'title'     => esc_html__('Breadcrumb Title', 'qizon'),
         'options'   => array(
            1 => esc_html__('Enable', 'qizon'),
            0 => esc_html__('Disable', 'qizon')
         ),
         'default'   => 1
      ),
      array(
         'id'        => 'breadcrumb_bg_color',
         'type'      => 'color',
         'title'     => esc_html__('Background Overlay Color', 'qizon'),
         'default'   => ''
      ),
      array(
         'id'        => 'breadcrumb_bg_opacity',
         'type'      => 'slider',
         'title'     => esc_html__('Breadcrumb Ovelay Color Opacity', 'qizon'),
         'default'   => 50,
         'min'       => 0,
         'max'       => 100,
         'step'      => 2,
         'display_value' => 'text',
      ),
      array(
         'id'        => 'breadcrumb_bg_image',
         'type'      => 'media',
         'url'       => true,
         'title'     => esc_html__('Breadcrumb Background Image', 'qizon'),
         'default'   => '',
         'required'  => array('woo_breadcrumb_bg', '=', 1 )
      ),
      array(
         'id'        => 'breadcrumb_text_stype',
         'type'      => 'select',
         'title'     => esc_html__('Breadcrumb Text Stype', 'qizon'),
         'options'   => 
         array(
            'text-light'     => esc_html__('Light', 'qizon'),
            'text-dark'      => esc_html__('Dark', 'qizon')
         ),
         'default' => 'text-light'
      )
	)
));