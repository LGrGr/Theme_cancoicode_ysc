<?php require_once(get_template_directory() . '/includes/bootstrap-navwalker.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset=<?php bloginfo('charset'); ?>>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php wp_head(); ?>
  <title><?php wp_title(); ?></title>
</head>
<body <?php body_class(); ?> >
   <!------------------------------------HEADER-------------------------------------------->
  
<header class="container-fluid header_accueil">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="">
                <img src="<?php bloginfo('template_directory'); ?>/assets/img/logo_cancoicode.svg" alt="logo_cancoicode" class="img-fluid logo">
            </div>
        </div>
    </div>
    <!-----------------------------------NAV BAR----------------------------------------------> 
     
          <nav class="navbar navbar-expand-lg navbar-toggleable-md navbar-light">
        <button class="navbar-toggler navbar-right navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        wp_nav_menu( array(
          'theme_location'  =>  'menu-1',
          'menu_id'         =>  'primary-menu',
          'container'       =>  'div',
          'container_id'    =>  'navbarNavDropdown',
          'container_class' =>  'collapse navbar-collapse',
          'menu_id'         =>  false,
          'menu_class'      =>  'navbar-nav ml-auto',
          'depth'           =>  2,
          'menu_class'      =>  'navbar-nav ml-auto',
          'walker'          =>  new Bootstrap_NavWalker(),
          'fallback_cb'     =>  'Bootstrap_NavWalker::fallback',
        ) );
      ?>
    </nav>
 
                 
</header>
   
   <!----------------------------------------SECTION BIENVENUE------------------------------------->
<section class="section_bienvenue">
    
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <h2 class="titre_bienvenue">Bienvenue sur le blog de "/cancoicode"!</h2>
                
            </div>
            <div class="row">
               
                <p class="sous_titre_bienvenue">La promo 2018 de l'acs Vesoul</p>
                
                <p class="paragraphe_bienv">Bienvenue sur le site du collectif "/cancoicode". Nous sommes 12 développeurs juniors venant de tous horizons. Sur le site, vous retrouverez nos articles de blog portant sur des thèmes très divers mais tous liés au numérique, les différents projets sur lesquels nous avons travaillés et surtout, la desription de chacun des membres du collectif et leurs travaux personnels.</p>
            </div>
            
            <div class="row bonne_visite">
                <p>Bonne visite !</p>
            </div>
            
        </div> 
    </div>
    
</section>
   
   <!-----------------------------------------SECTION CARROUSSEL------------------------------------->
   
   
<section class="section_carousel">
    <div class="container-fluid carouselred">

                <div id="carouselExampleControls" class="carousel carouselred slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                       
                        <div class="carousel-item active">
                          
                          <div class="container">
                              <div class="row">
                                  <div class="col-6">
                                     <h2 class="titre_article_carousel">SPACE INVADERS</h2> 
                                     <p class="sous-titre_art_car">Sous-titre d'article</p>
                                     <hr align="left" />
                                     <p class="paragraph_carr">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc Quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nex observare restricte, ne plus redar quam acceperit;neque enim verendum est, ne quid excudat, aut ne quid in[...]</p>
                                  </div>
                             
                                   <div class="col-6">
                                      <img src="<?php bloginfo('template_directory'); ?>/assets/img/space.png">
                                  </div>
                              </div> 
                          </div>
                        </div>
                                
                                
                        <div class="carousel-item">
                        
                         <div class="container">
                              <div class="row">
                                  <div class="col-6">
                                     <h2 class="titre_article_carousel">SPACE INVADERS</h2> 
                                     <p class="sous-titre_art_car">Sous-titre d'article</p>
                                     <hr align="left" />
                                     <p class="paragraph_carr">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc Quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nex observare restricte, ne plus redar quam acceperit;neque enim verendum est, ne quid excudat, aut ne quid in[...]</p>
                                  </div>
                                  
                                   <div class="col-6">
                                      <img src="<?php bloginfo('template_directory'); ?>/assets/img/space.png">
                                  </div>
                              </div> 
                          </div>      
                                 
                            
                  </div>
                  
                <div class="carousel-item">
                        
                         <div class="container">
                              <div class="row">
                                  <div class="col-6">
                                     <h2 class="titre_article_carousel">SPACE INVADERS</h2> 
                                     <p class="sous-titre_art_car">Sous-titre d'article</p>
                                         <hr align="left" />
                                     <p class="paragraph_carr">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc Quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nex observare restricte, ne plus redar quam acceperit;neque enim verendum est, ne quid excudat, aut ne quid in[...]</p>
                                  </div>
                                  
                                  
                                   <div class="col-6">
                                      <img src="<?php bloginfo('template_directory'); ?>/assets/img/space.png">
                                  </div>
                                                        
                            
                  </div>

                </div>
            </div>
        
    
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
                    </a>
                    
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                    </a>
                    
            </div>
        </div>
    </div>
