<?php
if (!defined('ABSPATH')) { exit; }

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class GVAElement_GiveWP_Categories extends GVAElement_Base{
    
   const NAME = 'gva-givewp-categories-list';
   const TEMPLATE = 'givewp/categories-list';
   const CATEGORY = 'qizon_givewp';

   public function get_categories() {
      return array(self::CATEGORY);
   }

   public function get_name() {
      return self::NAME;
   }

   public function get_title() {
      return __('GiveWP Categories', 'qizon-themer');
   }

   public function get_keywords() {
      return [ 'givewp', 'category', 'categories', 'list' ];
   }

   public function get_script_depends() {
      return array();
    }

    public function get_style_depends() {
      return array();
    }

   protected function register_controls() {
     
      $this->start_controls_section(
         self::NAME . '_content',
         [
            'label' => __('Content', 'qizon-themer'),
         ]
      );

      $this->add_control(
         'title_text',
         [
            'label' => __( 'Title', 'qizon-themer' ),
            'type' => Controls_Manager::TEXT,
            'placeholder' => __( 'Enter your title', 'qizon-themer' ),
            'default' => __( 'Add Your Heading Text Here', 'qizon-themer' ),
            'label_block' => true
         ]
      );

      $this->add_control(
         'hide_title',
         [
            'label' => __( 'Hide Title', 'qizon-themer' ),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'no'
         ]
      );

      $this->add_control(
         'hide_count',
         [
            'label' => __( 'Hide Count', 'qizon-themer' ),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'no'
         ]
      );

      $this->add_control(
         'text_color',
         [
            'label' => __( 'Color', 'qizon-themer' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
               '{{WRAPPER}} .gsc-content-carousel .item-content .item-content-inner .box-content .gsc-heading .title' => 'color: {{VALUE}};',
            ],
         ]
      );

      $this->add_group_control(
         Group_Control_Typography::get_type(),
         [
            'name' => 'text_typography',
            'selector' => '{{WRAPPER}} .gsc-content-carousel .item-content .item-content-inner .box-content .gsc-heading .title',
         ]
      );       

      $this->end_controls_section();

   }

   protected function render(){
      parent::render();

      $settings = $this->get_settings_for_display();
      printf( '<div class="qizon-%s qizon-element">', $this->get_name() );
         include $this->get_template(self::TEMPLATE . '.php');
      print '</div>';
   }
}

$widgets_manager->register(new GVAElement_GiveWP_Categories());
