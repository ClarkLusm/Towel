<?php
/**
 * Theme Customizer Functions
 *
 * @package Theme Freesia
 * @subpackage towel
 * @since towel 1.0
 */
$towel_settings = towel_get_theme_options();
/******************** towel SOCIAL ICONS ******************************************/
$wp_customize->add_section( 'towel_social_icons', array(
  'title' => __('Social Icons','towel'),
  'priority' => 400,
  // 'panel' =>'towel_options_panel'
));
$wp_customize->add_setting( 'towel_theme_options[towel_social_facebook]', array(
  'default' => $towel_settings['towel_social_facebook'],
  'sanitize_callback' => 'esc_url_raw',
  'type' => 'option',
  'capability' => 'manage_options'
  )
);
$wp_customize->add_control( 'towel_theme_options[towel_social_facebook]', array(
  'priority' => 410,
  'label' => __( 'Facebook Link', 'towel' ),
  'section' => 'towel_social_icons',
  'type' => 'text',
  )
);
$wp_customize->add_setting( 'towel_theme_options[towel_social_twitter]', array(
  'default' => $towel_settings['towel_social_twitter'],
  'sanitize_callback' => 'esc_url_raw',
  'type' => 'option',
  'capability' => 'manage_options'
  )
);
$wp_customize->add_control( 'towel_theme_options[towel_social_twitter]', array(
  'priority' => 420,
  'label' => __( 'Twitter Link', 'towel' ),
  'section' => 'towel_social_icons',
  'type' => 'text',
  )
);
$wp_customize->add_setting( 'towel_theme_options[towel_social_instagram]', array(
  'default' => $towel_settings['towel_social_instagram'],
  'sanitize_callback' => 'esc_url_raw',
  'type' => 'option',
  'capability' => 'manage_options'
  )
);
$wp_customize->add_control( 'towel_theme_options[towel_social_instagram]', array(
  'priority' => 450,
  'label' => __( 'Instagram Link', 'towel' ),
  'section' => 'towel_social_icons',
  'type' => 'text',
  )
);
$wp_customize->add_setting( 'towel_theme_options[towel_social_googleplus]', array(
  'default' => $towel_settings['towel_social_googleplus'],
  'sanitize_callback' => 'esc_url_raw',
  'type' => 'option',
  'capability' => 'manage_options'
  )
);
$wp_customize->add_control( 'towel_theme_options[towel_social_googleplus]', array(
  'priority' => 470,
  'label' => __( 'Google Plus Link', 'towel' ),
  'section' => 'towel_social_icons',
  'type' => 'text',
  )
);
$wp_customize->add_setting( 'towel_theme_options[towel_social_linkedin]', array(
  'default' => $towel_settings['towel_social_linkedin'],
  'sanitize_callback' => 'esc_url_raw',
  'type' => 'option',
  'capability' => 'manage_options'
  )
);
$wp_customize->add_control( 'towel_theme_options[towel_social_linkedin]', array(
  'priority' => 480,
  'label' => __( 'Linkedin Link', 'towel' ),
  'section' => 'towel_social_icons',
  'type' => 'text',
  )
);
  ?>