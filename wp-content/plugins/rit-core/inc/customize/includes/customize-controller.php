<?php
/**
 * RIT Core Plugin
 * @package     RIT Core
 * @version     2.0.3
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2015 Zootemplate
 * @license     GPL v2
 */


if (!class_exists('RIT_Customize')) {
    class RIT_Customize
    {
        public $customizers = array();

        public $panels = array();

        public $activeCallbackFunctions = array();

        public function init()
        {
            $this->customizer();
            add_action('customize_controls_enqueue_scripts', array($this, 'rit_customizer_script'));
            add_action('customize_controls_print_scripts', array($this, 'rit_customizer_controls_print_scripts'));
            add_action('customize_register', array($this, 'rit_register_theme_customizer'));
            add_action('customize_register', array($this, 'remove_default_customize_section'), 20);
            RIT_Customize_Import_Export::getInstance();
        }

        public static function &getInstance()
        {
            static $instance;
            if (!isset($instance)) {
                $instance = new RIT_Customize();
            }
            return $instance;
        }

        protected function customizer()
        {
            $this->panels = array(
                
            );

            $this->customizers = array(
                'rit_new_section_social' => array(
                    'title' => esc_html__('Social Profiles', 'rit-core-language'),
                    'description' => '',
                    'priority' => 5,
                    'settings' => array(
                        'rit_social_twitter' => array(
                            'type' => 'text',
                            'label' => esc_html__('Twitter', 'rit-core-language'),
                            'description' => esc_html__('Your Twitter username (no @).', 'rit-core-language'),
                            'priority' => 0,
                            'params' => array(
                                'default' => 'username',
                            ),
                        ),
                        'rit_social_facebook' => array(
                            'type' => 'text',
                            'label' => esc_html__('Facebook', 'rit-core-language'),
                            'description' => esc_html__('Your facebook page/profile url', 'rit-core-language'),
                            'priority' => 1,
                            'params' => array(
                                'default' => 'page/profile-url',
                            ),
                        ),
                        'rit_social_dribbble' => array(
                            'type' => 'text',
                            'label' => esc_html__('Dribbble', 'rit-core-language'),
                            'description' => esc_html__('Your Dribbble username', 'rit-core-language'),
                            'priority' => 2,
                            'params' => array(
                                'default' => 'username',
                            ),
                        ),
                        'rit_social_vimeo' => array(
                            'type' => 'text',
                            'label' => esc_html__('Vimeo', 'rit-core-language'),
                            'description' => esc_html__('Your Vimeo username', 'rit-core-language'),
                            'priority' => 3,
                            'params' => array(
                                'default' => 'username',
                            ),
                        ),
                        'rit_social_tumblr' => array(
                            'type' => 'text',
                            'label' => esc_html__('Tumblr', 'rit-core-language'),
                            'description' => esc_html__('Your Tumblr username', 'rit-core-language'),
                            'priority' => 4,
                            'params' => array(
                                'default' => 'username',
                            ),
                        ),
                        'rit_social_skype' => array(
                            'type' => 'text',
                            'label' => esc_html__('Skype', 'rit-core-language'),
                            'description' => esc_html__('Your Skype username', 'rit-core-language'),
                            'priority' => 5,
                            'params' => array(
                                'default' => 'username',
                            ),
                        ),
                        'rit_social_linkedin' => array(
                            'type' => 'text',
                            'label' => esc_html__('LinkedIn', 'rit-core-language'),
                            'description' => esc_html__('Your LinkedIn page/profile url', 'rit-core-language'),
                            'priority' => 6,
                            'params' => array(
                                'default' => 'page/profile-url',
                            ),
                        ),
                        'rit_social_googleplus' => array(
                            'type' => 'text',
                            'label' => esc_html__('Google+', 'rit-core-language'),
                            'description' => esc_html__('Your Google+ page/profile URL', 'rit-core-language'),
                            'priority' => 7,
                            'params' => array(
                                'default' => 'page/profile-url',
                            ),
                        ),
                        'rit_social_flickr' => array(
                            'type' => 'text',
                            'label' => esc_html__('Flickr', 'rit-core-language'),
                            'description' => esc_html__('Your Flickr page url', 'rit-core-language'),
                            'priority' => 8,
                            'params' => array(
                                'default' => 'page-url',
                            ),
                        ),
                        'rit_social_youTube' => array(
                            'type' => 'text',
                            'label' => esc_html__('YouTube', 'rit-core-language'),
                            'description' => esc_html__('Your YouTube URL', 'rit-core-language'),
                            'priority' => 9,
                            'params' => array(
                                'default' => 'youtube-url',
                            ),
                        ),
                        'rit_social_pinterest' => array(
                            'type' => 'text',
                            'label' => esc_html__('Pinterest', 'rit-core-language'),
                            'description' => esc_html__('Your Pinterest username', 'rit-core-language'),
                            'priority' => 10,
                            'params' => array(
                                'default' => 'username',
                            ),
                        ),
                        'rit_social_foursquare' => array(
                            'type' => 'text',
                            'label' => esc_html__('Foursquare', 'rit-core-language'),
                            'description' => esc_html__('Your Foursqaure URL', 'rit-core-language'),
                            'priority' => 11,
                            'params' => array(
                                'default' => 'url',
                            ),
                        ),
                        'rit_social_instagram' => array(
                            'type' => 'text',
                            'label' => esc_html__('Instagram', 'rit-core-language'),
                            'description' => esc_html__('Your Instagram username', 'rit-core-language'),
                            'priority' => 12,
                            'params' => array(
                                'default' => 'username',
                            ),
                        ),
                        'rit_social_github' => array(
                            'type' => 'text',
                            'label' => esc_html__('GitHub', 'rit-core-language'),
                            'description' => esc_html__('Your GitHub URL', 'rit-core-language'),
                            'priority' => 13,
                            'params' => array(
                                'default' => 'url',
                            ),
                        ),
                        'rit_social_xing' => array(
                            'type' => 'text',
                            'label' => esc_html__('Xing', 'rit-core-language'),
                            'description' => esc_html__('Your Xing URL', 'rit-core-language'),
                            'priority' => 14,
                            'params' => array(
                                'default' => 'url',
                            ),
                        ),
                    )
                ),

            );

        }

        public function rit_customizer_script()
        {
            // Register
            wp_enqueue_style('rit-customize-css', RIT_PLUGIN_URL . 'inc/customize/assets/css/customizer.css', array(), RIT_VERSION);
            wp_enqueue_script('rit-customize-js', RIT_PLUGIN_URL . 'inc/customize/assets/js/customizer.js', array('jquery'), RIT_VERSION, true);

            // Localize
            wp_localize_script('rit-customize-js', 'RIT_Customize_Import_Export_l10n', array(
                'emptyImport' => esc_html__('Please choose a file to import.', 'rit-core-language')
            ));

            // Config
            wp_localize_script('rit-customize-js', 'RIT_Customize_Import_Export_Config', array(
                'customizerURL' => admin_url('customize.php'),
                'exportNonce' => wp_create_nonce('rit-exporting')
            ));
        }

        /**
         * @method controls_print_scripts
         */
        public function rit_customizer_controls_print_scripts()
        {
            global $cei_error;

            if ($cei_error) {
                echo '<script> alert("' . esc_js($cei_error) . '"); </script>';
            }
        }

        public function add_customize($customizers) {
            $this->customizers = array_merge($this->customizers, $customizers);
        }

        public function add_panel($panels) {
            $this->panels = array_merge($this->panels, $panels);
        }

        // magic method for active callback function
        public function __call($func, $params){
            if(in_array($func, $this->activeCallbackFunctions)){
                $controlName = str_replace('_active_callback_function', '', $func);
                $customizeControl = $this->getCustomizeControl($controlName);
                if($customizeControl && isset($customizeControl['dependency']) && count($customizeControl['dependency']) > 0){
                    foreach($customizeControl['dependency'] as $dependency => $values){
                        if(is_array($values) &&  count($values) > 0){
                            $result = false;
                            foreach($values as $val){
                                if ($params[0]->manager->get_setting($dependency)->value() == $val){
                                    $result = true;
                                }
                            }
                            return $result;
                        } elseif ( $params[0]->manager->get_setting($dependency)->value() != $values ) {
                            return false;
                        }
                    }
                }
            }
            return true;
        }

        private function getCustomizeControl($name){
            foreach ($this->customizers as $section => $section_params) {
                foreach ($section_params['settings'] as $setting => $params) {
                    if($setting == $name)
                        return $params;
                }
            }
            return false;
        }

        public function rit_register_theme_customizer()
        {
            global $wp_customize;

            foreach ($this->customizers as $section => $section_params) {

                //add section
                $wp_customize->add_section($section, $section_params);
                if (isset($section_params['settings']) && count($section_params['settings']) > 0) {
                    foreach ($section_params['settings'] as $setting => $params) {

                        if(isset($params['dependency']) && count($params['dependency']) > 0){

                            $callbackFunctionName = $setting.'_active_callback_function';

                            $this->activeCallbackFunctions[] =  $callbackFunctionName;

                            $params['active_callback'] = array($this, $callbackFunctionName);

                            unset($params['dependency']);
                        }

                        //add setting
                        $setting_params = array();
                        if (isset($params['params'])) {
                            $setting_params = $params['params'];
                            unset($params['params']);
                        }

                        $settings_callback_default = array(
                                    'default' => null,
                            		'sanitize_callback' => 'wp_kses_post',
                            		'sanitize_js_callback' => null
                        );
                        $setting_params = array_merge( $settings_callback_default,  $setting_params);

                        $wp_customize->add_setting($setting, $setting_params);


                        //Get class control
                        $class = 'WP_Customize_Control';
                        if (isset($params['class']) && !empty($params['class'])) {
                            $class = 'WP_Customize_' . ucfirst($params['class']) . '_Control';
                            unset($params['class']);
                        }

                        //add params section and settings
                        $params['section'] = $section;
                        $params['settings'] = $setting;

                        //add controll
                        $wp_customize->add_control(
                            new $class($wp_customize, $setting, $params)
                        );
                    }
                }
            }

            foreach($this->panels as $key => $panel){
                $wp_customize->add_panel($key, $panel);
            }

            return;
        }

        public function remove_default_customize_section()
        {
            global $wp_customize;
            // Remove Sections
            //$wp_customize->remove_section('title_tagline');
            $wp_customize->remove_section('nav');
            $wp_customize->remove_section('static_front_page');
            $wp_customize->remove_section('colors');
            $wp_customize->remove_section('background_image');
        }
    }
}