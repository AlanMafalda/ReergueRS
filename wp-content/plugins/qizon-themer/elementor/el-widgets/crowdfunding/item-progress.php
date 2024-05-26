<?php
if (!defined('ABSPATH')) { exit; }

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class GVAElement_CF_Item_Progress extends GVAElement_Base{
    
   const NAME = 'gva-cf-item-progress';
   const TEMPLATE = 'crowdfunding/item-progress';
   const CATEGORY = 'qizon_crowdfunding';

   public function get_categories() {
      return array(self::CATEGORY);
   }

   public function get_name() {
      return self::NAME;
   }

   public function get_title() {
      return __('CF Item Progress', 'qizon-themer');
   }

   public function get_keywords() {
      return [ 'crowdfunding', 'item', 'progress', 'raised' ];
   }

   public function get_script_depends() {
      return array(
         'circle-progress',
         'gavias.elements'
      );
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
         'style',
         [
            'label' => __( 'Style', 'qizon-themer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               'style-1'      => __( 'Style I', 'qizon-themer' ),
               'style-2'      => __( 'Style II', 'qizon-themer' )
            ],
            'default' => 'style-1',
         ]
      );

      $this->add_control(
         'empty_fill_1',
         [
            'label' => __( 'Color EmptyFill', 'kitecx-themer' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .cf-item-progress.style-1 .campaign-progress .progress' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
               'style' => ['style-1']
            ],
         ]
      );
      $this->add_control(
         'bar_color_1',
         [
            'label' => __( 'Color', 'kitecx-themer' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .cf-item-progress.style-1 .campaign-progress .progress .progress-bar' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
               'style' => ['style-1']
            ],
         ]
      );
      $this->add_control(
         'empty_fill',
         [
            'label' => __( 'Color EmptyFill', 'kitecx-themer' ),
            'type' => Controls_Manager::COLOR,
            'condition' => [
               'style' => ['style-2']
            ],
         ]
      );
      $this->add_control(
         'color',
         [
            'label' => __( 'Color', 'kitecx-themer' ),
            'type' => Controls_Manager::COLOR,
            'condition' => [
               'style' => ['style-2']
            ],
         ]
      );
       $this->add_control(
         'size',
         [
            'label' => __( 'Size', 'kitecx-themer' ),
            'type' => Controls_Manager::NUMBER,
            'min' => 80,
            'max' => 250,
            'step' => 1,
            'default' => 140,
            'condition' => [
               'style' => ['style-2']
            ],
         ]
      );
      $this->add_control(
         'thickness',
         [
            'label' => __( 'Thickness', 'kitecx-themer' ),
            'type' => Controls_Manager::NUMBER,
            'min' => 1,
            'max' => 50,
            'step' => 1,
            'default' => 10,
            'condition' => [
               'style' => ['style-2']
            ],
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

$widgets_manager->register(new GVAElement_CF_Item_Progress());
