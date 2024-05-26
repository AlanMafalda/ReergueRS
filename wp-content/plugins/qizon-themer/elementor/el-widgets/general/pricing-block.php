<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Pricing_Block extends GVAElement_Base {
	const NAME = 'gva-pricing-block';
   const TEMPLATE = 'general/pricing-block';
   const CATEGORY = 'qizon_general';

   public function get_name() {
      return self::NAME;
   }

   public function get_categories() {
      return array(self::CATEGORY);
   }

	public function get_title() {
		return __( 'Pricing Block', 'qizon-themer' );
	}

	public function get_keywords() {
		return [ 'pricing', 'block' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'qizon-themer' ),
			]
		);
		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'qizon-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'style-1' 		=> __( 'Style I: Default', 'qizon-themer' )
				],
				'default' => 'style-1',
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'qizon-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'qizon-themer' ),
				'default' => __( 'Basic Plan', 'qizon-themer' ),
				'label_block' => true
			]
		);
		$this->add_control(
			'subtitle_text',
			[
				'label' => __( 'Sub Title', 'qizon-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Save 45%', 'qizon-themer' ),
				'default' => __( 'Save 45%', 'qizon-themer' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'desc_text',
			[
				'label' => __( 'Description', 'qizon-themer' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Your Description', 'qizon-themer' ),
				'default' => __( 'Suitable For Any IT Solutions.', 'qizon-themer' ),
			]
		);
		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'qizon-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '29.68', 'qizon-themer' ),
				'default' => __( '29.68', 'qizon-themer' ),
			]
		);
		$this->add_control(
			'currency',
			[
				'label' => __( 'Currency', 'qizon-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Currency', 'qizon-themer' ),
				'default' => __( '$', 'qizon-themer' ),
			]
		);
		$this->add_control(
			'period',
			[
				'label' => __( 'Period', 'qizon-themer' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Monthly', 'qizon-themer' ),
				'default' => __( 'Monthly', 'qizon-themer' ),
			]
		);

		$repeater = new Repeater();
      $repeater->add_control(
         'pricing_features',
			[
	         'label'       => __('Pricing Features', 'qizon-themer'),
	         'type'        => Controls_Manager::TEXT,
	         'default'     => 'Free text goes here',
	         'label_block' => true,
	     	]
	   );
	   $repeater->add_control(
         'feature_active',
			[
	         'label'       => __('Pricing Features', 'qizon-themer'),
	         'type'        => Controls_Manager::SWITCHER,
	         'default'	  => 'yes'
	     	]
	   );
		$this->add_control(
         'pricing_content',
         [
            'label'       => __('Pricing Features', 'qizon-themer'),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ pricing_features }}}',
            'default'     => array(
               array(
                  'pricing_features'  => esc_html__( 'Resposive Design', 'qizon-themer' )
               ),
               array(
                  'pricing_features'  => esc_html__( 'Unlimited Entities', 'qizon-themer' )
               ),
               array(
                  'pricing_features'  => esc_html__( 'Premium Quality Support', 'qizon-themer' ),
                  'feature_active'	=> 'no'
               ),
               array(
                  'pricing_features'  => esc_html__( 'Hosted In The Cloud', 'qizon-themer' ),
                  'feature_active'	=> 'no'
               )
            ),
         ]
      );

      $this->add_control(
			'pricing_active',
			[
	         'label'       => __('Pricing Active', 'qizon-themer'),
	         'type'        => Controls_Manager::SWITCHER,
	         'default'	  => 'no'
	     	]
		);

		$this->end_controls_section();

		$this->start_controls_section( //** Section Icon
			'section_Button',
			[
				'label' => __( 'Button', 'qizon-themer' ),
			]
		);

		$this->add_control(
			'button_url',
			[
				'label' => __( 'Button URL', 'qizon-themer' ),
				'type' => Controls_Manager::URL,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'qizon-themer' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Select Plan'
			]
		);

		$this->add_control(
			'button_style',
			[
				'label' => __( 'Button Style', 'qizon-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'btn-theme' 		=> esc_html__('Button Theme', 'qizon-themer'),
					'btn-theme-2' 		=> esc_html__('Button Theme Second', 'qizon-themer'),
					'btn-white' 		=> esc_html__('Button White', 'qizon-themer'),
					'btn-black' 		=> esc_html__('Button Black', 'qizon-themer')
				],
				'default' => 'btn-theme',
			]
		);

		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'qizon-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'qizon-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-pricing .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .gsc-pricing .title',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_price_style',
			[
				'label' => __( 'Price Text', 'qizon-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
 
		$this->add_control(
			'sub_title_color',
			[
				'label' => __( 'Text Color', 'qizon-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-pricing .content-inner .plan-price .price-value' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_price_text',
				'selector' => '{{WRAPPER}} .gsc-pricing .content-inner .plan-price .price-value',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'qizon-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
 
		$this->add_control(
			'content_color',
			[
				'label' => __( 'Text Color', 'qizon-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-pricing .content-inner .plan-list li .text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_content',
				'selector' => '{{WRAPPER}} .gsc-pricing .content-inner .plan-list li .text',
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'qizon-themer' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gsc-pricing .content-inner .plan-list li .icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
         include $this->get_template(self::TEMPLATE . '.php');
      print '</div>';
	}
}

$widgets_manager->register(new GVAElement_Pricing_Block());