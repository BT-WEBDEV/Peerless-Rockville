let currentNewReleasesPage = 1;
jQuery(function($){
	$('#new-releases-load-more').on('click', function() {
		console.log("button click working")
		currentPage++; // Do currentPage + 1, because we want to load the next page

		$.ajax({
			type: 'POST',
			url: '/wp-admin/admin-ajax.php',
			dataType: 'json',
			data: {
				action: 'new_releases_load_more',
				categoryNotIn: 26,
				paged: currentNewReleasesPage,  
			},
			success: function (res) {
				if(currentNewReleasesPage >= res.max) {
					$('#new-releases-load-more').hide();
				  }
				$('.new-releases-posts-container').append(res.html);
			}
		});
	}); 
}); 