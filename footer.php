<?php
/**
 * Theme footer
*/
$d_enable_header = get_field('global_header_enable-footer', 'option');
$f_alt_logo = get_field('info_branding_logo-light', 'option');
$f_alt_logo_alt = get_field('info_branding_logo-alt-light', 'option');

$f_address = get_field('info_contact_address', 'option');
$f_privacy = get_field('global_privacy_policy', 'option');

$f_phone = get_field('info_contact_phone', 'option');
$f_email = get_field('info_contact_email', 'option');

if(!$d_enable_header){
	$f_footer = get_field('global_footer_items', 'option');
} else{
	$f_footer = get_field('global_header_items', 'option');
}
?>
	</div><!-- #content -->
 
	<footer class="site-footer">
		<div class="site-footer__container">
			<div class="site-footer__logo">
				<a href="<?php echo esc_url(home_url()); ?>" class="site-footer__logo-link"  aria-label="Home Button"></a>
				<?php if(get_page_template_slug() == 'template-cold-storage.php'){ ?>
					<img width="186" height="51"  src="<?= $f_alt_logo_alt['url']; ?>" alt="<?= $f_alt_logo_alt['alt']; ?>" class="site-footer__logo-logo" />
                <?php } else{ ?>
					<img width="186" height="51"  src="<?= $f_alt_logo['url']; ?>" alt="<?= $f_alt_logo['alt']; ?>" class="site-footer__logo-logo" />
                <?php } ?>
			</div>	

			<div class="site-footer__col site-footer__contact">
				<div class="site-footer__col-title basic-text">
					<h4 class="basic-text__text_tertiary basic-text__text_bold basic-text__title_sm basic-text__title">Contact</h4>
				</div>
				<div class="site-footer__item">
					<?php if($f_address){ ?>
						<div class="site-footer__item-content">
							<a class="" rel="noopener" target="_blank" href="https://www.google.com/maps/dir/?api=1&destination=<?= urlencode($f_address['line-1'] . $f_address['line-2']); ?>">
								<?php if($f_address['line-1']){ ?>
									<div class="basic-text">
										<p class="basic-text__text_tertiary basic-text__text_sm basic-text__text"><?= $f_address['line-1']; ?></p>
									</div>
								<?php } ?>
								<?php if($f_address['line-2']){ ?>
									<div class="basic-text">
										<p class="basic-text__text_tertiary basic-text__text_sm basic-text__text"><?= $f_address['line-2']; ?></p>
									</div>
								<?php } ?>
							</a>
						</div>
					<?php } ?>

					<?php if($f_email){ ?>
                        <div class="site-footer__item-content">
                            <a class="" rel="noopener" target="_blank" href="<?= $f_email; ?>">
                                <div class="basic-text">
                                    <p class="basic-text__text_tertiary basic-text__text_sm basic-text__text">
                                        <?= $f_email; ?></p>
                                </div>
                            </a>
                        </div>
                        <?php } ?>

                        <?php if($f_phone){ ?>
                        <div class="site-footer__item-content">
                            <a class="" rel="noopener" target="_blank" href="<?= $f_phone; ?>">
                                <div class="basic-text">
                                    <p class="basic-text__text_tertiary basic-text__text_sm basic-text__text">
                                        <?= $f_phone; ?></p>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
				</div>
			</div>

			<div class="site-footer__col site-footer__social">
				<div class="site-footer__col-title basic-text">
					<h4 class="basic-text__text_tertiary basic-text__text_bold basic-text__title_sm basic-text__title">Social</h4>
				</div>
				<div class="site-footer__item"><?php socialIcons('light'); ?></div>
			</div>

			<div class="site-footer__col site-footer__menu">
				<div class="site-footer__col-title basic-text">
					<h4 class="basic-text__text_tertiary basic-text__text_bold basic-text__title_sm basic-text__title">Menu</h4>
				</div>
				<?php if($f_footer){ ?>
				<div class="site-footer__item">
					<div class="site-footer__item-content">
						<?php if ($f_footer): ?>
						<div class="header-nav header-nav_alt">
							<?php foreach ($f_footer as $link): 
								$e_dead = $link['disable_link'];
								$e_subnav = $link['enable_subnav'];
								$f_subnav = $link['subitems'];
							?>
							<div class="header-nav__item <?php if($e_subnav){ echo ' header-nav__item_has-child '; } ?>">
									<?php if($e_subnav){ ?>
									<div class="subheader-nav ">
										<?php if($f_subnav){ ?>
											<?php foreach ($f_subnav as $sublink): ?>
											<div class="subheader-nav__item">
												<a href="<?php echo esc_url($sublink['item']['url']); ?>" target="<?php echo $sublink['item']['target']; ?>" class="subheader-nav__link"><?php echo $sublink['item']['title']; ?></a>
											</div>
											<?php endforeach; ?>
										<?php } ?>
									</div>
									<?php } ?>
									<a <?php if($e_subnav && $e_dead){ echo ' TABINDEX="-1" '; } ?> href="<?php echo esc_url($link['item']['url']); ?>" target="<?php echo $link['item']['target']; ?>" class="header-nav__link <?php if($e_subnav && $e_dead){ echo ' blank-link '; } ?>"><?php echo $link['item']['title']; ?></a>
							</div>
							<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
    </footer>

	<div class="section section_copyright-block">
		<div class="parallax-section">
			<div class="parallax-section__pattern"></div>
		</div>
		<div class="section__content section__content_bg_tertiary">
			<div class="copyright">
				<div class="copyright__content">
					<div class="rights-reserved">© 2021. All Rights Reserved</div>
					<a class="privacy-policy" href="<?php echo $f_privacy['url']; ?>">Privacy Policy</a>
				</div>
			</div>
		</div>
	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
