<?php
/**
 * RIT Core Plugin
 * @package     RIT Core
 * @version     2.0.2
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2015 Zootemplate
 * @license     GPL v2
 */
?>

<div class="rit-demo-box <?php echo esc_attr($atts['font-type'] . '-style')?>">
     <?php 
     $ri_icon = '';
        switch ($atts['font-type']) {
    case 'fontawesome':
        $ri_icon = $atts['icon_fontawesome'];
        break;
    case 'openiconic':
        $ri_icon = $atts['icon_openiconic'];
        break;
    case 'typicons':
         $ri_icon = $atts['icon_typicons'];
        break;
    case 'entypo':
         $ri_icon = $atts['icon_entypo'];
        break;
    case 'linecons':
         $ri_icon = $atts['icon_linecons'];
        break;
    case 'monosocial':
        $ri_icon = $atts['icon_monosocial'];
        break;
    default:
          $ri_icon = $atts['icon_fontawesome'];
        break;
    }
   $ri_size = $atts['size'];
// Enqueue needed icon font.
vc_icon_element_fonts_enqueue( $atts['font-type'] );
    $ri_link = $atts['link'];
    $ri_text_link = $atts['text_link'];
    $ri_title = $atts['title'];
     ?>
     <?php if($atts['images'] != null) { ?>
        <div class="rit_icon_box <?php echo esc_attr('rit-size-'.$ri_size);?>">
            <?php echo wp_get_attachment_image($atts['images'], 'full');?>
        </div>
    <?php } else{ ?>
        <div class="rit_icon_box <?php echo esc_attr('rit-size-'.$ri_size);?>">

            <i class="circus-box <?php echo esc_attr($ri_icon); ?>"></i>
        </div>
        <?php }?>

        <div class="rit-header-demo-box">
        <?php if ($ri_link != null && $ri_text_link != null) { ?>
                <h5 class="title-demo-box">
                    <a href=" <?php echo esc_html($ri_link);?> "><?php echo esc_html($ri_text_link); ?></a>
                </h5>
            <?php } else{?>
                <h5 class="title-demo-box" >
                    <?php echo $ri_title; ?>
                </h5>
            <?php } ?>

                <div class="description">
                    <p><?php echo esc_html($atts['description']) ?></p>
                </div>
        </div>

        <div class="clearfix"></div>
</div>