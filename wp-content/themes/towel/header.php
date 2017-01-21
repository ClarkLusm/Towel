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
    <div id="page" class="site">

    <div class="top-bar">
      <div class="container">

      <p style="float:left;color:#333;line-height:60px;margin:0">Free shipping on orders over $100. </p>

      <?php do_action('social_links');?>
      <?php dynamic_sidebar( 'top-bar' ); ?>
        
      </div>
    </div>


    <!-- Masthead ============================================= -->
    <header id="header" class="">
    <?php do_action('edge_header_image');?>
      
      <!-- Main Header============================================= -->
      <div class="container">
          <div class="menu-toggle">     
            <div class="line-one"></div>
            <div class="line-two"></div>
            <div class="line-three"></div>
          </div>
          <!-- end .menu-toggle -->

          <div class="main-logo">
            <a href="">
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
            <nav class="main-menu">
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
    <div id="content">
        
      <?php dynamic_sidebar( 'towel_slider_sidebar' ); ?>

      <?php dynamic_sidebar( 'towel_woocommerce_sidebar' ); ?>