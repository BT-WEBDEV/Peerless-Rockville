<style> 
.featured-products-wrapper {
    display: grid; 
    grid-template-columns: repeat(4,1fr); 
    grid-column-gap: 20px;
    grid-row-gap: 20px; 
}

.featured-product {
    display: flex; 
    flex-direction: column; 
    background-color: white; 
    max-width: 394px;  
}

.featured-product-image-link {
    padding-left: 73px; 
    padding-right: 73px; 
    padding-top: 51px;
    margin-left: auto; 
    margin-right: auto; 
}

.featured-product-image {
    max-width: 248px; 
}

.featured-product-title-link {
    color: black; 
}

.featured-product-title-link:hover {
    text-decoration: underline; 
}

.featured-product-title {
    text-align: center; 
    font-size: 25px; 
    padding-left: 25px; 
    padding-right: 25px; 
}

.featured-product-price-link {
    margin-top: auto;
    color: black;  
}

.featured-product-price-link:hover {
    text-decoration: underline;  
}

.featured-product-price {
    text-align: center; 
    font-size: 40px; 
    font-weight: bold; 
}


/* MOBILE */ 
@media only screen and (max-width: 425px){
    .featured-products-wrapper {
        grid-template-columns: repeat(1,1fr) !important;
    }
}

/* TABLET */ 
@media only screen and (max-width: 768px) {
    .featured-products-wrapper {
        grid-template-columns: repeat(2,1fr);
    }s
}

/* SMALL LAPTOP */ 
@media only screen and (max-width: 1024px) {
    .featured-product-image-link {
        padding-left: 25px !important; 
        padding-right: 25px !important; 
        padding-top: 20px !important; 
    }
}

/* LAPTOP */
@media only screen and (max-width: 1456px) {

    .featured-product-image-link {
        padding-left: 50px; 
        padding-right: 50px; 
        padding-top: 35px; 
    }

    .featured-product-title {
        text-align: center; 
        font-size: 22px; 
    }

    .featured-product-price {
        font-size: 30px; 
    }

}
}

</style> 

<div class="container"> 
    <div class="row featured-products-wrapper"> 
    <?php 
        $args = array(  
            'post_type' => 'product',
            'posts_per_page' => 4,
            'product_cat' => 'featured'
        );  

        $featured_products = new WP_Query($args);
                                
        while ( $featured_products->have_posts() ) : $featured_products->the_post(); ?>

            <div id="<?php echo get_the_ID() ?>" class="mx-0 container featured-product">
                <a class="featured-product-image-link" href="<?php the_permalink()?>" >
                    <img class="img-fluid featured-product-image" src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? : get_template_directory_uri()."/images/placeholder.jpg"; ?>">
                </a>

                <a class="featured-product-title-link" href="<?php the_permalink()?>"> 
                    <h4 class="featured-product-title"> <?php echo the_title(); ?> </h4> 
                </a>

                <a class="featured-product-price-link" href="<?php the_permalink()?>"> 
                    <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
                    <p class="featured-product-price"><?php echo wc_price( $price ); ?></p>
                </a>
                <div class="container select-container"> 
                
                </div>
            </div> 

        <?php endwhile; wp_reset_postdata(); ?> 

    </div>

</div> 