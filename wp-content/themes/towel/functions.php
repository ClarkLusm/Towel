<?php
/**
 * Display all towel functions and definitions
 *
 * @package Lusm Theme
 * @subpackage Towel
 * @since Towel 1.0
 */

/************************************************************************************************/
if ( ! function_exists( 'towel_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function towel_setup() {
  /**
   * Set the content width based on the theme's design and stylesheet.
   */
  global $content_width;
  if ( ! isset( $content_width ) ) {
      $content_width=790;
  }

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on towel, use a find and replace
   * to change 'towel' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'towel', get_template_directory() . '/languages' );


  register_nav_menus( array(
    'primary' => __( 'Main Menu', 'towel' ),
    'socialmenu' => __( 'Social Menu', 'towel'),
    'footermenu' => __( 'Footer Menu', 'towel' ),
  ) );

  $defaults = array(
    'default-image'          => '',
    'width'                  => 300,
    'height'                 => 100,
    'flex-height'            => true,
    'flex-width'             => true,
    'uploads'                => true,
    'random-default'         => false,
    'header-text'            => true,
    'default-text-color'     => '',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
  );
  add_theme_support( 'custom-header', $defaults );

  /* 
  * Enable support for custom logo. 
  *
  */ 
  add_theme_support( 'custom-logo', array(
    'flex-width' => true, 
    'flex-height' => true,
  ) );


  add_action( 'woocommerce_archive_description', 'woocommerce_category_image', 2 );
  function woocommerce_category_image() {
    if ( is_product_category() ){
      global $wp_query;
      $cat = $wp_query->get_queried_object();
      $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
      $image = wp_get_attachment_url( $thumbnail_id );
      if ( $image ) {
        echo '<img src="' . $image . '" alt="" />';
      }
    }
  }
  /**
   * Add support for the Aside Post Formats
   */
  add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'towel_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );

  add_editor_style( 'css/editor-style.css' );

  add_theme_support( 'woocommerce' );

}
endif; // towel_setup
add_action( 'after_setup_theme', 'towel_setup' );

/***************************************************************************************/
if(!function_exists('towel_get_theme_options')):
  function towel_get_theme_options() {
    return wp_parse_args(  get_option( 'towel_theme_options', array() ) );
  }
endif;

/************************ Edge Widgets  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';
require get_template_directory() . '/inc/widgets/widgets-functions/custom-recent-posts-widgets.php';



/***************************************************************************************/
require( get_template_directory() . '/inc/settings/towel-functions.php' );

/************************ Towel Customizer  *****************************/
function towel_customize_register( $wp_customize ) {

  require get_template_directory() . '/inc/customizer/functions/social-icons.php';
}
add_action( 'customize_register', 'towel_customize_register' );

/***************************************************************************************/
