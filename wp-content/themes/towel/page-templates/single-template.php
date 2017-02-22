<?php
/**
 * Template Name: Single Template
 *
 * Displays the home page template.
 *
 * @package Theme Towel
 * @subpackage Towel
 * @since Towel 1.0
 */

get_header(); ?>
<div id="main">

  <div id="content">
    <div class="container">
      <div class="row">
        
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <h1><?php the_title(); ?></h1>
        <p><?php the_content(__('(more...)')); ?></p>
        <hr> <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        
      <?php endif; ?>
        
      </div>
    </div>

  </div>

</div>

<?php get_footer(); ?>