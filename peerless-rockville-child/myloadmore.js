// jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
// 	$('.misha_loadmore').click(function(){
 
// 		var button = $(this),
// 		    data = {
// 			'action': 'loadmore',
// 			'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
// 			'page' : misha_loadmore_params.current_page
// 		};
 
// 		$.ajax({ // you can also use $.post here
// 			url : misha_loadmore_params.ajaxurl, // AJAX handler
// 			data : data,
// 			type : 'POST',
// 			beforeSend : function ( xhr ) {
// 				button.text('Loading...'); // change the button text, you can also add a preloader image
// 			},
// 			success : function( data ){
// 				if( data ) { 
// 					$('.empty-post').after(data);
// 					//button.text( 'More posts' ).prev().after(data); // insert new posts
// 					misha_loadmore_params.current_page++;
 
// 					if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) 
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

let currentPage = 1;
jQuery(function($){
	$('#advocacy-load-more').on('click', function() {
		console.log("button click working")
		currentPage++; // Do currentPage + 1, because we want to load the next page

		$.ajax({
			type: 'POST',
			url: '/wp-admin/admin-ajax.php',
			dataType: 'json',
			data: {
				action: 'advocacy_load_more',
				paged: currentPage,  
			},
			success: function (res) {
				if(currentPage >= res.max) {
					$('#advocacy-load-more').hide();
				  }
				$('.advocacy-posts-container').append(res.html);
			}
		});
	}); 
}); 