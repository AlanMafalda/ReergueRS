<?php
if (!defined('ABSPATH')) { exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

class GVAElement_CF_Item_Info extends GVAElement_Base{
    
   const NAME = 'gva-cf-item-info';
   const TEMPLATE = 'crowdfunding/item-info';
   const CATEGORY = 'qizon_crowdfunding';

   public function get_categories() {
      return array(self::CATEGORY);
   }

   public function get_name() {
      return self::NAME;
   }

   public function get_title() {
      return __('Informações do Item CF', 'qizon-themer');
   }

   public function get_keywords() {
      return [ 'crowdfunding', 'item', 'prometido', 'apoiadores', 'dias', 'restantes', 'info' ];
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
            'label' => __('Conteúdo', 'qizon-themer'),
         ]
      );

      $repeater = new Repeater();
      $repeater->add_control(
         'title',
         [
            'label'       => __('Título', 'qizon-themer'),
            'type'        => Controls_Manager::TEXT,
            'default'     => 'Prometido',
            'label_block' => true,
         ]
      );
      $repeater->add_control(
         'type',
         [
            'label' => __( 'Meta', 'qizon-themer' ),
            'type' => Controls_Manager::SELECT,
            'options' => [
               'pledged'      => __('Prometido', 'qizon-themer'),
               'backers'      => __('Apoiadores', 'qizon-themer'),
               'days_left'      => __('Dias Restantes', 'qizon-themer')
            ],
            'default' => 'pledged',
         ]
      );
      $this->add_control(
         'info_content',
         [
            'label'       => __('Item de Conteúdo de Informações', 'qizon-themer'),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
            'default'     => array(
               array(
                  'title'  => esc_html__('Prometido', 'qizon-themer'),
                  'type'   => 'pledged'
               ),
               array(
                  'title'  => esc_html__('Apoiadores', 'qizon-themer'),
                  'type'   => 'backers'
               ),
               array(
                  'title'  => esc_html__('Dias Restantes', 'qizon-themer'),
                  'type'   => 'days_left'
               )
            )
         ]
      );

      $this->end_controls_section();

      // Estilo
      $this->start_controls_section(
         'section_box_style',
         [
            'label' => __( 'Caixa', 'qizon-themer' ),
            'tab' => Controls_Manager::TAB_STYLE,
         ]
      );
      $this->add_control(
         'box_color',
         [
            'label' => __( 'Cor de Fundo do Item', 'qizon-themer' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .cf-item-info .item-info' => 'background-color: {{VALUE}};',
            ],
         ]
      );
      $this->add_control(
         'title_style',
         [
            'label' => __( 'Título', 'qizon-themer' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
         ]
      );
      $this->add_control(
         'title_color',
         [
            'label' => __( 'Cor do Título', 'qizon-themer' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .cf-item-info .item-info .title' => 'color: {{VALUE}};',
            ],
         ]
      );
      $this->add_group_control(
         Group_Control_Typography::get_type(),
         [
            'name' => 'typography',
            'selector' => '{{WRAPPER}} .cf-item-info .item-info .title',
         ]
      );

      $this->add_control(
         'value_title',
         [
            'label' => __( 'Texto do Valor', 'qizon-themer' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before',
         ]
      );
      $this->add_control(
         'value_color',
         [
            'label' => __( 'Cor', 'qizon-themer' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .cf-item-info .item-info .meta-value' => 'color: {{VALUE}};',
            ],
         ]
      );
      $this->add_group_control(
         Group_Control_Typography::get_type(),
         [
            'name' => 'typography_value',
            'selector' => '{{WRAPPER}} .cf-item-info .item-info .meta-value',
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

$widgets_manager->register(new GVAElement_CF_Item_Info());
