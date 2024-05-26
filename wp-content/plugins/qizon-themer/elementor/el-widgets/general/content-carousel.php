<?php
if(!defined('ABSPATH')){ exit; }

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Content_Carousel extends GVAElement_Base{
   const NAME = 'gva-content-carousel';
   const TEMPLATE = 'general/content-carousel';
   const CATEGORY = 'qizon_general';

   public function get_name() {
      return self::NAME;
   }

   public function get_categories() {
      return array(self::CATEGORY);
   }


   public function get_title() {
      return __('Content Carousel', 'qizon-themer');
   }

   public function get_keywords() {
      return [ 'services', 'content', 'carousel' ];
   }

   public function get_script_depends() {
      return [
         'swiper',
         'gavias.elements',
      ];
   }

   public function get_style_depends() {
      return array('swiper');
   }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'qizon-themer'),
            ]
        );
  
        $repeater = new Repeater();
        $repeater->add_control(
            'image',
            [
                'label'      => __('Choose Image', 'qizon-themer'),
                'default'    => [
                    'url' => GAVIAS_QIZON_PLUGIN_URL . 'elementor/assets/images/image-3.jpg',
                ],
                'type'       => Controls_Manager::MEDIA,
                'show_label' => false
            ]
        );
        $repeater->add_control(
          'shadow_sub_title',
          [
            'label'       => __('Shadow Sub Title', 'qizon-themer'),
            'type'        => Controls_Manager::TEXT,
            'default'     => 'Shadow Sub Title',
            'label_block' => true,
          ]
        );
        $repeater->add_control(
          'sub_title',
          [
            'label'       => __('SubTitle', 'qizon-themer'),
            'type'        => Controls_Manager::TEXT,
            'default'     => 'top Funding stories',
            'label_block' => true,
          ]
        );
        $repeater->add_control(
          'title',
          [
            'label'       => __('Title', 'qizon-themer'),
            'type'        => Controls_Manager::TEXT,
            'default'     => 'Add your Title',
            'label_block' => true,
          ]
        );
        $repeater->add_control(
          'desc',
          [
            'label'       => __('Description', 'qizon-themer'),
            'type'        => Controls_Manager::TEXTAREA,
            'default'     => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo enim ipsam voluptatem',
            'label_block' => true,
          ]
        );
        $repeater->add_control(
          'btn_title',
          [
            'label'       => __('Button Title', 'qizon-themer'),
            'type'        => Controls_Manager::TEXT,
            'default'     => esc_html__('Learn More', 'qizon-themer'),
            'label_block' => true,
          ]
        );
        $repeater->add_control(
          'btn_link',
          [
            'label'     => __( 'Button Link', 'qizon-themer' ),
            'type'      => Controls_Manager::URL,
            'placeholder' => __( 'https://your-link.com', 'qizon-themer' ),
            'label_block' => true
          ]
        );
        
        $this->add_control(
          'carousel_content',
          [
            'label'       => __('Content Item', 'qizon-themer'),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
            'default'     => array(
               array(
                  'shadow_sub_title'  => esc_html__( 'Top Stories', 'qizon-themer' ),
                  'sub_title'         => esc_html__( 'Top Funding stories', 'qizon-themer' ),
                  'title'             => 'Meet William & Michael'
               ),
               array(
                  'shadow_sub_title'  => esc_html__( 'Top Stories', 'qizon-themer' ),
                  'sub_title'         => esc_html__( 'Top Funding stories', 'qizon-themer' ),
                  'title'             => 'Meet Dewayne E. Morton'
               ),
            )
          ]
        );
        
         $this->end_controls_section();

         $this->add_control_carousel(true);

         $this->start_controls_section(
            'section_style_content',
            [
               'label' => __( 'Content', 'qizon-themer' ),
               'tab'   => Controls_Manager::TAB_STYLE,
            ]
         );

         $this->add_control(
            'heading_title',
            [
               'label' => __( 'Title', 'qizon-themer' ),
               'type' => Controls_Manager::HEADING,
               'separator' => 'before',
            ]
         );

         $this->add_responsive_control(
            'title_bottom_space',
            [
               'label' => __( 'Spacing', 'qizon-themer' ),
               'type' => Controls_Manager::SLIDER,
               'range' => [
                 'px' => [
                   'min' => 0,
                   'max' => 100,
                 ],
               ],
               'default' => [
                 'size'  => 0
               ],
               'selectors' => [
                 '{{WRAPPER}} .gsc-content-carousel .item-content .item-content-inner .box-content .gsc-heading .title' => 'padding-bottom: {{SIZE}}{{UNIT}};',
               ],
            ]
         ); 

        $this->add_control(
          'title_color',
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
            'name' => 'title_typography',
            'selector' => '{{WRAPPER}} .gsc-content-carousel .item-content .item-content-inner .box-content .gsc-heading .title',
          ]
        );

        $this->add_control(
          'description_color',
          [
            'label' => __( 'Color', 'qizon-themer' ),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
              '{{WRAPPER}} .gsc-content-carousel .item-content .item-content-inner .box-content .gsc-heading .title-desc' => 'color: {{VALUE}};',
            ],
          ]
        );

        $this->add_group_control(
          Group_Control_Typography::get_type(),
          [
            'name' => 'description_typography',
            'selector' => '{{WRAPPER}} .gsc-content-carousel .item-content .item-content-inner .box-content .gsc-heading .title-desc',
          ]
        );

        $this->end_controls_section();
    }

    protected function render() {
      $settings = $this->get_settings_for_display();
      printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
      include $this->get_template(self::TEMPLATE . '.php');
      print '</div>';
    }

}

$widgets_manager->register(new GVAElement_Content_Carousel());
