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

if(!function_exists('rit_create_category_tree')){
    function rit_create_category_tree( $parent_id, $array, $level, &$dropdown ) {

        for ( $i = 0; $i < count( $array ); $i ++ ) {
            if ( $array[ $i ]->parent == $parent_id ) {
                $name = str_repeat( '&#8211', $level ) . $array[ $i ]->name;
                $value = $array[ $i ]->slug;
                $dropdown[] = array(
                    'name' => $name,
                    'slug' => $value,
                );
                rit_create_category_tree( $array[ $i ]->term_id, $array, $level + 1, $dropdown );
            }
        }
    }
}

if( !function_exists('vc_field_animation_type')) {
    function vc_field_animation_type($settings, $value) {
        $param_line = '<select name="' . esc_attr($settings['param_name']) . '" class="wpb_vc_param_value dropdown wpb-input wpb-select ' . esc_attr($settings['param_name']) . ' ' . esc_attr($settings['type']) . '">';

        $param_line .= '<option value="">none</option>';

        $param_line .= '<optgroup label="' . esc_html__('Attention Seekers', 'rit-core-language') . '">';
        $options = array("bounce", "flash", "pulse", "rubberBand", "shake", "swing", "tada", "wobble");
        foreach ( $options as $option ) {
            $selected = '';
            if ( $option == $value ) $selected = ' selected="selected"';
            $param_line .= '<option value="' . esc_attr($option) . '"' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        $param_line .= '</optgroup>';

        $param_line .= '<optgroup label="' . esc_html__('Bouncing Entrances', 'rit-core-language') . '">';
        $options = array("bounceIn", "bounceInDown", "bounceInLeft", "bounceInRight", "bounceInUp");
        foreach ( $options as $option ) {
            $selected = '';
            if ( $option == $value ) $selected = ' selected="selected"';
            $param_line .= '<option value="' . esc_attr($option) . '"' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        $param_line .= '</optgroup>';

        $param_line .= '<optgroup label="' . esc_html__('Fading Entrances', 'rit-core-language') . '">';
        $options = array("fadeIn", "fadeInDown", "fadeInDownBig", "fadeInLeft", "fadeInLeftBig", "fadeInRight", "fadeInRightBig", "fadeInUp", "fadeInUpBig");
        foreach ( $options as $option ) {
            $selected = '';
            if ( $option == $value ) $selected = ' selected="selected"';
            $param_line .= '<option value="' . esc_attr($option) . '"' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        $param_line .= '</optgroup>';

        $param_line .= '<optgroup label="' . esc_html__('Flippers', 'rit-core-language') . '">';
        $options = array("flip", "flipInX", "flipInY");//, "flipOutX", "flipOutY");
        foreach ( $options as $option ) {
            $selected = '';
            if ( $option == $value ) $selected = ' selected="selected"';
            $param_line .= '<option value="' . esc_attr($option) . '"' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        $param_line .= '</optgroup>';

        $param_line .= '<optgroup label="' . esc_html__('Lightspeed', 'rit-core-language') . '">';
        $options = array("lightSpeedIn");//, "lightSpeedOut");
        foreach ( $options as $option ) {
            $selected = '';
            if ( $option == $value ) $selected = ' selected="selected"';
            $param_line .= '<option value="' . esc_attr($option ) . '"' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        $param_line .= '</optgroup>';

        $param_line .= '<optgroup label="' . esc_html__('Rotating Entrances', 'rit-core-language') . '">';
        $options = array("rotateIn", "rotateInDownLeft", "rotateInDownRight", "rotateInUpLeft", "rotateInUpRight");
        foreach ( $options as $option ) {
            $selected = '';
            if ( $option == $value ) $selected = ' selected="selected"';
            $param_line .= '<option value="' . esc_attr($option ) . '"' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        $param_line .= '</optgroup>';

        $param_line .= '<optgroup label="' . esc_html__('Sliders', 'rit-core-language') . '">';
        $options = array("slideInDown", "slideInLeft", "slideInRight");//, "slideOutLeft", "slideOutRight", "slideOutUp");
        foreach ( $options as $option ) {
            $selected = '';
            if ( $option == $value ) $selected = ' selected="selected"';
            $param_line .= '<option value="' . esc_attr($option ) . '"' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        $param_line .= '</optgroup>';

        $param_line .= '<optgroup label="' . esc_html__('Specials', 'rit-core-language') . '">';
        $options = array("hinge", "rollIn");//, "rollOut");
        foreach ( $options as $option ) {
            $selected = '';
            if ( $option == $value ) $selected = ' selected="selected"';
            $param_line .= '<option value="' . esc_attr($option ) . '"' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
        }
        $param_line .= '</optgroup>';

        $param_line .= '</select>';

        return $param_line;
    }

}

function rit_multi_select_categories($settings, $value, $taxonomies = 'category'){
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $type = isset($settings['type']) ? $settings['type'] : '';
    $class = isset($settings['class']) ? $settings['class'] : '';
    $categories = get_terms( $taxonomies );
    $categories = array_values($categories);


    $categories_tree = array();

    rit_create_category_tree( 0, $categories, 0, $categories_tree );

    $output = $selected = $ids = '';
    if ( $value !== '' ) {
        $ids = explode( ',', $value );
        $ids = array_map( 'trim', $ids );
    } else {
        $ids = array();
    }
    $output .= '<select class="rit-select-multi-category" multiple="multiple" style="min-width:200px;">';
    foreach($categories_tree as $cat){
        if(in_array($cat['slug'], $ids)){
            $selected = 'selected="selected"';
        } else {
            $selected = '';
        }
        $output .= '<option '.esc_attr($selected).' value="'. esc_attr($cat['slug']) .'">'. $cat['name'] .'</option>';
    }
    $output .= '</select>';

    $output .= "<input type='hidden' name='". esc_attr($param_name) ."' value='".esc_attr( $value) ."' class='wpb_vc_param_value ". esc_attr($param_name) ." ".esc_attr($type) ." ". esc_attr($class) ."'>";
    $output .= '<script type="text/javascript">
							jQuery(".rit-select-multi-category").select({
								placeholder: "Select Categories",
								allowClear: true
							});
							jQuery(".rit-select-multi-category").on("change",function(){
								jQuery(this).next().val(jQuery(this).val());
							});
						</script>';
    return $output;

}

function vc_field_rit_multi_select($settings, $value){
    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
    $type = isset($settings['type']) ? $settings['type'] : '';
    $class = isset($settings['class']) ? $settings['class'] : '';
    $options = isset($settings['value']) ? $settings['value'] : array();

    $output = $selected = $ids = '';

    if ( $value !== '' ) {
        $ids = explode( ',', $value );
        $ids = array_map( 'trim', $ids );
    } else {
        $ids = array();
    }

    $output .= '<select class="rit-select-multi" multiple="multiple" style="min-width:200px;">';
    foreach($options as $name => $val ){

        if(in_array($val, $ids)){
            $selected = 'selected="selected"';
        } else {
            $selected = '';
        }
        $output .= '<option '. esc_attr($selected) .' value="'.esc_attr($val).'">'. esc_html__($name, 'rit-core-language') .'</option>';
    }
    $output .= '</select>';

    $output .= "<input type='hidden' name='". esc_attr($param_name) ."' value='". esc_attr($value) ."' class='wpb_vc_param_value ". esc_attr($param_name)." ".esc_attr($type)." ".esc_attr($class)."'>";
    $output .= '<script type="text/javascript">
							jQuery(".rit-select-multi").select({
								placeholder: "Select Categories",
								allowClear: true
							});
							jQuery(".rit-select-multi").on("change",function(){
								jQuery(this).next().val(jQuery(this).val());
							});
						</script>';
    return $output;
}

function vc_field_post_categories($settings, $value) {
    return rit_multi_select_categories($settings, $value, 'category');
}

function vc_field_portfolio_categories($settings, $value) {
    return rit_multi_select_categories($settings, $value, 'portfolio_category');
}

function vc_field_testimonial_categories($settings, $value) {
    return rit_multi_select_categories($settings, $value, 'testimonial_category');
}

function vc_field_product_categories($settings, $value) {
    return rit_multi_select_categories($settings, $value, 'product_cat');
}
function vc_field_service_categories($settings, $value) {
    return rit_multi_select_categories($settings, $value, 'service_cat');
}
function vc_field_image_radio($settings, $value) {
    $type = isset($settings['type']) ? $settings['type'] : '';
    $class = isset($settings['class']) ? $settings['class'] : '';
    $output = '';
    $width = isset($settings['width']) ? $settings['width'] : '150px';
    $height = isset($settings['height']) ? $settings['height'] : '150px';
    if (count($settings['value']) > 0) {
        foreach ($settings['value'] as $param => $param_val) {
            $border_color = 'white';
            if ($param_val == $value) {
                $border_color = 'green';
            }
            $output .= '<img class="rit-image-radio-' . esc_attr($settings['param_name']) . '" src="' . esc_url($param) . '" data-value="' . esc_attr($param_val) . '" style="width:' . esc_attr($width) . ';height:' . esc_attr($height) . ';border-style: solid;border-width: 5px;border-color: ' . esc_attr($border_color) . ';margin-left: 15px;">';
        }
        $css_option = esc_attr($value);
        $output .= '<select id="sl-' . $settings['param_name']
            . '" name="'
            . $settings['param_name']
            . '" class="wpb_vc_param_value hidden wpb-input wpb-select '
            . $settings['param_name']
            . ' ' . $settings['type']
            . ' ' . $css_option
            . '" data-option="' . $css_option . '">';
        if (is_array($value)) {
            $value = isset($value['value']) ? $value['value'] : array_shift($value);
        }
        if (!empty($settings['value'])) {
            foreach ($settings['value'] as $index => $data) {
                if (is_numeric($index) && (is_string($data) || is_numeric($data))) {
                    $option_value = $data;
                } elseif (is_numeric($index) && is_array($data)) {
                    $option_value = isset($data['value']) ? $data['value'] : array_pop($data);
                } else {
                    $option_value = $data;
                }
                $selected = '';
                $option_value_string = (string)$option_value;
                $value_string = (string)$value;
                if ('' !== $value && $option_value_string === $value_string) {
                    $selected = ' selected="selected"';
                }
                $option_class = str_replace('#', 'hash-', $option_value);
                $output .= '<option class="' . esc_attr($option_class) . '" value="' . esc_attr($option_value) . '"' . $selected . '>'
                    . esc_attr($option_value) . '</option>';
            }
        }
        $output .= '</select>';
        $output .= '<script type="text/javascript">
                            jQuery(document).ready(function() {
							jQuery(".rit-image-radio-' . esc_js($settings['param_name']) . '").on("click",function() {
								jQuery("select.' . esc_js($settings['param_name']) . '").attr("data-option",jQuery(this).data("value"));
								ritSelect(jQuery("#sl-' . esc_js($settings['param_name']) . '"),jQuery(this).data("value"));
							    jQuery(".rit-image-radio-' . esc_js($settings['param_name']) . '").css("border-color", "white");
							    jQuery(this).css("border-color", "green");
							});
                            function ritSelect(select, data) {
                                select.find("option:selected").removeAttr("selected");
                                if (select.find(\'option[value="\' + data + \'"]\')[0]) {
                                    select.find(\'option[value="\' + data + \'"]\').attr("selected", "selected");
                                }
                                else {
                                    select.trigger("change");
                                    select.find(\'option[value="\' + data + \'"]\').attr("selected", "selected");
                                }
                                select.trigger("change");
                            }
                            })
						</script>';
    }

    return $output;
}


if(!function_exists('rit_make_the_plugin_load_at_last_position')){
    function rit_make_the_plugin_load_at_last_position() {
        $plugin_path = explode('/', str_replace('\\', '/', RIT_PLUGIN_PATH));

        $this_plugin = plugin_basename( trim( $plugin_path[count($plugin_path) - 2 ] . '/rit-core.php' ) );

        $active_plugins = get_option('active_plugins');

        $this_plugin_key = array_search($this_plugin, $active_plugins);

        if ($this_plugin_key >= 0) { // if it's 0 it's the plugin on the top of plugin list

            array_splice($active_plugins, $this_plugin_key, 1);

            array_push($active_plugins, $this_plugin);

            update_option('active_plugins', $active_plugins);
        }


    }
}

if (!function_exists('vc_add_shortcode_param')){
    rit_make_the_plugin_load_at_last_position();
}else{
    vc_add_shortcode_param('rit_animation_type', 'vc_field_animation_type');
    vc_add_shortcode_param('rit_post_categories', 'vc_field_post_categories');
    vc_add_shortcode_param('rit_portfolio_categories', 'vc_field_portfolio_categories');
    vc_add_shortcode_param('rit_testimonial_categories', 'vc_field_testimonial_categories');
    vc_add_shortcode_param('rit_product_categories', 'vc_field_product_categories');
    vc_add_shortcode_param('rit_service_categories', 'vc_field_service_categories');
    vc_add_shortcode_param('rit_image_radio', 'vc_field_image_radio');
    vc_add_shortcode_param('rit_multi_select', 'vc_field_rit_multi_select');
}
