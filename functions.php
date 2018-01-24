<?php
require_once( get_template_directory().'/includes/advanced-custom-fields/acf.php');

// On rajoute bootstrap
function enqueue_bootstrap() {

  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
  wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
  wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css' );
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', 'jquery' );
  wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/jquery.min.js', 'jquery' );
  wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/wow.min.js', 'wow' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );

// On ajoute la navbar
register_nav_menus( array(
    'menu-1' => esc_html__( 'Primary', 'theme-textdomain' ),
) );

// Début Custom Post Type
    // Post: Products
add_action( 'init', 'product_init' );
function product_init() {
  register_post_type( 'produit',
    array(
			'labels' => array(
                'name' => __( 'Produits' ),
                'singular_name' => __( 'Produit' ),
                'all_items' => 'Tous les produits',
                'add_new_item' => 'Ajouter un produit',
                'edit_item' => 'Éditer le produit',
                'new_item' => 'Nouveau produit',
                'view_item' => 'Voir le produit',
                'search_items' => 'Rechercher parmi les produits',
                'not_found' => 'Pas de produit trouvé',
                'not_found_in_trash'=> 'Pas de produit dans la corbeille'
              ),
            'description' => 'Les produits',
            'public' => true,
            'capability_type' => 'post',
            'has_archive' => true
		)
	);
}
    // Post: Team
add_action( 'init', 'team_init' );
function team_init() {
  register_post_type( 'team',
    array(
			'labels' => array(
                'name' => __( "Membres d'équipe" ),
                'singular_name' => __( 'Membre' ),
                'all_items' => 'Tous les membres',
                'add_new_item' => 'Ajouter un membre',
                'edit_item' => 'Éditer le membre',
                'new_item' => 'Nouveau membre',
                'view_item' => 'Voir le membre',
                'search_items' => 'Rechercher parmi les membres',
                'not_found' => 'Pas de membre trouvé',
                'not_found_in_trash'=> 'Pas de membre dans la corbeille'
              ),
            'description' => "Les membres de l'équipe du site",
            'public' => true,
            'capability_type' => 'post',
            'has_archive' => true
		)
	);
}
    // Post: Services
add_action( 'init', 'services_init' );
function services_init() {
  register_post_type( 'services',
    array(
			'labels' => array(
                'name' => __( "Services" ),
                'singular_name' => __( 'service' ),
                'all_items' => 'Tous les services',
                'add_new_item' => 'Ajouter un service',
                'edit_item' => 'Éditer le service',
                'new_item' => 'Nouveau service',
                'view_item' => 'Voir le service',
                'search_items' => 'Rechercher parmi les services',
                'not_found' => 'Pas de service trouvé',
                'not_found_in_trash'=> 'Pas de service dans la corbeille'
              ),
            'description' => "Les services proposé par l'équipe",
            'public' => true,
            'capability_type' => 'post',
            'has_archive' => true
		)
	);
}
    // Post: Compétences
add_action( 'init', 'competences_init' );
function competences_init() {
  register_post_type( 'competences',
    array(
			'labels' => array(
                'name' => __( "Compétences" ),
                'singular_name' => __( 'Compétence' ),
                'all_items' => 'Toutes les compétences',
                'add_new_item' => 'Ajouter une compétence',
                'edit_item' => 'Éditer la compétence',
                'new_item' => 'Nouvelle compétence',
                'view_item' => 'Voir la compétence',
                'search_items' => 'Rechercher parmi les compétences',
                'not_found' => 'Pas de compétence trouvé',
                'not_found_in_trash'=> 'Pas de compétence dans la corbeille'
              ),
            'description' => "Les compétences que votre équipe posséde",
            'public' => true,
            'capability_type' => 'post',
            'has_archive' => true
		)
	);
}

// Fonction d'affichage des custom post type
function show_products()
{
    $query = new WP_Query( array( 'post_type' => 'produit', 'posts_per_page' => 8 ) );
if ( $query->have_posts() ) {
         while ( $query->have_posts() ): $query->the_post();
             if(get_field('image_du_produit')):
                $image = get_field('image_du_produit');
                $url = $image['url'];
	            $title = $image['title'];
	            $alt = $image['alt'];
             endif;
                            $string .= '<article id="'.get_the_id().'" class="card col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 text-center">';
                            $string .= '<header class="d-flex justify-content-center">';
                            $string .= '<a href="'.get_the_permalink().'"><div style="width:270px; height:370px; background-image:url('.$url.'); background-position: center; background-size: cover;" class="card-img-top"></div></a></header>';
                            if (get_field('marque')){
                                $string .= '<div class="card-body"><p class="card-text"><span class="brand grey">'.get_field('marque').'</span><br />';
                            }
                            $string .= '<span class="black product-name">'.get_the_title().'</span><br />';
                            if (get_field('devise') && get_field('prix')){
                                $string .= '<span class="red price">'.get_field('devise').' '.get_field('prix').'</span></p></div></article>';
                            }
         endwhile;
} else {
        $string = "Il n'y a pas de produit dans cette catégorie";
}
wp_reset_query();
return $string;
}
add_shortcode('postProducts', 'show_products');
add_filter('widget_text', 'do_shortcode');

function show_team()
{
    $query = new WP_Query( array( 'post_type' => 'team', 'posts_per_page' => 4 ) );
if ( $query->have_posts() ) {
         while ( $query->have_posts() ): $query->the_post();
             if(get_field('image_du_membre')):
                $image = get_field('image_du_membre');
                $url = $image['url'];
	            $title = $image['title'];
	            $alt = $image['alt'];
             endif;
                            $string .= '<div class="col-12 col-sm-12 col-md-6 col-lg-3">';
                            $string .= '<div class="rond" style="background-image: url('.$url.');">
                                        </div>';
                            if (get_field('role')){
                                $string .= '<p>'.get_field('role').'</p>';
                            }
                            $string .= '<p class="name">'.get_the_title().'</p>';
                            $string .= '<p>'.get_the_content().'</p></div>';
         endwhile;
} else {
        $string = "Il n'y a pas de membre d'équipe";
}
wp_reset_query();
return $string;
}
add_shortcode('postTeam', 'show_team');

function show_services()
{
    $query = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => 6 ) );
