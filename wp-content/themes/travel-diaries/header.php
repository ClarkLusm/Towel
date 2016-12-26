<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travel_Diaries
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    
	<header id="masthead" class="site-header" role="banner">
		
        <div class="header-t">
			<div class="container">
				<div id="mobile-header">
    				<a id="top-menu-button" href="#top-menu"><span class="fa fa-bars"></span></a>
				</div>
				<?php if( has_nav_menu( 'secondary' ) ){ ?>
                <nav class="top-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu', 'fallback_cb' => false ) ); ?>
				</nav>
				<?php } 
                if( get_theme_mod( 'travel_diaries_ed_social' ) ) do_action( 'travel_diaries_social' ); 
                ?>
                
			</div><!-- .container -->
		</div><!-- .header-t -->
        
        <div class="header-b">
			<div class="container">
            
                <div class="site-branding">
        			
                    <?php 
                    if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                        the_custom_logo();
                    }
                    ?>
                    
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        			
                    <?php
            			$description = get_bloginfo( 'description', 'display' );
            			if ( $description || is_customize_preview() ) : ?>
            				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
        			<?php
                        endif; 
                    ?>
                    
        		</div><!-- .site-branding -->
            
				<?php if( get_theme_mod( 'travel_diaries_ed_header_info' ) ) do_action( 'travel_diaries_header_info' ); ?>
                
			</div><!-- .container -->
		</div><!-- -->
        
	</header><!-- #masthead -->
    
    <div class="navigation">
		<div class="container">
    		<nav id="site-navigation" class="main-navigation" role="navigation">
    			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    		</nav><!-- #site-navigation -->	
		</div><!-- .container -->
	</div><!-- .navigation -->

<?php if( !is_page_template( 'template-home.php' ) ){?>        
	<div id="content" class="site-content">
        <div class="container">
            <div class="row">
<?php } ?>