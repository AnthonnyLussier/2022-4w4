<?php 

function cidw_4w4_enqueue(){
    wp_enqueue_style('style_css', get_stylesheet_uri());
}

add_action("wp_enqueue_scripts", "cidw_4w4_enqueue");



/*----------------------------enregistrier le menu----------------*/
function cidw_4w4_register_nav_menu(){
    register_nav_menus( array(
        'menu_principale' => __( 'Menu principale', 'cidw_4w4' ),
        'menu_footer'  => __( 'Menu footer', 'cidw_4w4' ),
    ) );
}
add_action( 'after_setup_theme', 'cidw_4w4_register_nav_menu', 0 );

/*------------------------------filtrer les choix du menu principale */
function cible_cidw_4w4_filtre_choix_menu ($obj_menu){
    
    //var_dump($obj_menu);
    foreach($obj_menu as $cle => $values){
        //print_r($values);
         //$values ->title  = substr( $values ->title,0,7);
         wp_trim_words($values ->title,3,"...");
         //echo $values ->title . "<br>";
    }
    return $obj_menu;
}
add_filter("wp_nav_menu_objects", "cible_cidw_4w4_filtre_choix_menu");
?>