if ( $query->have_posts() ) {
         while ( $query->have_posts() ): $query->the_post();
                            $string .= '<div class="col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1"> <div class="icones">';
                            if(get_field('icone')){
                                $string .= '<i class="fa '.get_field('icone').' fa-2x" aria-hidden="true"></i>';
                            }
                            $string .= '</div></div>';

                            $string .= '<div class="col-9 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                                        <p class="brandingtitle">'.get_the_title().'</p>';
                            $string .= '<p>'.get_the_content().'</p></div>';
         endwhile;
} else {
        $string = "Il n'y a pas de services";
}
wp_reset_query();
return $string;
}
add_shortcode('postServices', 'show_services');

function show_competences()
{
    $query = new WP_Query( array( 'post_type' => 'competences', 'posts_per_page' => 2 ) );
if ( $query->have_posts() ) {
         while ( $query->have_posts() ): $query->the_post();
                            $string .= '<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"> <p class="red">';
                            if(get_field('avant_titre')){
                                $string .= get_field('avant_titre').'</p>';
                            }
                                $string .= '<h3>'.get_the_title().'</h3>';
                            $string .= '<p class="grey">'.get_the_content().'</p>';

                            $string .= '</div>';
         endwhile;
} else {
        $string = "Il n'y a pas de compétences";
}
wp_reset_query();
return $string;
}
add_shortcode('postCompetences', 'show_competences');

