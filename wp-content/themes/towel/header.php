<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title><?php wp_title(); ?></title>
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
      <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
      <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=161141987635003";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <div id="page" class="site">

    <div class="top-bar">
      <div class="container">
        <div class="languages">
          <?php pll_the_languages(array(
              'show_names' => 0,
              'show_flags' => 1,
            )); 
          ?>
        </div>

      <?php do_action('social_links');?>
      <?php dynamic_sidebar( 'top-bar' ); ?>
        
      </div>
    </div>


    <!-- Masthead ============================================= -->
    <header id="header" class="">
    <?php do_action('edge_header_image');?>
      
      <!-- Main Header============================================= -->
      <div class="container">
        <div class="row">
          <div class="main-logo col-xs-3">
            <a href="<?php echo get_home_url(); ?>">
              <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
            </a>
          </div>
            
         <!--  <h3 class="nav-site-title">
            <a href="<?php //echo esc_url(home_url('/'));?>" title="<?php //echo esc_attr(get_bloginfo('name', 'display'));?>"><?php bloginfo('name');?></a>
          </h3>  --><!-- ! .nav-site-title -->
          <!-- Main Nav ============================================= -->
          <?php
            if (has_nav_menu('primary')) { ?>
            <?php $args = array(
              'theme_location'  => 'primary',
              'menu_id'         => 'main-menu',
              'container'       => '',
              'items_wrap'      => '<ul class="menu">%3$s</ul>',
            ); ?>
            <nav class="main-menu col-xs-9">
              <?php wp_nav_menu($args);//extract the content from apperance-> nav menu ?>
            </nav> <!-- end #site-navigation -->
            <?php } else {// extract the content from page menu only ?>
            <nav class="main-menu">
              <?php wp_page_menu(array('menu_class' => 'menu')); ?>
            </nav> <!-- end #site-navigation -->
          <?php } ?>

      </div> <!-- !#sticky_header -->
    </header> <!-- end #masthead -->
    <!-- Main Page Start ============================================= -->
   
      <?php dynamic_sidebar( 'towel_slider_sidebar' ); ?>

      <?php dynamic_sidebar( 'towel_woocommerce_sidebar' ); ?>

      <?php custom_breadcrumbs(); ?>