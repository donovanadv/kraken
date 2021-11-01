<?php
/**
 * Load in our custom functions..
 */
function kraken_load_include_files() {
    foreach (glob(dirname(__FILE__) . '/includes/*.php') as $file) {
        include $file;
    }
}
add_action('init', 'kraken_load_include_files', 15);

/**
 * Set up theme defaults and register support for various WordPress features
 */
if (!function_exists('kraken_setup')) {
	function kraken_setup() {
		// Let WordPress manage the document title
		add_theme_support('title-tag');

		// Register nav menus
		register_nav_menus(array(
			'primary-menu' => 'Primary Menu'
		));

		// Switch default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));
	}
}
add_action('after_setup_theme', 'kraken_setup');


/**
 * Set the content width in pixels
 */
function kraken_content_width() {
	$GLOBALS['content_width'] = apply_filters('kraken_content_width', 640);
}
add_action('after_setup_theme', 'kraken_content_width', 0);


/**
 * Enqueue scripts and styles
 */
function kraken_scripts() {
	wp_enqueue_style('kraken-style', get_stylesheet_directory_uri() . '/style.min.css', array(), '0.1.0');
	wp_enqueue_style('kraken-vendor-style', get_stylesheet_directory_uri() . '/css/vendor.min.css', array(), '1.0.0');
    wp_enqueue_style('kraken-sass-style', get_stylesheet_directory_uri() . '/css/sass.min.css', array(), '1.0.0');

    wp_deregister_script('wp-embed');
    wp_deregister_script('jquery');
    // wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-1.12.4.min.js', array(), null, false);
   // Update to the latest and greatest jquery stable. 
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, false);

    // Fonts Loader.
    wp_enqueue_style('font', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400&display=swap');

    // Animation Scrolling Library
	wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js', array(), null, false);
	wp_enqueue_script('ScrollTrigger', 'https://unpkg.com/gsap@3/dist/ScrollTrigger.min.js', array(), null, false);

	wp_enqueue_script('kraken-script', get_template_directory_uri() . '/js/script.min.js', array('jquery'), '0.1.0', true);
}
add_action('wp_enqueue_scripts', 'kraken_scripts');

function kraken_admin_scripts() {
	wp_enqueue_script('ks-admin-js', get_template_directory_uri() . '/js/wp-admin.js', array(), '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'kraken_admin_scripts');


function kraken_enqueue_login_styles() {
    $theme      = wp_get_theme();
    $version    = $theme->get('version');
    $assets_dir = get_stylesheet_directory_uri();

    wp_enqueue_style('tower-login', $assets_dir . '/css/admin/admin.css', array(), $version);
}

add_action('login_enqueue_scripts', 'kraken_enqueue_login_styles');




/**
 * Add site icon
 */
function kraken_favicon() {
  echo '<link rel="icon" type="image/x-icon" href="' . get_stylesheet_directory_uri() . '/images/favicon.ico" />';
}
add_action('wp_head', 'kraken_favicon');
add_action('admin_head', 'kraken_favicon');


/**
 * Gravity Forms hide "Add Form" WYSIWYG button
 */
add_filter('gform_display_add_form_button', '__return_false');


/**
 * Customize order of admin menu items
 */
function kraken_admin_menu_order($menu_order) {
    // list of items keyed by the item they should be located after
    $relocate_after = array(
        'separator1' => array('edit.php?post_type=page'),
        'separator2' => array('acf-options-general-info', 'separator-last')
    );
    
    // create a list of all menu items that will be relocated
    $to_relocate = array();
    foreach ($relocate_after as $set) {
        $to_relocate = array_merge($to_relocate, $set);
    }
    
    // build new array and with items relocated
    $custom_order = array();
    foreach ($menu_order as $item) {
        // only process this item if it will not be relocated
        if (!in_array($item, $to_relocate)) {
            $custom_order[] = $item; // add this item to the array
            
            // if there are items to be located after this item, add them to the array also
            if (array_key_exists($item, $relocate_after)) {
                $custom_order = array_merge($custom_order, $relocate_after[$item]);
            }
        }
    }
    
    return $custom_order;
}
add_filter('custom_menu_order', '__return_true'); // enable menu_order filter
add_filter('menu_order', 'kraken_admin_menu_order'); // filter menu order



// /**
//  * Add Woocommerce support.
//  */
// function mytheme_add_woocommerce_support() {
//     add_theme_support( 'woocommerce' );
// }
// add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
