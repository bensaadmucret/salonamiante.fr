<section id="tile_latestnews" class="fullwidth articles">
    <div id="tile_latestnews_anchor" class="hook"></div>
    <div class="container">
        <header class="row section-header">
            <h2><?php echo stripslashes($args['title']); ?></h2>
            <p><?php echo stripslashes($args['subtitle']); ?></p>
        </header>
        <div class="section-content">
            <div id="carousel-articles" class="carousel-articles carousel slide">
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    $chunks = array_chunk($args['news'], 4);
                    foreach ($chunks as $chunk) {
                        ?>
                        <div class="item <?php if ($i++ == 0) echo 'active'; ?>">
                            <?php
                            foreach ($chunk as $new) {
                                $news_date = strtotime($new->post_date);
                                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($new->ID), 'vertoh-blog-home');
                                ?>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="articles item">
                                        <a href="<?php echo get_permalink($new->ID); ?>" class='articles-image'>
                                            <span class='articles-date'>
                                                <strong><?php echo date_i18n('M d', $news_date); ?></strong>, <?php echo date_i18n('Y', $news_date); ?>
                                            </span>
                                            <img class="lazyOwl" src="<?php echo $thumbnail[0]; ?>" alt="<?php echo get_the_title($new->ID); ?>" />
                                        </a>
                                        <a href="<?php echo get_permalink($new->ID); ?>" class="articles-title"><?php echo get_the_title($new->ID); ?></a>
                                        <p class="articles-content">
                                            <?php
                                            $news_content = $new->post_excerpt;
                                            if (empty($news_content)) {
                                                $news_content = $new->post_content;
                                            }
                                            echo wp_trim_words($news_content, 35);
                                            ?>
                                        </p>
                                        <a href="<?php echo get_permalink($new->ID); ?>" class="read-more-link">
                                          <?php _e('Read more','vertoh'); ?>
                                            <span class="readmore-icon fa-stack fa-sm">
                                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                                <i class="fa fa-plus fa-stack-1x"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <ol class="carousel-indicators">
                    <?php
                    for ($i = 0; $i < ceil(count($args['news']) / 4); $i++) {
                        ?>
                        <li data-target="#carousel-articles" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>
                        <?php
                    }
                    ?>
                </ol>
            </div>
            <?php if (!empty($args['blog_category_link'])) { ?>
                <footer class="section-footer">
                    <a href="<?php echo $args['blog_category_link']; ?>" class="section-button"><?php echo stripslashes($args['viewalltext']); ?></a>
                </footer>
            <?php } ?>
        </div>
    </div>
</section>