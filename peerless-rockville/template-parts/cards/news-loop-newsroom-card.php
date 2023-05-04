<div id="<?php echo get_the_ID() ?>" class="mx-0 news-post container">
    <a href="<?php the_permalink()?>">
        <img class="img-fluid news-image" src="<?php echo (get_the_post_thumbnail_url($post->ID, 'full')) ? : get_template_directory_uri()."/images/placeholder-394x394.jpg"; ?>">
    </a>
    <a class="news-title-link" href="<?php the_permalink()?>"> 
        <h4 class="news-title"> <?php echo the_title(); ?> </h4> 
    </a>
    <a class="news-excerpt-link" href="<?php the_permalink()?>"> 
        <p class="news-excerpt"> <?php echo the_excerpt(); ?> </p> 
    </a>
    <div class="elementor-widget-container">
        <div class="elementor-button-wrapper">
            <a href="<?php the_permalink()?>" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                <span class="elementor-button-content-wrapper">
                    <span class="elementor-button-icon elementor-align-icon-right">
                        <i aria-hidden="true" class="fas fa-arrow-right"></i>
                    </span>
                <span class="elementor-button-text">READ MORE</span>
                </span>
            </a>
        </div>
    </div>
</div> 