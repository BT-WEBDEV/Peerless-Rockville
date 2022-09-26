<div id="<?php echo get_the_ID() ?>" class="mx-0 new-release-post container">
    <a href="<?php the_permalink()?>">
        <img class="img-fluid new-release-image" src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? : get_template_directory_uri()."/images/placeholder.jpg"; ?>">
    </a>
    <a class="news-title-link" href="<?php the_permalink()?>"> 
        <h4 class="new-release-title"> <?php echo the_title(); ?> </h4> 
    </a>
    <div class="container date-button-wrapper"> 
        <a class="news-post-date-link" href="<?php the_permalink()?>"> 
            <p class="news-post-date"><?php echo get_the_date('D M j Y');?></p>
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
</div> 