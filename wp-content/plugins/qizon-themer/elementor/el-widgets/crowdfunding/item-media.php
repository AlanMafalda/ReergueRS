<?php
if (!defined('ABSPATH')) { exit; }

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class GVAElement_CF_Item_Media extends GVAElement_Base{
    
   const NAME = 'gva-cf-item-media';
   const TEMPLATE = 'crowdfunding/item-media';
   const CATEGORY = 'qizon_crowdfunding';

   public function get_categories() {
      return array(self::CATEGORY);
   }

   public function get_name() {
      return self::NAME;
   }

   public function get_title() {
      return __('CF Item Media', 'qizon-themer');
   }

   public function get_keywords() {
      return [ 'crowdfunding', 'item', 'media', 'gallery', 'image', 'video' ];
   }

   public function get_script_depends() {
      return [
         'swiper'
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
               'style-1'      => __('Style I: Show Video or Image', 'qizon-themer'),
               'style-2'      => __('Style II: Show gallery images + Video Popup', 'qizon-themer'),
            ],
            'default' => 'style-1',
         ]
      );

      $this->add_control(
         'image_size',
         [
            'label'     => __('Style', 'qizon-themer'),
            'type'      => \Elementor\Controls_Manager::SELECT,
            'options'   => $this->get_thumbnail_size(),
            'default'   => 'post-thumbnail'
         ]
      );

      $this->add_control(
         'show_media',
         [
            'label' => __('Show Media', 'qizon-themer'),
            'type' => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'condition' => [
               'style' => array('style-2')
             ]
         ]
      );

      $this->end_controls_section();

      $this->add_control_carousel(false, array('style' => ['style-2']));
   }

   protected function render(){
      parent::render();

      $settings = $this->get_settings_for_display();
      printf( '<div class="qizon-%s qizon-element">', $this->get_name() );
         include $this->get_template(self::TEMPLATE . '.php');
      print '</div>';
   }
}

$widgets_manager->register(new GVAElement_CF_Item_Media());
