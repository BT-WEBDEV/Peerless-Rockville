let currentPage = 1;
jQuery(function($){
	$('#exhibit-load-more').on('click', function() {
		console.log("button click working")
		currentPage++; // Do currentPage + 1, because we want to load the next page

		$.ajax({
			type: 'POST',
			url: '/wp-admin/admin-ajax.php',
			dataType: 'json',
			data: {
				action: 'exhibits_load_more',
				paged: currentPage,  
			},
			success: function (res) {
				if(currentPage >= res.max) {
					$('#exhibit-load-more').hide();
				  }
				$('.exhibits-posts-container').append(res.html);
			}
		});
	}); 
}); 