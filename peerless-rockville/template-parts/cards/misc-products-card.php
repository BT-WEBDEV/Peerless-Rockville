<div id="<?php echo get_the_ID() ?>" class="mx-0 container single-product">
    <a class="product-image-link" href="<?php the_permalink()?>" >
        <img class="img-fluid product-image" src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? : get_template_directory_uri()."/images/placeholder.jpg"; ?>">
    </a>

    <a class="product-title-link" href="<?php the_permalink()?>"> 
        <h4 class="product-title"> <?php echo the_title(); ?> </h4> 
    </a>

    <a class="product-price-link" href="<?php the_permalink()?>"> 
        <?php $price = get_post_meta( get_the_ID(), '_price', true ); ?>
        <p class="featured-product-price"><?php echo wc_price( $price ); ?></p>
    </a>
    <div class="container select-container"> 
    
    </div>
</div> 