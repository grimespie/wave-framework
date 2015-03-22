<?php get_header(); ?>

    <div id="template-single">

        <?php while(have_posts()) : the_post(); ?>

            <?php get_template_part("templates/title", "normal"); ?>
            
            <div class="container">
                <div class="col-14">
                </div>
            <div class="col-6">
                <?php get_sidebar(); ?>
            </div>
        </div>

        <?php endwhile; ?>

    </div>

<?php get_footer(); ?>