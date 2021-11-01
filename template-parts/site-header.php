<?php
    $f_primary_logo = get_field('info_branding_logo', 'option');
	$f_primary_nav = get_field('global_header_items', 'option');
    $f_primary_alt_logo = get_field('info_branding_logo-alt', 'option');
    $f_secondary_nav = get_field('global_header_items-2', 'option');
?>
<header class="site-header site-header_is-fixed <?php if ( is_user_logged_in() ) { echo ' site-header_wp-logged'; } ?>">
    <div class="site-header__item">
        <?php if ($f_secondary_nav): ?>
        <div class="site-header__brow">
            <div class="site-header__secondary-nav">
                <div class="header-nav header-nav_sec">
                    <?php foreach ($f_secondary_nav as $link): ?>
                    <div class="header-nav__item header-nav__item_sec">
                        <a href="<?php echo esc_url($link['item']['url']); ?>" target="<?php echo $link['item']['target']; ?>" class="header-nav__link header-nav__link_sec"><?php echo $link['item']['title']; ?></a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="site-header__main">
            <div class="site-header__main-logo">
                <a href="<?php echo esc_url(home_url()); ?>" class="site-header__home" aria-label="Home Button"></a>
                <?php if(get_page_template_slug() == 'template-cold-storage.php'){ ?>
                <img width="241" height="66" src="<?= $f_primary_alt_logo['url']; ?>" alt="<?= $f_primary_alt_logo['alt']; ?>" class="site-header__logo" />
                <?php } else{ ?>
                <img width="241" height="66" src="<?= $f_primary_logo['url']; ?>" alt="<?= $f_primary_logo['alt']; ?>" class="site-header__logo" />
                <?php } ?>
            </div>
            <div class="site-header__main-container">
                <?php if ($f_primary_nav): ?>
                <div class="site-header__main-nav">
                    <div class="header-nav">
                        <?php foreach ($f_primary_nav as $link): 
                            $e_dead = $link['disable_link'];
                            $e_subnav = $link['enable_subnav'];
                            $f_subnav = $link['subitems'];
                        ?>
                        <div class="header-nav__item <?php if($e_subnav){ echo ' header-nav__item_has-child '; } ?>">
                            <?php if($e_subnav){ ?>
                            <div class="subheader-nav">
                                <?php if($f_subnav){ ?>
                                <?php foreach ($f_subnav as $sub_link): ?>
                                <div class="subheader-nav__item">
                                    <a href="<?php echo esc_url($sub_link['item']['url']); ?>" target="<?php echo $sub_link['item']['target']; ?>" class="subheader-nav__link"><?php echo $sub_link['item']['title']; ?></a>
                                </div>
                                <?php endforeach; ?>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <a <?php if($e_subnav && $e_dead){ echo ' TABINDEX="-1" '; } ?> href="<?php echo esc_url($link['item']['url']); ?>" target="<?php echo $link['item']['target']; ?>" class="header-nav__link <?php if($e_subnav && $e_dead){ echo ' blank-link '; } ?>"><?php echo $link['item']['title']; ?></a>
                        </div>
                        <?php endforeach; ?>
                        <button class="header-nav__item-toggle full-menu__trigger" aria-label="Open Mobile Menu">
                            <span class="header-nav__bar1"></span>
                            <span class="header-nav__bar2"></span>
                            <span class="header-nav__bar3"></span>
                        </button>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
<div class="nav-takeover"><?php get_template_part('template-parts/takeover', 'menu'); ?></div>