</section>


<!------------------------------------------SECTION ARTICLES--------------------------------------->


<section class="section_articles">
    <div class="container-fluid">
       <div class="container">
           <div class="row caroussel_articles">
          
              <div class="card col-4" style="width: 20rem;">
                  <img class="card-img-top" src="..." alt="Card image cap">
                      <div class="card-block">
                        <h4 class="card-title">Titre d'article</h4>
                        <p class="sous-titre-card">Sous-titre d'article</p>
                            <hr align="left" />
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, commodi. Nisi quisquam, ut error laborum fuga cum esse cumque obcaecati, modi molestiae!</p>
                        
                      </div>
              </div>
           
            <div class="card col-4" style="width: 20rem;">
                    <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-block">
                        <h4 class="card-title">Titre d'article</h4>
                        <p class="sous-titre-card">Sous-titre d'article</p>
                            <hr align="left" />
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, commodi. Nisi quisquam, ut error laborum fuga cum esse cumque obcaecati, modi molestiae!</p>
                        
                </div>
            </div>
          
            <div class="card col-4" style="width: 20rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title">Titre d'article</h4>
                        <p class="sous-titre-card">Sous-titre d'article</p>
                            <hr align="left" />
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, commodi. Nisi quisquam, ut error laborum fuga cum esse cumque obcaecati, modi molestiae!</p>
                            
                    </div>
            </div>  
           </div>
       </div>
    </div>
