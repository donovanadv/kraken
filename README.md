# medusa

A starter theme by Donovan Advertising.

#### Initial Configuration

- If desired update the `Theme Name: kraken ` at the top of `style.css` to include the name for your new theme name.
- Find all occurences of `kraken-` (handle prefixes) and `kraken_` (function name prefixes) in `functions.php` and update them to match the name of your theme.
- Update `register_nav_menus()` in `functions.php` to register any nav menus you will need for your theme. If no nav menus are needed, remove the function call.

#### Gulp

- Run `npm install` to install all needed packages.
- Run `gulp` to verify everything is installed and working.

#### CSS and JS

- Run `gulp` any time you are making updates to your theme's CSS and JS.
- Add all custom CSS to `style.css`. This file will be minified, autoprefixed, and saved as `style.min.css`. Note that thanks to autoprefixer, you do not need to manually add vendor prefixes to your CSS.
- Add any 3rd party CSS files to `css/src`. These files will be concatenated, minified, and saved as `css/vendor.min.css`. Be sure to uncomment the line in `functions.php` that enqueues this CSS file.
- Add all custom JS functions to `js/src/functions.js`. Add any 3rd party JS files to `js/src`. These files will be concatenated and minified (along with `functions.js`) and saved as `js/script.min.js`.

#### Customization

- If your theme does not require an ACF Options page, remove the `Add ACF options page` section from `acf-functions.php`.
- If your theme requires comments, remove the `Disable comments` section from `wp-cleaner.php`.
- If your theme requires search, remove the `Disable search` section from `wp-cleaner.php`.
- If your theme will use Posts, remove the `Hide Posts from admin` section from `wp-cleaner.php`.
- If your theme requires post archive pages, remove the `Disable archive pages for Posts` section from `wp-cleaner.php` (or customize to fit your needs).
- If your theme will use the Category or Tag taxonomies for Posts, remove the the `Unregister default taxonomies for Posts` section (or the relevant lines) from `wp-cleaner.php`.
- If you'd like to use the default order for the admin menu items, remove the `Customize order of admin menu items` section from `functions.php`.
- Replace `images/favicon.ico` with the site icon for your theme.
- Update the default `color`, `font-family`, and any other properties as needed at the beginning of the `Typography` section in `style.css`.
- Update the `background-color` of `body` in the `Elements` section in `style.css` if necessary. This color is used to fill extra space on screens wider than 2100px.
- Update the `background-color` of `.site` in the `Content` section in `style.css` if necessary. This is the main background color of the site.
- Update the default link styles in the `Links` section of `style.css`.
- Remove the `Gravity Forms` section from `style.css` if the Gravity Forms plugin will not be used.
- If your theme will not use video embeds, remove the `initFitvids()` function and call from `js/src/functions.js` and delete `js/src/jquery.fitvids.js`.
- If your theme will not use leaflet, remove the `jsMap();` function and call from `js/src/leaflet.js` and delete `css/src/leaflet.css`.
- If your theme will not use slick, remove the `slick();` function and call from `js/src/slick.js` and delete `css/src/slick.css` & css/sass/partials/_slick.scss`, and remove call from `css/sass/main.scss`.
- If your theme will not use mpdf, remove the `require statement` from `composer.json`.
- If your theme will not use composer, remove the `vendor` folder and also remove the  `composer.json, & composer.lock`.



#### Other Notes

- Delete `woocommerce` folder if not being used.
- Delete any of the following files that your theme will not use: `archive.php`, `page.php`, `search.php`, `single.php`.
- Remember to update CSS and JS version numbers in `functions.php` any time you push changes to a live site (to ensure cached files are updated).
- Add any template part files to the `template-parts` folder.
- Add images and graphics to the `images` folder.
