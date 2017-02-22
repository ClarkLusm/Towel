<?php



if(!class_exists('RIT_LOADER')){
    class RIT_LOADER{
        public function __construct(){
            add_action('admin_init', array($this, 'rit_admin_script'));
            add_action( 'wp_enqueue_scripts', array($this, 'rit_front_end_script' ));
        }

        function rit_admin_script()
        {
            global $wp_scripts;

            // tell WordPress to load jQuery UI tabs
            wp_enqueue_script('jquery-ui-tabs');

            // get registered script object for jquery-ui
            $ui = $wp_scripts->query('jquery-ui-core');

            // tell WordPress to load the Smoothness theme from Google CDN
            $protocol = is_ssl() ? 'https' : 'http';
            $url = "$protocol://ajax.googleapis.com/ajax/libs/jqueryui/{$ui->ver}/themes/smoothness/jquery-ui.min.css";

            wp_enqueue_style('jquery-ui-smoothness', $url, false, null);

            wp_enqueue_script('rit-isotope-js', RIT_PLUGIN_URL . 'assets/js/isotope.pkgd.min.js', array(), RIT_VERSION, true);

            wp_enqueue_style('rit-admin-css', RIT_PLUGIN_URL . 'assets/css/rit-core-admin.css', array(), RIT_VERSION);
            wp_enqueue_script('rit-admin-js', RIT_PLUGIN_URL . 'assets/js/rit-core-admin.js', array('common', 'jquery', 'media-upload'), RIT_VERSION, true);
        }

        function rit_front_end_script(){
            wp_enqueue_style('animations', RIT_PLUGIN_URL . 'assets/css/rit-animations.css', array(), RIT_VERSION);
            wp_enqueue_style('rit-core-front-css', rit_get_template_dir_url( 'assets/css/rit-core-front.css'), array(), RIT_VERSION);
            wp_enqueue_script('rit-core-front-js', rit_get_template_dir_url( 'assets/js/rit-core-front.js'), array(), RIT_VERSION);
            wp_enqueue_style('rit-blog-css', rit_get_template_dir_url( 'assets/css/blog-style.css'), array(), RIT_VERSION);
            wp_enqueue_style('rit-masonry-css', rit_get_template_dir_url( 'assets/css/rit-masonry.css'), array(), RIT_VERSION);
            wp_enqueue_style('rit-news-css', rit_get_template_dir_url( 'assets/css/rit-news.css'), array(), RIT_VERSION);
            wp_enqueue_script('rit-masonry-js', rit_get_template_dir_url( 'assets/js/masonry.pkgd.min.js'), array(), RIT_VERSION, true);

            wp_register_script('rit-imagesloaded-js',rit_get_template_dir_url( 'assets/js/imagesloaded.pkgd.min.js'), array(), RIT_VERSION, true);
            wp_register_script('rit-infinitescroll-js',rit_get_template_dir_url( 'assets/js/jquery.infinitescroll.min.js'), array(), RIT_VERSION, true);

        }
    }
    new RIT_LOADER();
}
