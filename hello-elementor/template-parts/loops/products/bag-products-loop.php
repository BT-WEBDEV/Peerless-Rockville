<style> 
.bag-products-wrapper {
    display: grid; 
    grid-template-columns: repeat(4,1fr); 
    grid-column-gap: 20px;
    grid-row-gap: 20px; 
}

.single-product {
    display: flex; 
    flex-direction: column; 
    background-color: white; 
    max-width: 394px;  
}

.product-image-link {
    padding-left: 73px; 
    padding-right: 73px; 
    padding-top: 51px;
    margin-left: auto; 
    margin-right: auto; 
}

.product-image {
    max-width: 248px; 
}

.product-title-link {
    color: black; 
}

.product-title-link:hover {
    text-decoration: underline; 
}

.product-title {
    text-align: center; 
    font-size: 25px; 
    padding-left: 25px; 
    padding-right: 25px; 
}

.product-price-link {
    margin-top: auto;
    color: black;  
}

.product-price-link:hover {
    text-decoration: underline;  
}

.product-price {
    text-align: center; 
    font-size: 40px; 
    font-weight: bold; 
}

/*READ MORE BUTTON */ 

.read-more-container {
    margin-top: 75px !important; 
    text-align: center; 
}
.read-more-container .elementor-button {
    font-family: "Aleo", Sans-serif;
    font-size: 24px;
    font-weight: 400;
    letter-spacing: 2.14px;
    background-color: #58704500;
    border-style: solid;
    border-width: 1px 1px 1px 1px;
    border-color: var( --e-global-color-491d13d );
    border-radius: 0px 0px 0px 0px;
    padding: 39px 39px 39px 39px;
}

.read-more-container .elementor-button:hover {
    background-color: #022F48;
    border-color: #022F48; 
}

.read-more-container .elementor-button-text {
    color: white; 
}


/* MOBILE */ 
@media only screen and (max-width: 425px){
    .bag-products-wrapper {
        grid-template-columns: repeat(1,1fr) !important;
    }
}

/* TABLET */ 
@media only screen and (max-width: 768px) {
    .bag-products-wrapper {
        grid-template-columns: repeat(2,1fr);
    }s
}

/* SMALL LAPTOP */ 
@media only screen and (max-width: 1024px) {
    .product-image-link {
        padding-left: 25px !important; 
        padding-right: 25px !important; 
        padding-top: 20px !important; 
    }
}

/* LAPTOP */
@media only screen and (max-width: 1456px) {

    .product-image-link {
        padding-left: 50px; 
        padding-right: 50px; 
        padding-top: 35px; 
    }

    .product-title {
        text-align: center; 
        font-size: 22px; 
    }

    .product-price {
        font-size: 30px; 
    }

}
}

</style> 

<script>
let bagCurrentPage = 1;
jQuery(function($){
	$('#bag-products-load-more').on('click', function() {
		console.log("button click working")
		bagCurrentPage++; // Do currentPage + 1, because we want to load the next page

		$.ajax({
			type: 'POST',
			url: '/wp-admin/admin-ajax.php',
			dataType: 'json',
			data: {
				action: 'bag_products_load_more',
				paged: bagCurrentPage, 
			},
			success: function (res) {
				if(bagCurrentPage >= res.max) {
					$('#bag-products-load-more').hide();
				  }
				$('.bag-products-wrapper').append(res.html);
			}
		});
	}); 
}); 
</script>

<div class="container"> 
    <div class="row bag-products-wrapper"> 
    <?php 
        $args = array(  
            'post_type' => 'product', 
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'product_cat' => 'bags',
            'paged' => 1
        );  

        $bag_products = new WP_Query($args);
                                
        while ( $bag_products->have_posts() ) : $bag_products->the_post(); 

            include get_template_directory() . '/template-parts/cards/bag-products-card.php';

        endwhile; wp_reset_postdata(); ?>
        <div class="empty-post" style="display:none"></div> 
    </div>
    <?php
        if (  $bag_products->max_num_pages > 1 )
        include get_template_directory() . '/template-parts/buttons/bag-products-read-more-button.php';
    ?>

</div> 