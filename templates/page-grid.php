                    <?php
                    global $GridPostType, $GridTitleRight, $FilterTaxonomy;
                    
                    $Query = new WP_Query(array("post_type" => $GridPostType, "post_status" => "publish", "posts_per_page" => -1));
                    
                    foreach($Query->posts as $GridItem) {
                        $Terms         = get_the_terms($GridItem->ID, $FilterTaxonomy);
                        $FilterClasses = array();
                        
                        foreach($Terms as $Term) {
                            array_push($FilterClasses, $Term->slug);
                        }
                        ?>
                    
                        <div class="grid-item <?php print(implode(" ", $FilterClasses)) ?>">
                            <a href="<?php print(get_permalink($GridItem->ID)); ?>">
                                <?php print(get_the_post_thumbnail($GridItem->ID, "filter-thumbnail")); ?>
                                <div class="grid-item-details">
                                    <h3><?php print($GridItem->post_title); ?></h3>
                                    <div class="title-right">&pound;<?php the_field($GridTitleRight, $GridItem->ID); ?></div>
                                    <div class="clear"></div>
                                    <p><?php print(get_post_excerpt($GridItem->post_content, 200)); ?></p>
                                </div>
                            </a>
                        </div>
                    
                    <?php
                    }
                    ?>