<?php
/*
 Template Name: Contact
 */

get_header(); ?>

<div id="main">

  <div id="content">
    <div class="container">
      <div class="row">
        
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <p><?php the_content(); ?></p>
        <hr> <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        
      <?php endif; ?>
        
      </div>
    </div>

  </div>

</div>

<?php get_footer(); ?>