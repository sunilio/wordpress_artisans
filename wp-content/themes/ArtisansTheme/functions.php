<?php 

function artisansFiles(){
    wp_enqueue_style('artisans_main_style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts','artisansFiles');
    
