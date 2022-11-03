<?php

// Gutenberg full document width.
add_theme_support( 'align-wide' );

// Register Custom Post Type
function nieuws_post_type() {

    $labels = array(
        'name' => _x('Nieuws', 'Post Type General Name', 'text_domain'),
        'singular_name' => _x('Nieuws', 'Post Type Singular Name', 'text_domain'),
        'menu_name' => __('Nieuws', 'text_domain'),
        'name_admin_bar' => __('Nieuws', 'text_domain'),
        'archives' => __('Nieuws archief', 'text_domain'),
        'parent_item_colon' => __('Bovenliggend nieuws item', 'text_domain'),
        'all_items' => __('Alle nieuws items', 'text_domain'),
        'add_new_item' => __('Nieuw nieuws item toevoegen', 'text_domain'),
        'add_new' => __('Nieuw nieuws item', 'text_domain'),
        'new_item' => __('Nieuw nieuws item', 'text_domain'),
        'edit_item' => __('Nieuws item bewerken', 'text_domain'),
        'update_item' => __('Nieuws item opslaan', 'text_domain'),
        'view_item' => __('Bekijk nieuws item', 'text_domain'),
        'search_items' => __('Nieuws item zoeken', 'text_domain'),
        'not_found' => __('Geen nieuws item gevonden', 'text_domain'),
        'not_found_in_trash' => __('Geen nieuws item gevonden in de prullenbak', 'text_domain'),
        'featured_image' => __('Afbeelding', 'text_domain'),
        'set_featured_image' => __('Stel in als afbeelding', 'text_domain'),
        'remove_featured_image' => __('Verwijder afbeelding', 'text_domain'),
        'use_featured_image' => __('Gebruik als afbeelding', 'text_domain'),
        'insert_into_item' => __('Toevoegen aan dit nieuws item', 'text_domain'),
        'uploaded_to_this_item' => __('Upload naar dit nieuws item', 'text_domain'),
        'items_list' => __('Lijst', 'text_domain'),
        'items_list_navigation' => __('Lijst navigatie', 'text_domain'),
        'filter_items_list' => __('Filter lijst', 'text_domain'),
    );
    $args = array(
        'label' => __('Product', 'text_domain'),
        'description' => __('Product informatie', 'text_domain'),
        'labels' => $labels,
        //'supports' => array('title', 'editor', 'thumbnail',),
        'hierarchical' => false,
        'public' => true,
        'publicly_queriable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-post',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'with_front' => false,
        // Enable Gutenberg block-editor.
        // https://www.cloudways.com/blog/gutenberg-wordpress-custom-post-type/
        'show_in_rest' => true
    );
    register_post_type('nieuws', $args);

}

add_action('init', 'nieuws_post_type', 0);


// Remove menu items.
function remove_menus() {
    remove_menu_page('edit-comments.php');          //Comments
    remove_menu_page('edit.php');                   //Posts
}

add_action('admin_menu', 'remove_menus');

// custom admin login logo
function custom_login_logo() {
    echo '<style type="text/css">
	h1 a {
	  background-image: url(' . get_bloginfo('template_directory') . '/images/logo2.png) !important;
	  width: 100%!important;
	  height: 150px!important;
	  background-size: contain!important;
   }
	</style>';
}

add_action('login_head', 'custom_login_logo');


// ajax load more
add_action('wp_ajax_nopriv_ajax_load_more_news', 'ajax_load_more_news');
add_action('wp_ajax_ajax_load_more_news', 'ajax_load_more_news');

function ajax_load_more_news() {
    //load more post
    $paged = $_POST["page"] + 1;

    $query = new WP_Query(array(
        'post_type' => 'nieuws',
        'paged' => $paged,
        'orderby' => "date",
        'post_status' => "publish",
        'posts_per_page' => 8
    ));

    if ($query->have_posts()) ;

    while ($query->have_posts()): $query->the_post(); ?>

        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="news-item" style="background:url('<?php the_field('nieuws_afbeelding'); ?>')">
                <div class="news-item-title">
                    <h3><?php the_title(); ?></h3>
                </div>
                <a href="<?php the_permalink(); ?>">
                    <button>Lees verder</button>
                </a>
            </div>
        </div>
    <?php endwhile;

    wp_reset_postdata();

    die();
}

;

//custom search
function template_chooser($template) {
    global $wp_query;
    $post_type = get_query_var('post_type');
    if ($wp_query->is_search && $post_type == 'nieuws') {
        return locate_template('archive-search.php');  //  redirect to archive-search.php
    }
    return $template;
}

add_filter('template_include', 'template_chooser');


if (!function_exists('bb_setup')) :

    /**
     * Set up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support post thumbnails.
     */
    function bb_setup() {

        // This template supports featured images.
        //add_theme_support('post-thumbnails');
        // Gutenberg full document width.
        add_theme_support('align-wide');
        // https://thrivewp.com/responsive-youtube-embed-wordpress-gutenberg-editor/
        // https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
        add_theme_support('responsive-embeds');

        //set_post_thumbnail_size(672, 372, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list',
        ));

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
        ));

        // This theme styles the visual editor to resemble the theme style.
        add_editor_style('css/editor-style.css');

    }
endif;
add_action('after_setup_theme', 'bb_setup');

/**
 * Enqueue Gutenberg block editor style.
 * https://phantomthemes.com/easily-add-styles-to-gutenberg-block-editor/
 */
function bb_gutenberg_editor_styles() {
    wp_enqueue_style('bb-block-editor-styles', get_theme_file_uri('/style-editor.css'), false, '1.0', 'all');
}

add_action('enqueue_block_editor_assets', 'bb_gutenberg_editor_styles');

