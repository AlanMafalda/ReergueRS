<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;

class GVAElement_Navigation_Menu extends GVAElement_Base {
	const NAME = 'gva-navigation-menu';
   const TEMPLATE = 'general/navigation-menu';
   const CATEGORY = 'qizon_general';

	public function get_name() {
      return self::NAME;
   }

   public function get_categories() {
      return array(self::CATEGORY);
   }

	public function get_title() {
		return __( 'Navigation Menu', 'qizon-themer' );
	}

	public function get_keywords() {
		return [ 'menu', 'navigation' ];
	}

	public function get_all_menus(){
		$menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
		$results = array();
		foreach ($menus as $key => $menu) {
			$results[$menu->slug] = $menu->name;
		}
		return $results;
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'qizon-themer' ),
			]
		);

		$this->add_control(
			'menu',
			[
				'label' 			=> __( 'Menu', 'qizon-themer' ),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> $this->get_all_menus(),
				'label_block' 	=> true,
				'default'		=> 'main-menu'
			]
		);

		$this->add_control(
			'style',
			[
				'label' 			=> __( 'Style', 'qizon-themer' ),
				'type' 			=> Controls_Manager::SELECT,
				'options' 		=> array(
					'style-default'	=> esc_html__('Default', 'qizon-themer'),
					'style-2'			=> esc_html__('Style II: Background, Flex', 'qizon-themer')
				),
				'default'		=> 'style-default'
			]
		);

		$this->add_control(
			'align',
			[
				'label' => __( 'Alignment', 'qizon-themer' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'qizon-themer' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'qizon-themer' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'qizon-themer' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
			]
		);

		$this->add_control(
			'sub_menu_min_width',
			[
				'label' => __( 'Submenu Min Width (px)', 'qizon-themer' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 250,
				],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .gva-navigation-menu ul.gva-nav-menu > li .submenu-inner, .gva-navigation-menu ul.gva-nav-menu > li ul.submenu-inner' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_mobile_menu',
			[
				'type' => Controls_Manager::HEADING,
				'label'	=> __('Mobile Menu settings', 'qizon-themer')
			]
		);

		$this->add_control(
			'breakpoint_menu_mobile',
			[
				'label' => __( 'Menu Mobile Breakpoint (px)', 'qizon-themer' ),
				'type' => Controls_Manager::SELECT,
				'options' 		=> array(
					''								   => esc_html__('Default', 'qizon-themer'),
					'mobile-breakpoint-1400'	=> esc_html__('1400px', 'qizon-themer'),
					'mobile-breakpoint-1350'	=> esc_html__('1350px', 'qizon-themer'),
					'mobile-breakpoint-1300'	=> esc_html__('1300px', 'qizon-themer'),
					'mobile-breakpoint-1250'	=> esc_html__('1250px', 'qizon-themer'),
					'mobile-breakpoint-1200'	=> esc_html__('1200px', 'qizon-themer'),
					'mobile-breakpoint-1150'	=> esc_html__('1150px', 'qizon-themer'),
					'mobile-breakpoint-1100'	=> esc_html__('1100px', 'qizon-themer'),
					'mobile-breakpoint-1080'	=> esc_html__('1080px', 'qizon-themer'),
					'mobile-breakpoint-1024'	=> esc_html__('1024px', 'qizon-themer'),
					'mobile-breakpoint-992'		=> esc_html__('992px', 'qizon-themer'),
					'mobile-breakpoint-768'		=> esc_html__('768px', 'qizon-themer')
				),
				'default'		=> 'mobile-breakpoint-1024'
			]
		);
	
	
		$this->end_controls_section();

		//Styling Main Menu
		$this->start_controls_section(
			'section_main_menu_style',
			[
				'label' => __( 'Main Menu', 'qizon-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .gva-navigation-menu ul.gva-nav-menu > li > a',
			]
		);

		$this->add_responsive_control(
			'main_menu_padding',
			[
				'label' => __( 'Menu Item Padding', 'qizon-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .gva-navigation-menu ul.gva-nav-menu > li' => 'padding: 0 {{RIGHT}}{{UNIT}} 0 {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .gva-navigation-menu ul.gva-nav-menu > li > a' => 'padding: {{TOP}}{{UNIT}} 0 {{BOTTOM}}{{UNIT}} 0;',
				],
			]
		);

		//Tabs Styling Normal, Hover, Active
		$this->start_controls_tabs('tabs_main_menu_style');

		$this->start_controls_tab(
			'main_menu_style_normal',
			[
				'label' => __('Normal', 'qizon-themer'),
			]
		);
		$this->add_control(
			'main_menu_text_color',
			[
				'label'     => __('Text Color', 'qizon-themer'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gva-navigation-menu ul.gva-nav-menu > li' => 'color: {{VALUE}}', 
				],
			]
		);
		$this->add_control(
			'main_menu_color',
			[
				'label'     => __('Color', 'qizon-themer'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					 '{{WRAPPER}} .gva-navigation-menu ul.gva-nav-menu > li > a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'main_menu_hover',
			[
				'label' => __('Hover', 'qizon-themer'),
			]
		);
		$this->add_control(
			'main_menu_hover_color',
			[
				'label'     => __('Color', 'qizon-themer'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gva-navigation-menu ul.gva-nav-menu > li > a:hover' => 'color: {{VALUE}}', 
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'main_menu_active',
			[
				'label' => __('Active', 'qizon-themer'),
			]
		);
		$this->add_control(
			'main_menu_active_color',
			[
				'label'     => __('Color', 'qizon-themer'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gva-navigation-menu ul.gva-nav-menu > li.current_page_parent > a' => 'color: {{VALUE}}', 
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();


		$this->end_controls_section();

		//Styling Sub Menu
		$this->start_controls_section(
			'section_sub_menu_style',
			[
				'label' => __( 'Sub Menu', 'qizon-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		//Tabs Styling Normal, Hover, Active
		$this->start_controls_tabs('tabs_sub_menu_style');

		$this->start_controls_tab(
			'sub_menu_style_normal',
			[
				'label' => __('Normal', 'qizon-themer'),
			]
		);
		$this->add_control(
			'sub_menu_text_color',
			[
				'label'     => __('Text Color', 'qizon-themer'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gva-navigation-menu ul.gva-main-menu .submenu-inner' => 'color: {{VALUE}}', 
				],
			]
		);
		$this->add_control(
			'sub_menu_color',
			[
				'label'     => __('Color', 'qizon-themer'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					 '{{WRAPPER}} .gva-navigation-menu ul.gva-main-menu .submenu-inner a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'sub_menu_hover',
			[
				'label' => __('Hover', 'qizon-themer'),
			]
		);
		
		$this->add_control(
			'sub_menu_hover_color',
			[
				'label'     => __('Link Color', 'qizon-themer'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gva-navigation-menu ul.gva-main-menu .submenu-inner a:hover' => 'color: {{VALUE}}', 
					'{{WRAPPER}} .gva-navigation-menu ul.gva-main-menu .submenu-inner a:active' => 'color: {{VALUE}}', 
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'sub_menu_active',
			[
				'label' => __('Active', 'qizon-themer'),
			]
		);
		$this->add_control(
			'sub_menu_active_color',
			[
				'label'     => __('Color', 'qizon-themer'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .gva-navigation-menu ul.gva-main-menu .submenu-inner li.current_page_parent a:hover' => 'color: {{VALUE}}', 
				],
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography_2',
				'selector' => '{{WRAPPER}} .gva-navigation-menu ul.gva-main-menu .submenu-inner li a',
			]
		);

		$this->add_responsive_control(
			'sub_menu_padding',
			[
				'label' => __( 'Menu Item Padding', 'qizon-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .gva-navigation-menu ul.gva-main-menu .submenu-inner li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Mobile Style
		$this->start_controls_section(
			'section_mobile_style',
			[
				'label' => __( 'Mobile Icon', 'qizon-themer' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'icon_mobile_color',
			[
				'label'     => __('Color', 'qizon-themer'),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .nav-screen__mobile .dropdown-toggle i' => 'color: {{VALUE}}', 
				],
			]
		);
		$this->add_responsive_control(
			'icon_mobile_size',
			[
				'label' 		=> esc_html__('Size', 'qizon-themer'),
				'type' 		=> Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 80,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .nav-screen__mobile .dropdown-toggle i' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);
		$this->add_responsive_control(
			'icon_mobile_padding',
			[
				'label' => __( 'Padding', 'qizon-themer' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .nav-one__mobile' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render(){

		parent::render();

		$settings = $this->get_settings_for_display();
		printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
		  include $this->get_template(self::TEMPLATE . '.php');
		print '</div>';
	}
}

$widgets_manager->register(new GVAElement_Navigation_Menu());
