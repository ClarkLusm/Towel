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


if (!function_exists('rit_shortcode_portfolio')) {
    function rit_shortcode_portfolio($atts)
    {
        $atts = shortcode_atts(array(
            'title' => '',
            'portfolio_layout' => 'timeline',
            'columns' => '3',
            'img_size' => 'medium',
            'cat' => '',
            'post_in' => '',
            'number' => 8,
            'view_more' => '',
            'view_more_text'=>'View more',
            'pagination' => 'standard',
            'animation_type' => '',
            'el_class' => ''
        ), $atts);

        $layout_type = ($atts['portfolio_layout'] != '') ? $atts['portfolio_layout'] : 'large';

        return rit_get_template_part('shortcode', 'portfolio-' . $layout_type, array('atts' => $atts));
    }
}
add_shortcode('portfolio', 'rit_shortcode_portfolio');

add_action('vc_before_init', 'rit_portfolio_integrate_vc');

if (!function_exists('rit_portfolio_integrate_vc')) {
    function rit_portfolio_integrate_vc()
    {
        vc_map( array(
            'name' => esc_html__('RIT Portfolios', 'rit-core-language'),
            'base' => 'portfolio',
            'category' => esc_html__('RIT', 'rit-core-language'),
            'icon' => 'rit-portfolios',
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Title", 'rit-core-language'),
                    "param_name" => "title",
                    "admin_label" => true,
                    'description' => esc_html__('Enter text used as shortcode title (Note: located above content element)', 'rit-core-language'),
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Portfolio Layout", 'rit-core-language'),
                    "param_name" => "portfolio_layout",
                    'std' => 'timeline',
                    "value" => array(
                        esc_html__('Grid', 'rit-core-language' ) => 'grid',
                        esc_html__('Masonry', 'rit-core-language' ) => 'masonry',
                        esc_html__('Timeline', 'rit-core-language' ) => 'timeline',
                        esc_html__('Carosel', 'rit-core-language' ) => 'carousel'
                    ),
                    "admin_label" => true,
                    'group'=>esc_html__('Layout', 'rit-core-language' ),
                    'description' => esc_html__('Select layout type for display portfolio', 'rit-core-language'),
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Columns", 'rit-core-language'),
                    "param_name" => "columns",
                    'dependency' => Array('element' => 'portfolio_layout', 'value' => array( 'grid','carousel')),
                    'std' => '3',
                    "value" => array(
                        esc_html__('2', 'rit-core-language' ) => '2',
                        esc_html__('3', 'rit-core-language' ) => '3',
                        esc_html__('4', 'rit-core-language' ) => '4',
                        esc_html__('5', 'rit-core-language' ) => '5',
                        esc_html__('6', 'rit-core-language' ) => '6'
                    ),
                    'group'=>esc_html__('Layout', 'rit-core-language' ),
                    'description' => esc_html__('Display portfolio with the number of column', 'rit-core-language'),
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Image size", 'rit-core-language'),
                    "param_name" => "img_size",
                    'std' => 'medium',
                    "value" => array(
                        esc_html__('Thumbnail', 'rit-core-language' ) => 'thumbnail',
                        esc_html__('Medium', 'rit-core-language' ) => 'medium',
                        esc_html__('Large', 'rit-core-language' ) => 'large',
                        esc_html__('Full', 'rit-core-language' ) => 'full',
                    ),
                    'group'=>esc_html__('Layout', 'rit-core-language' ),
                    'description' => esc_html__('Image size of portfolio, optimizer image size for loading.', 'rit-core-language'),
                ),
                array(
                    "type" => "rit_portfolio_categories",
                    "heading" => esc_html__("Category IDs", 'rit-core-language'),
                    "description" => esc_html__("Select category", 'rit-core-language'),
                    "param_name" => "cat",
                    "admin_label" => true,
                    'description' => esc_html__('Select category which you want to get portfolio in', 'rit-core-language'),
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Portfolio IDs", 'rit-core-language'),
                    "description" => esc_html__("comma separated list of portfolio ids", 'rit-core-language'),
                    "param_name" => "post_in"
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Portfolios number", 'rit-core-language'),
                    "param_name" => "number",
                    "value" => '8',
                    'description' => esc_html__('Number of portfolios showing', 'rit-core-language'),
                ),
                array(
                    "type" => "dropdown",
                    "heading" => esc_html__("Pagination", 'rit-core-language'),
                    "param_name" => "pagination",
                    'std' => 'standard',
                    'group'=>esc_html__('Layout', 'rit-core-language' ),
                    "value" => array(
                        esc_html__('Standard', 'rit-core-language' ) => 'standard',
                        esc_html__('Infinite Scroll', 'rit-core-language' ) => 'infinite-scroll',
                        esc_html__('Ajax Load more', 'rit-core-language' ) => 'ajax',
                        esc_html__('None', 'rit-core-language' ) => 'none',
                    )
                ),
                array(
                    "type" => 'checkbox',
                    "heading" => esc_html__("Enable read more", 'rit-core-language'),
                    "param_name" => "view_more",
                    'group'=>esc_html__('Layout', 'rit-core-language' ),
                    'std'=>'',
                    'value' => array(esc_html__('Yes',  'rit-core-language') => 'yes'),
                ),
                array(
                    "type" => 'textfield',
                    "heading" => esc_html__("View more text", 'rit-core-language'),
                    "param_name" => "view_more_text",
                    'dependency' => Array('element' => 'view_more', 'value' => 'yes'),
                    'group'=>esc_html__('Layout', 'rit-core-language' ),
                    'description' => esc_html__('Default is View more', 'rit-core-language'),
                ),
                array(
                    "type" => 'rit_animation_type',
                    "heading" => esc_html__("Animation Type", 'rit-core-language'),
                    "param_name" => "animation_type",
                    'group'=>esc_html__('Layout', 'rit-core-language' ),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__( 'Extra class name', 'rit-core-language' ),
                    'param_name' => 'el_class',
                    'group'=>esc_html__('Layout', 'rit-core-language' ),
                    'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'rit-core-language' )
                )
            )
        ) );
    }
}
