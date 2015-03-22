<?php get_header(); ?>

    <div id="template-page">

        <?php while(have_posts()) : the_post(); ?>

            <?php get_template_part("templates/title", "normal"); ?>
            
            <div class="container">
                <div class="col-20">
                    <?php get_template_part("templates/page", "content"); ?>
                </div>
            </div>

        <?php endwhile; ?>

    </div>

<?php get_footer(); ?>