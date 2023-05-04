<style> 
.events-wrapper {
    display: grid;
    grid-template-columns: repeat(4,1fr); 
    grid-column-gap: 40px;
    grid-row-gap: 20px;   
}

.event-post {
    display: flex; 
    flex-direction: column; 
    background-color: white; 
    /* max-width: 547px;  */
    padding-bottom: 20px;
}

.event-post:hover {
    transition-duration: 0.5s;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
}

.event-post .link-wrap {
    color: black; 
}

.event-post .event-headline:hover {
    text-decoration: underline; 
}

.event-post .event-title:hover {
    text-decoration: underline; 
}


.event-image {
    /* object-fit: cover; */
}

.event-headline {
    font-size: 16px;
    padding-left: 20px; 
    padding-right: 20px;  
}

.event-title {
    font-family: 'Open Sans', sans-serif;
    font-size: 18px; 
    font-weight: bold;  
    padding-left: 20px; 
    padding-right: 20px; 
}

.date-button-wrapper {
    display: flex;
    flex-direction: column; 
    margin-top: auto;   
}

.full-date-time {
    padding-left: 20px; 
    /* padding-right: 20px;  */
    max-width: 75%; 
    font-size: 16px; 
    color: #000000; 
}

.full-date-time:hover {
    text-decoration: underline;  
}

.elementor-widget-container {
    margin-top: auto; 
}

.event-post .elementor-button-wrapper {
    text-align: right;  
    padding-right: 20px; 
}

.event-post .elementor-button {
    font-family: "Roboto", Sans-serif;
    font-size: 18px;
    font-weight: 500;
    text-transform: uppercase;
    fill: var( --e-global-color-6e121aa );
    color: var( --e-global-color-6e121aa );
    background-color: #58704500;
    border-style: solid;
    border-width: 0px 0px 0px 0px;
    border-radius: 0px 0px 0px 0px;
    padding: 0px 0px 0px 0px;
}

.event-post .elementor-button-text {
    border-bottom: 1px solid; 
}

.elementor-button-text {
    text-decoration: none; 
}

/* MOBILE */ 
@media only screen and (max-width: 425px){
    .events-wrapper {
        grid-template-columns: repeat(1,1fr) !important;
    }
}

/* TABLET */ 
@media only screen and (max-width: 1024px) {
    .events-wrapper {
        grid-template-columns: repeat(2,1fr);
    }
    
    .event-headline {
        font-size: 13px; 
    }

    .event-title {
        font-size: 14px !important; 
    }

    .full-date-time {
        font-size: 12px !important; 
    }

    .event-post .elementor-button {
        font-size: 12px !important; 
    }
}

/* LAPTOP */
@media only screen and (max-width: 1456px) {
    .event-headline {
        font-size: 16px; 
    }
    
    .event-title {
        font-size: 18px; 
    }

    .full-date-time {
        font-size: 17px; 
    }

    .event-post .elementor-button {
        font-size: 15px; 
    }
}

</style>


<div class="container">
    <div class="row events-wrapper"> 
        <?php 
        $args = array(  
            'post_type' => 'events',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 4,
            'category__not_in' => 24,
        );

        $events_posts_home = new WP_Query($args);
                                
            while ( $events_posts_home->have_posts() ) : $events_posts_home->the_post(); ?>

                    <div id="<?php echo get_the_ID() ?>" class="mx-0 event-post container">
                        <a href="<?php the_permalink()?>" class="link-wrap">
                            <img class="img-fluid event-image" src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? : get_template_directory_uri()."/images/placeholder.jpg"; ?>">
                            <h5 class="event-headline"> <?php echo get_field('event_headline'); ?> </h5> 
                        
                            <h4 class="event-title"> <?php echo get_field('event_name'); ?> </h4> 

                            <div class="row date-button-wrapper"> 
                                <p class="full-date-time">  <?php echo get_field('full_date_time'); ?></p> 
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
                        </a>
                    </div> 

            <?php endwhile; wp_reset_postdata(); ?> 
    </div>
</div>
