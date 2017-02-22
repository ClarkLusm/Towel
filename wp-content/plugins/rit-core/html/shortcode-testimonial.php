<?php
/**
 * RIT Core Plugin
 * @package     RIT Core
 * @version     2.0.3
 * @author      CleverSoft
 * @link        http://cleversoft.co
 * @copyright   Copyright (c) 2015 CleverSoft
 * @license     GPL v2
 */

$ri_args = array(
    'post_type' => 'testimonial',
    'order_by' => $atts['order_by'],
    'posts_per_page' => ($atts['item_count'] > 0) ? $atts['item_count'] : get_option('posts_per_page'),
);
if ($atts['category']) {
    $ri_catid = array();
    foreach (explode(',', $atts['category']) as $ri_catslug) {
        $ri_catid[] .= get_term_by('slug', $ri_catslug, 'testimonial_category')->term_id;
    }
    $ri_args['tax_query'] = array(
        array(
            'taxonomy' => 'testimonial_category',
            'field' => 'id',
            'terms' => $ri_catid,
        )
    );
}
$ri_class = '';
switch ($atts['columns']) {
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
    default:
        $ri_class .= "col-xs-12";
        break;
}
$ri_background = '';
if ($atts['background'] != '') {
    $ri_background = 'background:url(' . wp_get_attachment_image_url($atts['background'], 'full') . ') center center/cover no-repeat';
}
$ri_wrapID = 'testimonial_block_' . ri_random_ID();
?>
<div  id="<?php echo esc_attr($ri_wrapID)?>" class="rit-testimonial-shortcode rit-testimonial <?php echo esc_attr($atts['el_class'] . ' ' . $atts['preset_style'] . ' ');
    echo esc_attr($atts['style']) . '-testimonial' ?>" style="<?php echo esc_attr($ri_background); ?>">
    <?php
    $ri_the_query = new WP_Query($ri_args);
    if ($ri_the_query->have_posts()):
    if ($atts['title'] != '') { ?>
        <h2 class="title-block"><?php echo esc_attr($atts['title']); ?></h2>
    <?php }
    if ($atts['style'] == 'carousel') {
        $ri_item = $atts['columns'];
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                jQuery("<?php echo esc_js('#'.$ri_wrapID); ?> .rit-wrapper-testimonial-block").owlCarousel({
                    // Most important owl features
                    items: '<?php echo esc_js($ri_item) ?>',
                    itemsCustom: false,
                    itemsDesktop: [1199, <?php echo esc_js($ri_item); ?>],
                    itemsDesktopSmall: [980, <?php if($ri_item>2) { echo esc_js($ri_item-1); }else{echo esc_js($ri_item);} ?>],
                    itemsTablet: [768, 2],
                    itemsTabletSmall: false,
                    itemsMobile: [479, 1],
                    singleItem: <?php  echo esc_attr($ri_item==1? 'true':'false'); ?>,
                    itemsScaleUp: false,
                    // Navigation
                    pagination: <?php  echo esc_attr($atts['carousel_pag']=='yes'? 'true':'false'); ?>,
                    navigation: <?php  echo esc_attr($atts['carousel_nav']=='yes'? 'true':'false'); ?>,
                    navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    rewindNav: true,
                    scrollPerPage: false,
                    autoPlay: 3000
                })
            });
        </script>
        <?php
    } ?>
    <div class="rit-wrapper-testimonial-block">
        <?php
        $ri_break = 1;
        if ($atts['rows'] > 1) {
            $ri_break = $atts['rows'] * $atts['columns'];
        }
        $ri_i = 0;
        while ($ri_the_query->have_posts()):$ri_the_query->the_post();
            $ri_i++;
            if ($ri_i == 1 && $ri_break > 1) {
                ?>
                <div class="wrap-rit-testimonial-item">
                <?php
            }
            ?>
            <article id="testimonial-<?php the_ID(); ?>" <?php echo post_class('rit-testimonial-item ' . $ri_class) ?>>
                <?php if ($atts['preset_style'] == 'default') { ?>
                    <div class="rit-testimonial-content">
                        <?php if ($atts['output_type'] == 'excerpt') {
                            echo rit_excerpt($atts['excerpt_length']);
                        } else {
                            the_content();
                        } ?>
                    </div>
                <?php } ?>
                <div class="rit-wrap-author">
                    <div class="rit-wrap-avatar">
                        <?php
                        if ($atts['page_link'] == 'yes' && !$atts['hide_avatar']){
                        ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php }
                            if (get_post_meta(get_the_ID(), 'rit_author_img', true) != '' && !$atts['hide_avatar']) {
                                ?>
                                <img
                                    src="<?php echo wp_get_attachment_image_url(get_post_meta(get_the_ID(), 'rit_author_img', true), 'full') ?>"
                                    alt="<?php the_title(); ?>" class="avatar-circus"/>
                            <?php }
                            if ($atts['page_link'] == 'yes' && !$atts['hide_avatar']){
                            ?>
                        </a> <?php } ?>
                    </div>
                    <div class="rit-wrap-author-info">
                        <h6 class="rit-testimonial-author">
                            <?php
                            if ($atts['page_link'] == 'yes'){
                            ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php
                                }
                                if (get_post_meta(get_the_ID(), 'rit_author', true) != '') {
                                    echo esc_html(get_post_meta(get_the_ID(), 'rit_author', true));
                                }
                                if ($atts['page_link'] == 'yes'){
                                ?>
                            </a> <?php } ?>
                        </h6>
                        <?php
                        if (get_post_meta(get_the_ID(), 'rit_author_des', true) != '') { ?>
                            <div class="rit-testimonial-des special-font"><?php
                                echo esc_html(get_post_meta(get_the_ID(), 'rit_author_des', true)); ?>
                            </div>
                            <?php
                        } ?>
                    </div>
                </div>
                <?php if ($atts['preset_style'] == 'style-1') { ?>
                    <div class="rit-testimonial-content">
                        <?php if ($atts['output_type'] == 'excerpt') {
                            echo rit_excerpt($atts['excerpt_length']);
                        } else {
                            the_content();
                        } ?>
                    </div>
                <?php } ?>
            </article>
            <?php
            if ($ri_i == $ri_break && $ri_break > 1) {
                ?>
                </div>
                <?php
                $ri_i = 0;
            }
        endwhile;
        if ($ri_i != 0 && $ri_break > 1) {
                ?>
                </div>
                <?php
            }
        ?>
    </div>
</div>
<?php
endif;
wp_reset_postdata();