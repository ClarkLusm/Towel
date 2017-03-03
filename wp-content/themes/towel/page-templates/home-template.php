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
  <div id="content">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <p><?php the_content(); ?></p>
    <hr> <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>
  
  <!-- <div class="tw-choice-us">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="wrap">
            <div class="icon"><i class="fa fa-diamond">&nbsp;</i></div>
            <h3>Phương châm hoạt động</h3>
            <p>Lorem ipsum Ea consequat occaecat esse dolor Excepteur id incididunt ullamco ut culpa magna ut culpa nostrud sunt cupidatat magna laboris aliqua consequat dolor labore in cupidatat aliqua pariatur tempor ex pariatur non laboris consectetur mollit aute in ex in consequat qui...</p>
            <a class="read-more">Xem thêm</a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="wrap">
            <div class="icon"><i class="fa fa-usd"></i></div>
            <h3>Cam kết sản phẩm</h3>
            <p>Lorem ipsum Ea consequat occaecat esse dolor Excepteur id incididunt ullamco ut culpa magna ut culpa nostrud sunt cupidatat magna laboris aliqua consequat dolor labore in cupidatat aliqua pariatur tempor ex pariatur non laboris consectetur mollit aute in ex in consequat qui...</p>
            <a class="read-more">Xem thêm</a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="wrap">
            <div class="icon"><i class="fa fa-plane"></i></div>
            <h3>Vận chuyển - Thanh toán</h3>
            <p>Lorem ipsum Ea consequat occaecat esse dolor Excepteur id incididunt ullamco ut culpa magna ut culpa nostrud sunt cupidatat magna laboris aliqua consequat dolor labore in cupidatat aliqua pariatur tempor ex pariatur non laboris consectetur mollit aute in ex in consequat qui...</p>
            <a class="read-more">Xem thêm</a>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="tw-about-us">
    <h2 class="heading text-center">Phản hồi khách hàng</h2>
    <div class="wrap">
      <div class="container">
        <div class="avia-testimonial-wrapper">
          <section class="bxslider avia-testimonial-row">
            <div class="item">
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
            <div class="item">
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
            <div class="item">
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
            <div class="item">
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