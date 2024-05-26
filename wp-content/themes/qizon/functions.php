<?php
/**
	*
	* @author     Gaviasthemes Team     
	* @copyright  Copyright (C) 2023 Gaviasthemes. All Rights Reserved.
	* @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
	* 
*/

define('QIZON_THEME_DIR', get_template_directory());
define('QIZON_THEME_URL', get_template_directory_uri());

// Include list of files of theme.
require_once(QIZON_THEME_DIR . '/includes/functions.php'); 
require_once(QIZON_THEME_DIR . '/includes/template.php'); 
require_once(QIZON_THEME_DIR . '/includes/hook.php'); 
require_once(QIZON_THEME_DIR . '/includes/comment.php'); 
require_once(QIZON_THEME_DIR . '/includes/metaboxes.php');
require_once(QIZON_THEME_DIR . '/includes/customize.php'); 
require_once(QIZON_THEME_DIR . '/includes/menu.php'); 
require_once(QIZON_THEME_DIR . '/includes/elementor/hooks.php');

//Load Woocommerce plugin
if(class_exists('WooCommerce')){
	add_theme_support('woocommerce');
	require_once(QIZON_THEME_DIR . '/includes/woocommerce/functions.php'); 
	require_once(QIZON_THEME_DIR . '/includes/woocommerce/hooks.php'); 
}

//Load Give
if(class_exists('Give')){
  require_once(QIZON_THEME_DIR . '/includes/give/hooks.php'); 
}

// Load Redux - Theme options framework
if(class_exists('Redux')){
	require(QIZON_THEME_DIR . '/includes/options/init.php');
	require_once(QIZON_THEME_DIR . '/includes/options/opts-general.php'); 
	require_once(QIZON_THEME_DIR . '/includes/options/opts-footer.php'); 
	require_once(QIZON_THEME_DIR . '/includes/options/opts-styling.php'); 
	require_once(QIZON_THEME_DIR . '/includes/options/opts-page.php'); 
	require_once(QIZON_THEME_DIR . '/includes/options/opts-portfolio.php'); 
	if(class_exists('WooCommerce')){
		require_once(QIZON_THEME_DIR . '/includes/options/opts-woo.php'); 
	}
}

// TGM plugin activation
if (is_admin()) {
	require_once(QIZON_THEME_DIR . '/includes/tgmpa/class-tgm-plugin-activation.php');
	require(QIZON_THEME_DIR . '/includes/tgmpa/config.php');
}
load_theme_textdomain('qizon', get_template_directory() . '/languages');

//-------- Register sidebar default in theme -----------
//------------------------------------------------------
function qizon_widgets_init() {
	register_sidebar(array(
		'name' 				=> esc_html__('Default Sidebar', 'qizon'),
		'id' 					=> 'default_sidebar',
		'description' 		=> esc_html__('Appears in the Default Sidebar section of the site.', 'qizon'),
		'before_widget' 	=> '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h3 class="widget-title"><span>',
		'after_title' 		=> '</span></h3>',
	));

	if(class_exists('WooCommerce')){
		register_sidebar( array(
			'name' 				=> esc_html__('WooCommerce Shop Sidebar', 'qizon'),
			'id' 					=> 'woocommerce_sidebar',
			'description' 		=> esc_html__('Appears in the Plugin WooCommerce section of the site.', 'qizon'),
			'before_widget' 	=> '<aside id="%1$s" class="widget clearfix %2$s">',
			'after_widget'	 	=> '</aside>',
			'before_title' 	=> '<h3 class="widget-title"><span>',
			'after_title' 		=> '</span></h3>',
		));
	}
	register_sidebar(array(
		'name' 				=> esc_html__('After Offcanvas Mobile', 'qizon'),
		'id' 					=> 'offcanvas_sidebar_mobile',
		'description' 		=> esc_html__('Appears in the Offcanvas section of the site.', 'qizon'),
		'before_widget' 	=> '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h3 class="widget-title"><span>',
		'after_title' 		=> '</span></h3>',
	));
	
}
add_action('widgets_init', 'qizon_widgets_init');


function qizon_fonts_url() { 
	$fonts_url = '';
	$fonts     = array();
	$subsets   = '';
	$protocol = is_ssl() ? 'https' : 'http';
	if('off' !== _x('on', 'Lexend Deca font: on or off', 'qizon')){
		$fonts[] = 'Lexend+Deca:wght@300;400;500;600;700;800';
	}
	if($fonts){
		$fonts_url = add_query_arg( array(
			'family' => (implode('&family=', $fonts)),
			'display' => 'swap',
		),  $protocol.'://fonts.googleapis.com/css2');
	}
	return $fonts_url;
}

function qizon_custom_styles() {
	$custom_css = get_option('qizon_theme_custom_styles');
	if($custom_css){
		wp_enqueue_style(
			'qizon-custom-style',
			QIZON_THEME_URL . '/assets/css/custom_script.css'
		);
		wp_add_inline_style('qizon-custom-style', $custom_css);
	}
}
add_action('wp_enqueue_scripts', 'qizon_custom_styles', 9999);

