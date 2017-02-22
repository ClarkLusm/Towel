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

$ri_args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => ($atts['number'] > 0) ? $atts['number'] : get_option('posts_per_page')
);
if ($atts['cat'] != '') {
    $ri_cat = explode(',', $atts['cat']);
    $ri_args['tax_query'] = array(
        array(
            'taxonomy' => 'portfolio_category',
            'field' => 'id',
            'terms' => $ri_cat
        )
    );
}
if ($atts['post_in'] != '') {
    $ri_args['post__in'] = explode(',', $atts['post_in']);
}
$ri_args['paged'] = (rit_get_query_var('paged')) ? rit_get_query_var('paged') : 1;
$ri_start_timeline = 0;
?>

<div id="portfolio-timeline-layout" class="rit-timeline-layout">
    <?php $ri_the_query = new WP_Query($ri_args);
    if ($ri_the_query->have_posts()):
        while ($ri_the_query->have_posts()):$ri_the_query->the_post();
            global $ri_prev_post_year, $ri_prev_post_month, $ri_post_count;
            $ri_img = get_post_meta(get_the_ID(),'rit_image',true);

            $ri_post_month = get_the_date('n');
            $ri_post_year = get_the_date('o');
            $ri_current_date = get_the_date('o-n');
            ?>
            <?php if ($ri_prev_post_month != $ri_post_month || ($ri_prev_post_month == $ri_post_month && $ri_prev_post_year != $ri_post_year) || $ri_start_timeline == 0) : ?>
                <?php
                $ri_post_count = 1;
                $ri_start_timeline = 1;
                ?>
                <div class="clear"></div>
                <div class="timeline-date"><h3><?php echo get_the_date('F Y'); ?></h3></div>
            <?php endif;
            $ri_classes = 'timeline-box ';
            $ri_classes .= ($ri_post_count % 2 == 1 ? 'left' : 'right');
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('rit-news-item col-xs-12 col-sm-6 '. esc_attr($ri_classes)) ?>" >
                
                <?php if($ri_img != null) {?>
            <div class="post-image<?php echo (is_single()) ? ' single-image' : ''; ?>">
                <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo wp_kses(wp_get_attachment_image($ri_img, 'full', false, array( 'class' => 'attachment-full img-responsive' )), array('img'=>array('src'=>array(),'class'=>array(),'alt'=>array(),'width'=>array(),'height'=>array()))); ?></a>
            </div>
            <?php } ?>
            <?php if($ri_img == null) {?>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-image<?php echo (is_single()) ? ' single-image' : ''; ?>">
                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('full-thumb'); ?></a>
                    </div>
                <?php else: ?>
                    <div class="post-image<?php echo (is_single()) ? ' single-image' : ''; ?>">
                        <?php if (get_theme_mod('rit_enable_place_holder', '1') == 1) { ?>
                            <img class="img-placeholder"
                                 src="<?php echo esc_url(get_template_directory_uri() . '/images/placeholder.jpg'); ?>"
                                 alt="<?php echo esc_html(__('Image Placeholder', 'ri-dilo')); ?>"/>
                        <?php } ?>
                    </div>
                <?php  endif;
            }?>
                <div class="rit-news-info rit-timeline-info">

                    <h3 class="title-news"><a href="<?php the_permalink(); ?>" class="hvr-underline-from-center"
                                              title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

                    <p class="info-post">
                       <?php echo get_the_term_list(get_the_ID(), 'portfolio_category', ' ', ' / ', ' '); ?></p>
                </div>
            </article>
            <?php
            $ri_prev_post_year = $ri_post_year;
            $ri_prev_post_month = $ri_post_month;
            $ri_post_count++;
        endwhile;
    endif;
    wp_reset_postdata();
    ?>
</div>