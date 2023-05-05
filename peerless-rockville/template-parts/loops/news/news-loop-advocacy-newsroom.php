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
    max-width: 548px; 
    padding-bottom: 10px; 
}

.news-post:hover {
    transition-duration: 0.5s;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
}

.news-post .news-title-link {
    color: black; 
    font-size: 18px; 
}

.news-post .news-title-link:hover {
    text-decoration: underline; 
}

.news-post .news-excerpt-link {
    color: black; 
    padding-left: 10px; 
    padding-right: 10px;
    font-size: 16px;  
}

.news-post .news-excerpt-link:hover {
    text-decoration: underline;
}

.news-image {
    height: 548px; 
    width: 100%; 
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
    padding: 20px 40px 20px 40px;
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
    .news-wrapper {
        grid-template-columns: repeat(1,1fr) !important;
    }

    .read-more-container .elementor-button {
        display: block; 
        font-size: 12px;
        padding: 15px 15px 15px 15px;
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

    .read-more-container .elementor-button {
        font-size: 12px;
        padding: 15px 15px 15px 15px;
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

    .read-more-container .elementor-button {
        font-size: 15px;
        padding: 20px 20px 20px 20px;
    }
}

</style>


<div class="container">
    <div class="row news-wrapper advocacy-posts-container"> 
        <?php 
        $args = array(  
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'category__in' => 27,
            'posts_per_page' => 4,
            'paged' => 1,
        );

        $news_posts_home = new WP_Query($args);
                                
            while ( $news_posts_home->have_posts() ) : $news_posts_home->the_post(); 

                include get_template_directory() . '/template-parts/cards/news-loop-newsroom-card.php';

            endwhile; wp_reset_postdata(); ?> 
        <div class="empty-post" style="display:none"></div>
    </div>
    <?php
            if (  $news_posts_home->max_num_pages > 1 )
            include get_template_directory() . '/template-parts/buttons/newsroom-read-more-button.php';
    ?>
</div>


