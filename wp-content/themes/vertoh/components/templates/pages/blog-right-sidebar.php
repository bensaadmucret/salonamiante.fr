<section class="content">
    <div class="container">
        <div class="row">
            <div class="main-content col-sm-8" id="main-content">
                <?php
                if (have_posts()) :
                    $count = 0;
                    the_post();
                    ?>
                    <div class="entry featured">
                        <div class="entry-image with-date">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('vertoh-blog-sidebar-first'); ?></a>
                            <span class="entry-date"><?php the_time($date_format); ?></span>
                        </div>
                        <h2 class='entry-title'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="entry-excerpt"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more-link">
                            <?php _e('Read more', 'vertoh'); ?>
                            <span class="readmore-icon fa-stack fa-sm">
                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                <i class="fa fa-plus fa-stack-1x"></i>
                            </span>
                        </a>
                    </div>
                    <div class="row">
                        <?php
                        while (have_posts()) :
                            the_post();
                            ?>
                            <div class="col-sm-6">
                                <div class="entry">
                                    <div class="entry-image with-date">
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('vertoh-blog-sidebar-first'); ?></a>
                                        <span class="entry-date"><?php the_time($date_format); ?></span>
                                    </div>
                                    <h2 class='entry-title'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <p class="entry-excerpt"><?php echo get_the_excerpt(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="read-more-link">
                                        <?php _e('Read more', 'vertoh'); ?>
                                        <span class="readmore-icon fa-stack fa-sm">
                                            <i class="fa fa-circle-thin fa-stack-2x"></i>
                                            <i class="fa fa-plus fa-stack-1x"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        ?>
                    </div>
                <?php else : ?>
                    <?php _e('Nothing Found', 'vertoh'); ?>
                <?php endif; ?>
            </div>
            <aside class="sidebar col-sm-4" id="sidebar">
                <?php get_sidebar() ?>
            </aside>
        </div>
    </div>
</section>