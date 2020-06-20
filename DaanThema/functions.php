<?php

//laad stijlbladen

function laadstijlblad() {
    wp_enqueue_style( 'stijl', get_stylesheet_uri() );
}

add_action('init', 'laadstijlblad');

// menu registreren

function registreer_menu()  {
    $argumenten = array(
        'hoofd-menu' => __('Hoofd menu')
    );
    register_nav_menus();
}
add_action('init', 'registreer_menu');