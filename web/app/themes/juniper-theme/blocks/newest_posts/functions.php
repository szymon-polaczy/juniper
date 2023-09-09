<?php

add_action('wp_enqueue_scripts', function() {
	if (has_block('acf/newest-posts')) {
		wp_enqueue_style('tailwindcss', 'https://cdn.tailwindcss.com', array(), 'latest', 'all');
		wp_enqueue_script('htmx', 'https://unpkg.com/htmx.org@1.9.5', array(), '1.9.5', true);
	}
});

add_filter(
	'timber/acf-gutenberg-blocks-data/newest-posts',
	function( $context ) {
        $posts = get_posts(array(
                'post_type' => 'post',
                'numberposts' => 6,
                'orderby' => 'date',
                'order' => 'DESC'
            )
        );

        $context['newest_posts'] = $posts;

	    return $context;
    }
);

add_action('init', function() {
    add_rewrite_endpoint('htmx_more_newest_posts', EP_ROOT);
    flush_rewrite_rules();
});

add_action('template_redirect', function() {
    global $wp_query;
    if ( !isset( $wp_query->query_vars[ 'htmx_more_newest_posts' ] ) ) {
        return;
    }

    $page = $_GET['page'];

    $posts = Timber::get_posts(
        array(
            'post_type' => 'post',
            'numberposts' => 6,
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $page,
        )
    );


    foreach($posts as $post) {
        Timber::render( 'templates/partial/listing-post.twig', array( 'post' => $post) ); 
    }

    if (count($posts) == 6):
?>
    <div id="replace-posts">
        <button 
            hx-get="/htmx_more_newest_posts?page=<?php echo ($page + 1); ?>"
            hx-trigger="click"
            hx-target="#replace-posts"
            hx-swap="outerHTML"
        >
            Load more posts
        </button>
    </div>
<?php
    endif;

    die();
});
