<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 *
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title   = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer  = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__ . '/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(
    function ($file) use ($sage_error) {
        $file = "../app/{$file}.php";
        if (!locate_template($file, true, true)) {
            $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
        }
    },
    array('helpers', 'setup', 'filters', 'admin')
);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    array('theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'),
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf(
        'config',
        function () {
            return new Config(
                array(
                    'assets' => require dirname(__DIR__) . '/config/assets.php',
                    'theme'  => require dirname(__DIR__) . '/config/theme.php',
                    'view'   => require dirname(__DIR__) . '/config/view.php',
                )
            );
        },
        true
    );


/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'register_navwalker');

// Register Shows Post Type
function register_show_post_type()
{
    $labels = array(
        'name'                  => _x('Shows', 'Post Type General Name', 'westferry'),
        'singular_name'         => _x('Show', 'Post Type Singular Name', 'westferry'),
        'menu_name'             => __('Shows', 'westferry'),
        'name_admin_bar'        => __('Shows', 'westferry'),
        'archives'              => __('Show Archives', 'westferry'),
        'attributes'            => __('Show Attributes', 'westferry'),
        'parent_item_colon'     => __('Parent Item:', 'westferry'),
        'all_items'             => __('All Shows', 'westferry'),
        'add_new_item'          => __('Add New Show', 'westferry'),
        'add_new'               => __('Add New', 'westferry'),
        'new_item'              => __('New Show', 'westferry'),
        'edit_item'             => __('Edit Show', 'westferry'),
        'update_item'           => __('Update Show', 'westferry'),
        'view_item'             => __('View Show', 'westferry'),
        'view_items'            => __('View Shows', 'westferry'),
        'search_items'          => __('Search Show', 'westferry'),
        'not_found'             => __('Not found', 'westferry'),
        'not_found_in_trash'    => __('Not found in Trash', 'westferry'),
        'featured_image'        => __('Featured Image', 'westferry'),
        'set_featured_image'    => __('Set featured image', 'westferry'),
        'remove_featured_image' => __('Remove featured image', 'westferry'),
        'use_featured_image'    => __('Use as featured image', 'westferry'),
        'insert_into_item'      => __('Insert into item', 'westferry'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'westferry'),
        'items_list'            => __('Items list', 'westferry'),
        'items_list_navigation' => __('Items list navigation', 'westferry'),
        'filter_items_list'     => __('Filter items list', 'westferry'),
    );
    $args   = array(
        'label'               => __('Shows', 'westferry'),
        'description'         => __('Shows', 'westferry'),
        'labels'              => $labels,
        'supports'            => array('title', 'thumbnail', 'custom-fields'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-calendar-alt',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type('show', $args);
}
add_action('init', 'register_show_post_type', 0);

// Register Album Post Type
function register_album_post_type()
{

    $labels = array(
        'name'                  => _x('Albums', 'Post Type General Name', 'westferry'),
        'singular_name'         => _x('Album', 'Post Type Singular Name', 'westferry'),
        'menu_name'             => __('Albums', 'westferry'),
        'name_admin_bar'        => __('Albums', 'westferry'),
        'archives'              => __('Album Archives', 'westferry'),
        'attributes'            => __('Album Attributes', 'westferry'),
        'parent_item_colon'     => __('Parent Album:', 'westferry'),
        'all_items'             => __('All Albums', 'westferry'),
        'add_new_item'          => __('Add New Album', 'westferry'),
        'add_new'               => __('Add New', 'westferry'),
        'new_item'              => __('New Album', 'westferry'),
        'edit_item'             => __('Edit Album', 'westferry'),
        'update_item'           => __('Update Album', 'westferry'),
        'view_item'             => __('View Album', 'westferry'),
        'view_items'            => __('View Albums', 'westferry'),
        'search_items'          => __('Search Album', 'westferry'),
        'not_found'             => __('Not found', 'westferry'),
        'not_found_in_trash'    => __('Not found in Trash', 'westferry'),
        'featured_image'        => __('Featured Image', 'westferry'),
        'set_featured_image'    => __('Set featured image', 'westferry'),
        'remove_featured_image' => __('Remove featured image', 'westferry'),
        'use_featured_image'    => __('Use as featured image', 'westferry'),
        'insert_into_item'      => __('Insert into item', 'westferry'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'westferry'),
        'items_list'            => __('Items list', 'westferry'),
        'items_list_navigation' => __('Items list navigation', 'westferry'),
        'filter_items_list'     => __('Filter items list', 'westferry'),
    );
    $args = array(
        'label'                 => __('Album', 'westferry'),
        'description'           => __('Albums', 'westferry'),
        'labels'                => $labels,
        'supports'              => array('title', 'thumbnail', 'custom-fields'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-album',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('album', $args);
}
add_action('init', 'register_album_post_type', 0);

// // Converts the Structure Tags in our permalink.
// function post_type_link($url, $post)
// {
//     if ('show' === get_post_type($post)) {
//         $show = get_field('show');
//         $date = DateTime::createFromFormat("Ymd", $show['date']);

//         $year = $date->format("Y");
//         $month = $date->format("m");
//         $day = $date->format("d");

//         $url = str_replace("%year%", $year, $url);
//         $url = str_replace("%month%", $month, $url);
//         $url = str_replace("%day%", $day, $url);
//         echo $url;
//     }
//     return $url;
// }

// add_filter('post_type_link', 'post_type_link', 10, 2);
