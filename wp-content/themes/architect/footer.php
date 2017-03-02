<?php 
    $mts_options = get_option(MTS_THEME_NAME); 
    if(is_array($mts_options['mts_homepage_layout'])){
        $homepage_layout = $mts_options['mts_homepage_layout']['enabled'];
    }else if(empty($homepage_layout)) {
        $homepage_layout = array();
    }
?>
    </div><!--#page-->

    <!-- _________________________ Start Bottom _________________________ -->
    <div id="bottom" class="cmsms_color_scheme_default">
        <div class="bottom_bg">
            <div class="bottom_outer">
                <div class="bottom_inner sidebar_layout_131313">
                    <aside id="widget_sp_image-2" class="widget1 widget_sp_image"><h5 class="widgettitle">
                            Chúng tôi là </h5><a href="http://housingbest.com/" id=""
                                                 target="_self"
                                                 class="widget_sp_image-image-link"
                                                 title="" rel=""><img
                                width="323" height="105" alt="Chúng tôi là "
                                class="attachment-full" style="max-width: 100%;"
                                src="http://housingbest.com/wp-content/uploads/2016/06/logo-h72-sologan.png"/></a>
                    </aside>
                    <aside id="custom-facebook-2" class="widget1 widget_custom_facebook_entries"><h5
                            class="widgettitle">Facebook</h5>
                        <div id="fb-root"></div>
                        <script>(function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, "script", "facebook-jssdk"));
                        </script>
                        <div class="fb-page" data-href="https://www.facebook.com/housingbest.jsc/"
                             data-small-header="false" data-adapt-container-width="true"
                             data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="https://www.facebook.com/"><a
                                        href="https://www.facebook.com/">Facebook</a>
                                </blockquote>
                            </div>
                        </div>
                        <div class="cl"></div>
                    </aside>
                    <aside id="text-3" class="widget1 widget_text"><h5 class="widgettitle">Thông tin liên
                            hệ</h5>
                        <div class="widget_meta">
                            <ul>
                                <li>Công ty cổ phần xây dựng và thương mại Housing Best Việt Nam</li>
                                <li>Office : Nhà 88 Khu A40, La Khê, Hà Đông, Hà Nội</li>
                                <li>Hotline: 0996.212.888 / 01212.861.666 / 0128.5775.666 / 0121.7722666</li>
                                <li>Email: Housingbest.jsc@gmail.com</li>
                                <li>Wedsite: http://housingbest.com</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- _________________________ Finish Bottom _________________________ -->

    <footer class="main-footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
        <div id="footer" class="clearfix">
            <div class="container">
                <div class="copyrights">
                    <?php mts_copyrights_credit(); ?>
                </div>
            </div><!--.container-->
        </div>
    </footer><!--footer-->
</div><!--.main-container-->
<?php mts_footer(); ?>
<?php wp_footer(); ?>
<?php if($mts_options['mts_map_coordinates'] != '' && array_key_exists('contact',$homepage_layout) && is_front_page()): ?>
<script type="text/javascript">
      var mapLoaded = false;
      function initialize() {
        mapLoaded = true;
        
        var geocoder = new google.maps.Geocoder();
        var lat='';
        var lng=''
        geocoder.geocode( { 'address': '<?php echo addslashes($mts_options['mts_map_coordinates']); ?>'}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
           lat = results[0].geometry.location.lat(); //getting the lat
           lng = results[0].geometry.location.lng(); //getting the lng
           map.setCenter(results[0].geometry.location);
           var marker = new google.maps.Marker({
               map: map,
               position: results[0].geometry.location
           });
         }
         });
         var latlng = new google.maps.LatLng(lat, lng);
        
        var mapOptions = {
            zoom: 18,
            center: latlng,
            scrollwheel: false,
            navigationControl: false,
            scaleControl: false,
            streetViewControl: false,
            draggable: true,
            panControl: false,
            mapTypeControl: false,
            zoomControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            // How you would like to style the map.
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{"featureType":"water","stylers":[{"visibility":"on"},{"color":"#acbcc9"}]},{"featureType":"landscape","stylers":[{"color":"#f2e5d4"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#c5c6c6"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#e4d7c6"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#fbfaf7"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c5dac6"}]},{"featureType":"administrative","stylers":[{"visibility":"on"},{"lightness":33}]},{"featureType":"road"},{"featureType":"poi.park","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":20}]},{},{"featureType":"road","stylers":[{"lightness":20}]}]
        };

        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
      }
      //google.maps.event.addDomListener(window, 'load', initialize);
      jQuery(window).load(function() {
        jQuery(window).scroll(function() {
          if (jQuery('.contact_map').isOnScreen() && !mapLoaded) {
            mapLoaded = true;
            jQuery('body').append('<script src="https://maps.googleapis.com/maps/api/js?sensor=false&v=3&callback=initialize"></'+'script>');
          }
        });
      });
</script>
<?php endif ?>
</body>
</html>