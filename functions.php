<?php
require_once( get_template_directory().'/includes/advanced-custom-fields/acf.php');

// On rajoute bootstrap
function enqueue_bootstrap() {

  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
  wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
  wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css' );
  wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/jquery.min.js', 'jquery' );
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', 'bootstrap' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );

// On ajoute la navbar
register_nav_menus( array(
    'menu-1' => esc_html__( 'Primary', 'theme-textdomain' ),
) );

function custom_excerpt_length( $length ) {
return 60;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function format_comment($comment) {
    
       $GLOBALS['comment'] = $comment; ?>
       <hr />
                
            <div class="author">
               <div style="background-image: url(<?php get_avatar_url(comment_ID()); ?>)" class="pic"></div> 
                <p class="text-uppercase"><?php printf(__('%s'), get_comment_author_link()) ?></p>
            </div>
            
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php _e('Your comment is awaiting moderation.') ?></em><br />
            <?php endif; ?>
            <div class="message">
                <?php comment_text(); ?>
            </div>
<?php }

add_action( 'init', 'team_init' );
function team_init() {
  register_post_type( 'team',
    array(
			'labels' => array(
                'name' => __( 'La Team Cancoicode' ),
                'singular_name' => __( 'membre' ),
                'all_items' => 'Tous les membres',
                'add_new_item' => 'Ajouter un membre',
                'edit_item' => 'Éditer le membre',
                'new_item' => 'Nouveau membre',
                'view_item' => 'Voir le membre',
                'search_items' => 'Rechercher parmi les membres',
                'not_found' => 'Pas de membre trouvé',
                'not_found_in_trash'=> 'Pas de membre dans la corbeille'
              ),
            'description' => 'Les membres de la promo ACS Cancoicode',
            'public' => true,
            'capability_type' => 'post',
            'has_archive' => true
		)
	);
}
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_team-cancoicode',
		'title' => 'Team Cancoicode',
		'fields' => array (
            array (
				'key' => 'field_5a68e4bde54ba',
				'label' => 'Photo de profil',
				'name' => 'image_de_profil',
				'type' => 'image',
				'instructions' => 'Votre photo de profil, montrez à quel point vous êtes beau !',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5a68e225dfba1',
				'label' => 'Citation',
				'name' => 'citation',
				'type' => 'text',
				'instructions' => 'Votre citation favorite, ou votre cri de guerre, ou bien ce que vous voulez :)',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a68e3e5dfba3',
				'label' => 'Github',
				'name' => 'github',
				'type' => 'text',
				'instructions' => 'Le lien vers votre github',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a68e41fdfba4',
				'label' => 'Linkedin',
				'name' => 'linkedin',
				'type' => 'text',
				'instructions' => 'Le lien vers votre LinkedIn',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'team',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'categories',
			),
		),
		'menu_order' => 0,
	));
    
    register_field_group(array (
		'id' => 'acf_post',
		'title' => 'post',
		'fields' => array (
			array (
				'key' => 'field_5a68ee7d167e3',
				'label' => 'Sous-titre de l\'article',
				'name' => 'sous_titre_article',
				'type' => 'text',
				'instructions' => 'Le sous-titre de votre article',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

function show_team()
{
    if(is_home()):
    $query = new WP_Query( array( 'post_type' => 'team', 'posts_per_page' => 3 ) );
    else:
    $query = new WP_Query( array( 'post_type' => 'team', 'posts_per_page' => 12 ) );
    endif;
if ( $query->have_posts() ) {
         while ( $query->have_posts() ): $query->the_post(); 
             if(get_field('image_de_profil')):
                $url = get_field('image_de_profil');
            else:
                $url = 'http://localhost/wordpress/wp-content/themes/Theme_cancoicode_ysc/assets/img/image_card.png';
             endif;
                        if(is_home()):
                            $string .= '<div class="card col-lg-4">';
                        else:
                            $string .= '<div class="card col-lg-3">';
                        endif;
                            $string .= '<div style="background-image: url('.$url.')" class="pic"></div>';
                            $string .= '<div class="card-body">';
                            $string .= '<h5 class="card-title text-center text-uppercase">'.get_the_title().'</h5>';
                            if (get_field('citation')){
                                $string .= '<p class="sous-titre text-center">'.get_field('citation').'</p>';
                            }
                            $string .= '<hr /><p class="card-text">'.get_the_excerpt().'</p>';
                            $string .= '<a href="'.get_the_permalink().'" class="pull-right">Lire la suite ></a>';
                            if(get_field('github')){
                                $string .= '<a href="'.get_field('github').'"><i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i></a>';
                            }
                            if(get_field('linkedin')){
                                $string .= '<a href="'.get_field('linkedin').'"><i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>';
                            }
    $string .= '</div></div>';
         endwhile;
} else {
        $string = "Ajouter des membres dans la promo de Cancoicode !!";
}
return $string;
wp_reset_postdata();
}
add_shortcode('postCancoillote', 'show_team');
add_filter('widget_text', 'do_shortcode');

/**
	 * Post Type: projets.
	 */

	$labels = array(
		"name" => __( "projets", "" ),
		"singular_name" => __( "projet", "" ),
		"menu_name" => __( "Projets", "" ),
		"all_items" => __( "Tous les projets", "" ),
		"add_new" => __( "Ajouter un projet", "" ),
		"add_new_item" => __( "Ajouter un nouveau projet", "" ),
		"edit_item" => __( "Editer un projet", "" ),
		"new_item" => __( "Nouveau projet", "" ),
		"view_item" => __( "Vue du projet", "" ),
		"view_items" => __( "Vue des projets", "" ),
		"search_items" => __( "Rechercher un projet", "" ),
		"not_found" => __( "Projet non trouvé", "" ),
		"not_found_in_trash" => __( "Projet non trouvé dans la corbeille", "" ),
		"parent_item_colon" => __( "Projet parent", "" ),
		"featured_image" => __( "Image du projet", "" ),
		"set_featured_image" => __( "Images exposées du projet", "" ),
		"remove_featured_image" => __( "Editer l'image du projet", "" ),
		"use_featured_image" => __( "Utiliser l'image du projet", "" ),
		"archives" => __( "Archives des projets", "" ),
		"insert_into_item" => __( "Insérer dans le projet", "" ),
		"uploaded_to_this_item" => __( "Mettre à jour le projet", "" ),
		"filter_items_list" => __( "Filtrer la liste des projets", "" ),
		"items_list_navigation" => __( "Liste de navigation des projets", "" ),
		"items_list" => __( "Liste des projets", "" ),
		"attributes" => __( "Attributs des projets", "" ),
		"parent_item_colon" => __( "Projet parent", "" ),
	);

	$args = array(
		"label" => __( "projets", "" ),
		"labels" => $labels,
		"description" => "Ecrire un projet ",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "projet", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "comments", "post-formats" ),
		"taxonomies" => array( "category", "post_tag" ),
	);

	register_post_type( "projet", $args );

    if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_projets',
		'title' => 'Projets',
		'fields' => array (
			array (
				'key' => 'field_5a699f9b7dccb',
				'label' => 'Sous titre du projet',
				'name' => 'sous_titre_projet',
				'type' => 'text',
				'instructions' => 'Le sous-titre du projet',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a699fe37dccc',
				'label' => 'Image du projet',
				'name' => 'image_projet',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'projet',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'comments',
				2 => 'categories',
			),
		),
		'menu_order' => 0,
	));
}


