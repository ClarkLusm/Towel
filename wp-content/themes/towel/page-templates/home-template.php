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
    <div class="container">
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
  </div>

  <div id="content">

  <div class="featured-category-product clearfix">
    <div class="container">
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
        // echo '<img src="' . $image . '" alt="" />';
      }
      if($cat->category_parent == 0) {
        $category_id = $cat->term_id;       
        // echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';

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
            // var_dump($sub_category);
          }   
        }
      } 

      ?>

    </div>

    <?php      
    }
    ?>
    </div>
  </div>
  
  <div class="tw-choice-us">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="wrap">
            <div class="icon"><i class="fa fa-diamond"></i></div>
            <h3>Phương châm hoạt động</h3>
            <p>Lorem ipsum Ea consequat occaecat esse dolor Excepteur id incididunt ullamco ut culpa magna ut culpa nostrud sunt cupidatat magna laboris aliqua consequat dolor labore in cupidatat aliqua pariatur tempor ex pariatur non laboris consectetur mollit aute in ex in consequat qui...</p>
            <span>Xem thêm</span>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="wrap">
            <div class="icon"><i class="fa fa-usd"></i></div>
            <h3>Cam kết sản phẩm</h3>
            <p>Lorem ipsum Ea consequat occaecat esse dolor Excepteur id incididunt ullamco ut culpa magna ut culpa nostrud sunt cupidatat magna laboris aliqua consequat dolor labore in cupidatat aliqua pariatur tempor ex pariatur non laboris consectetur mollit aute in ex in consequat qui...</p>
            <span>Xem thêm</span>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="wrap">
            <div class="icon"><i class="fa fa-plane"></i></div>
            <h3>Vận chuyển - Thanh toán</h3>
            <p>Lorem ipsum Ea consequat occaecat esse dolor Excepteur id incididunt ullamco ut culpa magna ut culpa nostrud sunt cupidatat magna laboris aliqua consequat dolor labore in cupidatat aliqua pariatur tempor ex pariatur non laboris consectetur mollit aute in ex in consequat qui...</p>
            <span>Xem thêm</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="tw-about-us">
    <div class="container">
      <h2 class="header-title">Phản hồi khách hàng</h2>
      <div class="avia-testimonial-wrapper">
        <section class="avia-testimonial-row">
          <div class="col-sm-6">
            <div class="avia-testimonial_inner">
              <div class="avia-testimonial-image"><img width="180" height="180" src="http://www.kriesi.at/themes/enfold/files/2013/04/team-1-180x180.jpg" class="attachment-square size-square">
              </div>
              <div class="avia-testimonial-content ">
                <p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</p>
              </div>
              <div class="avia-testimonial-meta">
                <div class="avia-testimonial-arrow-wrap">
                  <div class="avia-arrow"></div>
                </div>
                <div class="avia-testimonial-meta-mini">
                  <strong class="avia-testimonial-name">Martha M. Masters</strong>
                  <span class="avia-testimonial-subtitle ">Marketing</span>
                  <span class="hidden avia-testimonial-markup-link">http://www.wikipedia.com</span> – <a class="aviablank avia-testimonial-link" href="http://www.wikipedia.com">WikiTravel</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="avia-testimonial_inner">
              <div class="avia-testimonial-image">
                <img width="180" height="180" src="http://www.kriesi.at/themes/enfold/files/2013/04/team-7-180x180.jpg" class="attachment-square size-square" alt="Anna Vandana">
              </div>
              <div class="avia-testimonial-content ">
                <p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</p>
              </div>
              <div class="avia-testimonial-meta">
                <div class="avia-testimonial-arrow-wrap">
                  <div class="avia-arrow"></div>
                </div>
                <div class="avia-testimonial-meta-mini"><strong class="avia-testimonial-name">Anna Vandana</strong><span class="avia-testimonial-subtitle ">CEO</span><span class="hidden avia-testimonial-markup-link">http://www.wikipedia.com</span> – <a class="aviablank avia-testimonial-link" href="http://www.wikipedia.com">Media Wiki</a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div style="clear: both;"></div>
        <section class="row">
          <div class="col-sm-6">
            <div class="avia-testimonial_inner">
              <div class="avia-testimonial-image">
                <img width="180" height="180" src="http://www.kriesi.at/themes/enfold/files/2013/04/team-11-180x180.jpg" class="attachment-square size-square" alt="Maxi Milli">
              </div>
              <div class="avia-testimonial-content ">
                <p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
              </div>
              <div class="avia-testimonial-meta">
                <div class="avia-testimonial-arrow-wrap">
                  <div class="avia-arrow"></div>
                </div>
                <div class="avia-testimonial-meta-mini">
                  <strong class="avia-testimonial-name">Maxi Milli</strong>
                  <span class="avia-testimonial-subtitle ">Public Relations</span>
                  <span class="hidden avia-testimonial-markup-link">http://www.wikipedia.com</span> – <a class="aviablank avia-testimonial-link" href="http://www.wikipedia.com">Max Mobilcom</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="avia-testimonial_inner">
              <div class="avia-testimonial-image"><img width="180" height="180" src="http://www.kriesi.at/themes/enfold/files/2013/04/team-5-180x180.jpg" class="attachment-square size-square" alt="Dr. Dosist">
              </div>
              <div class="avia-testimonial-content ">
                <p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</p>
              </div>
              <div class="avia-testimonial-meta">
                <div class="avia-testimonial-arrow-wrap">
                  <div class="avia-arrow"></div>
                </div>
                <div class="avia-testimonial-meta-mini">
                  <strong class="avia-testimonial-name">Dr. Dosist</strong>
                  <span class="avia-testimonial-subtitle ">Dean of Medicine</span>
                  <span class="hidden avia-testimonial-markup-link">http://www.wikipedia.com</span> – <a class="aviablank avia-testimonial-link" href="http://www.wikipedia.com">Doom Inc</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <?php dynamic_sidebar( 'towel_lastest_news' ); ?>
    </div>
  </div>

  <div class="tw-address-map">
    <div id="map" style="width:100%;height:300px"></div>
  </div>

  </div>

</div>

<?php get_footer(); ?>