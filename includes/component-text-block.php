<?php
function textBlock($fieldName, $customStyling){
    $f_title = get_field($fieldName . '_title');
    $f_text = get_field($fieldName . '_text');
    $f_links = get_field($fieldName . '_links');

    $colorTheory = get_field($fieldName . '_content-theme');
    $color = 'color-'. $colorTheory;
    $contentAlign = get_field($fieldName . '_content-alignment');

    $section_classes = '';
    $section_classes .= $customStyling['textBlock']['classes'];
    
?>
    <div class="text-block text-block_<?= $contentAlign . ' ' . $section_classes; ?>">
        <div class="text-block__content">
            <?php if($f_title){ ?>
                <div class="text-content__title <?= 'text-content__title_'. $color . ' text-content__title_' . $customStyling['textBlock']['fontSize']; ?>"><?= $f_title; ?></div>
            <?php } ?>
            <?php if($f_text){ ?>
                <div class="text-content__text wysiwyg <?= 'wysiwyg_'. $color; ?>"><?= $f_text; ?></div>
            <?php } ?>
            <?php if($f_links){ ?>
                <div class="text-content__links">
                <?php foreach($f_links as $links){ ?>
                    <?php if($links){ ?>
                        <a class="text-content__link button <?= 'button_'. $color; ?>" target="<?= $links['link']['target']; ?>" href="<?= $links['link']['url']; ?>"><?= $links['link']['title']; ?></a>
                    <?php } ?>
                <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>