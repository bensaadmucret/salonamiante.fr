<section id="tile_eventtimer" class="fullwidth timer">
    <div id="tile_eventtimer_anchor" class="hook"></div>
    <div class="container">
        <header class="row section-header">
            <h2><?php echo $args['title']; ?></h2>
        </header>
        <div>
            <div class="countdown" data-date="<?php echo date('Y-m-d H:i:s', $args['date']); ?>"></div>
        </div>
        <?php if (!empty($args['buttontext'])) { ?>
            <footer class="section-footer">
                <a href="<?php echo $args['buttonlink']; ?>" class="section-button"><?php echo $args['buttontext']; ?></a>
            </footer>
        <?php } ?>
    </div>
</section>