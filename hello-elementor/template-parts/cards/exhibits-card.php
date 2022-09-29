<div class="exhibit-post">
    <img class="img-fluid event-image img-responsive exhibit-image" src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? : get_template_directory_uri()."/images/placeholder.jpg"; ?>">
    <div class="exhibit-content-wrapper"> 
        <h4 class="exhibit-name"> <?php echo get_field('exhibit_name'); ?> </h4>
        <?php echo the_field('exhibit_description'); ?>
        <div class="elementor-widget-container">
            <div class="elementor-button-wrapper">
                <a href="<?php the_permalink()?>" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                    <span class="elementor-button-content-wrapper">
                        <span class="elementor-button-icon elementor-align-icon-right">
                            <i aria-hidden="true" class="fas fa-arrow-right"></i>
                        </span>
                    <span class="elementor-button-text">LEARN MORE</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>