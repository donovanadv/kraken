<?php
function bgBlock($fieldName, $customStyling, $isParallax=null){ 
    $d_video = get_field($fieldName . '_enable_video');
    $f_video = get_field($fieldName . '_video');
    $f_image = get_field($fieldName . '_background-image');
    // Inline Style
    $i_style = ' background-image: url(\'' . $f_image['url'] . '\');'; // add bg image url
    // Custom Class
    $c_class = $customStyling['bgBlock']['classes'];
    ?>

    <?php if( $d_video ){ ?>
        <div class="page-background page-background_video<?php if (!$f_video) { echo ' page-background__no-video '; }echo $c_class; ?> ">
            <div class="page-background__video">
                <video src="<?php echo $f_video['url']; ?>" preload="auto" autoplay playsinline loop muted poster="<?php echo get_field('poster_image', $f_video['ID'])['url']; ?>" class="page-background__video-content"></video>
                <div class="page-background__content"><?php textBlock($fieldName, $customStyling); ?></div>
            </div>
        </div>
    <?php } else{ ?>
        <div class="page-background bg-image <?= $c_class; ?>" style="<?= $i_style; ?>">
            <div class="page-background__content"><?php textBlock($fieldName, $customStyling); ?></div>
        </div>
    <?php }
}