<section id="tile_exhibitors" class="fullwidth">
    <div id="tile_exhibitors_anchor" class="hook"></div>
    <div class="container">
        <header class="row section-header">
            <h2><?php echo stripslashes($args['title']); ?></h2>
            <p><?php echo stripslashes($args['subtitle']); ?></p>
        </header>
        <div class="section-content">
            <div id="carousel-exhibitors" class="carousel-exhibitors carousel slide">
                <div class="carousel-inner">
                    <?php
                    $i = 0;
                    if ($args['exhibitors'] && count($args['exhibitors']) > 0) {
                        $chunks = array_chunk($args['exhibitors'], 5);
                        foreach ($chunks as $chunk) {
                            ?>
                            <div class="item <?php if ($i++ == 0) echo 'active'; ?>">
                                <?php
                                foreach ($chunk as $exhibitor) {
                                    $categories = wp_get_post_terms($exhibitor->ID, 'exhibitor-category');
                                    $subtitle = get_post_meta($exhibitor->ID, 'exhibitor_subtitle', true);
                                    ?>
                                    <div class="exhibitor col-lg-5 col-md-5 col-sm-5 col-xs-12 item<?php echo!empty($subtitle) ? ' has-hover' : ''; ?>">
                                        <a class='logo-wrapper' href="<?php echo get_permalink($exhibitor->ID); ?>">
                                            <?php
                                            $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($exhibitor->ID), 'vertoh-exhibitor');
                                            ?>
                                            <img class="lazyOwl" src="<?php echo $thumbnail[0]; ?>" alt="<?php echo get_the_title($exhibitor->ID); ?>" />
                                        </a>
                                        <h3 class="exhibitor-name"><?php echo get_the_title($exhibitor->ID); ?></h3>
                                        <?php
                                        if ($categories && count($categories) > 0) {
                                            foreach ($categories as $category) {
                                                $color = EF_Taxonomy_Helper::ef_get_term_meta('exhibitor-category-metas', $category->term_id, 'exhibitor_category_color');
                                                $term = get_term_by('id', $category->term_id, 'exhibitor-category');
                                                ?>
                                                <span class="label<?php if (empty($color)) echo ' bg-gold'; ?>"<?php if (!empty($color)) echo " style=\"background-color: $color;\""; ?>><?php echo $term->name; ?></span>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <?php if (!empty($subtitle)) { ?>
                                            <p class="exhibitor-about"><?php echo $subtitle; ?></p>
                                        <?php } else { ?>
                                            <a href="<?php echo get_permalink($exhibitor->ID); ?>" class="read-more-link visible">
                                                <?php echo stripslashes($args['viewprofiletext']); ?>
                                                <span class="readmore-icon fa-stack fa-sm">
                                                    <i class="fa fa-circle-thin fa-stack-2x"></i>
                                                    <i class="fa fa-plus fa-stack-1x"></i>
                                                </span>
                                            </a>
                                        <?php } ?>
                                        <a href="<?php echo get_permalink($exhibitor->ID); ?>" class="read-more-link">
                                            <?php echo stripslashes($args['viewprofiletext']); ?>
                                            <span class="readmore-icon fa-stack fa-sm">
                                                <i class="fa fa-circle-thin fa-stack-2x"></i>
                                                <i class="fa fa-plus fa-stack-1x"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <ol class="carousel-indicators">
                    <?php
                    for ($i = 0; $i < ceil(count($args['exhibitors']) / 5); $i++) {
                        ?>
                        <li data-target="#carousel-exhibitors" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>
                        <?php
                    }
                    ?>
                </ol>
            </div>
            <?php if ($args['full_exhibitors_page'] && count($args['full_exhibitors_page']) > 0) { ?>
                <footer class="section-footer">
                    <a href="<?php echo get_permalink($args['full_exhibitors_page'][0]->ID); ?>" class="section-button"><?php echo stripslashes($args['viewalltext']); ?></a>
                </footer>
            <?php } ?>
        </div>
    </div>
</section>