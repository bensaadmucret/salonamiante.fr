<section id="tile_sponsors" class="fullwidth big-sponsors sticked schedule">
    <div id="tile_sponsors_anchor" class="hook"></div>
    <header class="row section-header">
        <?php if (!empty($args['title'])) { ?>
            <h2><?php echo $args['title']; ?></h2>
        <?php } ?>
        <?php if (!empty($args['subtitle'])) { ?>
            <p><?php echo $args['subtitle']; ?></p>
        <?php } ?>
    </header>
    <?php
    if ($args['tiers'] && count($args['tiers'] > 0)) {

        // tiers sorting
        $new_tiers = array();
        foreach ($args['tiers'] as $tier) {
            $tier->order = EF_Taxonomy_Helper::ef_get_term_meta('sponsor-tier-metas', $tier->term_id, 'sponsor_tier_order');
            $new_tiers[$tier->order] = $tier;
        }
        ksort($new_tiers, SORT_NUMERIC);
        $args['tiers'] = $new_tiers;
        // -------------

        $tier_count = 0;
        foreach ($args['tiers'] as $tier) {
            ++$tier_count;
            $tier_type = EF_Taxonomy_Helper::ef_get_term_meta('sponsor-tier-metas', $tier->term_id, 'sponsor_tier_type');
            $sponsors = get_posts(array(
                'posts_per_page' => -1,
                'post_type' => 'sponsor',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'sponsor-tier',
                        'field' => 'slug',
                        'terms' => array($tier->slug)
                    ),
                )
            ));
            switch ($tier_type) {
                case 'large':
                    $row_begin = '';
                    $row_end = '';
                    $item_class = 'big';
                    $item_begin = '';
                    $item_end = '';
                    break;
                case 'medium':
                    $row_begin = '<div class="row"><div class="col-xs-12 gold_2">';
                    $row_end = '</div></div>';
                    $item_class = 'medium';
                    $item_begin = '';
                    $item_end = '';
                    break;
                case 'small':
                    $row_begin = '<div class="row">';
                    $row_end = '</div>';
                    $item_class = 'small';
                    $item_begin = '<div class="col-sm-3 col-xs-6">';
                    $item_end = '</div>';
                    break;
                default:
                    $row_begin = '';
                    $row_end = '';
                    $item_class = 'big';
                    $item_begin = '';
                    $item_end = '';
            }
            ?>
            <div class="container">
                <div class="row section-content ">
                    <div class="col-md-4 followWrap">
                        <div class='day-floating'>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <h3><?php echo $tier->name; ?></h3>
                                        <p><?php echo stripslashes($tier->description); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <?php
                        echo $row_begin;

                        if ($sponsors && count($sponsors) > 0) {
                            foreach ($sponsors as $sponsor) {
                                $link = get_post_meta($sponsor->ID, 'sponsor_link', true);

                                echo $item_begin;
                                ?>
                                <div class='flipper <?php echo $item_class; ?>'>
                                    <div class='front'>
                                        <?php echo get_the_post_thumbnail($sponsor->ID, 'full', array('alt' => $sponsor->post_title)); ?>
                                    </div>
                                    <div class='back'>
                                        <h3><?php echo $sponsor->post_title; ?></h3>
                                        <p><?php echo $sponsor->post_content; ?></p>
                                        <?php if (!empty($link)) { ?>
                                            <a href="<?php echo $link ?>" target="_blank" class="url"><i class='fa fa-link'> </i><?php echo $sponsor->post_title; ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                                echo $item_end;
                            }
                        }

                        echo $row_end;
                        if ($tier_count == count($args['tiers'])) {
                            ?>
                            <div class="end-div"></div>
                            <?php
                        }
                        ?>
                    </div>
                </div>			
                <hr class="bg-gold">
            </div>
            <?php
        }
    }
    if ($args['buttonlink'] != '') {
        ?>
        <footer class="section-footer">
            <a href="<?php echo $args['buttonlink'] ?>" class="section-button"><?php echo $args['buttontext']; ?></a>
        </footer>
    <?php } ?>
</section>