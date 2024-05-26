<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Tabs_Content extends GVAElement_Base{
   const NAME = 'gva-tab-content';
   const TEMPLATE = 'general/tabs-content/';
   const CATEGORY = 'qizon_general';

   public function get_name() {
      return self::NAME;
   }

   public function get_categories() {
      return array(self::CATEGORY);
   }

   public function get_title() {
      return esc_html__('Tabs Content', 'qizon-themer');
   }

   public function get_keywords() {
      return [ 'tabs', 'content', 'image' ];
   }

   public function get_script_depends() {
      return [
         'gavias.elements'
      ];
   }

   public function get_style_depends() {
      return array();
   }

   protected function register_controls() {
      $this->start_controls_section(
         'section_content',
         [
            'label' => esc_html__('Content', 'qizon-themer'),
         ]
      );
       $this->add_control(
         'title_text',
         [
            'label'        => __( 'Title', 'qizon-themer' ),
            'type'         => Controls_Manager::TEXT,
            'placeholder'  => __( 'Enter your title', 'qizon-themer' ),
            'label_block'  => true,
         ]
      );
      $this->add_control(
         'layout',
         [
            'label'        => esc_html__('Layout', 'qizon-themer'),
            'type'         => Controls_Manager::SELECT,
            'options' => [
               'layout-1'   => esc_html__('Layout 01', 'qizon-themer')
            ],
            'default' => 'layout-1',
         ]
      );

      $repeater = new Repeater();
      $repeater->add_control(
         'tab_title',
         [
            'label'       => esc_html__('Tab Title', 'qizon-themer'),
            'type'        => Controls_Manager::TEXT,
            'default'     => 'Tab Title',
            'label_block' => true
         ]
      );
      $repeater->add_control(
         'tab_image',
         [
            'label'      => __('Choose Image', 'qizon-themer'),
            'default'    => [
               'url' => GAVIAS_QIZON_PLUGIN_URL . 'elementor/assets/images/image-3.jpg',
            ],
            'type'       => Controls_Manager::MEDIA,
            'show_label' => false,
         ]
      );
      $repeater->add_control(
         'tab_desc',
         [
            'label'       => __('Tab Content', 'qizon-themer'),
            'type'        => Controls_Manager::WYSIWYG,
            'default'     => 'Proin tempor magna eget luctus sollicitudin. Etiam sagittis dolor felis, sit amet tincidunt urna suscipit sed. Suspendisse gravida sit amet ligula ac pharetra. Nulla ut lorem quam.',
            'label_block' => true,
            'rows'        => '10',
         ]
      );

      $this->add_control(
         'content_tabs',
         [
            'label'       => esc_html__('Tabs Content', 'qizon-themer'),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ tab_title }}}',
            'default'     => array(
               array(
                  'tab_title'       => esc_html__('What is crowdfunding', 'qizon-themer')
               ),
               array(
                  'tab_title'       => esc_html__('How to invest', 'qizon-themer')
               ),
               array(
                  'tab_title'       => esc_html__('Where can i invest', 'qizon-themer')
               )
            )
         ]
      );

      $this->end_controls_section();

      // === Style Tabs ==================
      $this->start_controls_section(
         'section_style_tab',
         [
            'label' => __( 'Style Tab', 'qizon-themer' ),
            'tab'   => Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_responsive_control(
         'nav_item_padding',
         [
            'label' => __( 'Nav Link | Padding', 'qizon-themer' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px'],
            'selectors' => [
               '{{WRAPPER}} .tabs-contact-one__nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;'
            ],
         ]
      );
      $this->add_control(
         'nav_item_border_color',
         [
            'label' => esc_html__('Nav Link Border Color', 'qizon-themer'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
              '{{WRAPPER}} .tabs-contact-one__nav-link' => 'border-color: {{VALUE}};',
            ],
         ]
      );
      $this->add_control(
         'nav_item_color',
         [
            'label' => esc_html__('Nav Link Color', 'qizon-themer'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
              '{{WRAPPER}} .tabs-contact-one__nav-link' => 'color: {{VALUE}};',
            ],
         ]
      );
      $this->add_control(
         'nav_item_background',
         [
            'label' => esc_html__('Nav Link Background', 'qizon-themer'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
              '{{WRAPPER}} .tabs-contact-one__nav-link' => 'background-color: {{VALUE}};',
            ],
         ]
      );

      $this->add_control(
         'nav_item_border_color_hover',
         [
            'label' => esc_html__('Nav Link Border Color Hover', 'qizon-themer'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
              '{{WRAPPER}} .tabs-contact-one__nav-link:hover, {{WRAPPER}} .tabs-contact-one__nav-link.active' => 'border-color: {{VALUE}};',
            ],
         ]
      );
      $this->add_control(
         'nav_item_color_hover',
         [
            'label' => esc_html__('Nav Link Color Hover', 'qizon-themer'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
              '{{WRAPPER}} .tabs-contact-one__nav-link:hover, {{WRAPPER}} .tabs-contact-one__nav-link.active' => 'color: {{VALUE}};',
            ],
         ]
      );
      $this->add_control(
         'nav_item_background_hover',
         [
            'label' => esc_html__('Nav Link Background Hover', 'qizon-themer'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
              '{{WRAPPER}} .tabs-contact-one__nav-link:hover, {{WRAPPER}} .tabs-contact-one__nav-link.active' => 'background-color: {{VALUE}};',
            ],
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

$widgets_manager->register(new GVAElement_Tabs_Content());
