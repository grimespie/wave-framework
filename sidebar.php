                <div id="page-sidebar" class="news-sidebar">
                    <div class="sidebar-contents">
                        <form action="" method="post" id="news-search">
                            <input type="image" src="<?php print(get_template_directory_uri()); ?>/images/search.png">
                            <input type="text" name="search" placeholder="Search...">
                            <div class="clear"></div>
                        </form>
                    </div>
                    <div class="sidebar-contents-sub">
                        <h2>Archives</h2>
                        <ul id="news-archives">
                            <?php wp_get_archives(array()); ?> 
                        </ul>
                    </div>
                    <div class="sidebar-contents-sub">
                        <h2>Tags</h2>
                        <div id="news-tags">
                            <?php print(get_the_tag_list("", ", ")); ?>
                        </div>
                    </div>
                </div>
                
                <div id="awards-sidebar">
                    <h2>Monthly Awards</h2>
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
                            <img src="<?php print(get_template_directory_uri() . "/images/award_item_arrow.png"); ?>" alt="View Profile" />
                        </div>
                    </a>
                    
                    <a href="<?php print($CrackinStartup->getLink()); ?>">
                        <div class="directory-cta-item">
                            <h4>Crackin' Start up</h4>
                            <p><?php print($CrackinStartup->getCompanyName()); ?></p>
                            <img src="<?php print(get_template_directory_uri() . "/images/award_item_arrow.png"); ?>" alt="View Profile" />
                        </div>
                    </a>
                    
                    <a href="<?php print($CannyApprentice->getProfileURL()); ?>">
                        <div class="directory-cta-item">
                            <h4>Canny Apprentice</h4>
                            <p><?php print($CannyApprentice->getName()); ?></p>
                            <img src="<?php print(get_template_directory_uri() . "/images/award_item_arrow.png"); ?>" alt="View Profile" />
                        </div>
                    </a>
                </div>