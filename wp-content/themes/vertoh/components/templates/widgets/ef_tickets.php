<section id="tile_tickets" class="fullwidth">
    <div id="tile_tickets_anchor" class="hook"></div>
    <div class="container">
        <header class="row section-header">
            <h2><?php echo stripslashes($args['title']); ?></h2>
            <p><?php echo stripslashes($args['subtitle']); ?></p>
        </header>
        <div class="section-content">
            <div class="row">
                <?php
                if ($args['tickets'] && count($args['tickets'])) {
                    foreach ($args['tickets'] as $ticket) {
                        $status = get_post_meta($ticket->ID, 'ticket_status', true);
                        switch ($status) {
                            case 'onsale':
                                $status_class = '';
                                break;
                            case 'featured':
                                $status_class = 'featured';
                                break;
                            case 'soldout':
                                $status_class = 'disabled';
                                break;
                            default:
                                $status_class = '';
                        }
                        $ticket_url = ($status != 'soldout') ? get_post_meta($ticket->ID, 'ticket_button_link', true) : 'javascript:return false;';
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="ticket-box <?php echo $status_class; ?>">
                                <h3 class='box-title'><?php echo get_the_title($ticket->ID); ?></h3>
                                <p class='box-content'><?php echo $ticket->post_content; ?></p>
                                <span class="box-price"><?php echo get_post_meta($ticket->ID, 'ticket_price', true); ?></span>
                                <small class='box-underprice'><?php echo $ticket->post_excerpt; ?></small>
                                <a href="<?php echo $ticket_url; ?>" class="section-button"><?php echo get_post_meta($ticket->ID, 'ticket_button_text', true); ?></a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>