function qizon_init_scripts(){
	global $post;
	$protocol = is_ssl() ? 'https' : 'http';
	if ( is_singular() && comments_open() && get_option('thread_comments') ){
		wp_enqueue_script('comment-reply');
	}

	$theme = wp_get_theme('qizon');
	$theme_version = $theme['Version'];

	wp_enqueue_style('qizon-fonts', qizon_fonts_url(), array(), null );
	
	wp_enqueue_script('bootstrap', QIZON_THEME_URL . '/assets/js/bootstrap.min.js', array('jquery') );
	wp_enqueue_script('jquery-magnific-popup', QIZON_THEME_URL . '/assets/js/magnific/jquery.magnific-popup.min.js');
	wp_enqueue_script('jquery-cookie', QIZON_THEME_URL . '/assets/js/jquery.cookie.js', array('jquery'));
	wp_enqueue_script('swiper', QIZON_THEME_URL . '/assets/js/swiper/swiper.min.js');
	wp_enqueue_script('jquery-appear', QIZON_THEME_URL . '/assets/js/jquery.appear.js');
	wp_enqueue_script('notify', QIZON_THEME_URL . '/assets/js/notify.min.js');
	wp_enqueue_script('sticky-kit', QIZON_THEME_URL . '/assets/js/sticky-kit.js');
	wp_enqueue_script('mcustomscrollbar', QIZON_THEME_URL . '/assets/js/scroll/jquery.mCustomScrollbar.min.js');
	wp_enqueue_script('qizon-main', QIZON_THEME_URL . '/assets/js/main.js', array('imagesloaded', 'jquery-masonry'));
	
	$register_link = class_exists('WooCommerce') ? wc_get_page_permalink('myaccount') : wp_registration_url();
  	$register_html = esc_html__('New here?', 'qizon');
 	$register_html .= '<a class="text-theme" href="' . esc_url($register_link) . '">&nbsp;' . esc_html__('Create an Account', 'qizon') . '</a>';
 	wp_localize_script('qizon-main', 'qizon_data', array(
 		'my_account_link' 		=> $register_html,
 		'check_login'				=> is_user_logged_in() ? 'yes' : 'no',
 		'str_login'					=> esc_html__('Please login to add favorite!', 'qizon'),
 		'str_add_wishlist'		=> esc_html__('Add favorite successfully!', 'qizon'),
 		'str_remove_wishlist'	=> esc_html__('Remove favorite successfully!', 'qizon'),
 	));

	wp_enqueue_style('dashicons');
	wp_enqueue_style('swiper', QIZON_THEME_URL .'/assets/js/swiper/swiper.min.css');
	wp_enqueue_style('magnific', QIZON_THEME_URL .'/assets/js/magnific/magnific-popup.css');
	wp_enqueue_style('mcustomscrollbar', QIZON_THEME_URL . '/assets/js/scroll/jquery.mCustomScrollbar.min.css');
	wp_enqueue_style('fontawesome', QIZON_THEME_URL . '/assets/css/fontawesome/css/all.min.css');
	wp_enqueue_style('qizon-icons', QIZON_THEME_URL . '/assets/css/icons/style.css');

	wp_enqueue_style('qizon-style', QIZON_THEME_URL . '/style.css');
	wp_enqueue_style('bootstrap', QIZON_THEME_URL . '/assets/css/bootstrap.css', array(), $theme_version , 'all'); 
	wp_enqueue_style('qizon-template', QIZON_THEME_URL . '/assets/css/template.css', array(), $theme_version , 'all');
	
	//Woocommerce
	if(class_exists('WooCommerce')){
		wp_dequeue_script('wc-add-to-cart');
		wp_enqueue_script('wc-add-to-cart', QIZON_THEME_URL . '/assets/js/add-to-cart.js' , array('jquery'));
		wp_enqueue_style('qizon-woocoomerce', QIZON_THEME_URL . '/assets/css/woocommerce.css', array(), $theme_version , 'all'); 
	}

	if(class_exists('WPCF\Crowdfunding')){
    	wp_dequeue_style('neo-crowdfunding-css-front');
    	wp_dequeue_style('wpcf_style');
    	wp_enqueue_style('qizon-crowdfunding', QIZON_THEME_URL . '/assets/css/wpcf.css' );
    	
    	$dashboard_url = get_home_url();
		if(get_option('wpneo_crowdfunding_dashboard_page_id')){
		   $dashboard_page_id = get_option('wpneo_crowdfunding_dashboard_page_id');
		   $dashboard_url = get_permalink($dashboard_page_id) . '?page_type=campaign';
		}
		wp_localize_script('qizon-main', 'qizon_jquery_object', array( 
  			'ajax_url' => admin_url( 'admin-ajax.php'),
  			'dashboard_url' => $dashboard_url,
  			'security_nonce' => wp_create_nonce( "qizon-ajax-security-nonce" )
  		));
  	}
  	
  	if(class_exists('Give')){
		wp_enqueue_style('qizon-givwp', QIZON_THEME_URL . '/assets/css/givewp.css', array(), $theme_version , 'all');
  	}
} 
add_action('wp_enqueue_scripts', 'qizon_init_scripts', 999);

