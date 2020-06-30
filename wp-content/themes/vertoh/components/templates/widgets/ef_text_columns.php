<section id="tile_textcolumns" class="fullwidth">
    <div id="tile_textcolumns_anchor" class="hook"></div>
    <div class="container">
        <?php if (!empty($args['title1']) && !empty($args['subtitle1'])) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h5 class='widget-title'><?php echo stripslashes($args['title1']); ?></h5>
                <div class="widget-content">
                    <?php echo stripslashes($args['subtitle1']); ?>
                </div>
            </div>
        <?php } ?>
        <?php if (!empty($args['title2']) && !empty($args['subtitle2'])) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h5 class='widget-title'><?php echo stripslashes($args['title2']); ?></h5>
                <div class="widget-content">
                    <?php echo stripslashes($args['subtitle2']); ?>
                </div>
            </div>
        <?php } ?>
        <?php if (!empty($args['title3']) && !empty($args['subtitle3'])) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h5 class='widget-title'><?php echo stripslashes($args['title3']); ?></h5>
                <div class="widget-content">
                    <?php echo stripslashes($args['subtitle3']); ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>