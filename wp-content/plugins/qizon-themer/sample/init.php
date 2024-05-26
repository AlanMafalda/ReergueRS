<?php
use Elementor\Plugin;
use Elementor\Core\Settings\Page\Manager as PageManager;

function qizon_themer_path_demo_content(){
  return (__DIR__.'/demo-data/');
}
add_filter('wbc_importer_dir_path', 'qizon_themer_path_demo_content');

//Way to set menu, import revolution slider, and set home page.
function qizon_themer_import_sample($demo_active_import , $demo_directory_path){

	reset($demo_active_import);
	$current_key = key($demo_active_import);
	
	if ( class_exists( 'RevSlider' ) ) {
		$wbc_sliders_array = array( 'slider-01.zip', 'slider-02.zip' );
		$slider = new RevSlider();
		foreach ($wbc_sliders_array as $s) {
			if(file_exists( qizon_themer_path_demo_content() . 'main/'. $s )){
				$slider->importSliderFromPost(true, true, qizon_themer_path_demo_content().'main/'.$s);
			}
		}
	}

	//Setting Menus
	$wbc_menu_array = array( 'main' );
	if( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
		$top_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
		if ( isset( $top_menu->term_id ) ) {
			set_theme_mod( 'nav_menu_locations', array(
				'primary' => $top_menu->term_id
			));
	 	}
	}

	//Set HomePage
	$wbc_home_pages = array(
		'main' => 'Home 1'
	);
	
	if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
		$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
		if (isset($page->ID)) {
			update_option( 'page_on_front', $page->ID );
			update_option( 'show_on_front', 'page' );
		}
	}

	// Import Settings of Elementor
	$options_elementor = maybe_unserialize('a:12:{s:13:"system_colors";a:4:{i:0;a:3:{s:3:"_id";s:7:"primary";s:5:"title";s:7:"Primary";s:5:"color";s:7:"#57ADBF";}i:1;a:3:{s:3:"_id";s:9:"secondary";s:5:"title";s:9:"Secondary";s:5:"color";s:7:"#EA5C5C";}i:2;a:3:{s:3:"_id";s:4:"text";s:5:"title";s:4:"Text";s:5:"color";s:7:"#848493";}i:3;a:3:{s:3:"_id";s:6:"accent";s:5:"title";s:7:"Heading";s:5:"color";s:7:"#21212D";}}s:13:"custom_colors";a:3:{i:0;a:3:{s:3:"_id";s:7:"9e78dc2";s:5:"title";s:10:"Gray Color";s:5:"color";s:7:"#EEF5F7";}i:1;a:3:{s:3:"_id";s:7:"23e11f5";s:5:"title";s:12:"Border Color";s:5:"color";s:7:"#D3E0E4";}i:2;a:3:{s:3:"_id";s:7:"d78bc54";s:5:"title";s:5:"Black";s:5:"color";s:7:"#21212D";}}s:17:"system_typography";a:4:{i:0;a:5:{s:3:"_id";s:7:"primary";s:5:"title";s:7:"Primary";s:21:"typography_typography";s:6:"custom";s:22:"typography_font_family";s:6:"Roboto";s:22:"typography_font_weight";s:3:"600";}i:1;a:5:{s:3:"_id";s:9:"secondary";s:5:"title";s:9:"Secondary";s:21:"typography_typography";s:6:"custom";s:22:"typography_font_family";s:11:"Roboto Slab";s:22:"typography_font_weight";s:3:"400";}i:2;a:5:{s:3:"_id";s:4:"text";s:5:"title";s:4:"Text";s:21:"typography_typography";s:6:"custom";s:22:"typography_font_family";s:6:"Roboto";s:22:"typography_font_weight";s:3:"400";}i:3;a:5:{s:3:"_id";s:6:"accent";s:5:"title";s:6:"Accent";s:21:"typography_typography";s:6:"custom";s:22:"typography_font_family";s:6:"Roboto";s:22:"typography_font_weight";s:3:"500";}}s:17:"custom_typography";a:0:{}s:21:"default_generic_fonts";s:10:"Sans-serif";s:9:"site_name";s:50:"Qizon - Crowdfunding &amp; Charity WordPress Theme";s:16:"site_description";s:27:"Just another WordPress site";s:15:"container_width";a:3:{s:4:"unit";s:2:"px";s:4:"size";i:1200;s:5:"sizes";a:0:{}}s:19:"page_title_selector";s:14:"h1.entry-title";s:15:"activeItemIndex";i:1;s:11:"viewport_md";i:768;s:11:"viewport_lg";i:1025;}', true);
	$active_kit_id = Elementor\Plugin::$instance->kits_manager->get_active_id();
	update_post_meta($active_kit_id, '_elementor_page_settings', $options_elementor);
	update_option('use_extendify_templates', '0');

	update_option( 'elementor_experiment-e_dom_optimization', 'inactive' );
	update_option( 'elementor_experiment-a11y_improvements', 'inactive' );
   update_option( 'elementor_editor_break_lines', '1' );
   update_option( 'elementor_unfiltered_files_upload', '1' );
   update_option( 'elementor_experiment-container', 'inactive' );
   update_option( 'elementor_experiment-e_optimized_assets_loading', 'inactive' );
   update_option( 'elementor_experiment-additional_custom_breakpoints', 'inactive' );
   update_option( 'elementor_experiment-e_swiper_latest', 'inactive' );
   update_option( 'elementor_experiment-e_optimized_css_loading', 'inactive' );
   update_option( 'elementor_experiment-e_font_icon_svg', 'inactive' );

	if( class_exists('Give') ){
		qizon_themer_give_import_meta();
	}

	// Import Settings of Event
	$options_event = maybe_unserialize('a:36:{s:8:"did_init";b:1;s:19:"tribeEventsTemplate";s:7:"default";s:16:"tribeEnableViews";a:3:{i:0;s:4:"list";i:1;s:5:"month";i:2;s:3:"day";}s:10:"viewOption";s:4:"list";s:14:"schema-version";s:8:"6.0.13.1";s:21:"previous_ecp_versions";a:8:{i:0;s:1:"0";i:1;s:5:"6.0.5";i:2;s:7:"6.0.6.2";i:3;s:5:"6.0.9";i:4;s:6:"6.0.10";i:5;s:6:"6.0.11";i:6;s:6:"6.0.12";i:7;s:6:"6.0.13";}s:18:"latest_ecp_version";s:8:"6.0.13.1";s:18:"dateWithYearFormat";s:6:"F j, Y";s:24:"recurrenceMaxMonthsAfter";i:60;s:22:"google_maps_js_api_key";s:39:"AIzaSyDNsicAsP6-VuGtAb1O9riI3oc_NOb7IOU";s:24:"front_page_event_archive";b:0;s:13:"earliest_date";s:19:"2023-01-11 08:00:00";s:11:"latest_date";s:19:"2023-09-11 17:00:00";s:21:"earliest_date_markers";a:1:{i:0;N;}s:19:"latest_date_markers";a:1:{i:0;N;}s:39:"last-update-message-the-events-calendar";s:7:"6.0.6.2";s:15:"stylesheet_mode";s:5:"tribe";s:16:"monthEventAmount";s:1:"3";s:12:"postsPerPage";s:2:"12";s:12:"showComments";b:0;s:20:"tribeDisableTribeBar";b:0;s:21:"dateWithoutYearFormat";s:3:"F j";s:18:"monthAndYearFormat";s:3:"F Y";s:16:"datepickerFormat";s:1:"1";s:17:"dateTimeSeparator";s:3:" @ ";s:18:"timeRangeSeparator";s:3:" - ";s:14:"multiDayCutoff";s:5:"00:00";s:32:"tribe_events_timezones_show_zone";b:0;s:26:"tribe_events_timezone_mode";s:5:"event";s:21:"defaultCurrencySymbol";s:1:"$";s:19:"defaultCurrencyCode";s:3:"USD";s:23:"reverseCurrencyPosition";b:0;s:15:"embedGoogleMaps";b:1;s:19:"embedGoogleMapsZoom";s:2:"10";s:21:"tribeEventsBeforeHTML";s:0:"";s:20:"tribeEventsAfterHTML";s:0:"";}', true);
	update_option('tribe_events_calendar_options', $options_event);

	if (function_exists('is_plugin_active') && is_plugin_active( 'elementor/elementor.php' )) {
		\Elementor\Plugin::$instance->files_manager->clear_cache();
	}
}

