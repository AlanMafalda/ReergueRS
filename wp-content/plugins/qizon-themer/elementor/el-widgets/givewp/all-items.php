<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;


class GVAElement_Give_Forms extends GVAElement_Base{

	const NAME = 'gva-give-forms';
	const TEMPLATE = 'givewp/all-items/';
	const CATEGORY = 'qizon_givewp';

	public function get_categories() {
		return array(self::CATEGORY);
	}

	public function get_name() {
		return self::NAME;
	}

	public function get_title() {
		return __('All GiveWP Forms', 'qizon-themer');
	}

	public function get_keywords() {
		return [ 'donate', 'content', 'carousel', 'grid', 'all', 'give', 'wp', 'forms' ];
	}

	public function get_script_depends() {
		return [
			'swiper',
			'easypiechart',
			'gavias.elements',
		];
	}

	public function get_style_depends() {
		return array('swiper');
	 }

	private function get_categories_list(){
		$categories = array();

		$categories['none'] = __( 'None', 'qizon-themer' );
		$taxonomy = 'give_forms_category';
		$tax_terms = get_terms( $taxonomy );
		if ( ! empty( $tax_terms ) && ! is_wp_error( $tax_terms ) ){
			foreach( $tax_terms as $item ) {
				$categories[$item->term_id] = $item->name;
			}
		}
		return $categories;
	}

	private function get_posts() {
		$posts = array();

		$loop = new \WP_Query( array(
			'post_type' => array('give_forms'),
			'posts_per_page' => -1,
			'post_status'=> array('publish'),
		));

		$posts['none'] = __('None', 'qizon-themer');

		while ( $loop->have_posts() ) : $loop->the_post();
			$id = get_the_ID();
			$title = get_the_title();
			$posts[$id] = $title;
		endwhile;

		wp_reset_postdata();

		return $posts;
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_query',
			[
				'label' => __('Query & Layout', 'qizon-themer'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => __( 'Layout Display', 'qizon-themer' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'carousel',
				'options' => [
					'grid'      		=> __( 'Grid', 'qizon-themer' ),
					'carousel'  		=> __( 'Carousel', 'qizon-themer' )
				]
			]
		);

		$this->add_control(
			'category_ids',
			[
				'label' => __( 'Select By Category', 'qizon-themer' ),
				'type' => Controls_Manager::SELECT2,
				'multiple'    => true,
				'default' => '',
				'options'   => $this->get_categories_list(),
				'condition' => [
               'layout' => ['grid', 'carousel']
            ]
			]
		);

		$this->add_control(
			'post_ids',
			[
				'label' => __( 'Select Individually', 'qizon-themer' ),
				'type' => Controls_Manager::SELECT2,
				'default' => '',
				'multiple'    => true,
				'label_block' => true,
				'options'   => $this->get_posts(),
				'condition' => [
               'layout' => ['grid', 'carousel']
            ]
			]  
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Posts Per Page', 'qizon-themer' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 6,
				'condition' => [
               'layout' => ['grid', 'carousel']
            ]
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'   => __( 'Order By', 'qizon-themer' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'post_date',
				'options' => [
					'post_date'  => __( 'Date', 'qizon-themer' ),
					'post_title' => __( 'Title', 'qizon-themer' ),
					'rand'       => __( 'Random', 'qizon-themer' ),
				],
				'condition' => [
               'layout' => ['grid', 'carousel']
            ]
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => __( 'Order', 'qizon-themer' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => [
					'asc'  => __( 'ASC', 'qizon-themer' ),
					'desc' => __( 'DESC', 'qizon-themer' )
				],
				'condition' => [
               'layout' => ['grid', 'carousel']
            ]
			]
	  );

		$this->add_control(
			'featured',
			[
				'label'     => __('Featured', 'qizon-themer'),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'condition' => [
               'layout' => ['grid', 'carousel']
            ]
			]
		);

		
		$this->add_control(
			'style',
			[
				'label'     => __('Style', 'qizon-themer'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'style-1'           => __( 'Item Style I', 'qizon-themer' ),
					'style-2'           => __( 'Item Style II', 'qizon-themer' ),
					'style-3'           => __( 'Item Style III', 'qizon-themer' )
				],
				'default' => 'style-1',
				'condition' => [
               'layout' => ['grid', 'carousel']
            ]
			]
		);
		$this->add_control(
			'image_size',
			[
				'label'     => __('Image Style', 'qizon-themer'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => $this->get_thumbnail_size(),
				'default'   => 'post-thumbnail',
				'condition' => [
               'layout' => ['grid', 'carousel']
            ]
			]
		);
		$this->add_control(
			'excerpt_words',
			[
				'label'     => __('Excerpt Words', 'qizon-themer'),
				'type'      => 'number',
				'default'   => 15,
				'condition' => [
               'layout' => ['grid', 'carousel']
            ]
			]
		);

		$this->add_control(
			'pagination',
			[
				'label'     => __('Pagination', 'qizon-themer'),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'condition' => [
					'layout' => 'grid'
				]
			]
		);

		$this->end_controls_section();

		$this->add_control_carousel(false, array('layout' => 'carousel'));

		$this->add_control_grid(array('layout' => 'grid'));

	}

	 public static function get_query_args(  $settings ) {
		$defaults = [
			'post_ids' => '',
			'category_ids' => '',
			'orderby' => 'date',
			'order' => 'desc',
			'posts_per_page' => 3,
			'offset' => 0,
		];

		$settings = wp_parse_args( $settings, $defaults );
		$cats = $settings['category_ids'];
		$ids = $settings['post_ids'];

		$query_args = [
			'post_type' => 'give_forms',
			'posts_per_page' => $settings['posts_per_page'],
			'orderby' => $settings['orderby'],
			'order' => $settings['order'],
			'ignore_sticky_posts' => 1,
			'post_status' => 'publish', // Hide drafts/private posts for admins
		];

		if($cats){
			if( is_array($cats) && count($cats) > 0 ){
				$field_name = is_numeric($cats[0]) ? 'term_id':'slug';
				$query_args['tax_query'] = array(
					array(
						'taxonomy' => 'give_forms_category',
						'terms' => $cats,
						'field' => $field_name,
						'include_children' => false
					)
				);
			}
		}

		if($ids){
			if( is_array($ids) && count($ids) > 0 ){
				$query_args['post__in'] = $ids;
				$query_args['orderby'] = 'post__in';
			}
		}

		if(is_singular('give_forms')){
			$current_id = get_the_ID();
			$query_args['post__not_in'] = array($current_id);
		}

		if($settings['featured'] == 'yes'){
			$query_args['meta_query'] = array(
				array(
					'key' => 'qizon_give_featured',
					'value' => true,
					'compare' => '='
				)
			);
		}  

		if(is_front_page()){
			$query_args['paged'] = (get_query_var('page')) ? get_query_var('page') : 1;
		}else{
			$query_args['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}

		return $query_args;
	}

	public function query_posts() {
		$query_args = $this->get_query_args( $this->get_settings() );
		return new WP_Query( $query_args );
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		printf('<div class="gva-element-%s gva-element">', $this->get_name() );
		if(!empty($settings['layout'])){
			include $this->get_template(self::TEMPLATE . $settings['layout'] . '.php');
		}
		print '</div>'; 
	}
	
}

$widgets_manager->register(new GVAElement_Give_Forms());