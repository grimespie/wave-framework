            <?php
            global $DirectoryPostType, $FilterTaxonomy;
            
            $DirectoryListObj = new WP_Query(array("post_type" => $DirectoryPostType, "post_status" => "publish", "posts_per_page" => -1, "orderby" => "title", "order" => "ASC"));
            ?>
            
            <div id="page-directory" data-smart-scroll="on">
                <div class="container">
                    <div class="col-6" id="directory-list">
                        <div class="list-top-border"></div>
                        <?php
                        $Counter = 0;
                        
                        foreach($DirectoryListObj->posts as $DirectoryItem) {
                            $Terms         = get_the_terms($DirectoryItem->ID, $FilterTaxonomy);
                            $FilterClasses = array();
                            $Counter++;
                            
                            foreach($Terms as $Term) {
                                array_push($FilterClasses, $Term->slug);
                            }
                            ?>
                        
                            <div class="directory-item <?php print(implode(" ", $FilterClasses)) ?>" data-map-item="<?php print($Counter); ?>">
                                <a href="<?php print(get_permalink($DirectoryItem->ID)); ?>">
                                    <div class="directory-item-details">
                                        <h3><?php print($DirectoryItem->post_title); ?></h3>
                                    </div>
                                    <?php print(get_thumbnail($DirectoryItem->ID, "directory-thumbnail")); ?>
                                    <div class="clear"></div>
                                </a>
                            </div>
                        
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-14">
                        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcruvUE2da2iayL9hxAAmr0VVOFY9FxrU"></script>
                        <script type="text/javascript">
                            var map_markers = [];
                            map_markers[0]  = "";
                            
                            var map_latlng = [];
                            map_latlng[0]  = "";
                            
                            var map    = "";
                        
                            function initialize() {
                                var map_style = [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}];
                                
                                var mapOptions = {
                                    center: new google.maps.LatLng(54.981149, -1.617705),
                                    zoom: 10,
                                    styles: map_style
                                };
                                
                                map    = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
                                var bounds = new google.maps.LatLngBounds();
                                
                                var infowindows = [];
                                infowindows[0] = "";
                                
                                <?php
                                $Counter = 0;
                                
                                foreach($DirectoryListObj->posts as $DirectoryItem) {
                                    $Counter++;
                                    
                                    $Latitude  = get_post_meta($DirectoryItem->ID, "latitude", true);
                                    $Longitude = get_post_meta($DirectoryItem->ID, "longitude", true);
                                    
                                    if(($Latitude == "") || ($Longitude == "")) {
                                        continue;
                                    }
                                    ?>
                                
                                    var myLatlng = new google.maps.LatLng(<?php print($Latitude); ?>,<?php print($Longitude); ?>);
                                    
                                    map_latlng[<?php print($Counter); ?>] = myLatlng;
                                    
                                    map_markers[<?php print($Counter); ?>] = new google.maps.Marker({
                                        position: myLatlng,
                                        map: map,
                                        icon: 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=%7Cc9ffff%7C4d4d4d',
                                        title:"<?php print($DirectoryItem->post_title); ?>"
                                    });
                                    
                                    var contentString_<?php print($Counter); ?> = '<div class="map-content-wrapper">'+
                                                        '<?php print(get_the_post_thumbnail($DirectoryItem->ID, "venue-thumb")); ?>' + 
                                                        '<div class="map-content"><h1><?php print(addslashes($DirectoryItem->post_title)); ?></h1>'+
                                                        '<p class="map-link"><a href="<?php print(get_permalink($DirectoryItem->ID)); ?>">Find out more</a></p>'+
                                                        '</div>'+
                                                        '</div>';
                    
                                    var infowindow_<?php print($Counter); ?> = new google.maps.InfoWindow({
                                        content: contentString_<?php print($Counter); ?>
                                    });
                                    
                                    infowindows[<?php print($Counter); ?>] = infowindow_<?php print($Counter); ?>;
                                    
                                    google.maps.event.addListener(map_markers[<?php print($Counter); ?>], 'click', function() {
                                        for(index = 1; index < infowindows.length; index++) {
                                            if(index != <?php print($Counter); ?>) {
                                                infowindows[index].close();
                                            }
                                        }
                                    
                                        infowindow_<?php print($Counter); ?>.open(map, map_markers[<?php print($Counter); ?>]);
                                    });
                                    
                                    bounds.extend(myLatlng);
                                
                                <?php
                                }
                                
                                if(count($DirectoryListObj->posts) > 1) {
                                ?>
                                
                                    map.fitBounds(bounds);
                                    
                                <?php
                                }
                                ?>
                            }
                      
                            google.maps.event.addDomListener(window, 'load', initialize);
                        </script>
                        <div id="smart-scroll-map-wrapper">
                            <div id="map-canvas"></div>
                        </div>
                    </div>
                </div>
            </div>