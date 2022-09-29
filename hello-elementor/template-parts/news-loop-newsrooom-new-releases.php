<style> 

.new-releases-container {
    display: flex;
    gap: 40px;  
}

.new-releases-left-container{
    width: 75%; 
}

.sidebar-news-right-container {
    width: 25%; 
}


.new-releases-wrapper {
    display: grid;
    grid-template-columns: repeat(3,1fr); 
    grid-column-gap: 40px;
    grid-row-gap: 40px;   
}

.new-release-post {
    display: flex; 
    flex-direction: column; 
    background-color: white; 
    max-width: 394px; 
    max-height: 483px; 
    padding-bottom: 20px;
}

.new-release-post:hover {
    transition-duration: 0.5s;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
}

.new-release-post .news-title-link {
    color: black; 
}

.new-release-postt .news-headline:hover {
    text-decoration: underline; 
}

.new-release-post .new-release-title:hover {
    text-decoration: underline; 
}


.new-release-image {
    object-fit: cover;
    width: 394px; 
    max-height: 261px; 
}


.new-release-title{
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

.news-post-date {
    font-family: 'Open Sans', sans-serif;
    font-size: 18px;  
    color: #898681; 
    padding-left: 20px;
}

.news-post-date:hover {
    text-decoration: underline; 
}

.elementor-widget-container {
    margin-top: auto; 
}

.new-release-post .elementor-button-wrapper {
    text-align: right;  
    padding-right: 20px; 
}

.new-release-post .elementor-button {
    font-family: "Roboto", Sans-serif;
    font-size: 18px;
    font-weight: 500;
    text-transform: uppercase;
    fill: var( --e-global-color-6e121aa );
    color: var( --e-global-color-6e121aa );
    background-color: #58704500;
    border-style: solid;
    border-width: 0px 0px 1px 0px;
    border-radius: 0px 0px 0px 0px;
    padding: 0px 0px 0px 0px;
}

.elementor-button-text {
    text-decoration: none; 
}

.sidebar-news-wrapper {
    display: flex;
    flex-direction: column; 
}


.sidebar-news-post {
    border-bottom: 1px solid #587045;
    padding: 25px 25px 0px 25px;  
}

.sidebar-post-date {
    font-size: 16px; 
    text-align: left; 
    color: #898681; 
}
.sidebar-post-date:hover {
    text-decoration: underline; 
}

.sidebar-post-title{
    font-size: 20px; 
    color: black; 
}
.sidebar-post-title:hover {
    text-decoration: underline; 
}

/*READ MORE BUTTON */ 

.new-releases-read-more-container {
    margin-top: 75px !important; 
    text-align: center; 
}
.new-releases-read-more-container .elementor-button {
    font-family: "Aleo", Sans-serif;
    font-size: 24px;
    font-weight: 400;
    letter-spacing: 2.14px;
    background-color: #FFFFFF39;
    border-style: solid;
    border-width: 1px 1px 1px 1px;
    border-color: #587045; 
    border-radius: 0px 0px 0px 0px;
    padding: 39px 39px 39px 39px;
}

.new-releases-read-more-container .elementor-button:hover {
    background-color: #022F48;
    border-color: #022F48; 
}

.new-releases-read-more-container .elementor-button-text {
    color: #587045;
}

.new-releases-read-more-container .elementor-button:hover .elementor-button-text {
    color: white; 
}


/* MOBILE */ 
@media only screen and (max-width: 425px){
    .new-releases-wrapper {
        grid-template-columns: repeat(1,1fr) !important;
    }

    .news-post-date {
        font-size: 12px; 
    }

    .new-releases-read-more-container .elementor-button {
        display: block; 
        font-size: 12px;
        padding: 15px 15px 15px 15px;
    }
}

/* TABLET */ 
@media only screen and (max-width: 768px) {


    .new-releases-wrapper {
        grid-template-columns: repeat(2,1fr);
    }

    .new-release-title {
        font-size: 14px !important; 
    }

    .news-post-date {
        font-size: 12px; 
    }

    .new-release-post .elementor-button {
        font-size: 12px !important; 
    }

    .new-releases-read-more-container .elementor-button {
        font-size: 12px;
        padding: 15px 15px 15px 15px;
    }
    
}

@media only screen and (max-width: 1025px) {
    .new-releases-container {
        flex-direction: column; 
    }

    .new-releases-left-container {
        width: 100%; 
    }

    .sidebar-news-right-container {
        width: 100%; 
    }
}


/* LAPTOP */
@media only screen and (max-width: 1456px) {

    .sidebar-post-date {
        font-size: 15px; 
    }
    
    .new-release-title {
        font-size: 18px !important; 
        padding-left: 10px !important; 
        padding-right: 5px !important; 
    }

    .news-post-date {
        font-size: 15px; 
        padding-left: 10px; 
    }

    .new-release-post .elementor-button {
        font-size: 15px; 
    }

    .sidebar-post-title {
        font-size: 18px; 
    }

    .new-releases-read-more-container .elementor-button {
        font-size: 15px;
        padding: 20px 20px 20px 20px;
    }
}



</style>

<div class="new-releases-container">

    <div class="new-releases-left-container"> 

        <div class="container">
            <div class="row new-releases-wrapper"> 
                <?php 
                $args = array(  
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => 6,
                    'category__not_in' => 26,
                    'paged' => 1,
                );

                $news_posts_new_releases = new WP_Query($args);
                                        
                    while ( $news_posts_new_releases->have_posts() ) : $news_posts_new_releases->the_post();

                        include get_template_directory() . '/template-parts/cards/new-releases-newsroom-card.php';

                    endwhile; wp_reset_postdata(); ?> 

                <div class="empty-new-release-post" style="display:none"></div> 
            </div>
        </div>
    </div>
    
    <div class="sidebar-news-right-container"> 
        
        <div class="container"> 
            <div class="sidebar-news-wrapper">

            <?php 
                $args = array(  
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => 6,
                    'category__in' => 26,
                    'paged' => 1,
                );

                $sidebar_news_posts = new WP_Query($args);
                                        
                while ( $sidebar_news_posts->have_posts() ) : $sidebar_news_posts->the_post();

                    include get_template_directory() . '/template-parts/cards/sidebar-newsroom-card.php';
                
                endwhile; wp_reset_postdata(); ?> 

            </div>
        </div>        
    </div>         
</div>
<?php
    if ($news_posts_new_releases->max_num_pages > 1)
        include get_template_directory() . '/template-parts/buttons/newsroom-new-releases-button.php';
?>   
