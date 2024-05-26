<?php
if (!defined('ABSPATH')) { exit; }

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Repeater;

class GVAElement_CF_Item_Category extends GVAElement_Base{
    
   const NAME = 'gva-cf-item-category';
   const TEMPLATE = 'crowdfunding/item-category';
   const CATEGORY = 'qizon_crowdfunding';

   public function get_categories() {
      return array(self::CATEGORY);
   }

   public function get_name() {
      return self::NAME;
   }

   public function get_title() {
      return __('CF Item Category', 'qizon-themer');
   }

   public function get_keywords() {
      return [ 'crowdfunding', 'item', 'category' ];
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
         'primary_color',
         [
            'label' => __( 'Primary Color', 'qizon-themer' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .cf-item-category .campaign-categories' => 'background-color: {{VALUE}};',
            ]
         ]
     );

      $this->add_control(
         'second_color',
         [
            'label' => __( 'Second Color', 'qizon-themer' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .cf-item-category .campaign-categories' => 'color: {{VALUE}};',
               '{{WRAPPER}} .cf-item-category .campaign-categories a' => 'color: {{VALUE}};',
            ]
         ]
     );

     $this->add_group_control(
         Group_Control_Typography::get_type(),
         [
            'name' => 'typography',
            'selector' => '{{WRAPPER}} .cf-item-category .campaign-categories a'
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

$widgets_manager->register(new GVAElement_CF_Item_Category());
