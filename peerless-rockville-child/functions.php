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

// EVENTS LOOP - home page 
function events_loop_home_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/events/events-loop-home.php';
	return ob_get_clean();
}
add_shortcode( 'events_loop_home_output', 'events_loop_home_shortcode');

// EVENTS LOOP - /things-to-do/ 
function events_loop_thingstodo_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/events/events-loop-thingstodo.php';
	return ob_get_clean();
}
add_shortcode( 'events_loop_thingstodo_output', 'events_loop_thingstodo_shortcode');

// EVENTS LOOP ROCKVILLE HISTORY PAGE
function events_loop_rockville_history_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/events/events-loop-rockville-history.php';
	return ob_get_clean();
}
add_shortcode( 'events_loop_rockville_history_output', 'events_loop_rockville_history_shortcode');


// EVENTS LOOP EVENTS SINGLE POST
function events_loop_events_single_post_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/events/events-loop-events-single-post.php';
	return ob_get_clean();
}
add_shortcode( 'events_loop_events_single_post_output', 'events_loop_events_single_post_shortcode');





//======================================================================
// NEWS LOOP SHORTCODES
//======================================================================

// NEWS LOOP HOME PAGE
function news_loop_home_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/news/news-loop-home.php';
	return ob_get_clean();
}
add_shortcode( 'news_loop_home_output', 'news_loop_home_shortcode');


// NEWS LOOP ROCKVILLE HISTORY
function news_loop_rockville_history_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/news/news-loop-rockville-history.php';
	return ob_get_clean();
}
add_shortcode( 'news_loop_rockville_history_output', 'news_loop_rockville_history_shortcode');

// NEWS LOOP NEWS SINGLE POST
function news_loop_news_single_post_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/news/news-loop-news-single-post.php';
	return ob_get_clean();
}
add_shortcode( 'news_loop_news_single_post_output', 'news_loop_news_single_post_shortcode');

// NEWS LOOP NEWSROOM
function news_loop_newsroom_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/news/news-loop-advocacy-newsroom.php';
	return ob_get_clean();
}
add_shortcode( 'news_loop_newsroom_output', 'news_loop_newsroom_shortcode');

// NEWS LOOP NEWSROOM
function news_loop_newsroom_new_releases_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/news/news-loop-newsrooom-new-releases.php';
	return ob_get_clean();
}
add_shortcode( 'news_loop_newsroom_new_releases_output', 'news_loop_newsroom_new_releases_shortcode');




//======================================================================
// EXHIBITS LOOP SHORTCODES
//======================================================================

// EXHIBITS LOOP  - /exhibits/
function exhibits_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/exhibits/exhibits-loop.php';
	return ob_get_clean();
}
add_shortcode( 'exhibits_output', 'exhibits_shortcode');





//======================================================================
// PRODUCTS LOOP SHORTCODES
//======================================================================

// FEATURED PRODUCTS LOOP - /peerless-shop/ 
function featured_products_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/products/featured-products-loop.php';
	return ob_get_clean();
}
add_shortcode( 'featured_products_output', 'featured_products_shortcode');

// BOOKS PRODUCTS LOOP - /peerless-shop/ 
function book_products_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/products/book-products-loop.php';
	return ob_get_clean();
}
add_shortcode( 'book_products_output', 'book_products_shortcode');

// CLOTHING PRODUCTS LOOP - /peerless-shop/ 
function clothing_products_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/products/clothing-products-loop.php';
	return ob_get_clean();
}
add_shortcode( 'clothing_products_output', 'clothing_products_shortcode'); 

// BAG PRODUCTS LOOP - /peerless-shop/ 
function bag_products_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/products/bag-products-loop.php';
	return ob_get_clean();
}
add_shortcode( 'bag_products_output', 'bag_products_shortcode'); 

// ORNAMENT PRODUCTS LOOP - /peerless-shop/ 
function ornament_products_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/products/ornament-products-loop.php';
	return ob_get_clean();
}
add_shortcode( 'ornament_products_output', 'ornament_products_shortcode'); 

// MISC PRODUCTS LOOP - /peerless-shop/ 
function misc_products_shortcode( $atts ) {
	ob_start();
    include get_template_directory() . '/template-parts/loops/products/misc-products-loop.php';
	return ob_get_clean();
}
add_shortcode( 'misc_products_output', 'misc_products_shortcode');


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

