</div>  
<?php $current_lang = pll_current_language() ?>
<div id="footer">
  <div class="above-footer clearfix">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="logo">
            <a href="<?php echo get_home_url(); ?>">
              <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
            </a>
            <p class="slogan">
              <?php if($current_lang == 'vi') : ?>
                Thảo Nguyên Tex lựa chọn số một của bạn
              <?php else : ?>
                ThaonguyenTex slogan
              <?php endif ?>
            </p>
          </div>
        </div>
        <div class="col-sm-3">
          <h3 class="widgettitle">
            <?php echo $current_lang == 'vi' ? 'Thông tin Thảo Nguyên Tex' : 'ThaonguyenTex information' ?>
          </h3>
          <?php  
            if (has_nav_menu('footermenu')) { 
              $args = array(
                'theme_location'  => 'footermenu',
                'container'       => '',
                'items_wrap'      => '<ul class="menu">%3$s</ul>',
              );
              wp_nav_menu($args);
            }
          ?>
        </div>
        <div class="col-sm-3">
          <?php if($current_lang == 'vi') : ?>
          <h3 class="widgettitle">Liên hệ với chúng tôi</h3>
          <ul>
            <li><i class="fa fa-map-marker"></i> 123 Tiền Hải, Thái Bình, Việt Nam</li>
            <li><i class="fa fa-phone"></i> 0123 456 789</li>
            <li><i class="fa fa-envelope"></i> thaonguyen@gmail.com</li>
          </ul>
          <?php else : ?>
          <h3 class="widgettitle">Contact us</h3>
          <ul>
            <li><i class="fa fa-map-marker"></i> 123 TienHai, ThaiBinh, VietNam</li>
            <li><i class="fa fa-phone"></i> +84 123 456 789</li>
            <li><i class="fa fa-envelope"></i> thaonguyen@gmail.com</li>
          </ul>
          <?php endif ?>
          <?php do_action( 'social_links' ); ?>
        </div>
        <div class="col-sm-3">
          <div class="fb-page" data-href="https://www.facebook.com/Dodunggiadinhsamshop" data-tabs="timeline" data-height="215" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Dodunggiadinhsamshop" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Dodunggiadinhsamshop">SAM SHOP</a></blockquote></div>
        </div>
      </div>
    </div>
    <?php //dynamic_sidebar( 'towel_google_map' ) ?>
  </div>
  <div class="under-footer">
    <div class="container">
      <div class="row">
        <div class="copyright col-sm-6">
          Copyright © <?php echo date('Y') ?> - Towel Theme by Phan Thanh
        </div>
        <div class="footer-menu col-sm-6">
          
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8,
      scrollwheel: false,
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuMWNgz6Fiyo8XIC6khPJlNFjDjTIlMZo&callback=initMap" async defer></script>
</body>
</html>