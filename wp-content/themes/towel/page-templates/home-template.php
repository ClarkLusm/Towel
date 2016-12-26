<?php
/**
 * Template Name: Home Template
 *
 * Displays the home page template.
 *
 * @package Theme Towel
 * @subpackage Towel
 * @since Towel 1.0
 */

get_header(); ?>

<div id="main">

  <div class="featured-products">

    <?php  
      // $args = array(  
      //   'post_type' => 'product',  
      //   'meta_key' => '_featured',  
      //   'meta_value' => 'yes',  
      //   'posts_per_page' => 1  
      // );  
        
      // $featured_query = new WP_Query( $args );  
            
      // if ($featured_query->have_posts()) :   
      //   while ($featured_query->have_posts()) :   
      //     $featured_query->the_post();  
      //     $product = get_product( $featured_query->post->ID ); 
      //     $image = wp_get_attachment_image_src( get_post_thumbnail_id( $featured_query->post->ID ), 'single-post-thumbnail' );?>

      <!-- <img src="<?php  //echo $image[0]; ?>" data-id="<?php //echo $featured_query->post->ID; ?>"> -->

    <?php
      // Output product information here 

      //var_dump($product);
              
    //   endwhile;  
    // endif;  
        
    // wp_reset_query(); // Remember to reset  

    ?>
    <?php echo do_shortcode("[wpcs id='65']"); ?>

  </div>

  <div id="content">
  <div class="featured-category-product">
  <?php

  $taxonomy     = 'product_cat';
  $orderby      = 'name';  
  $show_count   = 1;      // 1 for yes, 0 for no
  $pad_counts   = 1;      // 1 for yes, 0 for no
  $hierarchical = 1;      // 1 for yes, 0 for no  
  $title        = '';  
  $empty        = 0;

  $args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'hide_empty'   => $empty
  );

  $all_categories = get_categories( $args );
  foreach ($all_categories as $cat) { ?>

  <div class="item col-sm-6">
  <?php
    // var_dump($cat);
    $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
    $image = wp_get_attachment_url( $thumbnail_id );
    if ( $image ) {
      echo '<img src="' . $image . '" alt="" />';
    }
    if($cat->category_parent == 0) {
      $category_id = $cat->term_id;       
      echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';

      $args2 = array(
        'taxonomy'     => $taxonomy,
        'child_of'     => 0,
        'parent'       => $category_id,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
      );
      $sub_cats = get_categories( $args2 );
      if($sub_cats) {
        foreach($sub_cats as $sub_category) {
          // echo  $sub_category->name ;
          var_dump($sub_category);
        }   
      }
    } ?>

  </div>

  <?php      
  }
  ?>

  </div>

  </div>

</div>

<?php get_footer(); ?>