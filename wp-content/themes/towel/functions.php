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
  require get_template_directory() . '/inc/widgets/widgets-functions/widget-google-map.php';


  /***************************************************************************************/
  require( get_template_directory() . '/inc/settings/towel-functions.php' );

  /************************ Towel Customizer  *****************************/
  function towel_customize_register( $wp_customize ) {

    require get_template_directory() . '/inc/customizer/functions/social-icons.php';
  }
  add_action( 'customize_register', 'towel_customize_register' );

  /***************************************************************************************/

  add_action( 'admin_menu', 'my_plugin_menu' );

  function my_plugin_menu() {
    add_options_page( 
      'My Options',
      'Homepage Setting',
      'manage_options',
      'my-plugin.php',
      'home_option'
      );
  }

  function home_option(){
    if(isset($_POST['title'])){
      add_option( 'title_home', $_POST['title']);
    }
    $title = get_option('title_home');
    ?>
    <form method="post" action="">
      <input type="text" name="title" value="<?php echo $title?>">
      <input type="submit" name="">
    </form>
    <?php
  }

// Breadcrumbs
  function custom_breadcrumbs() {

  // Settings
    $separator          = '/';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Homepage';
    $post_type          = get_post_type();
    
  // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
    
  // Get the query & post information
    global $post,$wp_query;
    
  // Do not display on the homepage
    if ( !is_front_page() ) {

      // Build the breadcrums
      echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . ' ' . $post_type . '">';
      
      if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

        echo '<li class="item-current item-archive">' . post_type_archive_title($separator, false) . '</li>';
        
      } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

        // If it is a custom post type display name and link
        if($post_type && $post_type != 'post') {

          $post_type_object = get_post_type_object($post_type);
          $post_type_archive = get_post_type_archive_link($post_type);
          // var_dump($post_type);die;
          
          echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
          echo '<li class="separator"> ' . $separator . ' </li>';
          
        }
        
        $custom_tax_name = get_queried_object()->name;
        echo '<li class="item-current item-archive">' . $custom_tax_name . '</li>';
        
      } else if ( is_single() ) {

          // If post is a custom post type
        $post_type = get_post_type();
        
          // If it is a custom post type display name and link
        if($post_type != 'post') {

          $post_type_object = get_post_type_object($post_type);
          $post_type_archive = get_post_type_archive_link($post_type);
          
          echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
          echo '<li class="separator"> ' . $separator . ' </li>';
          
        }
        
          // Get post category info
        $category = get_the_category();
        
        if(!empty($category)) {
          // Get last category post is in
          $values = array_values($category);
          $last_category = end($values);
          
              // Get parent any categories and create array
          $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
          $cat_parents = explode(',',$get_cat_parents);
          
              // Loop through parent categories and store in variable $cat_display
          $cat_display = '';
          foreach($cat_parents as $parents) {
            $cat_display .= '<li class="item-cat">'.$parents.'</li>';
            $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
          }
          
        }
        
          // If it's a custom post type within a custom taxonomy
        $taxonomy_exists = taxonomy_exists($custom_taxonomy);
        if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

          $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
          $cat_id         = $taxonomy_terms[0]->term_id;
          $cat_nicename   = $taxonomy_terms[0]->slug;
          $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
          $cat_name       = $taxonomy_terms[0]->name;
          
        }
        
          // Check if the post is in a category
        if(!empty($last_category)) {
          echo $cat_display;
          echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
          
          // Else if post is in a custom taxonomy
        } else if(!empty($cat_id)) {

          echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
          echo '<li class="separator"> ' . $separator . ' </li>';
          echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
          
        } else {

          echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
          
        }
        
      } else if ( is_category() ) {

          // Category page
        echo '<li class="item-current item-cat">' . single_cat_title('', false) . '</li>';
        
      } else if ( is_page() ) {

          // Standard page
        if( $post->post_parent ){

              // If child page, get parents 
          $anc = get_post_ancestors( $post->ID );
          
              // Get parents in the right order
          $anc = array_reverse($anc);
          
              // Parent page loop
          if ( !isset( $parents ) ) $parents = null;
          foreach ( $anc as $ancestor ) {
            $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
            $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
          }
          
              // Display parent pages
          echo $parents;
          
              // Current page
          echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
          
        } else {

              // Just display current page if not parents
          echo '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
          
        }
        
      } else if ( is_tag() ) {

          // Tag page

          // Get tag information
        $term_id        = get_query_var('tag_id');
        $taxonomy       = 'post_tag';
        $args           = 'include=' . $term_id;
        $terms          = get_terms( $taxonomy, $args );
        $get_term_id    = $terms[0]->term_id;
        $get_term_slug  = $terms[0]->slug;
        $get_term_name  = $terms[0]->name;
        
          // Display the tag name
        echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '">' . $get_term_name . '</li>';
        
      } elseif ( is_day() ) {

          // Day archive

          // Year link
        echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
        echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
        
          // Month link
        echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
        echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
        
          // Day display
        echo '<li class="item-current item-' . get_the_time('j') . '">' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</li>';
        
      } else if ( is_month() ) {

          // Month Archive

          // Year link
        echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
        echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
        
          // Month display
        echo '<li class="item-month item-month-' . get_the_time('m') . '">' . get_the_time('M') . ' Archives</li>';
        
      } else if ( is_year() ) {

          // Display year archive
        echo '<li class="item-current item-current-' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</li>';
        
      } else if ( is_author() ) {

          // Auhor archive

          // Get the author information
        global $author;
        $userdata = get_userdata( $author );
        
          // Display author name
        echo '<li class="item-current item-current-' . $userdata->user_nicename . '">' . 'Author: ' . $userdata->display_name . '</li>';
        
      } else if ( get_query_var('paged') ) {

          // Paginated archives
        echo '<li class="item-current item-current-' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</li>';
        
      } else if ( is_search() ) {

          // Search results page
        echo '<li class="item-current item-current-' . get_search_query() . '">Search results for: ' . get_search_query() . '</li>';
        
      } elseif ( is_404() ) {

          // 404 page
        echo '<li>' . 'Error 404' . '</li>';
      }
      
      echo '</ul>';
    }
  }