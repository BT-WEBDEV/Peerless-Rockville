<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */

/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		'1.0.0'
	);
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );

////////////// EVENTS LOOP SHORTCODES ///////////////////

// EVENTS LOOP HOME PAGE 
function events_loop_home_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/events-loop-home.php';
	return ob_get_clean();
}
add_shortcode( 'events_loop_home_output', 'events_loop_home_shortcode');

// EVENTS LOOP THINGS TO DO PAGE
function events_loop_thingstodo_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/events-loop-thingstodo.php';
	return ob_get_clean();
}
add_shortcode( 'events_loop_thingstodo_output', 'events_loop_thingstodo_shortcode');

// EVENTS LOOP ROCKVILLE HISTORY PAGE
function events_loop_rockville_history_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/events-loop-rockville-history.php';
	return ob_get_clean();
}
add_shortcode( 'events_loop_rockville_history_output', 'events_loop_rockville_history_shortcode');


// EVENTS LOOP EVENTS SINGLE POST
function events_loop_events_single_post_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/events-loop-events-single-post.php';
	return ob_get_clean();
}
add_shortcode( 'events_loop_events_single_post_output', 'events_loop_events_single_post_shortcode');



////////////// NEWS LOOP SHORTCODES ///////////////////

// NEWS LOOP HOME PAGE
function news_loop_home_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/news-loop-home.php';
	return ob_get_clean();
}
add_shortcode( 'news_loop_home_output', 'news_loop_home_shortcode');


// NEWS LOOP ROCKVILLE HISTORY
function news_loop_rockville_history_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/news-loop-rockville-history.php';
	return ob_get_clean();
}
add_shortcode( 'news_loop_rockville_history_output', 'news_loop_rockville_history_shortcode');

// NEWS LOOP NEWS SINGLE POST
function news_loop_news_single_post_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/news-loop-news-single-post.php';
	return ob_get_clean();
}
add_shortcode( 'news_loop_news_single_post_output', 'news_loop_news_single_post_shortcode');

// NEWS LOOP NEWSROOM
function news_loop_newsroom_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/news-loop-newsroom.php';
	return ob_get_clean();
}
add_shortcode( 'news_loop_newsroom_output', 'news_loop_newsroom_shortcode');

// NEWS LOOP NEWSROOM
function news_loop_newsroom_new_releases_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/news-loop-newsrooom-new-releases.php';
	return ob_get_clean();
}
add_shortcode( 'news_loop_newsroom_new_releases_output', 'news_loop_newsroom_new_releases_shortcode');

////////////// EXHIBITS LOOP SHORTCODES ///////////////////

// NEWS LOOP NEWSROOM
function exhibits_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/exhibits-loop.php';
	return ob_get_clean();
}
add_shortcode( 'exhibits_output', 'exhibits_shortcode');


//////////// NEWSROOM LOAD MORE ADVOCACY SCRIPT //////////////// 
function misha_my_load_more_scripts() {

	$args = array(  
		'post_type' => 'post',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'category__in' => 27,
		'posts_per_page' => 3,
	);

	$news_posts_home = new WP_Query($args);
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/myloadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $news_posts_home->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $news_posts_home->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );



//////////// NEWSROOM LOAD MORE ADVOCACY AJAX HANDLER //////////////// 
function misha_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			//get_template_part( 'news-loop-newsroom-card.php',);
			// for the test purposes comment the line above and uncomment the below one
			//the_title();
			include get_template_directory() . '/template-parts/cards/news-loop-newsroom-card.php';
 
 
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}



//////////// NEWSROOM LOAD MORE NEW RELEASES SCRIPT //////////////// 
function new_releases_load_more_scripts() { 
	$args = array(  
		'post_type' => 'post',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => 6,
		'category__not_in' => 26,
	);

	$news_posts_new_releases = new WP_Query($args);
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'new_releases_loadmore', get_stylesheet_directory_uri() . '/new-releases-loadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'new_releases_loadmore', 'new_releases_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $news_posts_new_releases->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $news_posts_new_releases->max_num_pages
	) );
 
 	wp_enqueue_script( 'new_releases_loadmore' );

}

add_action( 'wp_enqueue_scripts', 'new_releases_load_more_scripts' );


//////////// NEWSROOM LOAD MORE NEW RELEASES AJAX HANDLER //////////////// 
function new_releases_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 
			// look into your theme code how the posts are inserted, but you can use your own HTML of course
			// do you remember? - my example is adapted for Twenty Seventeen theme
			//get_template_part( 'news-loop-newsroom-card.php',);
			// for the test purposes comment the line above and uncomment the below one
			//the_title();
			include get_template_directory() . '/template-parts/cards/new-releases-newsroom-card.php';
 
 
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'new_releases_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'new_releases_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

