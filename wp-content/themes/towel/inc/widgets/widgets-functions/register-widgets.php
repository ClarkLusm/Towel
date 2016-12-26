<?php
/**
 *
 * @package Theme Freesia
 * @subpackage towel
 * @since towel 1.0
 */
/**************** towel REGISTER WIDGETS ***************************************/
add_action('widgets_init', 'towel_widgets_init');
function towel_widgets_init() {

  register_sidebar(array(
      'name' => __('Main Sidebar', 'towel'),
      'id' => 'towel_main_sidebar',
      'description' => __('Shows widgets at Main Sidebar.', 'towel'),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    ));
  register_sidebar(array(
      'name' => __('Slider Siderbar ', 'towel'),
      'id' => 'towel_slider_sidebar',
      'description' => __('Shows widgets on home page.', 'towel'),
      'before_widget' => '<div id="%1$s" class="widget widget_slider">',
      'after_widget' => '</div>',
    ));
  register_sidebar(array(
      'name' => __('WooCommerce Sidebar', 'towel'),
      'id' => 'towel_woocommerce_sidebar',
      'description' => __('Add WooCommerce Widgets Only', 'towel'),
      'before_widget' => '<div id="A%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    ));
  register_sidebar(array(
      'name' => __('WooCommerce Featured Products', 'towel'),
      'id' => 'towel_woocommerce_featured_products',
      'description' => __('Add WooCommerce Widgets Only', 'towel'),
      'before_widget' => '<div id="A%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
    ));
  register_sidebar(array(
      'name' => __('Google Map', 'towel'),
      'id' => 'towel_google_map',
      'description' => __(''),
      // 'before_widget' => '<div id="A%1$s" class="widget %2$s">',
      // 'after_widget' => '</div>',
      // 'before_title' => '<h2 class="widget-title">',
      // 'after_title' => '</h2>',
    ));
  register_sidebar(array(
      'name' => __('Lastest News', 'towel'),
      'id' => 'towel_lastest_news',
      'description' => __(''),
      // 'before_widget' => '<div id="A%1$s" class="widget %2$s">',
      // 'after_widget' => '</div>',
      // 'before_title' => '<h2 class="widget-title">',
      // 'after_title' => '</h2>',
    ));
}
?>