// ACF Champ
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_mo',
		'title' => 'mo',
		'fields' => array (
			array (
				'key' => 'field_5a5e0c3c98d11',
				'label' => 'Avant titre de membre',
				'name' => '1',
				'type' => 'text',
				'instructions' => 'L\'avant titre de la section membre',
				'required' => 1,
				'default_value' => 'Lorem Ipsum dolor sit amet',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a5e0d3a98d12',
				'label' => 'Titre de la section membre',
				'name' => '2',
				'type' => 'text',
				'instructions' => 'Le titre de la section membre',
				'required' => 1,
				'default_value' => 'MEET OUR TEAM MEMBERS',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a5e0ded98d13',
				'label' => 'Sous titre de la section membre',
				'name' => '3',
				'type' => 'textarea',
				'instructions' => 'Un simple texte qui présente la section où se trouve les membres de votre équipe',
				'required' => 1,
				'default_value' => 'Lorem Ipsu dolor sit amet, consectetur adipisicing elit. Aperiam incidunt dolorem perferendis minus accusamus architecto. assumenda',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5a5e0e7798d14',
				'label' => 'Avant titre de la section services',
				'name' => '4',
				'type' => 'text',
				'instructions' => 'L\'Avant titre de la section services',
				'required' => 1,
				'default_value' => 'Lorem ipsum dolor sit amet',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a5e0ed098d15',
				'label' => 'Titre de la section services',
				'name' => '5',
				'type' => 'text',
				'instructions' => 'Le titre de la section services où se trouve les services que vous proposez',
				'required' => 1,
				'default_value' => 'CLASSICO SERVICES',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a5e0ef898d16',
				'label' => 'Sous titre de la section services',
				'name' => '6',
				'type' => 'textarea',
				'instructions' => 'Un simple texte qui présente ce que vous proposez comme services',
				'default_value' => 'Lorem Ipsu dolor sit amet, consectetur adipisicing elit. Aperiam incidunt dolorem perferendis minus accusamus architecto. assumenda',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5a5e0f4b98d17',
				'label' => 'Avant titre de la section features',
				'name' => '7',
				'type' => 'text',
				'instructions' => 'L\'avant titre de la section features',
				'required' => 1,
				'default_value' => 'Lorem ipsum dolor sit amet',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a5e0f8598d18',
				'label' => 'Titre de la section features',
				'name' => '8',
				'type' => 'text',
				'instructions' => 'Le titre de la section features',
				'required' => 1,
				'default_value' => 'CHECK MORE BLANCO FEATURES',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a5e0fa998d19',
				'label' => 'Texte du bouton',
				'name' => '9',
				'type' => 'text',
				'instructions' => 'Le texte présent dans le bouton',
				'required' => 1,
				'default_value' => 'MORE DETAILS',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
            array (
				'key' => 'field_5a5e1fa998d19',
				'label' => 'Lien du bouton',
				'name' => '12',
				'type' => 'text',
				'instructions' => 'Le lien que doit rediriger le bouton',
				'required' => 1,
				'default_value' => 'http://localhost/wordpress',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a5e0fcb98d1a',
				'label' => 'Couleur du bouton',
				'name' => '10',
				'type' => 'color_picker',
				'instructions' => 'Sélectionner la couleur du bouton',
				'required' => 1,
				'default_value' => '#ea5032',
			),
			array (
				'key' => 'field_5a5e100198d1b',
				'label' => 'Texte de la section features',
				'name' => '11',
				'type' => 'textarea',
				'instructions' => 'Le texte de la section features',
				'required' => 1,
				'default_value' => 'Lorem Ipsu dolor sit amet, consectetur adipisicing elit. Aperiam incidunt dolorem perferendis minus accusamus architecto. assumenda',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-about-us.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
                1 => 'permalink',
				2 => 'categories',
			),
		),
		'menu_order' => 0,
	));
    register_field_group(array (
		'id' => 'acf_comp',
		'title' => 'comp',
		'fields' => array (
			array (
				'key' => 'field_5a5f45485eae3',
				'label' => 'Avant-titre des compétences',
				'name' => 'avant_titre',
				'type' => 'text',
				'instructions' => 'L\'avant titre d\'une compétence',
				'required' => 1,
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
					'value' => 'competences',
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
		'id' => 'acf_produits',
		'title' => 'Produits',
		'fields' => array (
			array (
				'key' => 'field_5a588b7c26f88',
				'label' => 'Marque',
				'name' => 'marque',
				'type' => 'text',
				'instructions' => 'La marque du produit',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a588c56a930b',
				'label' => 'Image du produit',
				'name' => 'image_du_produit',
				'type' => 'image',
				'instructions' => 'L\'image du produit <b>(taille recommandée: 270x370)</b>',
				'required' => 1,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5a588c7ca930c',
				'label' => 'Prix',
				'name' => 'prix',
				'type' => 'number',
				'instructions' => 'Le prix du produit',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
            array (
				'key' => 'field_5a58b4f9ba168',
				'label' => 'Devise',
				'name' => 'devise',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					'$' => '$',
					'€' => '€',
					'£' => '£',
                    '&#8383;' => 'BTC',
                    '¥' => 'Yens'
				),
				'default_value' => '',
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'produit',
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
		'id' => 'acf_test',
		'title' => 'test',
		'fields' => array (
			array (
				'key' => 'field_5a5cb96c0e18f',
				'label' => 'Rôle',
				'name' => 'role',
				'type' => 'text',
				'instructions' => 'Le rôle du membre de l\'équipe',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
            array (
				'key' => 'field_5a588c56a430b',
				'label' => 'Photo',
				'name' => 'image_du_membre',
				'type' => 'image',
				'instructions' => "Une photo du membre de l'équipe",
				'required' => 0,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
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
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_services',
		'title' => 'services',
		'fields' => array (
			array (
				'key' => 'field_5a5cfb41601de',
				'label' => 'Icône',
				'name' => 'icone',
				'type' => 'font-awesome',
				'instructions' => 'Choisissez une icône',
				'required' => 1,
				'default_value' => '',
				'save_format' => 'class',
				'allow_null' => 0,
				'show_preview' => 1,
				'enqueue_fa' => 1,
				'fa_live_preview' => '',
				'choices' => array (
					'' => '',
					'fa-500px' => '&#xf26e; 500px',
					'fa-address-book' => ' address-book',
					'fa-address-book-o' => ' address-book-o',
					'fa-address-card' => ' address-card',
					'fa-address-card-o' => ' address-card-o',
					'fa-adjust' => ' adjust',
					'fa-adn' => ' adn',
					'fa-align-center' => ' align-center',
					'fa-align-justify' => ' align-justify',
					'fa-align-left' => ' align-left',
					'fa-align-right' => ' align-right',
					'fa-amazon' => ' amazon',
					'fa-ambulance' => ' ambulance',
					'fa-american-sign-language-interpreting' => ' american-sign-language-interpreting',
					'fa-anchor' => ' anchor',
					'fa-android' => ' android',
					'fa-angellist' => ' angellist',
					'fa-angle-double-down' => ' angle-double-down',
					'fa-angle-double-left' => ' angle-double-left',
					'fa-angle-double-right' => ' angle-double-right',
					'fa-angle-double-up' => ' angle-double-up',
					'fa-angle-down' => ' angle-down',
					'fa-angle-left' => ' angle-left',
					'fa-angle-right' => ' angle-right',
					'fa-angle-up' => ' angle-up',
					'fa-apple' => ' apple',
					'fa-archive' => ' archive',
					'fa-area-chart' => ' area-chart',
					'fa-arrow-circle-down' => ' arrow-circle-down',
					'fa-arrow-circle-left' => ' arrow-circle-left',
					'fa-arrow-circle-o-down' => ' arrow-circle-o-down',
					'fa-arrow-circle-o-left' => ' arrow-circle-o-left',
					'fa-arrow-circle-o-right' => ' arrow-circle-o-right',
					'fa-arrow-circle-o-up' => ' arrow-circle-o-up',
					'fa-arrow-circle-right' => ' arrow-circle-right',
					'fa-arrow-circle-up' => ' arrow-circle-up',
					'fa-arrow-down' => ' arrow-down',
					'fa-arrow-left' => ' arrow-left',
					'fa-arrow-right' => ' arrow-right',
					'fa-arrow-up' => ' arrow-up',
					'fa-arrows' => ' arrows',
					'fa-arrows-alt' => ' arrows-alt',
					'fa-arrows-h' => ' arrows-h',
					'fa-arrows-v' => ' arrows-v',
					'fa-assistive-listening-systems' => ' assistive-listening-systems',
					'fa-asterisk' => ' asterisk',
					'fa-at' => ' at',
					'fa-audio-description' => ' audio-description',
					'fa-backward' => ' backward',
					'fa-balance-scale' => ' balance-scale',
					'fa-ban' => ' ban',
					'fa-bandcamp' => ' bandcamp',
					'fa-bar-chart' => ' bar-chart',
					'fa-barcode' => ' barcode',
					'fa-bars' => ' bars',
					'fa-bath' => ' bath',
					'fa-battery-empty' => ' battery-empty',
					'fa-battery-full' => ' battery-full',
					'fa-battery-half' => ' battery-half',
					'fa-battery-quarter' => ' battery-quarter',
					'fa-battery-three-quarters' => ' battery-three-quarters',
					'fa-bed' => ' bed',
					'fa-beer' => ' beer',
					'fa-behance' => ' behance',
					'fa-behance-square' => ' behance-square',
					'fa-bell' => ' bell',
					'fa-bell-o' => ' bell-o',
					'fa-bell-slash' => ' bell-slash',
					'fa-bell-slash-o' => ' bell-slash-o',
					'fa-bicycle' => ' bicycle',
					'fa-binoculars' => ' binoculars',
					'fa-birthday-cake' => ' birthday-cake',
					'fa-bitbucket' => ' bitbucket',
					'fa-bitbucket-square' => ' bitbucket-square',
					'fa-black-tie' => ' black-tie',
					'fa-blind' => ' blind',
					'fa-bluetooth' => ' bluetooth',
					'fa-bluetooth-b' => ' bluetooth-b',
					'fa-bold' => ' bold',
					'fa-bolt' => ' bolt',
					'fa-bomb' => ' bomb',
					'fa-book' => ' book',
					'fa-bookmark' => ' bookmark',
					'fa-bookmark-o' => ' bookmark-o',
					'fa-braille' => ' braille',
					'fa-briefcase' => ' briefcase',
					'fa-btc' => ' btc',
					'fa-bug' => ' bug',
					'fa-building' => ' building',
					'fa-building-o' => ' building-o',
					'fa-bullhorn' => ' bullhorn',
					'fa-bullseye' => ' bullseye',
					'fa-bus' => ' bus',
					'fa-buysellads' => ' buysellads',
					'fa-calculator' => ' calculator',
					'fa-calendar' => ' calendar',
					'fa-calendar-check-o' => ' calendar-check-o',
					'fa-calendar-minus-o' => ' calendar-minus-o',
					'fa-calendar-o' => ' calendar-o',
					'fa-calendar-plus-o' => ' calendar-plus-o',
					'fa-calendar-times-o' => ' calendar-times-o',
					'fa-camera' => ' camera',
					'fa-camera-retro' => ' camera-retro',
					'fa-car' => ' car',
					'fa-caret-down' => ' caret-down',
					'fa-caret-left' => ' caret-left',
					'fa-caret-right' => ' caret-right',
					'fa-caret-square-o-down' => ' caret-square-o-down',
					'fa-caret-square-o-left' => ' caret-square-o-left',
					'fa-caret-square-o-right' => ' caret-square-o-right',
					'fa-caret-square-o-up' => ' caret-square-o-up',
					'fa-caret-up' => ' caret-up',
					'fa-cart-arrow-down' => ' cart-arrow-down',
					'fa-cart-plus' => ' cart-plus',
					'fa-cc' => ' cc',
					'fa-cc-amex' => ' cc-amex',
					'fa-cc-diners-club' => ' cc-diners-club',
					'fa-cc-discover' => ' cc-discover',
					'fa-cc-jcb' => ' cc-jcb',
					'fa-cc-mastercard' => ' cc-mastercard',
					'fa-cc-paypal' => ' cc-paypal',
					'fa-cc-stripe' => ' cc-stripe',
					'fa-cc-visa' => ' cc-visa',
					'fa-certificate' => ' certificate',
					'fa-chain-broken' => ' chain-broken',
					'fa-check' => ' check',
					'fa-check-circle' => ' check-circle',
					'fa-check-circle-o' => ' check-circle-o',
					'fa-check-square' => ' check-square',
					'fa-check-square-o' => ' check-square-o',
					'fa-chevron-circle-down' => ' chevron-circle-down',
					'fa-chevron-circle-left' => ' chevron-circle-left',
					'fa-chevron-circle-right' => ' chevron-circle-right',
					'fa-chevron-circle-up' => ' chevron-circle-up',
					'fa-chevron-down' => ' chevron-down',
					'fa-chevron-left' => ' chevron-left',
					'fa-chevron-right' => ' chevron-right',
					'fa-chevron-up' => ' chevron-up',
					'fa-child' => ' child',
					'fa-chrome' => ' chrome',
					'fa-circle' => ' circle',
					'fa-circle-o' => ' circle-o',
					'fa-circle-o-notch' => ' circle-o-notch',
					'fa-circle-thin' => ' circle-thin',
					'fa-clipboard' => ' clipboard',
					'fa-clock-o' => ' clock-o',
					'fa-clone' => ' clone',
					'fa-cloud' => ' cloud',
					'fa-cloud-download' => ' cloud-download',
					'fa-cloud-upload' => ' cloud-upload',
					'fa-code' => ' code',
					'fa-code-fork' => ' code-fork',
					'fa-codepen' => ' codepen',
					'fa-codiepie' => ' codiepie',
					'fa-coffee' => ' coffee',
					'fa-cog' => ' cog',
					'fa-cogs' => ' cogs',
					'fa-columns' => ' columns',
					'fa-comment' => ' comment',
					'fa-comment-o' => ' comment-o',
					'fa-commenting' => ' commenting',
					'fa-commenting-o' => ' commenting-o',
					'fa-comments' => ' comments',
					'fa-comments-o' => ' comments-o',
					'fa-compass' => ' compass',
					'fa-compress' => ' compress',
					'fa-connectdevelop' => ' connectdevelop',
					'fa-contao' => ' contao',
					'fa-copyright' => ' copyright',
					'fa-creative-commons' => ' creative-commons',
					'fa-credit-card' => ' credit-card',
					'fa-credit-card-alt' => ' credit-card-alt',
					'fa-crop' => ' crop',
					'fa-crosshairs' => ' crosshairs',
					'fa-css3' => ' css3',
					'fa-cube' => ' cube',
					'fa-cubes' => ' cubes',
					'fa-cutlery' => ' cutlery',
					'fa-dashcube' => ' dashcube',
					'fa-database' => ' database',
					'fa-deaf' => ' deaf',
					'fa-delicious' => ' delicious',
					'fa-desktop' => ' desktop',
					'fa-deviantart' => ' deviantart',
					'fa-diamond' => ' diamond',
					'fa-digg' => ' digg',
					'fa-dot-circle-o' => ' dot-circle-o',
					'fa-download' => ' download',
					'fa-dribbble' => ' dribbble',
					'fa-dropbox' => ' dropbox',
					'fa-drupal' => ' drupal',
					'fa-edge' => ' edge',
					'fa-eercast' => ' eercast',
					'fa-eject' => ' eject',
					'fa-ellipsis-h' => ' ellipsis-h',
					'fa-ellipsis-v' => ' ellipsis-v',
					'fa-empire' => ' empire',
					'fa-envelope' => ' envelope',
					'fa-envelope-o' => ' envelope-o',
					'fa-envelope-open' => ' envelope-open',
					'fa-envelope-open-o' => ' envelope-open-o',
					'fa-envelope-square' => ' envelope-square',
					'fa-envira' => ' envira',
					'fa-eraser' => ' eraser',
					'fa-etsy' => ' etsy',
					'fa-eur' => ' eur',
					'fa-exchange' => ' exchange',
					'fa-exclamation' => ' exclamation',
					'fa-exclamation-circle' => ' exclamation-circle',
					'fa-exclamation-triangle' => ' exclamation-triangle',
					'fa-expand' => ' expand',
					'fa-expeditedssl' => ' expeditedssl',
					'fa-external-link' => ' external-link',
					'fa-external-link-square' => ' external-link-square',
					'fa-eye' => ' eye',
					'fa-eye-slash' => ' eye-slash',
					'fa-eyedropper' => ' eyedropper',
					'fa-facebook' => ' facebook',
					'fa-facebook-official' => ' facebook-official',
					'fa-facebook-square' => ' facebook-square',
					'fa-fast-backward' => ' fast-backward',
					'fa-fast-forward' => ' fast-forward',
					'fa-fax' => ' fax',
					'fa-female' => ' female',
					'fa-fighter-jet' => ' fighter-jet',
					'fa-file' => ' file',
					'fa-file-archive-o' => ' file-archive-o',
					'fa-file-audio-o' => ' file-audio-o',
					'fa-file-code-o' => ' file-code-o',
					'fa-file-excel-o' => ' file-excel-o',
					'fa-file-image-o' => ' file-image-o',
					'fa-file-o' => ' file-o',
					'fa-file-pdf-o' => ' file-pdf-o',
					'fa-file-powerpoint-o' => ' file-powerpoint-o',
					'fa-file-text' => ' file-text',
					'fa-file-text-o' => ' file-text-o',
					'fa-file-video-o' => ' file-video-o',
					'fa-file-word-o' => ' file-word-o',
					'fa-files-o' => ' files-o',
					'fa-film' => ' film',
					'fa-filter' => ' filter',
					'fa-fire' => ' fire',
					'fa-fire-extinguisher' => ' fire-extinguisher',
					'fa-firefox' => ' firefox',
					'fa-first-order' => ' first-order',
					'fa-flag' => ' flag',
					'fa-flag-checkered' => ' flag-checkered',
					'fa-flag-o' => ' flag-o',
					'fa-flask' => ' flask',
					'fa-flickr' => ' flickr',
					'fa-floppy-o' => ' floppy-o',
					'fa-folder' => ' folder',
					'fa-folder-o' => ' folder-o',
					'fa-folder-open' => ' folder-open',
					'fa-folder-open-o' => ' folder-open-o',
					'fa-font' => ' font',
					'fa-font-awesome' => ' font-awesome',
					'fa-fonticons' => ' fonticons',
					'fa-fort-awesome' => ' fort-awesome',
					'fa-forumbee' => ' forumbee',
					'fa-forward' => ' forward',
					'fa-foursquare' => ' foursquare',
					'fa-free-code-camp' => ' free-code-camp',
					'fa-frown-o' => ' frown-o',
					'fa-futbol-o' => ' futbol-o',
					'fa-gamepad' => ' gamepad',
					'fa-gavel' => ' gavel',
					'fa-gbp' => ' gbp',
					'fa-genderless' => ' genderless',
					'fa-get-pocket' => ' get-pocket',
					'fa-gg' => ' gg',
					'fa-gg-circle' => ' gg-circle',
					'fa-gift' => ' gift',
					'fa-git' => ' git',
					'fa-git-square' => ' git-square',
					'fa-github' => ' github',
					'fa-github-alt' => ' github-alt',
					'fa-github-square' => ' github-square',
					'fa-gitlab' => ' gitlab',
					'fa-glass' => ' glass',
					'fa-glide' => ' glide',
					'fa-glide-g' => ' glide-g',
					'fa-globe' => ' globe',
					'fa-google' => ' google',
					'fa-google-plus' => ' google-plus',
					'fa-google-plus-official' => ' google-plus-official',
					'fa-google-plus-square' => ' google-plus-square',
					'fa-google-wallet' => ' google-wallet',
					'fa-graduation-cap' => ' graduation-cap',
					'fa-gratipay' => ' gratipay',
					'fa-grav' => ' grav',
					'fa-h-square' => ' h-square',
					'fa-hacker-news' => ' hacker-news',
					'fa-hand-lizard-o' => ' hand-lizard-o',
					'fa-hand-o-down' => ' hand-o-down',
					'fa-hand-o-left' => ' hand-o-left',
					'fa-hand-o-right' => ' hand-o-right',
					'fa-hand-o-up' => ' hand-o-up',
					'fa-hand-paper-o' => ' hand-paper-o',
					'fa-hand-peace-o' => ' hand-peace-o',
					'fa-hand-pointer-o' => ' hand-pointer-o',
					'fa-hand-rock-o' => ' hand-rock-o',
					'fa-hand-scissors-o' => ' hand-scissors-o',
					'fa-hand-spock-o' => ' hand-spock-o',
					'fa-handshake-o' => ' handshake-o',
					'fa-hashtag' => ' hashtag',
					'fa-hdd-o' => ' hdd-o',
					'fa-header' => ' header',
					'fa-headphones' => ' headphones',
					'fa-heart' => ' heart',
					'fa-heart-o' => ' heart-o',
					'fa-heartbeat' => ' heartbeat',
					'fa-history' => ' history',
					'fa-home' => ' home',
					'fa-hospital-o' => ' hospital-o',
					'fa-hourglass' => ' hourglass',
					'fa-hourglass-end' => ' hourglass-end',
					'fa-hourglass-half' => ' hourglass-half',
					'fa-hourglass-o' => ' hourglass-o',
					'fa-hourglass-start' => ' hourglass-start',
					'fa-houzz' => ' houzz',
					'fa-html5' => ' html5',
					'fa-i-cursor' => ' i-cursor',
					'fa-id-badge' => ' id-badge',
					'fa-id-card' => ' id-card',
					'fa-id-card-o' => ' id-card-o',
					'fa-ils' => ' ils',
					'fa-imdb' => ' imdb',
					'fa-inbox' => ' inbox',
					'fa-indent' => ' indent',
					'fa-industry' => ' industry',
					'fa-info' => ' info',
					'fa-info-circle' => ' info-circle',
					'fa-inr' => ' inr',
					'fa-instagram' => ' instagram',
					'fa-internet-explorer' => ' internet-explorer',
					'fa-ioxhost' => ' ioxhost',
					'fa-italic' => ' italic',
					'fa-joomla' => ' joomla',
					'fa-jpy' => ' jpy',
					'fa-jsfiddle' => ' jsfiddle',
					'fa-key' => ' key',
					'fa-keyboard-o' => ' keyboard-o',
					'fa-krw' => ' krw',
					'fa-language' => ' language',
					'fa-laptop' => ' laptop',
					'fa-lastfm' => ' lastfm',
					'fa-lastfm-square' => ' lastfm-square',
					'fa-leaf' => ' leaf',
					'fa-leanpub' => ' leanpub',
					'fa-lemon-o' => ' lemon-o',
					'fa-level-down' => ' level-down',
					'fa-level-up' => ' level-up',
					'fa-life-ring' => ' life-ring',
					'fa-lightbulb-o' => ' lightbulb-o',
					'fa-line-chart' => ' line-chart',
					'fa-link' => ' link',
					'fa-linkedin' => ' linkedin',
					'fa-linkedin-square' => ' linkedin-square',
					'fa-linode' => ' linode',
					'fa-linux' => ' linux',
					'fa-list' => ' list',
					'fa-list-alt' => ' list-alt',
					'fa-list-ol' => ' list-ol',
					'fa-list-ul' => ' list-ul',
					'fa-location-arrow' => ' location-arrow',
					'fa-lock' => ' lock',
					'fa-long-arrow-down' => ' long-arrow-down',
					'fa-long-arrow-left' => ' long-arrow-left',
					'fa-long-arrow-right' => ' long-arrow-right',
					'fa-long-arrow-up' => ' long-arrow-up',
					'fa-low-vision' => ' low-vision',
					'fa-magic' => ' magic',
					'fa-magnet' => ' magnet',
					'fa-male' => ' male',
					'fa-map' => ' map',
					'fa-map-marker' => ' map-marker',
					'fa-map-o' => ' map-o',
					'fa-map-pin' => ' map-pin',
					'fa-map-signs' => ' map-signs',
					'fa-mars' => ' mars',
					'fa-mars-double' => ' mars-double',
					'fa-mars-stroke' => ' mars-stroke',
					'fa-mars-stroke-h' => ' mars-stroke-h',
					'fa-mars-stroke-v' => ' mars-stroke-v',
					'fa-maxcdn' => ' maxcdn',
					'fa-meanpath' => ' meanpath',
					'fa-medium' => ' medium',
					'fa-medkit' => ' medkit',
					'fa-meetup' => ' meetup',
					'fa-meh-o' => ' meh-o',
					'fa-mercury' => ' mercury',
					'fa-microchip' => ' microchip',
					'fa-microphone' => ' microphone',
					'fa-microphone-slash' => ' microphone-slash',
					'fa-minus' => ' minus',
					'fa-minus-circle' => ' minus-circle',
					'fa-minus-square' => ' minus-square',
					'fa-minus-square-o' => ' minus-square-o',
					'fa-mixcloud' => ' mixcloud',
					'fa-mobile' => ' mobile',
					'fa-modx' => ' modx',
					'fa-money' => ' money',
					'fa-moon-o' => ' moon-o',
					'fa-motorcycle' => ' motorcycle',
					'fa-mouse-pointer' => ' mouse-pointer',
					'fa-music' => ' music',
					'fa-neuter' => ' neuter',
					'fa-newspaper-o' => ' newspaper-o',
					'fa-object-group' => ' object-group',
					'fa-object-ungroup' => ' object-ungroup',
					'fa-odnoklassniki' => ' odnoklassniki',
					'fa-odnoklassniki-square' => ' odnoklassniki-square',
					'fa-opencart' => ' opencart',
					'fa-openid' => ' openid',
					'fa-opera' => ' opera',
					'fa-optin-monster' => ' optin-monster',
					'fa-outdent' => ' outdent',
					'fa-pagelines' => ' pagelines',
					'fa-paint-brush' => ' paint-brush',
					'fa-paper-plane' => ' paper-plane',
					'fa-paper-plane-o' => ' paper-plane-o',
					'fa-paperclip' => ' paperclip',
					'fa-paragraph' => ' paragraph',
					'fa-pause' => ' pause',
					'fa-pause-circle' => ' pause-circle',
					'fa-pause-circle-o' => ' pause-circle-o',
					'fa-paw' => ' paw',
					'fa-paypal' => ' paypal',
					'fa-pencil' => ' pencil',
					'fa-pencil-square' => ' pencil-square',
					'fa-pencil-square-o' => ' pencil-square-o',
					'fa-percent' => ' percent',
					'fa-phone' => ' phone',
					'fa-phone-square' => ' phone-square',
					'fa-picture-o' => ' picture-o',
					'fa-pie-chart' => ' pie-chart',
					'fa-pied-piper' => ' pied-piper',
					'fa-pied-piper-alt' => ' pied-piper-alt',
					'fa-pied-piper-pp' => ' pied-piper-pp',
					'fa-pinterest' => ' pinterest',
					'fa-pinterest-p' => ' pinterest-p',
					'fa-pinterest-square' => ' pinterest-square',
					'fa-plane' => ' plane',
					'fa-play' => ' play',
					'fa-play-circle' => ' play-circle',
					'fa-play-circle-o' => ' play-circle-o',
					'fa-plug' => ' plug',
					'fa-plus' => ' plus',
					'fa-plus-circle' => ' plus-circle',
					'fa-plus-square' => ' plus-square',
					'fa-plus-square-o' => ' plus-square-o',
					'fa-podcast' => ' podcast',
					'fa-power-off' => ' power-off',
					'fa-print' => ' print',
					'fa-product-hunt' => ' product-hunt',
					'fa-puzzle-piece' => ' puzzle-piece',
					'fa-qq' => ' qq',
					'fa-qrcode' => ' qrcode',
					'fa-question' => ' question',
					'fa-question-circle' => ' question-circle',
					'fa-question-circle-o' => ' question-circle-o',
					'fa-quora' => ' quora',
					'fa-quote-left' => ' quote-left',
					'fa-quote-right' => ' quote-right',
					'fa-random' => ' random',
					'fa-ravelry' => ' ravelry',
					'fa-rebel' => ' rebel',
					'fa-recycle' => ' recycle',
					'fa-reddit' => ' reddit',
					'fa-reddit-alien' => ' reddit-alien',
					'fa-reddit-square' => ' reddit-square',
					'fa-refresh' => ' refresh',
					'fa-registered' => ' registered',
					'fa-renren' => ' renren',
					'fa-repeat' => ' repeat',
					'fa-reply' => ' reply',
					'fa-reply-all' => ' reply-all',
					'fa-retweet' => ' retweet',
					'fa-road' => ' road',
					'fa-rocket' => ' rocket',
					'fa-rss' => ' rss',
					'fa-rss-square' => ' rss-square',
					'fa-rub' => ' rub',
					'fa-safari' => ' safari',
					'fa-scissors' => ' scissors',
					'fa-scribd' => ' scribd',
					'fa-search' => ' search',
					'fa-search-minus' => ' search-minus',
					'fa-search-plus' => ' search-plus',
					'fa-sellsy' => ' sellsy',
					'fa-server' => ' server',
					'fa-share' => ' share',
					'fa-share-alt' => ' share-alt',
					'fa-share-alt-square' => ' share-alt-square',
					'fa-share-square' => ' share-square',
					'fa-share-square-o' => ' share-square-o',
					'fa-shield' => ' shield',
					'fa-ship' => ' ship',
					'fa-shirtsinbulk' => ' shirtsinbulk',
					'fa-shopping-bag' => ' shopping-bag',
					'fa-shopping-basket' => ' shopping-basket',
					'fa-shopping-cart' => ' shopping-cart',
					'fa-shower' => ' shower',
					'fa-sign-in' => ' sign-in',
					'fa-sign-language' => ' sign-language',
					'fa-sign-out' => ' sign-out',
					'fa-signal' => ' signal',
					'fa-simplybuilt' => ' simplybuilt',
					'fa-sitemap' => ' sitemap',
					'fa-skyatlas' => ' skyatlas',
					'fa-skype' => ' skype',
					'fa-slack' => ' slack',
					'fa-sliders' => ' sliders',
					'fa-slideshare' => ' slideshare',
					'fa-smile-o' => ' smile-o',
					'fa-snapchat' => ' snapchat',
					'fa-snapchat-ghost' => ' snapchat-ghost',
					'fa-snapchat-square' => ' snapchat-square',
					'fa-snowflake-o' => ' snowflake-o',
					'fa-sort' => ' sort',
					'fa-sort-alpha-asc' => ' sort-alpha-asc',
					'fa-sort-alpha-desc' => ' sort-alpha-desc',
					'fa-sort-amount-asc' => ' sort-amount-asc',
					'fa-sort-amount-desc' => ' sort-amount-desc',
					'fa-sort-asc' => ' sort-asc',
					'fa-sort-desc' => ' sort-desc',
					'fa-sort-numeric-asc' => ' sort-numeric-asc',
					'fa-sort-numeric-desc' => ' sort-numeric-desc',
					'fa-soundcloud' => ' soundcloud',
					'fa-space-shuttle' => ' space-shuttle',
					'fa-spinner' => ' spinner',
					'fa-spoon' => ' spoon',
					'fa-spotify' => ' spotify',
					'fa-square' => ' square',
					'fa-square-o' => ' square-o',
					'fa-stack-exchange' => ' stack-exchange',
					'fa-stack-overflow' => ' stack-overflow',
					'fa-star' => ' star',
					'fa-star-half' => ' star-half',
					'fa-star-half-o' => ' star-half-o',
					'fa-star-o' => ' star-o',
					'fa-steam' => ' steam',
					'fa-steam-square' => ' steam-square',
					'fa-step-backward' => ' step-backward',
					'fa-step-forward' => ' step-forward',
					'fa-stethoscope' => ' stethoscope',
					'fa-sticky-note' => ' sticky-note',
					'fa-sticky-note-o' => ' sticky-note-o',
					'fa-stop' => ' stop',
					'fa-stop-circle' => ' stop-circle',
					'fa-stop-circle-o' => ' stop-circle-o',
					'fa-street-view' => ' street-view',
					'fa-strikethrough' => ' strikethrough',
					'fa-stumbleupon' => ' stumbleupon',
					'fa-stumbleupon-circle' => ' stumbleupon-circle',
					'fa-subscript' => ' subscript',
					'fa-subway' => ' subway',
					'fa-suitcase' => ' suitcase',
					'fa-sun-o' => ' sun-o',
					'fa-superpowers' => ' superpowers',
					'fa-superscript' => ' superscript',
					'fa-table' => ' table',
					'fa-tablet' => ' tablet',
					'fa-tachometer' => ' tachometer',
					'fa-tag' => ' tag',
					'fa-tags' => ' tags',
					'fa-tasks' => ' tasks',
					'fa-taxi' => ' taxi',
					'fa-telegram' => ' telegram',
					'fa-television' => ' television',
					'fa-tencent-weibo' => ' tencent-weibo',
					'fa-terminal' => ' terminal',
					'fa-text-height' => ' text-height',
					'fa-text-width' => ' text-width',
					'fa-th' => ' th',
					'fa-th-large' => ' th-large',
					'fa-th-list' => ' th-list',
					'fa-themeisle' => ' themeisle',
					'fa-thermometer-empty' => ' thermometer-empty',
					'fa-thermometer-full' => ' thermometer-full',
					'fa-thermometer-half' => ' thermometer-half',
					'fa-thermometer-quarter' => ' thermometer-quarter',
					'fa-thermometer-three-quarters' => ' thermometer-three-quarters',
					'fa-thumb-tack' => ' thumb-tack',
					'fa-thumbs-down' => ' thumbs-down',
					'fa-thumbs-o-down' => ' thumbs-o-down',
					'fa-thumbs-o-up' => ' thumbs-o-up',
					'fa-thumbs-up' => ' thumbs-up',
					'fa-ticket' => ' ticket',
					'fa-times' => ' times',
					'fa-times-circle' => ' times-circle',
					'fa-times-circle-o' => ' times-circle-o',
					'fa-tint' => ' tint',
					'fa-toggle-off' => ' toggle-off',
					'fa-toggle-on' => ' toggle-on',
					'fa-trademark' => ' trademark',
					'fa-train' => ' train',
					'fa-transgender' => ' transgender',
					'fa-transgender-alt' => ' transgender-alt',
					'fa-trash' => ' trash',
					'fa-trash-o' => ' trash-o',
					'fa-tree' => ' tree',
					'fa-trello' => ' trello',
					'fa-tripadvisor' => ' tripadvisor',
					'fa-trophy' => ' trophy',
					'fa-truck' => ' truck',
					'fa-try' => ' try',
					'fa-tty' => ' tty',
					'fa-tumblr' => ' tumblr',
					'fa-tumblr-square' => ' tumblr-square',
					'fa-twitch' => ' twitch',
					'fa-twitter' => ' twitter',
					'fa-twitter-square' => ' twitter-square',
					'fa-umbrella' => ' umbrella',
					'fa-underline' => ' underline',
					'fa-undo' => ' undo',
					'fa-universal-access' => ' universal-access',
					'fa-university' => ' university',
					'fa-unlock' => ' unlock',
					'fa-unlock-alt' => ' unlock-alt',
					'fa-upload' => ' upload',
					'fa-usb' => ' usb',
					'fa-usd' => ' usd',
					'fa-user' => ' user',
					'fa-user-circle' => ' user-circle',
					'fa-user-circle-o' => ' user-circle-o',
					'fa-user-md' => ' user-md',
					'fa-user-o' => ' user-o',
					'fa-user-plus' => ' user-plus',
					'fa-user-secret' => ' user-secret',
					'fa-user-times' => ' user-times',
					'fa-users' => ' users',
					'fa-venus' => ' venus',
					'fa-venus-double' => ' venus-double',
					'fa-venus-mars' => ' venus-mars',
					'fa-viacoin' => ' viacoin',
					'fa-viadeo' => ' viadeo',
					'fa-viadeo-square' => ' viadeo-square',
					'fa-video-camera' => ' video-camera',
					'fa-vimeo' => ' vimeo',
					'fa-vimeo-square' => ' vimeo-square',
					'fa-vine' => ' vine',
					'fa-vk' => ' vk',
					'fa-volume-control-phone' => ' volume-control-phone',
					'fa-volume-down' => ' volume-down',
					'fa-volume-off' => ' volume-off',
					'fa-volume-up' => ' volume-up',
					'fa-weibo' => ' weibo',
					'fa-weixin' => ' weixin',
					'fa-whatsapp' => ' whatsapp',
					'fa-wheelchair' => ' wheelchair',
					'fa-wheelchair-alt' => ' wheelchair-alt',
					'fa-wifi' => ' wifi',
					'fa-wikipedia-w' => ' wikipedia-w',
					'fa-window-close' => ' window-close',
					'fa-window-close-o' => ' window-close-o',
					'fa-window-maximize' => ' window-maximize',
					'fa-window-minimize' => ' window-minimize',
					'fa-window-restore' => ' window-restore',
					'fa-windows' => ' windows',
					'fa-wordpress' => ' wordpress',
					'fa-wpbeginner' => ' wpbeginner',
					'fa-wpexplorer' => ' wpexplorer',
					'fa-wpforms' => ' wpforms',
					'fa-wrench' => ' wrench',
					'fa-xing' => ' xing',
					'fa-xing-square' => ' xing-square',
					'fa-y-combinator' => ' y-combinator',
					'fa-yahoo' => ' yahoo',
					'fa-yelp' => ' yelp',
					'fa-yoast' => ' yoast',
					'fa-youtube' => ' youtube',
					'fa-youtube-play' => ' youtube-play',
					'fa-youtube-square' => ' youtube-square',
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services',
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

}
if( !function_exists( 'theme_pagination' ) ) {

    function theme_pagination() {

	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

	$pagination = array(
		'base' => @add_query_arg('page','%#%'),
		'format' => '',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
	        'show_all' => false,
	        'end_size'     => 1,
	        'mid_size'     => 4,
		'type' => 'list',
		'next_text' => '»',
		'prev_text' => '«'
	);

	if( $wp_rewrite->using_permalinks() )
		$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => str_replace( ' ' , '+', get_query_var( 's' ) ) );

	echo str_replace('page/1/','', paginate_links( $pagination ) );
    }
}

function pressPagination($pages = '', $range = 2)
{
    global $paged;
    $showitems= ($range * 2)+1;
 
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
                   $pages = 1;
        }
    }
 
    if(1 != $pages)
    {
        echo "<div class='pagination'>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
         
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            }
        }
 
        if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
           if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
           echo "</div>n";
       }
 
}
