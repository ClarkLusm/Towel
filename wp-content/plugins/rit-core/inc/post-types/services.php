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

if (!class_exists('RIT_Custom_Post_Type_Service')) {
    class RIT_Custom_Post_Type_Service
    {
        public static function &getInstance()
        {
            static $instance;
            if (!isset($instance)) {
                $instance = new RIT_Custom_Post_Type_Service();
            }
            return $instance;
        }

        public function init() {
            add_action('init', array($this, 'register_service'),0);
            add_action('init', array($this, 'register_service_category'));
        }

        public function register_service()
        {
            $labels = array(
                'name' => esc_html__('Services', 'rit-core-language'),
                'singular_name' => esc_html__('Service Item', 'rit-core-language'),
                'add_new' => esc_html__('Add New', 'rit-core-language'),
                'add_new_item' => esc_html__('Add New Service Item', 'rit-core-language'),
                'edit_item' => esc_html__('Edit Service Item', 'rit-core-language'),
                'new_item' => esc_html__('New Service Item', 'rit-core-language'),
                'view_item' => esc_html__('View Service Item', 'rit-core-language'),
                'search_items' => esc_html__('Search Service', 'rit-core-language'),
                'not_found' => esc_html__('No Service items have been added yet', 'rit-core-language'),
                'not_found_in_trash' => esc_html__('Nothing found in Trash', 'rit-core-language'),
                'parent_item_colon' => ''
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'show_in_nav_menus' => true,
                'menu_icon' => 'dashicons-admin-tools',
                'hierarchical' => false,
                'rewrite' => array(
                    'slug' => 'service'
                ),
                'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                    'revisions'
                ),
                'has_archive' => true,
            );

            register_post_type('service', $args);
        }

        public function register_service_category()
        {
            $args = array(
                "label" => esc_html__('Service Categories', 'rit-core-language'),
                "singular_label" => esc_html__('Service Category', 'rit-core-language'),
                'public' => true,
                'hierarchical' => true,
                'show_ui' => true,
                'show_in_nav_menus' => true,
                'args' => array('orderby' => 'term_order'),
                'rewrite' => array(
                    'slug' => 'service_cat',
                    'with_front' => false,
                    'hierarchical' => true,
                ),
                'query_var' => true
            );
            register_taxonomy('service_cat', 'service', $args);
        }
    }

    RIT_Custom_Post_Type_Service::getInstance()->init();
}
