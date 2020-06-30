<section id="tile_registration" class="fullwidth">
    <div id="tile_registration_anchor" class="hook"></div>
    <div class="container">
        <header class="row section-header">
            <h2><?php echo stripslashes($args['title']); ?></h2>
        </header>
        <div class="section-content">
            <div class="row">
                <div class="col-lg-10">
                    <h4 class='content-heading'><?php echo stripslashes($args['subtitle']); ?></h4>
                    <p><?php echo stripslashes($args['text']); ?></p>
                </div>
            </div>
            <div style="margin: 2em 0">
                <div style="width: 100%; text-align: left;">
                    <?php echo do_shortcode(stripslashes($args['eventbrite'])); ?>
                </div>
            </div>
        </div>
    </div>
</section>