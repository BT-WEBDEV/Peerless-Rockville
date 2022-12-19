<style> 

.upcoming-events-container {
    width: 100%; 
}


.heading-wrapper {
    display: flex; 
    justify-content: space-between; 
    margin-bottom: 10px; 
}

.upcoming-events-header {
    margin-bottom: 0px;
    font-size: 23px;
    font-weight: bold;  
    color: white;  
} 


.heading-wrapper .elementor-button {
    font-family: "Roboto", Sans-serif;
    font-size: 23px;
    font-weight: 500;
    text-transform: uppercase;
    fill: var( --e-global-color-6e121aa );
    color: white;
    background-color: #58704500;
    border-style: solid;
    border-width: 0px 0px 0px 0px;
    border-radius: 0px 0px 0px 0px;
    padding: 0px 0px 0px 0px;
}

.heading-wrapper .elementor-button-text { 
    border-bottom: 1px solid;
}

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
    max-width: 394px; 
    max-height: 483px; 
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
    object-fit: cover;
    width: 394px; 
    max-height: 261px; 
}

.date-title-wrapper {
    display: flex; 
}

.date-box {
    width: 35%; 
    text-align: center; 
    display: flex; 
    flex-direction: column; 
    justify-content: center; 
    margin-left: 20px; 
}

.date-info { 
    font-size: 20px;
    font-weight: bold;  
    color: #AE5D57; 
    border: 1px solid #D3D3D3; 
    padding: 10px; 
}

.event-title {
    font-family: 'Open Sans', sans-serif;
    font-size: 20px;   
    padding-left: 20px; 
    padding-right: 20px; 
}

.date-button-wrapper {
    display: flex;
    flex-direction: column; 
    margin-top: auto;   
}

.full-date-time {
    font-size: 18px;
    text-align: right;  
    padding-left: 20px; 
    padding-right: 20px; 
    color: #898681; 
    float: right; 
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

.past-events-wrapper {
    display: flex;
    flex-direction: column; 
}

.past-events-header {
    margin-bottom: 0px;
    font-size: 18px;
    font-weight: bold;  
    color: #587045;
}

.past-event-post {
    border-bottom: 1px solid #587045;
    padding: 25px 25px 0px 25px;  
}

.past-full-date-time {
    font-size: 16px; 
    text-align: left; 
    color: #898681; 
}
.past-full-date-time:hover {
    text-decoration: underline; 
}

.past-event-title {
    font-size: 20px; 
    color: black; 
}
.past-event-title:hover {
    text-decoration: underline; 
}

/* MOBILE */ 
@media only screen and (max-width: 425px){
    .events-wrapper {
        grid-template-columns: repeat(1,1fr) !important;
    }
}

/* TABLET */ 
@media only screen and (max-width: 768px) {
    .upcoming-events-header {
        font-size: 14px;     
    }

    .heading-wrapper .elementor-button {
        font-size: 14px; 
    }

    .events-wrapper {
        grid-template-columns: repeat(2,1fr);
    }

    .event-title {
        font-size: 14px !important; 
    }

    .event-post .elementor-button {
        font-size: 12px !important; 
    }

    .past-events-header {
        font-size: 14px; 
    }

    .heading-wrapper .elementor-button {
        font-size: 14px; 
    }
}

@media only screen and (max-width: 1025px) {
    .events-container {
        flex-direction: column; 
    }

    .upcoming-events-container {
        width: 100%; 
    }

    .past-events-container {
        width: 100%; 
    }
}


/* LAPTOP */
@media only screen and (max-width: 1456px) {
    .full-date-time {
        font-size: 15px; 
    }

    .past-full-date-time {
        font-size: 15px; 
    }
    
    .event-title {
        font-size: 18px !important; 
        padding-left: 10px !important; 
        padding-right: 5px !important; 
    }

    .event-post .elementor-button {
        font-size: 15px; 
    }

    .past-event-title {
        font-size: 18px; 
    }
}

</style>


    <div class="upcoming-events-container"> 

        <div class="heading-wrapper"> 
            <h6 class="upcoming-events-header"> PAST EVENTS </h6> 
            <div class="elementor-widget-container">
                <div class="elementor-button-wrapper">
                    <a href="/things-to-do" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                        <span class="elementor-button-content-wrapper">
                            <span class="elementor-button-icon elementor-align-icon-right">
                                <i aria-hidden="true" class="fas fa-arrow-right"></i>
                            </span>
                            <span class="elementor-button-text">VIEW ALL</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row events-wrapper"> 
                <?php 
                $args = array(  
                    'post_type' => 'events',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => 4,
                    'category__in' => 24,
                );

                $events_posts_thingstodo = new WP_Query($args);
                                        
                    while ( $events_posts_thingstodo->have_posts() ) : $events_posts_thingstodo->the_post(); ?>

                            <div id="<?php echo get_the_ID() ?>" class="mx-0 event-post container">
                                <a href="<?php the_permalink()?>" class="link-wrap">
                                    
                                    <img class="img-fluid event-image img-responsive" src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? : get_template_directory_uri()."/images/placeholder.jpg"; ?>">
                                
                                    <div class="date-title-wrapper"> 
                                        <div class="date-box">
                                            <h6 class="date-info"> 
                                                <?php echo get_field('month_abbreviation'); ?> 
                                                <br>
                                                <?php echo get_field('date_number');?>
                                            </h6> 
            
                                        </div>
                                        <h4 class="event-title"> <?php echo get_field('event_name'); ?> </h4> 
                                    </div>

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
    </div>

