<?php

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Image_Size;

class GVAElement_Woo_Archive extends GVAElement_Base{
    
   const NAME = 'gva_woo_archive';
   const TEMPLATE = 'crowdfunding/woo-archive';
   const CATEGORY = 'qizon_crowdfunding';

   public function get_categories() {
      return array(self::CATEGORY);
   }

   public function get_name() {
      return self::NAME;
   }

   public function get_title() {
      return __('Project Archive', 'qizon-themer');
   }

   public function get_keywords() {
      return [ 'woocommerce', 'product', 'project', 'archive' ];
   }

   public function get_script_depends() {
      return array();
   }

   public function get_style_depends() {
      return array();
   }

protected function register_controls(){
     $this->start_controls_section(
         'section_query',
         [
            'label' => __('Layout', 'qizon-themer'),
            'tab'   => Controls_Manager::TAB_CONTENT,
         ]
     );

      $this->add_control( // xx Layout
         'layout_heading',
         [
            'label'   => __( 'Layout', 'qizon-themer' ),
            'type'    => Controls_Manager::HEADING,
         ]
      );
      $this->add_control(
         'style',
         [
            'label'     => __('Style', 'qizon-themer'),
            'type'      => \Elementor\Controls_Manager::SELECT,
            'default' => 'style-1',
             'options' => [
               'style-1'         => __( 'Item Style I', 'qizon-themer' ),
               'style-2'         => __( 'Item Style II', 'qizon-themer' ),
               'style-3'         => __( 'Item Style III', 'qizon-themer' )
            ],
         ]
      );

      $this->add_control(
         'image_size',
         [
            'label'     => __('Image Style', 'qizon-themer'),
            'type'      => Controls_Manager::SELECT,
            'options'   => $this->get_thumbnail_size(),
            'default'   => 'post-thumbnail'
         ]
      );
      $this->end_controls_section();

      $this->add_control_grid();
      
   }
  
   protected function render(){
      $settings = $this->get_settings_for_display();

      parent::render();

      global $qizon_term_id;

      printf( '<div class="gva-element-%s gva-element">', $this->get_name() );

         if(\Elementor\Plugin::instance()->editor->is_edit_mode()){
            global $wp_query;
            $wp_query = new WP_Query(array(
               'post_type'       => 'product',
               'posts_per_page'  => 6
            ));
            include $this->get_template(self::TEMPLATE . '.php');
         }else{
            $object = get_queried_object();
            if(!empty($object)) {
               include $this->get_template(self::TEMPLATE . '.php');
            }
         }

      print '</div>';
   }

}
$widgets_manager->register(new GVAElement_Woo_Archive()); 
