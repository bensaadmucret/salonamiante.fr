<section class="fullwidth site-slider align-left">
    <div class="section-content">
        <div class="absolute slider-content">	
            <div class="container">
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
                <hr class="short bg-gold" />
                <h3>
                    <?php
                    if (!empty($ef_options['ef_eventdate'])) {
                        echo stripslashes($ef_options['ef_eventdate']);
                    }
                    ?>
                </h3><br>
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
        <div id="main-slider" class="main-slider carousel slide">
            <div class="carousel-inner">
                <?php
                if (!empty($ef_options['ef_header_gallery'])) {
                    $i = 0;
                    foreach (explode(',', $ef_options['ef_header_gallery']) as $id) {
                        ?>
                        <div class="item<?php echo $i++ == 0 ? ' active' : ''; ?>">
                            <img class="speaker-image lazyOwl" src="<?php echo wp_get_attachment_url($id); ?>" data-src="<?php echo wp_get_attachment_url($id); ?>" alt="" />
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="owl-controls clickable">
                <div class="owl-buttons">
                    <div class="owl-prev">
                        <i class="left fa fa-chevron-left" onclick="slideCarousels(['main-slider'], 'prev')"></i>
                    </div>
                    <div class="owl-next">
                        <i class="right fa fa-chevron-right" onclick="slideCarousels(['main-slider'], 'next')"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>