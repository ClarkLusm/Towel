</div>  
<div id="footer">
  <div class="above-footer clearfix">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          
        </div>
        <div class="col-sm-3">
          <?php dynamic_sidebar( 'towel_lastest_news' ); ?>
        </div>
        <div class="col-sm-3">
          <?php do_action( 'social_links' ); ?>
        </div>
        <div class="col-sm-3">
          <div id="map" style="width:300px;height:300px"></div>
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
      </div>
    </div>
  </div>
</div>
<script>
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuMWNgz6Fiyo8XIC6khPJlNFjDjTIlMZo&callback=initMap"
    async defer></script>
</body>
</html>