<?php get_header(); ?>
   <?php if(have_posts()): ?>
   <?php while(have_posts()) : the_post(); ?>
    <!-- section 'article' -->
    <section class="article">
       <div class="container">
            <div class="offset-lg-1 col-lg-6">
                <?php if(has_post_thumbnail()): the_post_thumbnail(); endif; ?>
            </div>
                <div class="titre text-center">
                    <h2><?php the_title(); ?></h2>
                    <hr />
                    <p class="sous-titre">the_field('sous_titre_article')</p>
               </div>
               <div class="row justify-content-center infos">
                  <div class="date">
                       <i class="pull-left fa fa-calendar-check-o fa-2x" aria-hidden="true"></i>
                       <p class="pull-right"><?php the_date(); ?></p>
                   </div>
                   <div class="author">
                       <i class="pull-left fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
                       <p class="pull-right"><?php the_author(); ?></p>
                   </div>
                   <div class="comments">
                       <i class="pull-left fa fa-comments fa-2x" aria-hidden="true"></i>
                       <p class="pull-right"><?php $count = wp_count_comments(get_the_ID()); echo $count->total_comments; ?> commentaire</p>
                   </div>
               </div>
               <div class="text">
                   <?php the_content; ?>
               </div>
               <button class="pull-right" type="button">Retour</button>
        </div>
    </section>
    
    <!-- SECTION 'commentaire' -->
    <section class="commentaire">
       <div class="container">
            <?php $comments = get_comments(array(
			'post_id' => get_the_ID(),
			'status' => 'approve'
		)); 
           format_comment($comments); ?>
            <hr />
            <div class="row">
                <form action="">
                   <div class="inputs pull-left">
                        <input placeholder="Nom" type="text">
                        <input placeholder="Mail" type="text">
                        <input placeholder="Site Web" type="text">
                    </div>
                    <textarea placeholder="Commentaire" name="" id="" cols="70" rows="8"></textarea>
                    <button type="submit">Laisser un commentaire</button>
                </form>
           </div>
        </div>
    </section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>