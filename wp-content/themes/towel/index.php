<?php get_header(); ?>
<div id="main">

  <div class="featured-products">

    <?php  
      $args = array(  
          'post_type' => 'product',  
          'meta_key' => '_featured',  
          'meta_value' => 'yes',  
          'posts_per_page' => 1  
      );  
        
      $featured_query = new WP_Query( $args );  
            
      if ($featured_query->have_posts()) :   
        
          while ($featured_query->have_posts()) :   
            
              $featured_query->the_post();  
                
              $product = get_product( $featured_query->post->ID );  ?>
                

      <?php $img_url = $image = wp_get_attachment_image_src( get_post_thumbnail_id( $featured_query->post->ID ), 'single-post-thumbnail' );?>

      <img src="<?php  //echo $image[0]; ?>" data-id="<?php echo $featured_query->post->ID; ?>">

    <?php
              // Output product information here 

              //var_dump($product);
                
          endwhile;  
            
      endif;  
        
      wp_reset_query(); // Remember to reset  

    ?>
  </div>

  <div id="content">

    <?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
      <!-- h1><?php //the_title(); ?></h1>
      <h4>Posted on <?php //the_time('F jS, Y') ?></h4>
      <p><?php //the_content(__('(more...)')); ?></p>
      <hr> <?php //endwhile; else: ?>
      <p><?php //_e('Sorry, no posts matched your criteria.'); ?></p><?php //endif; ?> -->

  </div>

  <?php !is_front_page() ? get_sidebar() : '' ?>

</div>

<?php get_footer(); ?>