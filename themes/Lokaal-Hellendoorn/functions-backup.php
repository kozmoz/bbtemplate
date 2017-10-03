<?php

// Register Custom Post Type
function nieuws_post_type() {

    $labels = array(
        'name'                  => _x( 'Nieuws', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Nieuws', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Nieuws', 'text_domain' ),
        'name_admin_bar'        => __( 'Nieuws', 'text_domain' ),
        'archives'              => __( 'Nieuws archief', 'text_domain' ),
        'parent_item_colon'     => __( 'Bovenliggend nieuws item', 'text_domain' ),
        'all_items'             => __( 'Alle nieuws items', 'text_domain' ),
        'add_new_item'          => __( 'Nieuw nieuws item toevoegen', 'text_domain' ),
        'add_new'               => __( 'Nieuw nieuws item', 'text_domain' ),
        'new_item'              => __( 'Nieuw nieuws item', 'text_domain' ),
        'edit_item'             => __( 'Nieuws item bewerken', 'text_domain' ),
        'update_item'           => __( 'Nieuws item opslaan', 'text_domain' ),
        'view_item'             => __( 'Bekijk nieuws item', 'text_domain' ),
        'search_items'          => __( 'Nieuws item zoeken', 'text_domain' ),
        'not_found'             => __( 'Geen nieuws item gevonden', 'text_domain' ),
        'not_found_in_trash'    => __( 'Geen nieuws item gevonden in de prullenbak', 'text_domain' ),
        'featured_image'        => __( 'Afbeelding', 'text_domain' ),
        'set_featured_image'    => __( 'Stel in als afbeelding', 'text_domain' ),
        'remove_featured_image' => __( 'Verwijder afbeelding', 'text_domain' ),
        'use_featured_image'    => __( 'Gebruik als afbeelding', 'text_domain' ),
        'insert_into_item'      => __( 'Toevoegen aan dit nieuws item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Upload naar dit nieuws item', 'text_domain' ),
        'items_list'            => __( 'Lijst', 'text_domain' ),
        'items_list_navigation' => __( 'Lijst navigatie', 'text_domain' ),
        'filter_items_list'     => __( 'Filter lijst', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Product', 'text_domain' ),
        'description'           => __( 'Product informatie', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', ),
        'hierarchical'          => false,
        'public'                => true,
        'publicly_queriable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-post',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'capability_type'       => 'post',
        'with_front'            => false

    );
    register_post_type( 'nieuws', $args );

}
add_action( 'init', 'nieuws_post_type', 0 );

// Register Custom Post Type
function fractie_post_type() {

    $labels = array(
        'name'                  => _x( 'Fractie lid', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Fractie lid', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Fractie leden', 'text_domain' ),
        'name_admin_bar'        => __( 'Fractie lid', 'text_domain' ),
        'archives'              => __( 'actieve fractie leden', 'text_domain' ),
        'parent_item_colon'     => __( 'Bovenliggend fractie leden', 'text_domain' ),
        'all_items'             => __( 'Alle fractie leden', 'text_domain' ),
        'add_new_item'          => __( 'Nieuw fractie lid toevoegen', 'text_domain' ),
        'add_new'               => __( 'Nieuw fractie lid', 'text_domain' ),
        'new_item'              => __( 'Nieuw fractie lid', 'text_domain' ),
        'edit_item'             => __( 'Fractie lid bewerken', 'text_domain' ),
        'update_item'           => __( 'Fractie lid opslaan', 'text_domain' ),
        'view_item'             => __( 'Bekijk fractie lid', 'text_domain' ),
        'search_items'          => __( 'Fractie lid zoeken', 'text_domain' ),
        'not_found'             => __( 'Geen fractie leden gevonden', 'text_domain' ),
        'not_found_in_trash'    => __( 'Geen fractie leden gevonden in de prullenbak', 'text_domain' ),
        'featured_image'        => __( 'Afbeelding', 'text_domain' ),
        'set_featured_image'    => __( 'Stel in als afbeelding', 'text_domain' ),
        'remove_featured_image' => __( 'Verwijder afbeelding', 'text_domain' ),
        'use_featured_image'    => __( 'Gebruik als afbeelding', 'text_domain' ),
        'insert_into_item'      => __( 'Toevoegen aan dit fractie lid', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Upload naar dit fractie lid', 'text_domain' ),
        'items_list'            => __( 'Lijst', 'text_domain' ),
        'items_list_navigation' => __( 'Lijst navigatie', 'text_domain' ),
        'filter_items_list'     => __( 'Filter lijst', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Concept', 'text_domain' ),
        'description'           => __( 'Concept informatie', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', ),
        'hierarchical'          => false,
        'public'                => false,
        'publicly_queriable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-admin-users',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'capability_type'       => 'post',
        'with_front'            => false
    );
    register_post_type( 'fractie', $args );

}
add_action( 'init', 'fractie_post_type', 0 );

//Remove menu items
function remove_menus(){
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'edit.php' );                   //Posts
}
add_action( 'admin_menu', 'remove_menus' );

// custom admin login logo
function custom_login_logo() {
    echo '<style type="text/css">
	h1 a {
	  background-image: url('.get_bloginfo('template_directory').'/images/screenshot.png) !important;
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
    $paged = $_POST["page"]+1;

    $query = new WP_Query(array(
        'post_type' => 'nieuws',
        'paged' => $paged,
        'orderby'=>"date",
        'post_status'=>"publish",
        'posts_per_page' => 8
    ) );

    if( $query->have_posts() );

    while( $query->have_posts() ): $query->the_post();?>

        <div class = "col-xs-12 col-sm-6 col-md-3" >
            <div class = "news-item" style="background:url('<?php the_field('nieuws_afbeelding');?>')">
                <div class="news-item-title">
                    <h3><?php the_title();?></h3>
                </div>
                <a href="<?php the_permalink();?>"><button>Lees verder</button></a>
            </div>
        </div>
    <?endwhile;

    wp_reset_postdata();

    die();
};



