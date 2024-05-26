<?php
   use Elementor\Icons_Manager;
   $this->add_render_attribute( 'block', 'class', [ 'gva-user', ' text-' . $settings['align'] ] );
?>

<div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
   <?php 
      if(is_user_logged_in()){
         $user_id = get_current_user_id();
         $user_info = wp_get_current_user();
         $menu_html = '';
         $_random = gaviasthemer_random_id();
         $args = [
            'echo'        => false,
            'menu'        => $settings['menu'],  
            'menu_class'  => 'gva-nav-menu gva-user-menu',
            'menu_id'     => 'menu-' . $_random,
            'container'   => 'div'
         ];
         $menu_html = wp_nav_menu($args);
      ?>
      <div class="login-account">
         <div class="profile">
            <div class="avata">
               <?php  
                  $avatar_url = '';
                  $image_id = get_user_meta( $user_id,'profile_image_id', true );

                  if( $image_id != '' ){
                     $image_src_tmp = wp_get_attachment_image_src( $image_id, 'backer-portfo' );
                     $avatar_url = isset($image_src_tmp[0]) ?  $image_src_tmp[0] : '';
                  }
                  if(empty($avatar_url)){
                     $user_avatar = get_avatar_url($user_id, array('size' => 90));;
                     $avatar_url = !empty($user_avatar) ? $user_avatar : (get_template_directory_uri() . '/images/placehoder-user.jpg');
                  }
               ?>
               <img src="<?php echo esc_url($avatar_url) ?>" alt="<?php echo esc_html($user_info->display_name) ?>">
            </div>
         </div>  
         <div class="user-account" >
            <div class="hi-account"><?php echo esc_html($settings['hi_text']) . $user_info->display_name ?></div>
            <?php echo ($menu_html) ?>
         </div> 
      </div>

   <?php }else{ ?>
      <?php 
         $login_link = site_url('/wp-login.php&redirect_to=' . get_permalink());
         $register_link = site_url('/wp-login.php?action=register&redirect_to=' . get_permalink());
         if(get_option('woocommerce_myaccount_page_id')){
            $myaccount_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
            $register_link = add_query_arg('form', 'register', $myaccount_link);
            $login_link = $myaccount_link;
         }
         $register_link = !empty($settings['register_link']) ? $settings['register_link'] : $register_link;
         $login_link = !empty($settings['login_link']) ? $settings['login_link'] : $login_link;
      ?>
      <div class="login-account without-login">
         <div class="profile">
            <div class="avata-icon">
               <?php if($settings['selected_icon']){ ?>
                  <?php Icons_Manager::render_icon( $settings['selected_icon'], [ 'class' => 'icon', 'aria-hidden' => 'true' ] ); ?>
               <?php } ?>
            </div>
         </div>
        
        <div class="user-account">
            <ul class="my_account_nav_list">
               <li>
                  <a class="login-link" href="<?php echo esc_url($login_link) ?>">
                     <i class="icon far fa-user"></i>
                     <?php echo esc_html__('Login', 'qizon-themer') ?>
                  </a>
               </li>
               <li>
                  <a class="register-link" href="<?php echo esc_url($register_link) ?>">
                     <i class="icon fas fa-user-plus"></i> 
                     <?php echo ($settings['register_text'] ? $settings['register_text'] : "Register"); ?>
                  </a>
               </li>
            </ul>
         </div>

      </div>
         
   <?php } ?>
</div>