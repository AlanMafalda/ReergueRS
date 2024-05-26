<?php
Redux::setSection( $opt_name, array(
  	'title' => esc_html__('Footer Options', 'qizon'),
  	'icon' => 'el-icon-compass',
  	'fields' => array(
	 	array(
			'id' 			=> 'copyright_default',
			'type' 		=> 'button_set',
			'title' 		=> esc_html__('Enable/Disable Copyright Text', 'qizon'),
			'options' 	=> array(
				'yes' 	=> esc_html__('Enable', 'qizon'),
				'no' 		=> esc_html__('Disable', 'qizon')
			),
			'default' 	=> 'yes'
	 	),
	 	array(
			'id' 			=> 'copyright_text',
			'type' 		=> 'editor',
			'title' 		=> esc_html__('Footer Copyright Text', 'qizon'),
			'default' 	=> esc_html__('Copyright - 2023 - Company - All rights reserved. Powered by WordPress.', 'qizon')
	 	),
  	)
));