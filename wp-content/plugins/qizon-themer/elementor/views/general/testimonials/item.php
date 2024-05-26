<?php 
use Elementor\Icons_Manager;
   
$has_icon = ! empty( $item['selected_icon']['value']); 
$style = $settings['style'];
$avatar = (isset($item['testimonial_image']['url']) && $item['testimonial_image']['url']) ? $item['testimonial_image']['url'] : '';
?>
<div class="testimonial-item <?php echo esc_attr($style) ?> elementor-repeater-item-<?php echo $item['_id'] ?>">
   
   <?php if( $style == 'style-1'){ ?>
      <div class="testimonial-one__single">
         <div class="testimonial-one__quote">
            <div class="testimonial-one__stars">
               <i class="fa fa-star"></i>
               <i class="fa fa-star"></i>
               <i class="fa fa-star"></i>
               <i class="fa fa-star"></i>
               <i class="fa fa-star"></i>
            </div>
            <?php echo esc_html($item['testimonial_content']); ?>
            <span class="testimonial-one__quote-icon"><i class="fas fa-quote-right"></i></span>
            <span class="testimonial-one__arrow">
               <span class="first"></span>
               <span class="second"></span>
            </span>
         </div>
         <div class="testimonial-one__meta">
            <?php 
               if($avatar){ 
                  echo '<div class="testimonial-one__image">';
                     echo '<img ' . $this->qizon_get_image_size($avatar) . ' src="' . esc_url($avatar) . '" alt="' . $item['testimonial_name'] . '" />';
                  echo '</div>';
               }
            ?>
            <div class="testimonial-one__information">
               <span class="testimonial-one__name"><?php echo $item['testimonial_name']; ?></span>
               <span class="testimonial-one__job"><?php echo $item['testimonial_job']; ?></span>
            </div>
         </div>
      </div>   
   <?php } ?>  

   <?php if( $style == 'style-2'){ ?>
      <div class="testimonial-two__single">
         <div class="testimonial-two__content">
            <div class="testimonial-two__meta">
               <div class="testimonial-two__meta-left">
                  <?php 
                     if($avatar){ 
                        echo '<div class="testimonial-two__image">';
                           echo '<img ' . $this->qizon_get_image_size($avatar) . ' src="' . esc_url($avatar) . '" alt="' . $item['testimonial_name'] . '" />';
                           echo '<span class="testimonial-two__quote-icon">“</span>';
                        echo '</div>';
                     }
                  ?>
               </div>
               <div class="testimonial-two__meta-right">
                  <div class="testimonial-two__stars">
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                     <i class="fa fa-star"></i>
                  </div>
                  <h4 class="testimonial-two__name"><?php echo $item['testimonial_name']; ?></h4>
                  <div class="testimonial-two__job"><?php echo $item['testimonial_job']; ?></div>
               </div>   
            </div>

            <div class="testimonial-two__quote">
               <?php echo $item['testimonial_content']; ?>
            </div>
            
         </div>
      </div>
   <?php } ?> 

   <?php if( $style == 'style-3'){ ?>
      <div class="testimonial-three__single">
         <div class="testimonial-three__content">
            <div class="testimonial-three__meta">
               <div class="testimonial-three__meta-left">
                  <?php 
                     if($avatar){ 
                        echo '<div class="testimonial-three__image">';
                           echo '<img ' . $this->qizon_get_image_size($avatar) . ' src="' . esc_url($avatar) . '" alt="' . $item['testimonial_name'] . '" />';
                           echo '<span class="testimonial-three__quote-icon">“</span>';
                        echo '</div>';
                     }
                  ?>
               </div>
               <div class="testimonial-three__meta-right">
                  <h4 class="testimonial-three__name"><?php echo $item['testimonial_name']; ?></h4>
                  <div class="testimonial-three__job"><?php echo $item['testimonial_job']; ?></div>
               </div>   
            </div>

            <div class="testimonial-three__quote">
               <?php echo $item['testimonial_content']; ?>
            </div>
            
            <div class="testimonial-three__stars">
               <i class="fa fa-star"></i>
               <i class="fa fa-star"></i>
               <i class="fa fa-star"></i>
               <i class="fa fa-star"></i>
               <i class="fa fa-star"></i>
            </div>

         </div>
      </div>  
   <?php } ?>  

</div>

