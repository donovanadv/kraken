<?php
/**
 * Theme header
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php get_template_part('template-parts/social', 'sharing');
	wp_head(); 
	?>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div id="content" class="site-content">
		<div class="intro ">
		    <div class="intro__header">
		        <?php
		        get_template_part('template-parts/site', 'header');
				get_template_part('template-parts/site', 'hero');
		        ?>
		    </div>
		</div>