<?php /* Template Name: Team */ get_header(); ?>
    
    <!-- section 'collectif' -->
    <section class="collectif">
       <div class="container">
           <div class="row">
           <div class="col-lg-11 text-center">
                <h2>Le collectif "Cancoicode"</h2>
                <p class="sous-titre">Présentation de l'équipe</p>
                <p class="discover">
                   Sur cette page, vous trouverez les 12 membres du collectif “Cancoicode”. 
                    Nous sommes tous développeurs web juniors et avons tous nos particularités et nos domaines de prédilection.
                    Certains sont très bon en graphisme, d’autres particulièrement doués en programmation. Nos inspirations sont diverses : Littérature, cinéma, jeux-vidéos, musique etc...<br /><br />

                    Prenez le temps de nous découvrir!
                </p>
            </div>
           </div>
           <hr />
        </div>
    </section>
    
    <!-- section 'team' -->
    <section class="team">
       <div class="container">
       <div class="row justify-content-center">
            <?php echo do_shortcode('[postCancoillote]'); ?>
           </div>
        </div>
    </section>
    
  <?php get_footer(); ?>