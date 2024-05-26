<?php
use Elementor\Controls_Manager;
use Elementor\Core\Base\Document;
class GVA_Layout_Elementor{

   public function __construct() {
      add_action( 'elementor/documents/register_controls', [$this, 'controls'], 1000 );
   }

   private function get_current_post(Document $document){
      $post = $document->get_post();
      if(($postId = wp_is_post_revision($post)) !== false){
         $post = get_post($postId);
      }
      if(!$post instanceof WP_Post){
         return false;
      }
      return $post;
   }

   private function get_preview_posts($post_type){
      $query = new WP_Query([
         'post_type'          => $post_type,
         'posts_per_page'     => 30,
         'numberposts'        => 30,
         'post_status'        => 'publish',
         'orderby'            => 'ID',
         'order'              => 'desc'
      ]);
      $posts = array();
       foreach ($query->posts as $post) {
         $posts[$post->ID] = $post->post_title;
      }
      wp_reset_postdata();
      return $posts;
   }

   private function get_preview_crowdfunding(){
      $query_args = [
         'post_type'          => 'product',
         'posts_per_page'     => 30,
         'numberposts'        => 30,
         'post_status'        => 'publish',
         'orderby'            => 'ID',
         'order'              => 'desc'
      ];
      $taxquery = array(
         array(
            'taxonomy' => 'product_type',
            'field' => 'slug',
            'terms' => 'crowdfunding'
         )
      );
      $taxquery[] = array(
         'taxonomy' => 'product_visibility',
         'field'    => 'name',
         'terms'    => 'exclude-from-catalog',
         'operator' => 'NOT IN',
      );
      $query_args['tax_query'] = $taxquery;

      $query = new WP_Query($query_args);
      $posts = array();
       foreach ($query->posts as $post) {
         $posts[$post->ID] = $post->post_title;
      }
      wp_reset_postdata();
      return $posts;
   }

   public function controls(Document $document){

      $document->remove_control('hide_title');
      $document->remove_control('template');
      $document->remove_control('template_default_description');

      $document->start_injection([ 'of' => 'post_status' ]);

      $post = $this->get_current_post($document);
      
      if($post && $post->post_type === 'gva__template'){

         $template_type = get_post_meta( $post->ID, 'gva_template_type', true );
         if($template_type == 'header_layout'){
            $document->add_control(
               'qizon_header_position',
               [
                  'label'     => esc_html__('Header Position', 'qizon-themer'),
                  'type'      => Controls_Manager::SELECT,
                  'options'   => array(
                     'relative'  => esc_html__('Relative', 'qizon-themer'),
                     'absolute'  => esc_html__('Absolute', 'qizon-themer'),
                  ),
                  'default' => 'relative',
               ]
            );
            $document->add_control(
               'header_background_black',
               [
                  'label' => esc_html__('Background Black Demo', 'qizon-themer'),
                  'type' => Controls_Manager::SWITCHER,
                  'return_value' => '1',
                  'default' => '0',
               ]
            );
         }

         $posts_preview = '';
         $show_preview = false;
         if($template_type == 'post_single_layout'){
            $posts_preview = $this->get_preview_posts('post');
            $show_preview = true;
         }

         if($template_type == 'givewp_layout'){
            $posts_preview = $this->get_preview_posts('give_forms');
            $show_preview = true;
         }

         if($template_type == 'single_crowdfunding_layout'){
            $posts_preview = $this->get_preview_crowdfunding();
            $show_preview = true;
         }
         
         if($show_preview){
            $document->add_control(
               'qizon_post_preview',
               [
                  'label'     => esc_html__('Preview Content', 'qizon-themer'),
                  'type'      => Controls_Manager::SELECT,
                  'options'   => $posts_preview,
               ]
            );
         }
      }

      $document->end_injection();

   }

}

new GVA_Layout_Elementor();