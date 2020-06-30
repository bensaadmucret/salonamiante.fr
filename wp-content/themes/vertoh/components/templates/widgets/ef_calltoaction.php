<?php
    if(empty($args['textcolor']))
        $args['textcolor'] = '#000000';
?>
<section id="tile_calltoaction" class="fullwidth parallax" style='background-image: url("<?php echo $args['image']; ?>")'>
    <div id="tile_calltoaction_anchor" class="hook"></div>
    <div class="container" <?php if (!empty($args['alignment'])) echo ('style="text-align:' . $args['alignment'] . ';"'); ?>>
        <h2<?php echo!empty($args['textcolor']) ? ' style="color:' . $args['textcolor'] . ';"' : ''; ?>><?php echo(stripslashes($args['title'])); ?></h2>
        <p<?php echo!empty($args['textcolor']) ? ' style = "color:' . $args['textcolor'] . ';"' : ''; ?>><?php echo(stripslashes($args['subtitle'])); ?></p>
        <a href="<?php echo($args['buttonlink']); ?>" class="section-button"<?php echo!empty($args['textcolor']) ? ' style="color:' . $args['textcolor'] . '; border-color:' . $args['textcolor'] . ';"' : ''; ?>><?php echo($args['buttontext']); ?></a>
    </div>
</section>