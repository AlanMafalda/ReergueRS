<?php
if (!defined('ABSPATH')) { exit; }

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class GVAElement_CF_Item_Button_Donate extends GVAElement_Base{
    
   const NAME = 'gva-cf-item-button-donate';
   const TEMPLATE = 'crowdfunding/item-button-donate';
   const CATEGORY = 'qizon_crowdfunding';

   public function get_categories() {
      return array(self::CATEGORY);
   }

   public function get_name() {
      return self::NAME;
   }

   public function get_title() {
      return __('CF Item Button Donate', 'qizon-themer');
   }

   public function get_keywords() {
      return [ 'crowdfunding', 'item', 'amount', 'button', 'donate' ];
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
   }

   protected function render(){
      parent::render();

      $settings = $this->get_settings_for_display();
      printf( '<div class="qizon-%s qizon-element">', $this->get_name() );
         include $this->get_template(self::TEMPLATE . '.php');
      print '</div>';
   }
}

$widgets_manager->register(new GVAElement_CF_Item_Button_Donate());
