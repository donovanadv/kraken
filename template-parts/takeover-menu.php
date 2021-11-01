
<?php
$f_phone = get_field('info_contact_phone', 'option');
$f_primary_logo = get_field('info_branding_logo-light', 'option');
$f_primary_nav = get_field('global_header_items', 'option');
$f_secondary_nav = get_field('global_header_items-2', 'option');

if ($f_primary_nav || $f_secondary_nav): ?>
<div class="full-menu <?php if ( is_admin_bar_showing() ) { echo 'full-menu__admin-offset'; } ?>" tabindex="-1">
    <div class="full-menu__top <?php if ( is_admin_bar_showing() ) { echo 'full-menu__top_admin-offset'; } ?>">   
        <?php if($f_primary_logo){ ?>
            <div class="full-menu__top-logo">
                <a href="<?php echo esc_url(home_url()); ?>" class="full-menu__link"></a>
                <img width="241" height="66"  src="<?= $f_primary_logo['url']; ?>" alt="<?= $f_primary_logo['alt']; ?>" class="full-menu__logo" />
            </div>
        <?php } ?>
        <button  aria-label="Close Mobile Menu" class="full-menu__top-toggle full-menu__trigger"><div class="full-menu__top-bar1_closed"></div><div class="full-menu__top-bar2_closed"></div></button>
    </div>


    <div class="full-menu__main">
        <div class="full-menu__main-content">
            <div class="mobile-nav">
                <button  aria-label="Back To Main Menu" class="mobile-nav__item-back mobile-nav__item-back_hidden">Back</button>
                <?php if ($f_primary_nav) { ?> 
                    <?php foreach ($f_primary_nav as $link): 
                        $e_dead = $link['disable_link'];
                        $e_subnav = $link['enable_subnav'];
                        $f_subnav = $link['subitems'];    
                    ?>
                    <div class="mobile-nav__item <?php if($e_subnav){ echo ' mobile-nav__item_has-child '; } ?>">
                        <a href="<?php echo esc_url($link['item']['url']); ?>" target="<?php echo $link['item']['target']; ?>" class="mobile-nav__link <?php if($e_subnav && $e_dead){ echo ' blank-link '; } ?>"><?php echo $link['item']['title']; ?></a>
                            <?php if($e_subnav){ ?>
                            <div class="subheader-nav">
                                <?php if($f_subnav){ ?>
                                    <?php foreach ($f_subnav as $link): ?>
                                    <div class="subheader-nav__item">
                                        <a href="<?php echo esc_url($link['item']['url']); ?>" target="<?php echo $link['item']['target']; ?>" class="subheader-nav__link"><?php echo $link['item']['title']; ?></a>
                                    </div>
                                    <?php endforeach; ?>
                                <?php } ?>
                            </div>
                            <?php } ?>
                    </div>
                    <?php endforeach; ?>
                <?php } ?>

                <?php if ($f_secondary_nav) { ?>
                    <?php foreach ($f_secondary_nav as $link): ?>
                    <div class="mobile-nav__item">
                        <a href="<?php echo esc_url($link['item']['url']); ?>" target="<?php echo $link['item']['target']; ?>" class="mobile-nav__link mobile-nav__link_sm"><?php echo $link['item']['title']; ?></a>
                    </div>
                    <?php endforeach; ?>
                <?php } ?>
                <div class="mobile-nav__footer">
                    <div class="mobile-nav__social"><?php socialIcons('light'); ?></div>
                    <div class="mobile-nav__details"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>