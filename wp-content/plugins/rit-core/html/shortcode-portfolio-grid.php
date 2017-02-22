
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
$ri_catid = array();
if ($atts['cat']) {
    foreach (explode(',', $atts['cat']) as $ri_catslug) {
        $ri_catid[] .= get_term_by('slug', $ri_catslug, 'portfolio_category')->term_id;
    }
    $ri_args['tax_query'] = array(
        array(
            'taxonomy' => 'portfolio_category',
            'field' => 'id',
            'terms' => $ri_catid,
        )
    );
}
if ($atts['post_in'] != '') {
    $ri_args['post__in'] = explode(',', $atts['post_in']);
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
        $ri_class .= "col-xs-12 col-sm-12";
        break;
}
if ($atts['cat'] == '')
    $ri_terms = get_terms('portfolio_category', '');
else {
    if (count($ri_catid) > 0) {
        foreach ($ri_catid as $ri_id) {
            $ri_terms[] = get_term($ri_id, 'portfolio_category');
        }
    }
}

$ri_the_query = new WP_Query($ri_args);
$ri_i = 0;
$ri_wrapID = 'project-block-' . ri_random_ID();
?>

<div id="<?php echo esc_attr($ri_wrapID) ?>" class="rit-portfolio-carousel rit-projects ">
    <div class="wrap-header-projects">
    <?php
    if($atts['title'] != null){
        ?>
        <h2 class="title-block">
            <span><?php echo esc_html($atts['title'])?></span>
        </h2>
    <?php
    }?>
    <?php
    if (!empty($ri_terms) && !is_wp_error($ri_terms)):?>
        <div class="wrap-proj-filter">
            <div id="mobile-proj-filter"><span class="special-font"><?php echo esc_html__('All', 'ri-dilo') ?></span><i class="fa fa-angle-down"></i> </div>
            <ul id="project-filter" class="special-font">
                <?php if (count($ri_terms) > 1) : ?>
                    <li class="active current" data-id="*"><span class="hvr-underline-from-center"><?php echo esc_html__('All', 'ri-dilo') ?></span></li>
                    <?php foreach ($ri_terms as $ri_term) : ?>
                        <li data-filter=".<?php echo esc_attr($ri_term->slug) ?>">
                            <span class="hvr-underline-from-center"><?php echo esc_html($ri_term->name); ?></span>
                        </li>
                        
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    <?php endif; //Filter
    ?>
    </div>
    <?php
    if ($ri_the_query->have_posts()):?>
    <div class="container">
        <ul class="wrap-portfolio portfolioContainer">
        <?php
        while ($ri_the_query->have_posts()): $ri_the_query->the_post();
            $ri_img = get_post_meta(get_the_ID(),'rit_image',true);
            //get list catslug
            $ri_catslug = 'all ';
            $ri_termspost = get_the_terms(get_the_ID(), 'portfolio_category');
            if ($ri_termspost && !is_wp_error($ri_termspost)) :
                foreach ($ri_termspost as $ri_term) :
                    $ri_catslug .= $ri_term->slug . ' ';
                endforeach;
            endif;
            $ri_class .= ' project-item ';
            ?>

            <li id="portfolio-<?php esc_attr(the_ID()); ?>" <?php echo post_class('rit-item '.$ri_class . $ri_catslug); ?> 
                <?php if($atts['animation_type']!=''){?>  data-animation="<?php echo esc_attr($atts['animation_type']) ?>"<?php }?>>
                <div class="wrap-project-item">
                    <div class="wrap-proj-img">
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
                    </div>
                    <div class="proj-info rit-info-grid">
                        <h3 class="title title-post"><a href="<?php the_permalink(); ?>" class="hvr-underline-from-center-img"
                                             title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                        <?php if (!empty($atts['show_date'])) { ?>
                        <span class="post-date"><?php echo esc_html(get_the_date('M, Y')); ?></span>
                            <?php } ?>
                        <h5 class="list-cat"><?php echo get_the_term_list(get_the_ID(), 'portfolio_category', ' ', ' / ', ' '); ?></h5>
                    </div>
                </div>
            </li>
        <?php endwhile; ?>
        <ul>
        </div>
            <?php
    endif;
    wp_reset_postdata(); ?>
</div>
<script type="text/javascript">
(function ($) {
    'use strict';
    $(window).load(function(){
    var $container = $('.portfolioContainer');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
    $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
});
})(jQuery)
</script>
<script>
        jQuery(document).ready(function() {
                var container = jQuery('.wrap-portfolio');
                container.isotope();
                jQuery("#project-filter li").on('click',function(){
                     container.isotope({ filter: jQuery(this).data('filter') });
                      jQuery("#project-filter li").removeClass('active');
                     jQuery(this).addClass('active')
                })
               
        })
</script>





                