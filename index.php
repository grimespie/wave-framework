<?php get_header(); ?>

    <div id="template-news">
    
        <div class="container">
            <div class="col-20">
                <h1>News</h1>
            </div>
        </div>
        
        <?php get_template_part("templates/title", "divide"); ?>

        <div class="container">
            <div class="col-14">
                <div id="news-wrapper">
            
                    <?php while(have_posts()) : the_post(); ?>
                    
                        <div class="news-item">
                            <?php the_post_thumbnail("news-item"); ?>
                            <h2><?php the_title(); ?></h2>
                            <p class="news-item-date"><?php the_date(); ?></p>
                            <div class="news-item-excerpt"><?php the_excerpt(); ?></div>
                            <div class="news-item-actions">
                                <p><a href="<?php the_permalink(); ?>">Read more</a></p>
                                <div class="news-item-share">
                                    Share: 
                                    <img src="<?php print(get_template_directory_uri() . "/images/facebook_share.png"); ?>" alt="Facebook" />
                                    <img src="<?php print(get_template_directory_uri() . "/images/twitter_share.png"); ?>" alt="Twitter" />
                                    <img src="<?php print(get_template_directory_uri() . "/images/linkedin_share.png"); ?>" alt="LinkedIn" />
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    
                    <?php endwhile; ?>

                    <div id="news-nav-previous">
                        <?php previous_posts_link("previous"); ?>
                    </div>
                    <div id="news-nav-next">
                        <?php next_posts_link("next"); ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="col-6">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>