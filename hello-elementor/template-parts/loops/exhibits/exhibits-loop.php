<style> 
.exhibit-post {
    display: flex;
    margin-bottom: 60px;  
}

.exhibit-content-wrapper {
    display: flex; 
    flex-direction: column; 
    justify-content: center; 
    padding-left: 80px; 
}

.exhibit-image {
    object-fit: cover; 
}

.exhibit-name {
    font-family: 'Open Sans', sans-serif;
    font-size: 35px;
    color: #587045; 
}

.exhibit-content-wrapper p{
    font-family: 'Open Sans', sans-serif;
    font-weight: 300; 
    font-size: 25px; 
    color: #587045; 
}

.exhibit-post .elementor-button {
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
    padding: 0px 0px 5px 0px;
}

/*READ MORE BUTTON */ 

.exhibits-read-more-container {
    margin-top: 75px !important; 
    text-align: center; 
}
.exhibits-read-more-container .elementor-button {
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

.exhibits-read-more-container .elementor-button:hover {
    background-color: #022F48;
    border-color: #022F48; 
}

.exhibits-read-more-container .elementor-button-text {
    color: #587045;
}

.exhibits-read-more-container .elementor-button:hover .elementor-button-text {
    color: white; 
}


/* MOBILE */ 
@media only screen and (max-width: 425px){
    
}

/* TABLET */ 
@media only screen and (max-width: 768px) {
    
    .exhibit-name {
        font-size: 22px !important; 
    }

    .exhibit-content-wrapper p {
        font-size: 12px !important; 
    }

    .exhibit-post .elementor-button {
        font-size: 14px !important; 
    }
    
}

@media only screen and (max-width: 1025px) {

    .exhibit-post {
        flex-direction: column; 
    }

    .exhibit-content-wrapper {
        padding-left: 0px; 
    }
}


/* LAPTOP */
@media only screen and (max-width: 1456px) {

    .exhibit-name {
        font-size: 28px; 
    }

    .exhibit-content-wrapper p {
        font-size: 20px; 
    }

    .exhibit-content-wrapper {
        padding-left: 50px; 
    }
   
}

</style>

<div class="exhibits-container"> 
    <div class="container exhibits-posts-container"> 
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
        
                                
            while ( $exhibits_posts->have_posts() ) : $exhibits_posts->the_post();
            
                include get_template_directory() . '/template-parts/cards/exhibits-card.php';
            
            endwhile; wp_reset_postdata(); ?> 

        <div class="empty-exhibits-post" style="display:none"></div> 
    </div>
    <?php
    if ($exhibits_posts->max_num_pages > 1)
        include get_template_directory() . '/template-parts/buttons/exhibits-read-more-button.php';
    ?>
</div>