<?php if (!empty($args['title1']) && !empty($args['content1'])) { ?>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <h5 class='widget-title'><?php echo stripslashes($args['title1']); ?></h5>
        <div class="widget-content">
            <?php echo stripslashes(nl2br($args['content1'])); ?>
        </div>
    </div>
<?php } ?>
<?php if (!empty($args['title2']) && !empty($args['content2'])) { ?>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <h5 class='widget-title'><?php echo stripslashes($args['title2']); ?></h5>
        <div class="widget-content">
            <?php echo stripslashes(nl2br($args['content2'])); ?>
        </div>
    </div>
<?php } ?>
<?php if (!empty($args['title3']) && !empty($args['content3'])) { ?>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <h5 class='widget-title'><?php echo stripslashes($args['title3']); ?></h5>
        <div class="widget-content">
            <?php echo stripslashes(nl2br($args['content3'])); ?>
        </div>
    </div>
<?php } ?>