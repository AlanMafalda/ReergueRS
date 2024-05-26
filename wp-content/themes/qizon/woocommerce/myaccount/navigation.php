<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$logout_url = ( function_exists( 'wc_logout_url' ) ) ? wc_logout_url() : wc_get_endpoint_url( 'customer-logout', '', $my_account_url );
do_action( 'woocommerce_before_account_navigation' );
?>

<div class="myacount__navigation">
   <div class="myacount__navigation-wrap navigation-sticky">
      <div class="myacount__navigation-scroll-wrap" >
         <div class="myacount__navigation-scroll">
            <div class="user-profile">
               <div class="user-image">
                  <?php
                     $current_user_obj = wp_get_current_user();
                     $user_id          = $current_user_obj->ID;
                     echo get_avatar( $user_id, apply_filters( 'wcmp_filter_avatar_size', 120 ) );
                  ?>
               </div>
               <div class="user-info">
                  <div class="username"><?php echo esc_html( $current_user_obj->display_name ); ?></div>
                  <?php if ( isset( $current_user_obj ) && 0 != $current_user_obj->ID ) : ?>
                     <span class="logout"><a href="<?php echo esc_url( $logout_url ); ?>"><?php esc_html_e( 'Logout', 'qizon' ); ?></a></span>
                  <?php endif; ?>
               </div>
            </div>

            <nav class="woocommerce-MyAccount-navigation">
            	<ul>
            		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
            			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
            				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
            			</li>
            		<?php endforeach; ?>
            	</ul>
            </nav>
         </div>
      </div>
   </div>   
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
