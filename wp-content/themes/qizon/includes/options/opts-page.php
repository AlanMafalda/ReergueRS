<?php
Redux::setSection($opt_name, array(
   'icon'   => 'el-icon-th-list',
   'title'  => esc_html__('Page Options', 'qizon'),
   'fields' => array(
      array(
         'id'     => 'nf_page_info',
         'type'   => 'info',
         'icon'   => true,
         'raw'    => '<h3 class="margin-bottom-0">' . esc_html__('404 Page Settings', 'qizon') . '</h3>',
      ),
      array(
         'id'        => 'nfpage_image',
         'type'      => 'media',
         'url'       => true,
         'title'     => esc_html__('Image', 'qizon'),
         'default'   => '',
      ),
      array(
         'id'        => 'nfpage_image_width',
         'type'      => 'slider',
         'title'     => esc_html__('Image Width', 'qizon'),
         'default'   => 430,
         'min'       => 50,
         'max'       => 1200,
         'step'      => 5,
         'display_value' => 'text',
      ),
      array(
         'id'        => 'nfpage_title',
         'type'      => 'text',
         'title'     => esc_html__('Title Text', 'qizon'),
         'default'   => esc_html__('OPPS! This Page is Not Found', 'qizon'),
      ),
      array(
         'id'        => 'nfpage_desc',
         'type'      => 'textarea',
         'title'     => esc_html__('Primary Text', 'qizon'),
         'default'   => esc_html('The page requested could not be found. This could be a spelling error in the URL or a removed page.', 'qizon')
      ),
      array(
         'id'        => 'nfpage_btn_title',
         'type'      => 'text',
         'title'     => esc_html__('Button Title', 'qizon'),
         'default'   => esc_html__('Back Homepage', 'qizon'),
      ),
      array(
         'id'        => 'nfpage_btn_link',
         'type'      => 'text',
         'title'     => esc_html__('Button Link', 'qizon'),
         'default'   => '',
      ),
   )
));  