function show_projet(){
    
    $query = new WP_Query(array( 'post_type' => 'projet','posts_per_page' => 4));
    
if ($query->have_posts()){
    $string = '';
    $c = 1;
    while($query->have_posts()): $query->the_post();
    if($c % 2 == 0):
    // Generation blanc
        $string .= '<section class="container-fluid d-none d-lg-block d-xl-block d-md-block">
			<div class="container">
				<div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">';
        if(get_field('image_projet')):
            $string .= '<img src="'.get_field('image_projet').'" width="100%">';
        endif;
        $string .= '</div>';
        $string .= '<div class="col-12 col-sm-12 col-md-12 col-lg-6 offset-xl-1 col-xl-4 text-right bgbl"> <h4 class="red">'.get_the_title().'</h4>';
        if(get_field('sous_titre_projet')):
            $string .= '<p class="red">'.get_field('sous_titre_projet').'</p>';
        endif;
    $string .= '<hr align="right" />';
    $string .= '<p>'.get_the_excerpt().'</p>';
    $string .= '<a href="'.get_the_permalink().'"><p class="text-left">Lire la suite ></p></a></div>';
    
    $string .= '</div>
				</div>
			</div>
		</section>';
        $c++;
    else:
    // Generation rouge
        $string .= '<section class="bgred container-fluid d-none d-lg-block d-xl-block d-md-block">
			 <div class="container">
				<div class="row align-items-center">
					<div class="wh col-12 col-sm-12 col-md-12 col-lg-6 offset-xl-1 col-xl-4">';
    
        $string .= '<h4>'.get_the_title().'</h4>';
        if(get_field('sous_titre_projet')):
            $string .= '<p>'.get_field('sous_titre_projet').'</p>';
        endif;
    $string .= '<hr align="left" />';
    $string .= '<p>'.get_the_excerpt().'</p>';
    $string .= '<a href="'.get_the_permalink().'"><p class="text-right">Lire la suite ></p></a></div>';
    $string .= '<div class="col-12 col-sm-12 col-md-12 col-lg-6 offset-xl-1 col-xl-6">';
    if(get_field('image_projet')):
        $string .= '<img src="'.get_field('image_projet').'" width="100%">';
    endif;
    $string .= '</div></div></div></section>';
    $c++;
    endif;
    endwhile;
    return $string;
    
    wp_reset_postdata();
    
    }
}

    add_shortcode('postProjet','show_projet');

