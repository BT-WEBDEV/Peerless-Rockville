<div class="exhibits-container"> 
    <div class="container"> 
    <?php 
        $args = array(  
            'post_type' => 'exhibits',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3,
            'paged' => 1, 
        );

        $exhibits_posts = new WP_Query($args);
                                
            while ( $exhibits_posts->have_posts() ) : $exhibits_posts->the_post(); ?>
            
            <img class="img-fluid event-image img-responsive" src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? : get_template_directory_uri()."/images/placeholder.jpg"; ?>">
            <h4 class="exhibit-name"> <?php echo get_field('exhibit_name'); ?> </h4>
            <p class="exhibit-desc"> <?php echo get_field('exhibit_description'); ?> </p>
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

            <?php endwhile; wp_reset_postdata(); ?> 
    </div>
</div>