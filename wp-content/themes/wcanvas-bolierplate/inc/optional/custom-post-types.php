<?php
    function create_post_type() {
        // Blog
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

        // Case Study
        register_post_type( 'case-study',
            array(
                'labels' => array(
                    'name' => __( 'Case Studies' ),
                    'singular_name' => __( 'Case Study' ),
                ),
                'has_archive' => false,
                'public' => true,
                'supports' => array( 'thumbnail', 'title'),
                'menu_icon' => 'dashicons-align-center',
                'publicly_queryable'  => false,
                'show_in_graphql' => true,
                'graphql_single_name' => 'cptCaseStudy',
                'graphql_plural_name' => 'cptCaseStudys',
            )
        );
    }

    add_action( 'init', 'create_post_type' );
?>
