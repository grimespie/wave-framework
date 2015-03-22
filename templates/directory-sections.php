            <div id="directory-sections">
                <div class="container">
                    <div id="directory-section-projects" class="col-third col-center col-m-10 col-s-20">
                        <h3>Latest Projects</h3>
                        <?php
                        $ProjectsObj = new WP_Query(array("post_type" => "project", "post_status" => "publish", "posts_per_page" => 3));
                        $FirstTime   = true;
                        
                        foreach($ProjectsObj->posts as $Project) {
                        ?>
                        
                            <a href="<?php print(get_permalink($Project->ID)); ?>">
                                <div class="directory-cta-item <?php if($FirstItem) { print('first-item'); } ?>">
                                    <h4><?php print($Project->post_title); ?></h4>
                                    <p>
                                        <?php
                                        $Company = get_field("company", $Project->ID);
                                        print($Company->post_title);
                                        ?>
                                    </p>
                                    <img src="<?php print(get_template_directory_uri() . "/images/item_arrow.png"); ?>" alt="View Project" />
                                </div>
                            </a>
                        
                            <?php
                            $FirstTime = false;
                        }
                        ?>
                        
                        <div class="see-all"><a href="<?php the_field("latest_projects"); ?>">See All ></a></div>
                    </div>
                    <div id="directory-section-jobs" class="col-third col-center col-m-10 col-s-20">
                        <h3>Latest Jobs</h3>
                        <?php
                        $JobsObj   = new WP_Query(array("post_type" => "job", "post_status" => "publish", "posts_per_page" => 3));
                        $FirstTime = true;
                        
                        foreach($JobsObj->posts as $Job) {
                        ?>
                        
                            <a href="<?php print(get_permalink($Job->ID)); ?>">
                                <div class="directory-cta-item <?php if($FirstItem) { print('first-item'); } ?>">
                                    <h4><?php print($Job->post_title); ?></h4>
                                    <p>
                                        <?php
                                        $Company = get_field("company", $Job->ID);
                                        print($Company->post_title);
                                        ?>
                                    </p>
                                    <img src="<?php print(get_template_directory_uri() . "/images/item_arrow.png"); ?>" alt="View Job" />
                                </div>
                            </a>
                        
                            <?php
                            $FirstTime = false;
                        }
                        ?>
                        
                        <div class="see-all"><a href="<?php the_field("latest_jobs"); ?>">See All ></a></div>
                    </div>
                    <div id="directory-section-awards" class="col-third col-center col-m-10 col-s-20">
                        <h3>Monthly Awards</h3>
                        <?php
                        $CN_Awards = new CN_Awards();
                        
                        $CreativeChampion = $CN_Awards->getCreativeChampion();
                        $CrackinStartup   = $CN_Awards->getCrackinStartUp();
                        $CannyApprentice  = $CN_Awards->getCannyApprentice();
                        ?>
                        
                        <a href="<?php print($CreativeChampion->getProfileURL()); ?>">
                            <div class="directory-cta-item first-item">
                                <h4>Creative Champion</h4>
                                <p><?php print($CreativeChampion->getName()); ?></p>
                                <img src="<?php print(get_template_directory_uri() . "/images/item_arrow.png"); ?>" alt="View Profile" />
                            </div>
                        </a>
                        
                        <a href="<?php print($CrackinStartup->getLink()); ?>">
                            <div class="directory-cta-item">
                                <h4>Crackin' Start up</h4>
                                <p><?php print($CrackinStartup->getCompanyName()); ?></p>
                                <img src="<?php print(get_template_directory_uri() . "/images/item_arrow.png"); ?>" alt="View Profile" />
                            </div>
                        </a>
                        
                        <a href="<?php print($CannyApprentice->getProfileURL()); ?>">
                            <div class="directory-cta-item">
                                <h4>Canny Apprentice</h4>
                                <p><?php print($CannyApprentice->getName()); ?></p>
                                <img src="<?php print(get_template_directory_uri() . "/images/item_arrow.png"); ?>" alt="View Profile" />
                            </div>
                        </a>
                        
                        <div class="see-all"><a href="<?php the_field("monthly_awards"); ?>">See All ></a></div>
                    </div>
                </div>
            </div>