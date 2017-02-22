<?php
/**
 * RIT Core Plugin
 * @package     RIT Core
 * @version     2.0.1
 * @author      CleverSoft
 * @link        http://cleversoft.co
 * @copyright   Copyright (c) 2015 CleverSoft
 * @license     GPL v2
 */
?>
<?php
$ri_wrapID = 'shortcode_imgs_gallery_' . ri_random_ID();
$ri_wrapper_class = $atts['el_class'];
$ri_class = '';
if ($atts['layout'] == 'grid' || $atts['layout'] == 'carousel') {
    switch ($atts['columns']) {
        case '1':
            $ri_class .= "col-xs-12";
            break;
        case '2':
            $ri_class .= "col-xs-12 col-sm-6";
            break;
        case '3':
            $ri_class .= "col-xs-12 col-sm-4";
            break;
        case '4':
            $ri_class .= "col-xs-12 col-sm-3";
            break;
        case '5':
            $ri_class .= "col-xs-12 col-sm-1-5";
            break;
        case '6':
            $ri_class .= "col-xs-12 col-sm-2";
            break;
    }
}
$ri_links = $ri_imgs = array();
$ri_imgs = explode(',', $atts['images']);
$ri_links = explode(',', $atts['links']);
if (count($ri_imgs) > 0):
    ?>
<div id="<?php echo esc_attr($ri_wrapID) ?>"
     class="rit-imgs-gallery <?php echo esc_attr($ri_wrapper_class . ' rit-' . $atts['layout'] . '-gallery ') ?>">
    <?php if ($atts['title'] != '') { ?>
    <h2 class="title-block"><?php
        echo esc_html($atts['title']);
        ?></h2>
<?php }
    //Carousel js
    if ($atts['layout'] == 'carousel') {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery("#<?php echo (esc_js($ri_wrapID));?> .wrapper-imgs-gallery").owlCarousel({
                    // Most important owl features
                    items: <?php echo esc_js($atts['rows']=='1'? $atts['columns']: 1) ?>,
                    itemsCustom: false,
                    itemsDesktop: [1199, <?php echo esc_js($atts['rows']=='1'? $atts['columns']: 1) ?>],
                    itemsDesktopSmall: [980, <?php echo esc_js($atts['rows']=='1'? $atts['columns']: 1) ?>],
                    itemsTablet: [768, <?php echo esc_js($atts['rows']=='1'? 2: 1) ?>],
                    itemsTabletSmall: false,
                    itemsMobile: [479, 1],
                    singleItem: false,
                    itemsScaleUp: false,
                    // Navigation
                    pagination: false,
                    navigation: true,
                    navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    rewindNav: true,
                    scrollPerPage: false
                });
            });
        </script>
        <?php
        $ri_maxitem = $atts['columns'] * $atts['rows'];
    }
    //End carousel js
if ($atts['layout'] == 'grid' || $atts['layout'] == 'carousel'){
    ?>
    <div class="row">
    <div class="wrapper-imgs-gallery">
    <?php
}
    $ri_i = $ri_j = 0;
    foreach ($ri_imgs as $ri_img) {
        if (($atts['layout'] == 'carousel' && $atts['rows'] != '1') && $ri_j == 0) {
            echo '<div class="row rit-wrap-gallery-item">';
        }
        ?>
        <div class="rit-gallery-item <?php echo esc_attr($ri_class) ?>">
            <?php
            if (isset($ri_links[$ri_i])){
            ?>
            <a href="<?php echo esc_attr($ri_links[$ri_i]) ?>">
                <?php } ?>
                <?php echo wp_get_attachment_image($ri_img, 'full'); ?>
                <?php
                if (isset($ri_links[$ri_i])){
                ?>
            </a>
        <?php } ?>
        </div>
        <?php
        $ri_i++;
        $ri_j++;
        if (($atts['layout'] == 'carousel' && $atts['rows'] != '1') && ($ri_j == $ri_maxitem || $ri_i == count($ri_imgs))) {
            echo '</div>';
            $ri_j = 0;
        }
    }
if ($atts['layout'] == 'grid' || $atts['layout'] == 'carousel'){
    ?>
    </div>
    </div>
    <?php
}
    ?>
    </div><?php
endif;