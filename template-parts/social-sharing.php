<?php 
    // This file controls all aspects of social sharing..
    $f_sharing_twitter = get_field('info_sharing_twitter', 'option');
    $f_image_default = get_field('info_sharing_image', 'option');
    $f_image_toggle = get_field('sharing_image_default');
    $f_image = get_field('sharing_image');
    $f_description = get_field('sharing_description');
    $meta_image = false;
    if ($f_image_toggle) {
        $meta_image = $f_image_default;
    } elseif ($f_image) {
        $meta_image = $f_image;
    } else{
		if (is_page()) {
			switch (get_page_template_slug()) {				
			    case 'template-home.php':
                    // Placeholder
                    $f_hero = get_field('hero');
                    // $meta_image = $f_hero['settings']['image'];
			    break;	
			}	
		} elseif (is_singular('post')) {
            // Placeholder
            $meta_image = '';
		}
    }
    if (!$meta_image) {
        $meta_image = $f_image_default;
    }
    $meta_description = '';
    if ($f_description) {
        $meta_description = $f_description;
    } else {
		if (is_page()) {
		switch (get_page_template_slug()) {
		    case 'template-home.php':
                $f_text = get_field('page_hero');
                $text = get_the_title();
                if($f_text['title']){
                    $text = $f_text['title']. ' ';
                    if($f_text['text']){
                        $text .= $f_text['text'];    
                    }
                }  else if($f_text['text']){
                    $text = $f_text['text'];
                }
                $meta_description = $text;
		    break;		

		    case '':
                // Placeholder
                $meta_description = '';
		    break;
			}	
		} elseif (is_singular('post')) {
            // Placeholder
            $meta_description = '';
		}
        $meta_description = trim(strip_tags($meta_description));
	}
?>
    <?php if ($meta_description) { ?><meta name="description" content="<?php echo esc_attr($meta_description); ?>" /><?php } ?>
	<!-- Metadata: Open Graph (Website) -->
	<meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php if (!is_home()) { echo get_permalink(); } else { echo get_permalink(get_option('page_for_posts')); } ?>" />
	<?php if ($meta_image): ?>
	    <meta property="og:image" content="<?php echo $meta_image['url']; ?>" />
	    <meta property="og:image:alt" content="<?php echo $meta_image['alt']; ?>" />
	    <meta property="og:image:type" content="<?php echo $meta_image['mime_type']; ?>" />
	    <meta property="og:image:width" content="<?php echo $meta_image['width']; ?>" />
	    <meta property="og:image:height" content="<?php echo $meta_image['height']; ?>" />
	<?php endif; ?>
	<meta property="og:description" content="<?php echo esc_attr($meta_description); ?>" />
	<meta property="og:site_name" content="<?php esc_attr(bloginfo('name')); ?>" />
	<?php if ($f_sharing_twitter): ?>
        <!-- Metadata: Twitter Card (Summary Card with Large Image) -->
        <meta name="twitter:card" content="<?php if ($meta_image) { echo 'summary_large_image'; } else { echo 'summary'; } ?>" />
        <meta name="twitter:site" content="@<?php echo $f_sharing_twitter; ?>" />
        <meta name="twitter:title" content="<?php echo esc_attr(wp_get_document_title()); ?>" />
        <meta name="twitter:description" content="<?php echo esc_attr($meta_description); ?>" />
        <?php if ($meta_image): ?>
            <meta name="twitter:image" content="<?php echo $meta_image['url']; ?>" />
            <meta name="twitter:image:alt" content="<?php echo $meta_image['alt']; ?>" />
        <?php endif; ?>
	<?php endif; ?>