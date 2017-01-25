<?php
/**
 * Custom functions
 *
 * @package Theme Freesia
 * @subpackage towel
 * @since towel 1.0
 */


/**************************** SOCIAL MENU *********************************************/
function towel_social_links() { ?>
  <div class="social-links clearfix">
    <?php
    $towel_settings = towel_get_theme_options();
    if( !empty($towel_settings['towel_social_facebook']) ):
      echo '<a target="_blank" href="'.esc_url($towel_settings['towel_social_facebook']).'"><i class="fa fa-facebook"></i></a>';
    endif;
    if( !empty($towel_settings['towel_social_twitter']) ):
      echo '<a target="_blank" href="'.esc_url($towel_settings['towel_social_twitter']).'"><i class="fa fa-twitter"></i></a>';
    endif;
    if( !empty($towel_settings['towel_social_pinterest']) ):
      echo '<a target="_blank" href="'.esc_url($towel_settings['towel_social_pinterest']).'"><i class="fa fa-pinterest-p"></i></a>';
    endif;
    if( !empty($towel_settings['towel_social_dribbble']) ):
      echo '<a target="_blank" href="'.esc_url($towel_settings['towel_social_dribbble']).'"><i class="fa fa-dribbble"></i></a>';
    endif;
    if( !empty($towel_settings['towel_social_instagram']) ):
      echo '<a target="_blank" href="'.esc_url($towel_settings['towel_social_instagram']).'"><i class="fa fa-instagram"></i></a>';
    endif;
    if( !empty($towel_settings['towel_social_flickr']) ):
      echo '<a target="_blank" href="'.esc_url($towel_settings['towel_social_flickr']).'"><i class="fa fa-flickr"></i></a>';
    endif;
    if( !empty($towel_settings['towel_social_googleplus']) ):
      echo '<a target="_blank" href="'.esc_url($towel_settings['towel_social_googleplus']).'"><i class="fa fa-google-plus-official"></i></a>';
    endif;
    if( !empty($towel_settings['towel_social_linkedin']) ):
      echo '<a target="_blank" href="'.esc_url($towel_settings['towel_social_linkedin']).'"><i class="fa fa-linkedin"></i></a>';
    endif;
    if(class_exists('towel_Plus_Features')){
      do_action ('social_Plus_links');
    }
    ?>
  </div><!-- end .social-links -->
<?php }
add_action ('social_links', 'towel_social_links');


/*************************** ENQUEING STYLES AND SCRIPTS ****************************************/
function towel_scripts() {
  $towel_settings = towel_get_theme_options();
  wp_enqueue_style( 'towel-style', get_stylesheet_uri() );
  wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css');
  wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css');
  wp_enqueue_style('bxslider', get_template_directory_uri().'/assets/bxslider/jquery.bxslider.css');
  wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery.min.js');
  wp_enqueue_script('bxslider-js', get_template_directory_uri().'/assets/bxslider/jquery.bxslider.min.js');
  wp_enqueue_script('towel-main', get_template_directory_uri().'/js/towel-main.js', array('jquery'), false, true);
  // wp_enqueue_script('carousel', get_template_directory_uri().'/js/owl.carousel.min.js');
  wp_enqueue_script('customjs', get_template_directory_uri().'/js/custom.js');
  $towel_stick_menu = $towel_settings['towel_stick_menu'];
  if($towel_stick_menu != 1):
    wp_enqueue_script('jquery_sticky', get_template_directory_uri().'/assets/sticky/jquery.sticky.min.js', array('jquery'), false, true);
  wp_enqueue_script('sticky_settings', get_template_directory_uri().'/assets/sticky/sticky-settings.js', array('jquery'), false, true);
  endif;
  
  // wp_style_add_data('towel-ie', 'conditional', 'lt IE 9');
  // if( $towel_settings['towel_responsive'] == 'on' ) {
  //   wp_enqueue_style('towel-responsive', get_template_directory_uri().'/css/responsive.css');
  // }

  /********* Adding Multiple Fonts ********************/
  $towel_googlefont = array();
  array_push( $towel_googlefont, 'Lato:400,700;subset=vietnamese');
  $towel_googlefonts = implode("|", $towel_googlefont);
  wp_register_style( 'towel_google_fonts', '//fonts.googleapis.com/css?family='.$towel_googlefonts);
  wp_enqueue_style( 'towel_google_fonts' );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'towel_scripts' );

function wpcs_frontend_scripts_and_styles() {
  wp_enqueue_style( 'wpcs-owl-carousel-style', get_template_directory_uri() . '/css/owl.carousel.css' );
  wp_enqueue_style( 'wpcs-owl-theme-style', get_template_directory_uri() . '/css/owl.theme.css' );
  wp_enqueue_style( 'wpcs-owl-transitions', get_template_directory_uri() . '/css/owl.transitions.css' );
  wp_enqueue_style( 'wpcs-custom-style', get_template_directory_uri() . '/css/wpcs-styles.css' );
  wp_enqueue_script( 'wpcs-owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js' );
}
add_action( 'wp_enqueue_scripts', 'wpcs_frontend_scripts_and_styles' );

?>
