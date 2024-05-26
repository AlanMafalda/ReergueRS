<?php
if (!defined('ABSPATH')) { exit; }

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class GVAElement_CF_Item_Short_Story extends GVAElement_Base{
    
   const NAME = 'gva-cf-item-short-story';
   const TEMPLATE = 'crowdfunding/item-short-story';
   const CATEGORY = 'qizon_crowdfunding';

   public function get_categories() {
      return array(self::CATEGORY);
   }

   public function get_name() {
      return self::NAME;
   }

   public function get_title() {
      return __('CF Item Short Story', 'qizon-themer');
   }

   public function get_keywords() {
      return [ 'crowdfunding', 'item', 'description', 'story', 'short' ];
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
         'title',
         [
            'label'       => __('Title', 'qizon-themer'),
            'type'        => Controls_Manager::TEXT,
            'default'     => esc_html__('Short Story', 'qizon-themer'),
            'label_block' => true,
         ]
      );
      $this->add_control(
         'title_style',
         [
            'label'       => __('Title Style', 'qizon-themer'),
            'type'        => Controls_Manager::HEADING
         ]
      );
      $this->add_control(
         'title_color',
         [
            'label' => __( 'Title Color', 'qizon-themer' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .cf-item-short-story .title' => 'color: {{VALUE}};',
            ],
         ]
      );
      $this->add_group_control(
         Group_Control_Typography::get_type(),
         [
            'name' => 'title_typography',
            'selector' => '{{WRAPPER}} .cf-item-short-story .title',
         ]
      );
      $this->add_control(
         'desc_style',
         [
            'label' => __( 'Description Style', 'qizon-themer' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
         ]
      );
      $this->add_control(
         'desc_color',
         [
            'label' => __( 'Title Color', 'qizon-themer' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .cf-item-short-story .desc' => 'color: {{VALUE}};',
            ],
         ]
      );
      $this->add_group_control(
         Group_Control_Typography::get_type(),
         [
            'name' => 'desc_typography',
            'selector' => '{{WRAPPER}} .cf-item-short-story .desc',
         ]
      );
   }

   protected function render(){
      parent::render();

      $settings = $this->get_settings_for_display();
      printf( '<div class="qizon-%s qizon-element">', $this->get_name() );
         include $this->get_template(self::TEMPLATE . '.php');
      print '</div>';
   }
}

$widgets_manager->register(new GVAElement_CF_Item_Short_Story());
