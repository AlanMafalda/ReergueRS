<?php
if (!defined('ABSPATH')){ exit; }

$taxonomy_type = 'give_forms_category';
$output = '';
$output .= '<div class="widget widget-givewp-categories">';
   if($settings['hide_title'] != 'yes' && $settings['title_text']){
      $output .= '<h3 class="widget-title"><span>' . $settings['title_text'] . '</span></h3>';
   }
   
   $output .= '<div class="widget-content">';
      $output .= '<ul class="categories-listing">';
         $args_val = array( 'hide_empty=0' );            
         $terms = get_terms( $taxonomy_type, $args_val );
         
         if($terms){   
            foreach($terms as $term){      
               $term_link = get_term_link($term);
               
               if(is_wp_error( $term_link)){
                  continue;
               }
               
               $carrentActiveClass=''; 
            
               if($term->taxonomy == 'category' && is_category()){
                  $thisCat = get_category(get_query_var('cat'),false);
                  if($thisCat->term_id == $term->term_id)
                     $carrentActiveClass='class="active-cat"';
               }
             
               if(is_tax()){
                  $currentTermType = get_query_var( 'taxonomy' );
                  $termId= get_queried_object()->term_id;
                  if(is_tax($currentTermType) && $termId == $term->term_id)
                     $carrentActiveClass='class="active-cat"';
               }
               
               $output .='<li '.$carrentActiveClass.'><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
               if ($settings['hide_count'] != 'yes') {
                  $output .='<span class="post-count">'.$term->count.'</span>';
               }
               $output .='</li>';
            }
         }
      $output .= '</ul>';
   $output .= '</div>';   
$output .= '</div>';   
echo $output;


