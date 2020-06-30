<section id="tile_contact" class="fullwidth bg-dark contacts no-margin">
    <div id="tile_contact_anchor" class="hook"></div>
    <div class="container">
        <h2><?php echo $args['title']; ?></h2>
        <p><?php echo $args['subtitle']; ?></p>
        <form method="post">
            <div class="contact-form">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                    <input type="text" name="contactName" class="form-control" placeholder="<?php _e('First Name and Last Name', 'vertoh'); ?>" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                    <input type="text" name="email" class="form-control" placeholder="<?php _e('Email Address', 'vertoh'); ?>" />
                </div>
                <div class="input-group">
                    <span class="input-group-addon textarea"><i class="fa fa-pencil  fa-fw"></i></span>
                    <textarea name="comments" class="form-control" placeholder='<?php _e('Message (Maximum 500 characters)', 'vertoh'); ?>' rows='10'></textarea>
                </div>
                <div class="input-group captcha">
                    <div class='captcha-wrapper clearfix'>
                        <?php if (!empty($args['recaptchapublickey']) && !empty($args['recaptchaprivatekey'])) { ?>

                            <div id="recaptcha_widget" style="display:none">
                                <div id="recaptcha_image" class='captcha-image pull-left'></div>
                                <div><a href="javascript:Recaptcha.reload()" class="refresh pull-right"><?php _e('Refresh Captcha Code', 'vertoh'); ?> <i class='fa fa-refresh'></i></a></div>
                            </div>
                            <script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k=<?php echo $args['recaptchapublickey']; ?>"></script>
                            <noscript>
                            <iframe src="http://www.google.com/recaptcha/api/noscript?k=<?php echo $args['recaptchapublickey']; ?>" height="300" width="500"></iframe><br>
                            <textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
                            <input type="hidden" name="recaptcha_response_field" value="manual_challenge">
                            </noscript>
                            <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" class="form-control" placeholder="<?php _e('Enter the words above', 'vertoh'); ?>">

                        <?php } ?>
                    </div>
                </div>
            </div>
            <footer class="section-footer">
                <a onclick="jQuery('.contacts form').submit()" href="javascript:void(0)" class="section-button"><?php echo $args['sendtext']; ?></a>
            </footer>
            <input type="hidden" name="recaptcha_publickey" value="<?php echo $args['recaptchapublickey']; ?>" />
            <input type="hidden" name="recaptcha_privatekey" value="<?php echo $args['recaptchaprivatekey']; ?>" />
            <input type="hidden" name="contact_email" value="<?php echo $args['email']; ?>" />
            <input type="hidden" name="action" value="send_contact_email" />
        </form>
    </div>
</section>
<?php if (!empty($args['ef_options']['ef_newsletter_status']) && $args['ef_options']['ef_newsletter_status'] == 1) { ?>
    <section id="tile_subscribe" class="fullwidth gold"<?php echo!empty($args['ef_options']['ef_newsletter_background_color']) ? ' style="background-color:' . $args['ef_options']['ef_newsletter_background_color'] . ';"' : ''; ?>>
        <div class="container">
            <div class="row section-content">
                <div class="col-md-6">
                    <h2<?php echo!empty($args['ef_options']['ef_newsletter_color']) ? ' style="color:' . $args['ef_options']['ef_newsletter_color'] . ';"' : ''; ?>><?php echo stripslashes($args['ef_options']['ef_newsletter_title']); ?></h2>
                    <p<?php echo!empty($args['ef_options']['ef_newsletter_color']) ? ' style="color:' . $args['ef_options']['ef_newsletter_color'] . ';"' : ''; ?>><?php echo stripslashes($args['ef_options']['ef_newsletter_text']); ?></p>
                </div>
                <div class="col-md-6">
                    <div class="input-group mrgn-right">
                        <form action="<?php echo(!empty($args['ef_options']['ef_newsletter_url'])) ? $args['ef_options']['ef_newsletter_url'] : ''; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <span class="input-group-addon"<?php echo!empty($args['ef_options']['ef_newsletter_color']) ? ' style="border-color:' . $args['ef_options']['ef_newsletter_color'] . ' !important;"' : ''; ?>><i class="fa fa-envelope  fa-fw"<?php echo!empty($args['ef_options']['ef_newsletter_color']) ? ' style="color:' . $args['ef_options']['ef_newsletter_color'] . ';"' : ''; ?>></i></span>
                            <input type="text" name="EMAIL" class="form-control" placeholder="<?php _e('Your email', 'vertoh'); ?>"<?php echo!empty($args['ef_options']['ef_newsletter_color']) ? ' style="border-color:' . $args['ef_options']['ef_newsletter_color'] . ' !important;"' : ''; ?>/>
                            <span class="input-group-btn"<?php echo!empty($args['ef_options']['ef_newsletter_color']) ? ' style="color:' . $args['ef_options']['ef_newsletter_color'] . ';border-color: ' . $args['ef_options']['ef_newsletter_color'] . '"' : ''; ?>>
                                <button class="btn btn-default" type="button"<?php echo!empty($args['ef_options']['ef_newsletter_color']) ? ' style="color:' . $args['ef_options']['ef_newsletter_color'] . ';border-color:' . $args['ef_options']['ef_newsletter_color'] . ';"' : ''; ?> onclick="jQuery('#mc-embedded-subscribe-form').submit();"><?php echo stripslashes($args['ef_options']['ef_newsletter_button_text']); ?></button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>			
        </div>
    </section>
<?php } ?>