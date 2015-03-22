            <div class="container">
                <div class="col-10">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="col-10" id="filter-search">
                    <input type="image" src="<?php print(get_template_directory_uri() . "/images/search.png"); ?>" />
                    <input type="text" name="search" placeholder="Search..." />
                    <div class="more-filters-toggle">More Filters</div>
                </div>
            </div>