<div id="tile_comments" class="widget widget-comments">
    <div id="tile_comments_anchor" class="hook"></div>
    <h6 class="widget-heading"><?php echo $args['title']; ?></h6>
    <?php
    if ($args['comments'] && count($args['comments']) > 0) {
        foreach ($args['comments'] as $comment) {
            ?>
            <div class="comment">
                <a class="comment-date" href="<?php echo get_permalink($comment->comment_ID); ?>">
                    <?php echo date_i18n('M j, Y H:i', mysql2date('U', $comment->comment_date)); ?>
                </a>
                <h6 class="comment-author"><?php echo $comment->comment_author; ?></h6>
                <p class="comment-body"><?php echo $comment->comment_content; ?></p>
            </div>
            <?php
        }
    }
    ?>
</div>