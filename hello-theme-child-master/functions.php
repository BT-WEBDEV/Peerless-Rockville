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



//======================================================================
// EVENTS LOOP SHORTCODES
//======================================================================

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





//======================================================================
// NEWS LOOP SHORTCODES
//======================================================================

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
    include get_template_directory() . '/template-parts/news-loop-advocacy-newsroom.php';
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




//======================================================================
// EXHIBITS LOOP SHORTCODES
//======================================================================

// NEWS LOOP NEWSROOM
function exhibits_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/exhibits-loop.php';
	return ob_get_clean();
}
add_shortcode( 'exhibits_output', 'exhibits_shortcode');




//======================================================================
// AJAX HANDLERS 
//======================================================================

//-----------------------------------------------------
// EXHIBITS LOAD MORE (Exhibits Page)
//-----------------------------------------------------

function exhibits_load_more() {
	$ajaxposts = new WP_Query([
		'post_type' => 'exhibits',
		'posts_per_page' => 3,
		'orderby' => 'date',
		'order' => 'DESC',
		'paged' => $_POST['paged'],
	]);
  
	$response = '';
	$max_pages = $ajaxposts->max_num_pages;
  
	if($ajaxposts->have_posts()) {
	  ob_start();
	  while($ajaxposts->have_posts()) : $ajaxposts->the_post();
	  	$response .= include get_template_directory() . '/template-parts/cards/exhibits-card.php';
		//$response .= get_template_part('parts/card', 'publication');
	  endwhile;
	  $output = ob_get_contents();
	  ob_end_clean();
	} else {
	  $response = '';
	}

	$result = [
		'max' => $max_pages,
		'html' => $output,
	  ];
	echo json_encode($result);
	exit;
}
add_action('wp_ajax_exhibits_load_more', 'exhibits_load_more'); 
add_action('wp_ajax_nopriv_exhibits_load_more', 'exhibits_load_more');



//-----------------------------------------------------
// ADVOCACY LOAD MORE (Newsroom Page)
//-----------------------------------------------------
function advocacy_load_more() {
	$ajaxposts = new WP_Query([
		'post_type' => 'post',
		'orderby' => 'date',
		'order' => 'DESC',
		'category__in' => 27,
		'posts_per_page' => 3,
		'paged' => $_POST['paged'],
	]);

	$response = '';
	$max_pages = $ajaxposts->max_num_pages;

	if($ajaxposts->have_posts()) {
		ob_start();
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();
		$response .= include get_template_directory() . '/template-parts/cards/news-loop-newsroom-card.php';
		//$response .= get_template_part('parts/card', 'publication');
		endwhile;
		$output = ob_get_contents();
		ob_end_clean();
	} else {
		$response = '';
	}

	$result = [
		'max' => $max_pages,
		'html' => $output,
		];
	echo json_encode($result);
	exit;
}
add_action('wp_ajax_advocacy_load_more', 'advocacy_load_more'); 
add_action('wp_ajax_nopriv_advocacy_load_more', 'advocacy_load_more');



//-----------------------------------------------------
// NEW RELEASES LOAD MORE (Newsroom Page)
//-----------------------------------------------------
function new_releases_load_more() {
	$ajaxposts = new WP_Query([
		'post_type' => 'post',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' => 6,
		'category__not_in' => 26,
		'paged' => $_POST['paged'],
	]);

	$response = '';
	$max_pages = $ajaxposts->max_num_pages;

	if($ajaxposts->have_posts()) {
		ob_start();
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .= include get_template_directory() . '/template-parts/cards/new-releases-newsroom-card.php';
		//$response .= get_template_part('parts/card', 'publication');
		endwhile;
		$output = ob_get_contents();
		ob_end_clean();
	} else {
		$response = '';
	}

	$result = [
		'max' => $max_pages,
		'html' => $output,
		];
	echo json_encode($result);
	exit;
}
add_action('wp_ajax_new_releases_load_more', 'new_releases_load_more'); 
add_action('wp_ajax_nopriv_new_releases_load_more', 'new_releases_load_more');
