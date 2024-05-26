<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Services extends GVAElement_Base{
  	const NAME = 'gva-services';
  	const TEMPLATE = 'general/services/';
  	const CATEGORY = 'qizon_general';

  	public function get_name() {
	 	return self::NAME;
  	}

  	public function get_categories() {
	 	return array(self::CATEGORY);
  	}

	public function get_title() {
		return esc_html__('Services Grid/Carousel', 'qizon-themer');
	}

	public function get_keywords() {
		return [ 'services', 'content', 'carousel', 'grid' ];
	}

	public function get_script_depends() {
		return [
			'swiper',
			'gavias.elements',
		];
	}

	public function get_style_depends() {
		return array('swiper');
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__('Content', 'qizon-themer'),
			]
		);
		$this->add_control( // xx Layout
			'layout_heading',
			[
				'label'   => esc_html__('Layout', 'qizon-themer'),
				'type'    => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'layout',
			[
				'label'   => esc_html__('Layout Display', 'qizon-themer'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'carousel',
				'options' => [
					 'grid'      => esc_html__('Grid', 'qizon-themer'),
					 'carousel'  => esc_html__('Carousel', 'qizon-themer')
				]
			]
	  	);
	  	$this->add_control(
			'style',
			[
				'label' => esc_html__('Style', 'qizon-themer'),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1' 	=> esc_html__('Style 01', 'qizon-themer'),
					'style-2' 	=> esc_html__('Style 02', 'qizon-themer'),
					'style-3' 	=> esc_html__('Style 03', 'qizon-themer'),
					 'style-4' 	=> esc_html__('Style 04', 'qizon-themer')
				],
				'default' => 'style-1',
			]
	  	);
		$this->add_control(
			'last_style',
			[
				'label' 			=> esc_html__('Last Item Special Style', 'qizon-themer'),
				'type' 			=> Controls_Manager::SWITCHER,
				'placeholder' 	=> esc_html__('Active', 'qizon-themer'),
				'default' 		=> 'no'
			]
		);
		$this->add_responsive_control(
			'min_height',
			[
				'label' 		=> esc_html__('Min Height', 'qizon-themer'),
				'type' 		=> Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 600,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .service-one__content' => 'min-height: {{SIZE}}{{UNIT}};',
					
				],
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__('Title', 'qizon-themer'),
				'type'        => Controls_Manager::TEXT,
				'default'     => 'Add your Title',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'desc',
			[
				'label'       => esc_html__('Description', 'qizon-themer'),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => 'Lorem ipsum dolor sit amet, sed consectetur elit.',
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'image',
			[
				'label'      => esc_html__('Choose Image', 'qizon-themer'),
				'default'    => [
					'url' => GAVIAS_QIZON_PLUGIN_URL . 'elementor/assets/images/image-3.jpg',
				],
				'type'       => Controls_Manager::MEDIA,
				'show_label' => false,
			]
		);
		$repeater->add_control(
			'selected_icon',
			[
				'label'      => esc_html__('Choose Icon', 'qizon-themer'),
				'type'       => Controls_Manager::ICONS,
				'default' => [
				  'value' => 'fas fa-home',
				  'library' => 'fa-solid',
				]
			]
		);
		$repeater->add_control(
			'link',
			[
				'label'     => esc_html__('Link', 'qizon-themer'),
				'type'      => Controls_Manager::URL,
				'placeholder' => esc_html__('https://your-link.com', 'qizon-themer'),
				'label_block' => true
			]
		);
		$repeater->add_control(
         'active',
			[
	         'label'       => __('Active', 'qizon-themer'),
	         'type'        => Controls_Manager::SWITCHER,
	         'default'	  => 'no'
	     	]
	   );
		$this->add_control(
			'services_content',
			[
				'label'       => esc_html__('Service Content Item', 'qizon-themer'),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
				'default'     => array(
				  	array(
					 	'title'  => esc_html__('UI/UX Designing', 'qizon-themer'),
					 	'image'  => [
                     'url' => GAVIAS_QIZON_PLUGIN_URL . 'elementor/assets/images/image-3.jpg'
                  ]
				  	),
				  	array(
					 	'title'  => esc_html__('Digital Marketing', 'qizon-themer'),
					 	'image'  => [
                     'url' => GAVIAS_QIZON_PLUGIN_URL . 'elementor/assets/images/image-4.jpg'
                  ]
				  	),
				  	array(
					 	'title'  => esc_html__('Content Management', 'qizon-themer'),
					 	'image'  => [
                     'url' => GAVIAS_QIZON_PLUGIN_URL . 'elementor/assets/images/image-5.jpg'
                  ]
				  	),
				  	array(
					 	'title'  => esc_html__('Data Analysis', 'qizon-themer'),
					 	'image'  => [
                     'url' => GAVIAS_QIZON_PLUGIN_URL . 'elementor/assets/images/image-6.jpg'
                  ]
				  	)
				)
			]
		);
		
		$this->add_control(
			'image_size',
			[
				'label'     => __('Image Size', 'qizon-themer'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => $this->get_thumbnail_size(),
				'default'   => ''
			]
		);

		$this->end_controls_section();

		$this->add_control_carousel(false, array('layout' => 'carousel'));

		$this->add_control_grid(array('layout' => 'grid'));

		// Icon Styling
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__('Icon', 'qizon-themer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__('Icon Color', 'qizon-themer'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .box-icon i' => 'color: {{VALUE}};',
				  '{{WRAPPER}} .gsc-services-group .service-item-content svg' => 'fill: {{VALUE}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__('Size', 'qizon-themer'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
				  'size' => 60
				],
				'range' => [
				  'px' => [
					 'min' => 20,
					 'max' => 80, 
				  ],
				],
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .box-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				  '{{WRAPPER}} .gsc-services-group .service-item-content .box-icon svg' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'label' => esc_html__('Spacing', 'qizon-themer'),
				'type' => Controls_Manager::SLIDER,
				'default' => [
				  'size' => 30,
				],
				'range' => [
				  'px' => [
					 'min' => 0,
					 'max' => 100,
				  ],
				],
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .box-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__('Padding', 'qizon-themer'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .box-icon .box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	 	$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__('Content', 'qizon-themer'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_title',
			[
				'label' => esc_html__('Title', 'qizon-themer'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'title_bottom_space',
			[
				'label' => esc_html__('Spacing', 'qizon-themer'),
				'type' => Controls_Manager::SLIDER,
				'range' => [
				  'px' => [
					 'min' => 0,
					 'max' => 100,
				  ],
				],
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		); 

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__('Color', 'qizon-themer'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content .title' => 'color: {{VALUE}};',
				  '{{WRAPPER}} .gsc-services-group .service-item-content .title a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .gsc-services-group .service-item-content .title, {{WRAPPER}} .gsc-services-group .service-item-content .title a',
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => esc_html__('Description', 'qizon-themer'),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__('Color', 'qizon-themer'),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
				  '{{WRAPPER}} .gsc-services-group .service-item-content desc, {{WRAPPER}} .gsc-services-group .service-item.style-2 .service-content-hover .content-inner .desc, {{WRAPPER}} .gsc-services-group .service-item.style-4 .service-item-content .service-content .desc' => 'color: {{VALUE}};',
				],
			]
		);

	  	$this->add_group_control(
		 	Group_Control_Typography::get_type(),
		 	[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .gsc-services-group .service-item-content desc, {{WRAPPER}} .gsc-services-group .service-item.style-2 .service-content-hover .content-inner .desc, {{WRAPPER}} .gsc-services-group .service-item.style-4 .service-item-content .service-content .desc',
			]
	  	);

		$this->end_controls_section();
	 }

	 protected function render() {
		$settings = $this->get_settings_for_display();
		printf('<div class="gva-element-%s gva-element">', $this->get_name() );
		if( !empty($settings['layout']) ){
			include $this->get_template(self::TEMPLATE . $settings['layout'] . '.php');
		}
		print '</div>';
	 }

}

$widgets_manager->register(new GVAElement_Services());
