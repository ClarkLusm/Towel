<?php get_header(); ?>
<div id="main">

  <div class="container">

    <?php if(!is_front_page()) : ?>
    <div class="row"> 
      <div id="content" class="col-sm-9">
    <?php else : ?>
      <div id="content">
    <?php endif ?>

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <h4>Posted on <?php the_time('F jS, Y') ?></h4>
        <p><?php the_content(__('(more...)')); ?></p>
        <hr> <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
      <?php endif; ?>
    
    <?php if(!is_front_page()) : ?>
      </div>  
      <?php get_sidebar() ?>
    </div>
    
    <?php else : ?>
    </div>
    <?php endif ?>

  </div>

</div>

<?php get_footer(); ?>