//-----------------------------------------------------
// BOOK PRODUCTS LOAD MORE (Peerless Shop Page)
//-----------------------------------------------------
function book_products_load_more() {
	$ajaxposts = new WP_Query([
		'post_type' => 'product',
		'orderby' => 'date',
		'order' => 'DESC',
		'product_cat' => 'books', 
		'posts_per_page' => 4,
		'paged' => $_POST['paged'],
	]);

	$response = '';
	$max_pages = $ajaxposts->max_num_pages;

	if($ajaxposts->have_posts()) {
		ob_start();
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .= include get_template_directory() . '/template-parts/cards/book-products-card.php';
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
add_action('wp_ajax_book_products_load_more', 'book_products_load_more'); 
add_action('wp_ajax_nopriv_book_products_load_more', 'book_products_load_more');


//-----------------------------------------------------
// CLOTHING PRODUCTS LOAD MORE (Peerless Shop Page)
//-----------------------------------------------------
function clothing_products_load_more() {
	$ajaxposts = new WP_Query([
		'post_type' => 'product',
		'orderby' => 'date',
		'order' => 'DESC',
		'product_cat' => 'clothing', 
		'posts_per_page' => 4,
		'paged' => $_POST['paged'],
	]);

	$response = '';
	$max_pages = $ajaxposts->max_num_pages;

	if($ajaxposts->have_posts()) {
		ob_start();
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .= include get_template_directory() . '/template-parts/cards/clothing-products-card.php';
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
add_action('wp_ajax_clothing_products_load_more', 'clothing_products_load_more'); 
add_action('wp_ajax_nopriv_clothing_products_load_more', 'clothing_products_load_more');


//-----------------------------------------------------
// BAG PRODUCTS LOAD MORE (Peerless Shop Page)
//-----------------------------------------------------
function bag_products_load_more() {
	$ajaxposts = new WP_Query([
		'post_type' => 'product',
		'orderby' => 'date',
		'order' => 'DESC',
		'product_cat' => 'bags', 
		'posts_per_page' => 4,
		'paged' => $_POST['paged'],
	]);

	$response = '';
	$max_pages = $ajaxposts->max_num_pages;

	if($ajaxposts->have_posts()) {
		ob_start();
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .= include get_template_directory() . '/template-parts/cards/bag-products-card.php';
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
add_action('wp_ajax_bag_products_load_more', 'bag_products_load_more'); 
add_action('wp_ajax_nopriv_bag_products_load_more', 'bag_products_load_more');

//-----------------------------------------------------
// ORNAMENTS PRODUCTS LOAD MORE (Peerless Shop Page)
//-----------------------------------------------------
function ornament_products_load_more() {
	$ajaxposts = new WP_Query([
		'post_type' => 'product',
		'orderby' => 'date',
		'order' => 'DESC',
		'product_cat' => 'ornaments', 
		'posts_per_page' => 4,
		'paged' => $_POST['paged'],
	]);

	$response = '';
	$max_pages = $ajaxposts->max_num_pages;

	if($ajaxposts->have_posts()) {
		ob_start();
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .= include get_template_directory() . '/template-parts/cards/ornament-products-card.php';
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
add_action('wp_ajax_ornament_products_load_more', 'ornament_products_load_more'); 
add_action('wp_ajax_nopriv_ornament_products_load_more', 'ornament_products_load_more');


//-----------------------------------------------------
// MISC PRODUCTS LOAD MORE (Peerless Shop Page)
//-----------------------------------------------------
function misc_products_load_more() {
	$ajaxposts = new WP_Query([
		'post_type' => 'product',
		'orderby' => 'date',
		'order' => 'DESC',
		'product_cat' => 'uncategorized', 
		'posts_per_page' => 4,
		'paged' => $_POST['paged'],
	]);

	$response = '';
	$max_pages = $ajaxposts->max_num_pages;

	if($ajaxposts->have_posts()) {
		ob_start();
		while($ajaxposts->have_posts()) : $ajaxposts->the_post();
			$response .= include get_template_directory() . '/template-parts/cards/misc-products-card.php';
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
add_action('wp_ajax_misc_products_load_more', 'misc_products_load_more'); 
add_action('wp_ajax_nopriv_misc_products_load_more', 'misc_products_load_more');