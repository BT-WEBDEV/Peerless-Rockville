// jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
// 	$('.exhibits_loadmore').click(function(){
 
// 		var button = $(this),
// 		    data = {
// 			'action': 'loadmore',
// 			'query': exhibits_loadmore_params.posts, // that's how we get params from wp_localize_script() function
// 			'page' : exhibits_loadmore_params.current_page
// 		};
 
// 		$.ajax({ // you can also use $.post here
// 			url : exhibits_loadmore_params.ajaxurl, // AJAX handler
// 			data : data,
// 			type : 'POST',
// 			beforeSend : function ( xhr ) {
// 				button.text('Loading...'); // change the button text, you can also add a preloader image
// 			},
// 			success : function( data ){
// 				if( data ) { 
// 					$('.empty-exhibits-post').after(data);
// 					//button.text( 'More posts' ).prev().after(data); // insert new posts
// 					exhibits_loadmore_params.current_page++;
 
// 					if ( exhibits_loadmore_params.current_page == exhibits_loadmore_params.max_page ) 
// 						button.remove(); // if last page, remove the button
 
// 					// you can also fire the "post-load" event here if you use a plugin that requires it
// 					// $( document.body ).trigger( 'post-load' );
// 				} else {
// 					button.remove(); // if no data, remove the button as well
// 				}
// 			}
// 		});
// 	});
// }); 

// let currentPage = 1;
// $('#exhibit-load-more').on('click', function() {
// 	currentPage++; // Do currentPage + 1, because we want to load the next page

// 	$.ajax({
// 		type: 'POST',
// 		url: '/wp-admin/admin-ajax.php',
// 		dataType: 'html',
// 		data: {
// 		  action: 'weichie_load_more',
// 		  paged: currentPage,
// 		},
// 		success: function (res) {
// 		  $('.exhibits-posts-container').append(res);
// 		}
// 	  });
//   })