</section>
   
   
   <!----------------------------------------SECTION ICONES------------------------------------------>
   
   <section class="section_icones">
       <div class="container-fluid icones">
          <div class="container">
              <div class="row text-center icones">
                  
                 <div class="col-3">
                     <img src="<?php bloginfo('template_directory'); ?>/assets/img/cafe.jpg" alt="icone d'un café" id="icone"> 
                         <h4 class="text_icone">2641</h4>
                         <h5 class="text_icone" >CAF&Eacute;S ENGLOUTIS</h5>
                     </div>
              
                 
                  <div class="col-3">
                     <img src="<?php bloginfo('template_directory'); ?>/assets/img/git.jpg" alt="icone de Github" id="icone">
                         <h4 class="text_icone">991</h4>
                         <h5 class="text_icone">TENTATIVE DE PUSH</h5>
                    
                 </div>
                  
                   <div class="col-3">
                     <img src="<?php bloginfo('template_directory'); ?>/assets/img/lit.jpg" alt="icone d'un lit" id="icone"> 
                     <h4 class="text_icone">195</h4>
                     <h5 class="text_icone">NUITS BLANCHES</h5>
                 </div>
                  
                  <div class="col-3">
                     <img src="<?php bloginfo('template_directory'); ?>/assets/img/couverts.jpg" alt="icone de couverts" id="icone"> 
                     <h4 class="text_icone">3471</h4>
                     <h5 class="text_icone">PANINIS LE MIDI</h5>
                 </div> 
                    </div>  
                  
              </div>
          </div> 
   </section>
   
   <!-------------------------------CARROUSSEL EQUIPE-------------------------------------------->
   <section class="section_carouselEquipe">
       
 <div class="container-fluid">
            <div id="carouselTeam" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
             <div class="container">
              <div class="row">
               <div class="card col-lg-4">
                        <div style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/image_card.png)" class="pic">
                        </div>
                      <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Charlie Moreau</h5>
                        <p class="sous-titre text-center">Developpeur métalleux</p>
                        <hr />
                        <p class="card-text">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in [...]</p>
                        <a href="#" class="pull-right">Lire la suite ></a>
                        <i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i>
                        <i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="card col-lg-4">
                        <div style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/image_card.png)" class="pic">
                        </div>
                      <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Charlie Moreau</h5>
                        <p class="sous-titre text-center">Developpeur métalleux</p>
                        <hr />
                        <p class="card-text">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in [...]</p>
                        <a href="#" class="pull-right">Lire la suite ></a>
                        <i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i>
                        <i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="card col-lg-4">
                        <div style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/image_card.png)" class="pic">
                        </div>
                      <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Charlie Moreau</h5>
                        <p class="sous-titre text-center">Developpeur métalleux</p>
                        <hr />
                        <p class="card-text">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in [...]</p>
                        <a href="#" class="pull-right">Lire la suite ></a>
                        <i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i>
                        <i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                      </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="carousel-item">
              <div class="container">
              <div class="row">
               <div class="card col-lg-4">
                        <div style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/image_card.png)" class="pic">
                        </div>
                      <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Charlie Moreau</h5>
                        <p class="sous-titre text-center">Developpeur métalleux</p>
                        <hr />
                        <p class="card-text">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in [...]</p>
                        <a href="#" class="pull-right">Lire la suite ></a>
                        <i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i>
                        <i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="card col-lg-4">
                        <div style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/image_card.png)" class="pic">
                        </div>
                      <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Charlie Moreau</h5>
                        <p class="sous-titre text-center">Developpeur métalleux</p>
                        <hr />
                        <p class="card-text">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in [...]</p>
                        <a href="#" class="pull-right">Lire la suite ></a>
                        <i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i>
                        <i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="card col-lg-4">
                        <div style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/image_card.png)" class="pic">
                        </div>
                      <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Charlie Moreau</h5>
                        <p class="sous-titre text-center">Developpeur métalleux</p>
                        <hr />
                        <p class="card-text">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in [...]</p>
                        <a href="#" class="pull-right">Lire la suite ></a>
                        <i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i>
                        <i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                      </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="carousel-item">
             <div class="container">
              <div class="row">
               <div class="card col-lg-4">
                        <div style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/image_card.png)" class="pic">
                        </div>
                      <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Charlie Moreau</h5>
                        <p class="sous-titre text-center">Developpeur métalleux</p>
                        <hr />
                        <p class="card-text">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in [...]</p>
                        <a href="#" class="pull-right">Lire la suite ></a>
                        <i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i>
                        <i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="card col-lg-4">
                        <div style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/image_card.png)" class="pic">
                        </div>
                      <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Charlie Moreau</h5>
                        <p class="sous-titre text-center">Developpeur métalleux</p>
                        <hr />
                        <p class="card-text">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in [...]</p>
                        <a href="#" class="pull-right">Lire la suite ></a>
                        <i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i>
                        <i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="card col-lg-4">
                        <div style="background-image: url(<?php bloginfo('template_directory'); ?>/assets/img/image_card.png)" class="pic">
                        </div>
                      <div class="card-body">
                        <h5 class="card-title text-center text-uppercase">Charlie Moreau</h5>
                        <p class="sous-titre text-center">Developpeur métalleux</p>
                        <hr />
                        <p class="card-text">Altera sententia est, quae definit amicitiam paribus officiis ac voluntatibus. Hoc quidem est nimis exigue et exiliter ad calculos vocare amicitiam, ut par sit ratio acceptorum et datorum. Divitior mihi et affluentior videtur esse vera amicitia nec observare restricte, ne plus reddat quam acceperit; neque enim verendum est, ne quid excidat, aut ne quid in [...]</p>
                        <a href="#" class="pull-right">Lire la suite ></a>
                        <i class="pull-left fa fa-github fa-2x" aria-hidden="true"></i>
                        <i class="pull-left fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                      </div>
                    </div>
                </div>
                </div>
                </div>
          </div>
          <a class="carousel-control-prev" href="#carouselTeam" role="button" data-slide="prev">
            <span class="fa fa-chevron-left fa-2x" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="fa fa-chevron-right fa-2x" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
       
   </section>
<?php get_footer() ?>
