<?php $current_lang = pll_current_language() ?>

<?php get_header(); ?>

<div id="main">

  <div class="container">

    <?php if(!is_front_page()) : ?>
    <div class="row"> 
      <div id="content" class="col-sm-9">
    <?php else : ?>
      <div id="content">
    <?php endif ?>

      <?php if (have_posts()) : while (have_posts()) : the_post() ?>
        <h2 class="post-title"><?php the_title(); ?></h2>

        <?php if($current_lang == 'vi') : ?>
        <div class="post-info">
          <span class="created"><i class='fa fa-calendar-o'></i> <?php echo the_time('d/m/y') ?></span>
          <span class="incategory"><i class='fa fa-book'></i> <?php echo the_category('', 'multiple') ?></span>
        </div>
        <p class="content"><?php echo the_content(__('Xem thêm')) ?></p>
        <?php else : ?>

        <div class="post-info">
          <span class="created"><i class='fa fa-calendar-o'></i> <?php echo the_time('F jS, Y') ?></span>
          <span class="incategory"><?php //echo get_the_category() ?></span>
        </div>
        <p class="content"><?php echo the_content(__('Read more')) ?></p>
        <?php endif ?>

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