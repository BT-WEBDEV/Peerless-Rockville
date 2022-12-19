<!-- USED ON SINGLE POSTS --> 

<style> 
.news-wrapper {
    display: grid;
    grid-template-columns: repeat(4,1fr); 
    grid-column-gap: 20px;
    grid-row-gap: 20px;   
}

.news-post {
    display: flex; 
    flex-direction: column; 
    background-color: white; 
    max-width: 394px; 
    padding-bottom: 10px; 
}

.news-post:hover {
    transition-duration: 0.5s;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
}

.news-post .news-title-link {
    color: black; 
}

.news-post .news-title-link:hover {
    text-decoration: underline; 
}

.news-image {
    object-fit: cover;
}

.news-title {
    font-family: 'Open Sans', sans-serif; 
    padding-left: 10px; 
    padding-right: 10px; 
}

.elementor-widget-container {
    margin-top: auto; 
}

.news-post .elementor-button-wrapper {
    text-align: right;  
    padding-right: 10px; 
}

.news-post .elementor-button {
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

.news-post .elementor-button-text { 
    border-bottom: 1px solid; 
}

.elementor-button-text {
    text-decoration: none; 
}

/* MOBILE */ 
@media only screen and (max-width: 425px){
    .news-wrapper {
        grid-template-columns: repeat(1,1fr) !important;
    }
}

/* TABLET */ 
@media only screen and (max-width: 768px) {
    .news-wrapper {
        grid-template-columns: repeat(2,1fr);
    }

    .news-title {
        font-size: 14px !important; 
    }

    .news-post .elementor-button {
        font-size: 12px !important; 
    }
}

/* LAPTOP */
@media only screen and (max-width: 1456px) {

    .news-title {
        font-size: 18px; 
    }

    .news-post .elementor-button {
        font-size: 15px; 
    }
}

</style>


<div class="container">
    <div class="row news-wrapper"> 
        <?php 
        $args = array(  
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 4,
            'post__not_in' => [get_the_ID()],
        );

        $news_posts_home = new WP_Query($args);
                                
            while ( $news_posts_home->have_posts() ) : $news_posts_home->the_post(); ?>

                <div id="<?php echo get_the_ID() ?>" class="mx-0 news-post container">
                    <a href="<?php the_permalink()?>">
                        <img class="img-fluid news-image" src="<?php echo (get_the_post_thumbnail_url($post->ID, 'large')) ? : get_template_directory_uri()."/images/placeholder.jpg"; ?>">
                    </a>
                    <a class="news-title-link" href="<?php the_permalink()?>"> 
                        <h4 class="news-title"> <?php echo the_title(); ?> </h4> 
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

        <?php endwhile; wp_reset_postdata(); ?> 
    </div>
</div>
