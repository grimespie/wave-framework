<?php

/**
 * 
 * Template Name: Home Page
 * 
 */

get_header(); ?>

    <div id="template-home">

        <?php while(have_posts()) : the_post(); ?>

            <div id="banner" style="background-image: url('<?php the_field("background_image"); ?>');">
                <div id="banner-inside">
                    <div class="container">
                        <div class="col-20">
                            <h1><?php the_field("title"); ?></h1>
                        </div>
                    </div>
                    <div class="container">
                        <div class="col-10 col-s-20" id="banner-text">
                            <?php the_field("text"); ?>
                        </div>
                        <div class="col-10 col-s-20 col-s-center">
                            <?php
                            $VideoURL = get_field("video_link");
                            
                            $VideoURL = preg_replace("/watch\?v=/", "embed/", $VideoURL);
                            ?>
                            <iframe width="482" height="301" src="<?php print($VideoURL); ?>?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php get_template_part("templates/cta", "large"); ?>
            
            <?php get_template_part("templates/directory", "sections"); ?>
            
            <?php get_template_part("templates/posts", "latest"); ?>
            

        <?php endwhile; ?>

    </div>

<?php get_footer(); ?>