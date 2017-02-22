<?php

if (!function_exists('rit_shortcode_demo_box')) {
    function rit_shortcode_demo_box($atts)
    {

        $atts = shortcode_atts(
            array(
                'font-type'=>'fontawesome',
                'icon_fontawesome'=>'',
                'icon_openiconic'=>'',
                'icon_typicons'=>'',
                'icon_entypo'=>'',
                'icon_fontawesome'=>'',
                'icon_linecons'=>'',
                'icon_monosocial'=>'',
                'images' => '',
                'title' => '',
                'description' => '',
                'mask_color'=>'#1674D1',
                'link' => '',
                'text_link'=>'',
                'size'=>'default',
            ), $atts);
        return rit_get_template_part('shortcode', 'demo-box', array('atts' => $atts));
    }
}

add_shortcode('rit_demo_box', 'rit_shortcode_demo_box');

add_action('vc_before_init', 'rit_shortcode_demo_box_integrate_vc');

if (!function_exists('rit_shortcode_demo_box_integrate_vc')) {
    function rit_shortcode_demo_box_integrate_vc()
    {
        vc_map(
            array(
                'name' => esc_html__('RIT Demo Box', 'rit-core-language'),
                'base' => 'rit_demo_box',
                'icon' => 'icon-rit',
                'category' => esc_html__('RIT', 'rit-core-language'),
                'description' => esc_html__('Box demo. Display feature of themes, with images or icons', 'rit-core-language'),
                'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => __( 'Icon library', 'rit-core-language' ),
                'value' => array(
                    __( 'Font Awesome', 'rit-core-language' ) => 'fontawesome',
                    __( 'Open Iconic', 'rit-core-language' ) => 'openiconic',
                    __( 'Typicons', 'rit-core-language' ) => 'typicons',
                    __( 'Entypo', 'rit-core-language' ) => 'entypo',
                    __( 'Linecons', 'rit-core-language' ) => 'linecons',
                    __( 'Mono Social', 'rit-core-language' ) => 'monosocial',
                    __( 'Image', 'rit-core-language' ) => 'image',
                ),
                'std'=>'fontawesome',
                'admin_label' => true,
                'param_name' => 'font-type',
                'description' => __( 'Select icon library.', 'rit-core-language' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'rit-core-language' ),
                'param_name' => 'icon_fontawesome',
                'value' => 'fa fa-adjust', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'dependency' => array(
                    'element' => 'font-type',
                    'value' => 'fontawesome',
                ),
                'description' => __( 'Select icon from library.', 'rit-core-language' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'rit-core-language' ),
                'param_name' => 'icon_openiconic',
                'value' => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'type' => 'openiconic',
                    'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'font-type',
                    'value' => 'openiconic',
                ),
                'description' => __( 'Select icon from library.', 'rit-core-language' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'rit-core-language' ),
                'param_name' => 'icon_typicons',
                'value' => 'typcn typcn-adjust-brightness', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'type' => 'typicons',
                    'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'font-type',
                    'value' => 'typicons',
                ),
                'description' => __( 'Select icon from library.', 'rit-core-language' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'rit-core-language' ),
                'param_name' => 'icon_entypo',
                'value' => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'type' => 'entypo',
                    'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'font-type',
                    'value' => 'entypo',
                ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'rit-core-language' ),
                'param_name' => 'icon_linecons',
                'value' => 'vc_li vc_li-heart', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'type' => 'linecons',
                    'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'font-type',
                    'value' => 'linecons',
                ),
                'description' => __( 'Select icon from library.', 'rit-core-language' ),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => __( 'Icon', 'rit-core-language' ),
                'param_name' => 'icon_monosocial',
                'value' => 'vc-mono vc-mono-fivehundredpx', // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false, // default true, display an "EMPTY" icon?
                    'type' => 'monosocial',
                    'iconsPerPage' => 4000, // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => 'font-type',
                    'value' => 'monosocial',
                ),
                'description' => __( 'Select icon from library.', 'rit-core-language' ),
            ),
            array(
                        'type' => 'colorpicker',
                        'heading' => esc_html__('Mask color', 'rit-core-language'),
                        'value' => '#1674D1',
                        'param_name' => 'mask_color',
                        'description' => esc_html__('Mask color background for image.', 'rit-core-language'),

                    ),
            array(
                'type' => 'attach_images',
                'heading' => esc_html__('Images', 'rit-core-language'),
                'value' => '',
                'param_name' => 'images',
            ),

                    array(
                        'type' => 'dropdown',
                        'heading' => __( 'Size', 'rit-core-language' ),
                         'value' => array(
                            esc_html__('Default', 'rit-core-language') => 'default',
                            esc_html__('Mini', 'rit-core-language') => 'mini',
                              esc_html__('Medium', 'rit-core-language') => 'medium',
                               esc_html__('Large', 'rit-core-language') => 'large', 
                        ),
                        'std'=>'default',
                        'admin_label' => true,
                        'param_name' => 'size',
                        'description' => __( 'Select size for icon and image.', 'rit-core-language' ),
                    ),


                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title', 'rit-core-language'),
                        'value' => '',
                        'param_name' => 'title',
                    ),
                     array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Text Link', 'rit-core-language'),
                        'value' => '',
                        'param_name' => 'text_link',

                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link', 'rit-core-language'),
                        'value' => '',
                        'param_name' => 'link',

                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Description', 'rit-core-language'),
                        'value' => '',
                        'param_name' => 'description',
                    ),
                   
                   
                )
            )
        );
    }
}