add_action('wbc_importer_after_content_import', 'qizon_themer_import_sample', 10, 2);

function qizon_themer_give_import_meta(){
   global $wpdb;

   $insert_query  = "INSERT INTO {$wpdb->formmeta} (form_id, meta_key, meta_value) ";
   
   $form_ids = array(339, 337, 335, 333, 331, 329, 327, 324, 322);
   $thumb_ids = array(237, 236, 235, 234, 233, 232, 231, 230, 229);
   $payment_display = array('onpage', 'modal', 'reveal');
   $earnings = array('8000', '7600', '5800', '6800', '9600');
   foreach ($form_ids as $form_id) {
   	if(get_post_type($form_id) == 'give_forms'){
   		$query_values = [];
		   $post_meta_data = array(
		      '_thumbnail_id' => $thumb_ids[rand(0, 8)],
		      '_give_price_option'			=> 'multi',
		      '_give_donation_levels' 	=> 'a:5:{i:0;a:3:{s:8:"_give_id";a:1:{s:8:"level_id";s:1:"0";}s:12:"_give_amount";s:9:"10.000000";s:10:"_give_text";s:0:"";}i:1;a:3:{s:8:"_give_id";a:1:{s:8:"level_id";s:1:"1";}s:12:"_give_amount";s:9:"25.000000";s:10:"_give_text";s:0:"";}i:2;a:3:{s:8:"_give_id";a:1:{s:8:"level_id";s:1:"2";}s:12:"_give_amount";s:9:"50.000000";s:10:"_give_text";s:0:"";}i:3;a:4:{s:8:"_give_id";a:1:{s:8:"level_id";s:1:"3";}s:12:"_give_amount";s:10:"100.000000";s:10:"_give_text";s:0:"";s:13:"_give_default";s:7:"default";}i:4;a:3:{s:8:"_give_id";a:1:{s:8:"level_id";s:1:"5";}s:12:"_give_amount";s:10:"250.000000";s:10:"_give_text";s:0:"";}}',
		   	'_give_form_earnings'   	=> $earnings[rand(0, 4)],
		   	'_give_goal_option'			=> 'enabled',
		   	'_give_legacy_form_template_settings'	=> 'a:1:{s:16:"display_settings";a:8:{s:13:"display_style";s:7:"buttons";s:15:"payment_display";s:6:"reveal";s:15:"display_content";s:7:"enabled";s:12:"form_content";s:390:"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.";s:12:"reveal_label";s:0:"";s:14:"checkout_label";s:10:"Donate Now";s:20:"form_floating_labels";s:6:"global";s:17:"content_placement";s:14:"give_post_form";}}',
		   	'_give_goal_format'			=> 'amount',
		   	'_give_set_goal'				=> '18000',
		   	'_give_form_template'		=> 'legacy',
		   	'_give_display_style'		=> 'buttons',
		   	'_give_display_content' 	=> 'enabled',
		   	'_give_custom_amount'		=> 'enabled',
		   	'_give_content_placement'	=> 'give_post_form',
		   	// '_give_levels_minimum_amount' => '10',
		   	// '_give_levels_maximum_amount' => '250',
		   	// '_give_set_price'		   		=> '1',
		   	// '_give_custom_amount_range_minimum'	=> '5',
		   	// '_give_custom_amount_range_maximum'	=> '9999',
		   	'_give_form_status'				=> 'open',
		   	//'_give_checkout_label'			=> 'Donate Now',
		   	'_give_form_floating_labels'	=> 'global',
		   	'_give_default_gateway'			=> 'global',
		   	//'_give_custom_amount_text'		=> 'Custom Amount',
		   	'_give_form_content'				=> 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.',
		   	'_give_payment_display'			=> $payment_display[rand(0, 2)]

		   );
		   foreach ( $post_meta_data as $meta_key => $meta_data ) {
		      $query_values[] = "( {$form_id}, '{$meta_key}', '{$meta_data}' ) ";
		   }
		   foreach ( array(1488, 1486, 1487, 1485) as $thumb_id ) {
		      $query_values[] = "( {$form_id}, 'qizon_give_gallery_images', '{$thumb_id}' ) ";
		   }
		   $query_values_string = implode( ' , ', $query_values );
		   $query_import = $insert_query . ' VALUES ' . $query_values_string;
		   $wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->formmeta} WHERE form_id = '%d'", $form_id ) );
		   $wpdb->query( $query_import ); 
   	}
   }
}