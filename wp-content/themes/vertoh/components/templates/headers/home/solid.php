<section class="fullwidth header-solid v2"<?php if (isset($ef_options['ef_header_background_color'])) echo ' style="background-color:' . $ef_options['ef_header_background_color'] . '"'; ?>>
    <div class="container center">
        <div class="section-content">
            <div id="main-slider" class="main-slider">
                <div class="absolute slider-content">	
                    <div class="est-date">
                        <?php
                        if (!empty($ef_options['ef_header_logo'])) {
                            ?>
                            <img src="<?php echo $ef_options['ef_header_logo']; ?>" alt="<?php bloginfo('name'); ?>" />
                            <?php
                        }
                        ?>
                    </div>
                    <h1<?php if (!empty($ef_options['ef_title_color'])) echo ' style="color:' . $ef_options['ef_title_color'] . '"'; ?>>
                        <?php
                        if (isset($ef_options['ef_herotitle'])) {
                            echo stripslashes($ef_options['ef_herotitle']);
                        }
                        ?>
                    </h1>
                    <p<?php if (!empty($ef_options['ef_subtitle_color'])) echo ' style="color:' . $ef_options['ef_subtitle_color'] . '"'; ?>>
                        <?php
                        if (isset($ef_options['ef_herotagline'])) {
                            echo esc_attr(stripslashes($ef_options['ef_herotagline']));
                        }
                        ?>
                    </p>
                    <h3>
                        <?php
                        if (!empty($ef_options['ef_eventdate'])) {
                            echo stripslashes($ef_options['ef_eventdate']);
                        }
                        ?>
                    </h3>
                    <h3>
                        <?php
                        if (!empty($ef_options['ef_eventcitycountry'])) {
                            echo stripslashes($ef_options['ef_eventcitycountry']);
                        }
                        ?>
                        <?php
                        if (!empty($ef_options['ef_eventlocation'])) {
                            echo ' - ' . stripslashes($ef_options['ef_eventlocation']);
                        }
                        ?>
                    </h3>
                    <?php
                    $widget_ef_registration = get_option('widget_ef_registration');
                    if (is_active_widget(false, false, 'ef_registration') && is_array($widget_ef_registration)) {
                        foreach ($widget_ef_registration as $key => $reg_widget) {
                            if (empty($reg_widget)) {
                                unset($widget_ef_registration[$key]);
                                update_option('widget_ef_registration', $widget_ef_registration);
                            }
                            if (isset($reg_widget['registrationshowcalltoaction']) && $reg_widget['registrationshowcalltoaction'] == 1) {
                                $registration_calltoaction_url = !empty($reg_widget['registrationcalltoactionurl']) ? $reg_widget['registrationcalltoactionurl'] : '#tile_registration_anchor';
                                ?>
                                <a href="<?php echo $registration_calltoaction_url; ?>" class="section-button"><?php echo stripslashes($reg_widget['registrationcalltoactiontext']); ?></a>
                                <?php
                                break;
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>