function show_projet_carousel(){

        $query = new WP_Query(array( 'post_type' => 'projet','posts_per_page' => 6));

        if ($query->have_posts()){
        $string = '';
        $d = 0;
        while($query->have_posts()): $query->the_post();
        if($d == 0):
        // Generation carousel
        $string .= '<div class="carousel-item active">';
        $d++;
        else:
        $string .= '<div class="carousel-item">';
        endif;
        $string .= '<div class="container">
        <div class="row">
        <div class="col-6">';
        $string .= '<h2 class="titre_article_carousel">'.get_the_title().'</h2>';
        if (get_field('sous_titre_projet')):
        $string .= '<p class="sous-titre_art_car">'.get_field('sous_titre_projet').'</p>';
        endif;
        $string .= '<hr align="left" />';
        $string .= '<p class="paragraph_carr">'.get_the_excerpt().'</p></div>';
        if (get_field('image_projet')):
        $url = get_field('image_projet');
        $string .= '<div class="col-6"><img src="'.$url.'" width="100%"></div>';
        endif;
        $string .= '</div></div></div>';
        endwhile;
        return $string;

        wp_reset_postdata();

        }
        }
        add_shortcode('postProjetCarousel','show_projet_carousel');

function show_team_2()
{
    if(is_home()):
    $query = new WP_Query( array( 'post_type' => 'team', 'posts_per_page' => 3, 'offset' => 3 ) );
    endif;
if ( $query->have_posts() ) {
         while ( $query->have_posts() ): $query->the_post(); 
             if(get_field('image_de_profil')):
                $url = get_field('image_de_profil');
            else:
                $url = 'http://localhost/wordpress/wp-content/themes/Theme_cancoicode_ysc/assets/img/image_card.png';
             endif;
                        if(is_home()):
                            $string .= '<div class="card col-lg-4">';
                        else:
                            $string .= '<div class="card col-lg-3">';
                        endif;
                            $string .= '<div style="background-image: url('.$url.')" class="pic"></div>';
                            $string .= '<div class="card-body">';
                            $string .= '<h5 class="card-title text-center text-uppercase">'.get_the_title().'</h5>';
                            if (get_field('citation')){
                                $string .= '<p class="sous-titre text-center">'.get_field('citation').'</p>';
                            }
                            $string .= '<hr /><p class="card-text">'.get_the_excerpt().'</p>';
                            $string .= '<a href="'.get_the_permalink().'" class="pull-right">Lire la suite ></a>';
                            if(get_field('github')){
                                $string .= '<a href="'.get_field('github').'"><i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i></a>';
                            }
                            if(get_field('linkedin')){
                                $string .= '<a href="'.get_field('linkedin').'"><i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>';
                            }
    $string .= '</div></div>';
         endwhile;
} else {
        $string = "Ajouter des membres dans la promo de Cancoicode !!";
}
return $string;
wp_reset_postdata();
}
add_shortcode('postCancoillote2', 'show_team_2');

function show_team_3()
{
    if(is_home()):
    $query = new WP_Query( array( 'post_type' => 'team', 'posts_per_page' => 3, 'offset' => 6 ) );
    endif;
if ( $query->have_posts() ) {
         while ( $query->have_posts() ): $query->the_post(); 
             if(get_field('image_de_profil')):
                $url = get_field('image_de_profil');
            else:
                $url = 'http://localhost/wordpress/wp-content/themes/Theme_cancoicode_ysc/assets/img/image_card.png';
             endif;
                        if(is_home()):
                            $string .= '<div class="card col-lg-4">';
                        else:
                            $string .= '<div class="card col-lg-3">';
                        endif;
                            $string .= '<div style="background-image: url('.$url.')" class="pic"></div>';
                            $string .= '<div class="card-body">';
                            $string .= '<h5 class="card-title text-center text-uppercase">'.get_the_title().'</h5>';
                            if (get_field('citation')){
                                $string .= '<p class="sous-titre text-center">'.get_field('citation').'</p>';
                            }
                            $string .= '<hr /><p class="card-text">'.get_the_excerpt().'</p>';
                            $string .= '<a href="'.get_the_permalink().'" class="pull-right">Lire la suite ></a>';
                            if(get_field('github')){
                                $string .= '<a href="'.get_field('github').'"><i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i></a>';
                            }
                            if(get_field('linkedin')){
                                $string .= '<a href="'.get_field('linkedin').'"><i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>';
                            }
    $string .= '</div></div>';
         endwhile;
} else {
        $string = "Ajouter des membres dans la promo de Cancoicode !!";
}
return $string;
wp_reset_postdata();
}
add_shortcode('postCancoillote3', 'show_team_3');

?> 
                
                
              
                
                
                
                
                
                
              
