            <div id="posts-latest">
                <div class="container">
                    <div id="posts-latest-news" class="col-5 col-m-10 col-s-20">
                        <h3>Latest News</h3>
                        <?php
                        $PostsObj = new WP_Query(array("post_type" => "post", "post_status" => "publish", "posts_per_page" => 1));
                        
                        if(count($PostsObj->posts) == 1) {
                        ?>
                        
                            <?php print(get_the_post_thumbnail($PostsObj->posts[0]->ID, "posts-latest")); ?>
                            <h4><?php print($PostsObj->posts[0]->post_title); ?></h4>
                            <p class="latest-post-date"><?php print(date("jS M Y", strtotime($PostsObj->posts[0]->post_date_gmt))); ?></p>
                            <a href="<?php print(get_permalink($PostsObj->posts[0]->ID)); ?>">Read more ></a>
                            <div class="latest-border"></div>
                        <?php
                        }
                        ?>
                    </div>
                    <div id="posts-latest-event" class="col-5 col-m-10 col-s-20">
                        <h3>Next Event</h3>
                        <?php
                        $PostsObj = new WP_Query(array("post_type" => "event", "post_status" => "publish", "posts_per_page" => 1));
                        
                        if(count($PostsObj->posts) == 1) {
                        ?>
                        
                            <?php print(get_the_post_thumbnail($PostsObj->posts[0]->ID, "posts-latest")); ?>
                            <h4><?php print($PostsObj->posts[0]->post_title); ?></h4>
                            <p class="latest-post-date"><?php print(date("jS M Y", strtotime($PostsObj->posts[0]->post_date_gmt))); ?></p>
                            <a href="<?php print(get_permalink($PostsObj->posts[0]->ID)); ?>">Read more ></a>
                            <div class="latest-border"></div>
                        <?php
                        }
                        ?>
                    </div>
                    <div id="posts-latest-job" class="col-5 col-m-10 col-s-20">
                        <h3>Latest Job</h3>
                        <?php
                        $PostsObj = new WP_Query(array("post_type" => "job", "post_status" => "publish", "posts_per_page" => 1));
                        
                        if(count($PostsObj->posts) == 1) {
                        ?>
                        
                            <?php print(get_the_post_thumbnail($PostsObj->posts[0]->ID, "posts-latest")); ?>
                            <h4><?php print($PostsObj->posts[0]->post_title); ?></h4>
                            <p class="latest-post-date"><?php print(date("jS M Y", strtotime($PostsObj->posts[0]->post_date_gmt))); ?></p>
                            <a href="<?php print(get_permalink($PostsObj->posts[0]->ID)); ?>">Read more ></a>
                            <div class="latest-border"></div>
                        <?php
                        }
                        ?>
                    </div>
                    <div id="posts-latest-project" class="col-5 col-m-10 col-s-20">
                        <h3>Latest Opportunity</h3>
                        <?php
                        $PostsObj = new WP_Query(array("post_type" => "project", "post_status" => "publish", "posts_per_page" => 1));
                        
                        if(count($PostsObj->posts) == 1) {
                        ?>
                        
                            <?php print(get_the_post_thumbnail($PostsObj->posts[0]->ID, "posts-latest")); ?>
                            <h4><?php print($PostsObj->posts[0]->post_title); ?></h4>
                            <p class="latest-post-date"><?php print(date("jS M Y", strtotime($PostsObj->posts[0]->post_date_gmt))); ?></p>
                            <a href="<?php print(get_permalink($PostsObj->posts[0]->ID)); ?>">Read more ></a>
                            <div class="latest-border"></div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>