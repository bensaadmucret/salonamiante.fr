<?php
/**
 * The template for displaying Comments
 *
 * @package WordPress
 * @subpackage Vertoh
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required())
    return;
$ef_options = EF_Event_Options::get_theme_options();
$blog_layout = 'blog-full-width';
if (!empty($ef_options['ef_blog_layout']))
    $blog_layout = $ef_options['ef_blog_layout'];
$comments_form_args = array(
    'title_reply' => '',
    'fields' => array(
        'author' => '<div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                         <input type="text" id="author" name="author" class="form-control" placeholder="' . __('First Name and Last Name', 'vertoh') . '" />
                     </div>',
        'email' => '<div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                        <input type="text" id="email" name="email" class="form-control" placeholder="' . __('Email Address', 'vertoh') . '" />
                    </div>',
        'url' => '<div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>
                      <input type="text" id="url" name="url" class="form-control" placeholder="' . __('Website', 'vertoh') . '" />
                  </div>',
    ),
    'comment_field' => '<div class="input-group">
                            <span class="input-group-addon textarea"><i class="fa fa-pencil  fa-fw"></i></span>
                            <textarea id="comment" name="comment" class="form-control" placeholder="' . __('Comment', 'vertoh') . '" rows="6"></textarea>
                        </div>',
    'label_submit' => '',
    'comment_notes_before' => '',
    'comment_notes_after' => ''
);
if ($blog_layout == 'blog-full-width') {
    $comments_form_args['fields']['author'] = '<div class="col-sm-5 col-xs-12">' . $comments_form_args['fields']['author'];
    $comments_form_args['fields']['url'] .= '</div>';
    $comments_form_args['comment_field'] = '<div class="col-sm-7 col-xs-12">' . $comments_form_args['comment_field'] . '</div>';
}
?>
<?php if ($blog_layout == 'blog-full-width') { ?>
    <section class="content">
        <div class="container">
        <?php } ?>
        <div id="comments" class='comments'>
            <?php if (comments_open()) { ?>
                <h4 class='comments-title'><?php _e('Submit a comment', 'vertoh'); ?></h4>
                <p class="description"><?php _e('Your email address will not be published. Required fields are marked *', 'vertoh'); ?></p>
                <div class="contact-form<?php if ($blog_layout == 'blog-full-width') echo ' row'; ?>">
                    <?php
                    comment_form($comments_form_args);
                    ?>
                    <a class="section-button c-gold submit-comment" href="#" onclick="jQuery('input#submit').trigger('click');
                            return false;"><?php _e('Leave comment', 'vertoh'); ?></a>
                </div>
            <?php } ?>
            <div class="comments-area">
                <h3 class='comments-title'><?php printf(__('There are %s comments', 'vertoh'), get_comments_number()); ?></h3>
                <?php if (have_comments()) : ?>
                    <ol>
                        <?php
                        wp_list_comments(array(
                            'callback' => 'vertoh_comment_callback',
                            'avatar_size' => 60));
                        ?>
                        <?php if (!comments_open()) : ?>
                            <li class="no-comments"><?php _e('Comments are closed.', 'vertoh'); ?></li>
                            <?php endif; ?>
                    </ol>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($blog_layout == 'blog-full-width') { ?>
        </div>
    </section>
<?php }