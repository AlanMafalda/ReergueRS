<?php
if (!defined('ABSPATH')) { exit; }

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class GVAElement_GiveWP_Item_Media extends GVAElement_Base{
	 
	const NAME = 'gva_givewp_item_media';
	const TEMPLATE = 'givewp/item-media';
	const CATEGORY = 'qizon_givewp';

	public function get_categories() {
		return array(self::CATEGORY);
	}

	public function get_name() {
		return self::NAME;
	}

	public function get_title() {
		return __('GiveWP - Item Media', 'qizon-themer');
	}

	public function get_keywords() {
		return [ 'givewp', 'item', 'media', 'gallery' ];
	}

	public function get_script_depends() {
		return [
			'swiper',
			'gavias.elements'
		];
	 }

	 public function get_style_depends() {
		  return array('swiper');
	 }

	protected function register_controls() {
	  
		$this->start_controls_section(
			self::NAME . '_content',
			[
				'label' => __('Content', 'qizon-themer'),
			]
		);

		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'qizon-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1'      => __( 'Style I: Gallery I', 'qizon-themer' ),
					'style-2'      => __( 'Style I: Gallery II', 'qizon-themer' ),
					'style-3'      => __( 'Style III: Background Image Featured', 'qizon-themer' ),
				],
				'default' => 'style-1',
			]
		);

		$this->add_responsive_control(
			'background_height',
			[
				'label' => __( 'style', 'qizon-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
				  'size' => 600,
				],
				'range' => [
				  'px' => [
					 'min' => 100,
					 'max' => 1000,
				  ],
				],
				'selectors' => [
				  '{{WRAPPER}} .qizon-ba-single-gallery .background-image' => 'min-height: {{SIZE}}{{UNIT}};background-size: cover;background-position:center center;',
				],
				'condition' => [
					'style' => array('style-3')
				]
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Image_Size::get_type(),
			[
				'name'      => 'image', 
				'default'   => 'qizon_medium',
				'separator' => 'none',
			]
		);

		$this->add_control(
			'show_gallery',
			[
				'label' => __( 'Display Gallery Icon', 'qizon-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'show_video',
			[
				'label' => __( 'Display Video Icon', 'qizon-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'show_category',
			[
				'label' => __( 'Display Category', 'qizon-themer' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->end_controls_section();

		$this->add_control_carousel( false, array('style' => ['style-1', 'style-2']) );

	}

	protected function render(){
		parent::render();

		$settings = $this->get_settings_for_display();
		printf( '<div class="qizon-%s qizon-element">', $this->get_name() );
			include $this->get_template(self::TEMPLATE . '.php');
		print '</div>';
	}
}

$widgets_manager->register(new GVAElement_GiveWP_Item_Media());
