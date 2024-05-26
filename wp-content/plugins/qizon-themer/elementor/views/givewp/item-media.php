<?php
if (!defined('ABSPATH')){ exit; }

global $qizon_post;

if (!$qizon_post){ return; }

if ($qizon_post->post_type != 'give_forms'){ return;}

$form_id = $qizon_post->ID;

$style = $settings['style'];
$classes = array();
$classes[] = 'swiper-slider-wrapper';
$classes[] = $settings['space_between'] < 15 ? 'margin-disable': '';
$this->add_render_attribute('wrapper_slider', 'class', $classes);

$video = get_post_meta( $form_id, 'qizon_give_video_url' , true ); 
$attachment_ids = get_post_meta( $form_id, 'qizon_give_gallery_images' , false ); 

$_rand = wp_rand();

$give_color = give_get_meta($form_id, 'qizon_give_color', true);
$style_color = $give_color ? 'style="--give-color:' . esc_attr($give_color) . '"' : '';
?>

<?php if($style == 'style-1'){ ?>
   <div class="giveform-item-media style-default" <?php echo trim($style_color) ?> >
   
      <?php if($attachment_ids && is_array($attachment_ids) && count($attachment_ids) > 0){ ?>
         <div <?php echo $this->get_render_attribute_string('wrapper_slider') ?>>
            <div class="swiper-content-inner">  
               <div class="init-carousel-swiper swiper" data-carousel="<?php echo $this->get_carousel_settings() ?>">
                  <div class="swiper-wrapper">
                     <?php foreach($attachment_ids as $attachment_id){ 
                        echo '<div class="swiper-slide">';
                           echo '<div class="item-image">';
                              echo wp_get_attachment_image($attachment_id, $settings['image_size']);
                           echo '</div>';
                        echo '</div>';
                     } ?>
                  </div>
               </div>
            </div>   
            <div class="swiper-pagination"></div>
            <div class="swiper-nav-next"></div><div class="swiper-nav-prev"></div>
         </div>

      <?php } elseif(has_post_thumbnail($form_id)){
         $image  = get_the_post_thumbnail( $form_id, 'full' );
         echo apply_filters( 'single_give_form_image_html', $image );
      } ?>

      <div class="content-meta gallery-col-<?php echo $settings['ca_items_lg'] ?>">
         <?php 
            if($settings['show_category'] == 'yes'){
               $post_category = ''; $separator = ' '; $output = '';
               $item_cats = get_the_terms( get_the_ID(), 'give_forms_category' );
               if(!empty($item_cats) && !is_wp_error($item_cats)){
                  foreach((array)$item_cats as $item_cat){
                     $output .= '<a href="' . esc_url(get_category_link( $item_cat->term_id )) . '" title="' . esc_attr( sprintf( esc_attr__( "View all campaign in %s", 'qizon' ), $item_cat->name ) ) . '">'.$item_cat->name.'</a>'.$separator;
                  }
                  $post_category = trim($output, $separator);
               }
               echo '<div class="campaign-category">';
                  echo html_entity_decode($post_category);
               echo '</div>'; 
            }
         
            echo '<div class="givewp-media">';
               
               if($attachment_ids && $settings['show_gallery'] == 'yes'){
                  $i = 1;
                  echo '<div class="givewp-gallery">';
                     echo '<div class="lightGallery">';
                        foreach($attachment_ids as $attachment_id){ 
                           echo '<div class="image-item">';
                              $classes = ($i>1) ? 'hidden' : 'zoomGallery';
                              $image_src = wp_get_attachment_image_src($attachment_id, 'full');
                              if( isset($image_src[0]) ){
                                 echo '<a class="'. esc_attr($classes) . '" href="' . esc_url($image_src[0]) . '" data-elementor-lightbox-slideshow="' . esc_attr($_rand) . '">';
                                    if($i == 1){
                                       echo '<span class="icon-expand">';
                                          echo '<i class="qicon-camera-1"></i>';
                                          echo '<span class="count">' . count($attachment_ids) . '</span>';
                                       echo '</span>';   
                                    }
                                 echo '</a>';
                              }  
                              $i = $i + 1;
                           echo '</div>';   
                        }
                     echo '</div>';   
                  echo '</div>';   
               } 

               if($video && $settings['show_video'] == 'yes'){
                  echo '<div class="givewp-video">';
                     echo '<a class="video-link popup-video" href="' . esc_url($video) . '"><i class="qicon-video-camera-2"></i></a>';
                  echo '</div>';
               } 

            echo '</div>';      
         ?>
      </div>  

   <?php  
   }
?>

</div>