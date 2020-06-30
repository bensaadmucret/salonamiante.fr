<section class="content">
    <div class="container">
        <div class="row">
            <div class="main-content fullwidth col-sm-12" id="main-content">
                <div class="entry single">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    <footer class="entry-footer">
                        <span class="entry-date"><i class="fa fa-calendar-o"></i><?php the_time($date_format); ?></span>
                        <span class="entry-author"><i class="fa fa-user"></i><?php the_author(); ?></span>
                        <span class="entry-tag"><i class="fa fa-tag"></i><?php the_tags(null, ', '); ?></span>
                        <span class="entry-comments"><i class="fa fa-comment"></i><?php comments_number('0', '1', '%'); ?></span>
                        <span class="entry-share pull-right">
                            <p class="clearfix" tabindex="1000">
                                <a class="addthis_button no-overlay" href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=<?php echo $ef_options['ef_add_this_pubid']; ?>">
                                    <img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="<?php _e('Bookmark and Share', 'vertoh'); ?>" style="border:0" class=''>
                                </a>
                            </p>
                        </span>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="fullwidth back-to-top pages-navigation">
    <div class="container">
        <?php echo get_previous_post_link('%link', '<i class="fa fa-chevron-left"></i>' . __('PREV', 'vertoh')); ?>
        <?php echo get_next_post_link('%link', __('NEXT', 'vertoh') . '<i class="fa fa-chevron-right"></i>'); ?>
    </div>
</section>
<?php comments_template('', true); ?>
