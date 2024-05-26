<?php 
   use Elementor\Icons_Manager;
   $_rand = wp_rand(6);
   $cols = count($settings['content_tabs']);
?>

<div class="tabs-content-one__single">
   <ul class="nav tabs-content-one__nav" id="tabs-<?php echo esc_attr($_rand) ?>" role="tablist">
      <?php
         $i = 0;
         foreach ($settings['content_tabs'] as $tab){
            $i++;
            $active = $i == 1 ? ' active' : '';
            echo '<li class="tabs-content-one__nav-item cols-'. esc_attr($cols) . '" role="presentation">';
               echo '<a class="tabs-content-one__nav-link' . $active . '" data-bs-toggle="tab" href="#" data-bs-target="#tab-item-'. $_rand . $i . '" role="tab">';
                  echo '<span class="tabs-content-one__nav-title">';
                     echo esc_html($tab['tab_title']);
                  echo '</span>';
               echo '</a>';
            echo '</li>';
         }
      ?>
   </ul>   
   <div class="tabs-content-one__content tab-content">
      <?php 
         $i = 0;
         foreach ($settings['content_tabs'] as $tab){
            $i++;
            $active = $i == 1 ? ' show active' : '';
            echo '<div class="tabs-content-one__panel tab-pane fade ' . $active . '" id="tab-item-'. $_rand . $i . '" tabindex="' . esc_attr($i) . '">';
               echo '<div class="tabs-content-one__tab-content">';
                  
                  if($tab['tab_image']['url']){
                     echo '<div class="tabs-content-one__left">';
                        echo '<div class="tabs-content-one__image">';
                           echo '<img src="' . esc_url($tab['tab_image']['url']) . '" alt="' . esc_html($tab['tab_title']) . '" />';
                        echo '</div>';
                     echo '</div>';
                  }

                  echo '<div class="tabs-content-one__right">';
                     echo '<h3 class="tabs-content-one__title">';
                        echo esc_html($tab['tab_title']);
                     echo '</h3>';
                     echo '<div class="tabs-content-one__desc">';
                        echo $tab['tab_desc'];
                     echo '</div>';
                  echo '</div>';

               echo '</div>';
            echo '</div>';
         }
      ?>
   </div>
</div>
