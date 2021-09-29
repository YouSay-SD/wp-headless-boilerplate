<?php
    function create_post_type() {
        
        // Company News
        register_post_type( 'resources',
            array(
                'labels' => array(
                'name' => __( 'Resources' ),
                'singular_name' => __( 'Resource' )
                ),
                // 'rewrite' => array(
                //   'slug' => 'case-study'
                // ),
                // 'has_archive' => true,
                'public' => true,
                'supports' => array( 'thumbnail', 'title', 'editor', 'author'),
                'menu_icon' => 'dashicons-megaphone',
                'taxonomies' => array( 'resource' ),
            )
        );

        //Modals
        register_post_type( 'modals',
        array(
            'labels' => array(
                'name' => __( 'Modals' ),
                'singular_name' => __( 'Modal' ),
            ),
            'has_archive' => false,
            'public' => true,
            'supports' => array('title'),
            'menu_icon' => 'dashicons-align-center',
            'publicly_queryable'  => false
            )
        );

        // Videos
        register_post_type( 'blog',
            array(
                'labels' => array(
                    'name' => __( 'Blogs' ),
                    'singular_name' => __( 'Blog' ),
                ),
                'has_archive' => false,
                'public' => true,
                'supports' => array( 'thumbnail', 'title'),
                'menu_icon' => 'dashicons-align-center',
                'publicly_queryable'  => false,
                'show_in_graphql' => true,
                'graphql_single_name' => 'cptBlog',
                'graphql_plural_name' => 'cptBlogs',
            )
        );
    }

    add_action( 'init', 'create_post_type' );
?>
