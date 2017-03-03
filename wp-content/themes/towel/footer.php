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
            <?php echo $current_lang == 'vi' ? 'Thông tin ThaoNguyenTex' : 'ThaonguyenTex information' ?>
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
            <li><i class="fa fa-map-marker"></i> Cụm công nghiệp làng nghề Phương La, Thái Bình, Việt Nam</li>
            <li><i class="fa fa-phone"></i> 097 825 0710</li>
            <li><i class="fa fa-envelope"></i> thaonguyenthu92@gmail.com</li>
          </ul>
          <?php else : ?>
          <h3 class="widgettitle">Contact us</h3>
          <ul>
            <li><i class="fa fa-map-marker"></i> Phuong La Industrial clusters, ThaiBinh, VietNam</li>
            <li><i class="fa fa-phone"></i> +84 978 250 710</li>
            <li><i class="fa fa-envelope"></i> thaonguyenthu92@gmail.com</li>
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
https://www.google.com/maps/place/Th%C3%A1i+Ph%C6%B0%C6%A1ng,+H%C6%B0ng+H%C3%A0,+Th%C3%A1i+B%C3%ACnh,+Vi%E1%BB%87t+Nam/@20.5962377,106.1899014,14.25z/data=!4m5!3m4!1s0x3135e9911d1423f5:0x79a619db15913e77!8m2!3d20.5958!4d106.1904426
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 20.590015, lng: 106.190443},
      zoom: 8,
      scrollwheel: false,
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuMWNgz6Fiyo8XIC6khPJlNFjDjTIlMZo&callback=initMap" async defer></script>
</body>
</html>