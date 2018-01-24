    <?php /* Template Name: Blog */ get_header(); ?>
     <main class="container-fluid blog">
      <section class="container padb">
        <h4 class="red">L'ensemble des articles de blog</h4>
        <p class="red stb">La promo 2018 de l'acs Vesoul</p>
        <p class="p">Vous retrouverez ici l'ensemble des billets de blog écrits par le collectif de développeurs "Cancoicode" abordant des sujets divers et variés tels que la technologie, le web d'aujourd'hui, l'éthique ou encore l'écologie dans le domaine du numérique. Vous verrez égalemnt l'ensemble des membres du collectif ainsi que tous les projets sur lesquels nous avons oeuvrés.</p>
        <p class="p">Bonne visite!</p>
      </section>

      <section class="container">
        <nav aria-label="Page navigation example" class="cq">
        <ul class="pagination justify-content-end">
          <li class="page-item nbg">
            <a class="page-link" href="#" aria-label="Previous">
              <span class="blk" aria-hidden="true">&lt;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item nb"><a class="page-link blk" href="#">1</a></li>
          <li class="page-item nb"><a class="page-link blk" href="#">2</a></li>
          <li class="page-item nbd">
            <a class="page-link" href="#" aria-label="Next">
              <span class="blk" aria-hidden="true">&gt;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
        <div class="row">
       <?php 
$args = array( 'post_type' => '', 'posts_per_page' => 12 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();

echo "<div class='col-lg-4'>".the_post_thumbnail('thumbnail')."
<h5 class='red'>".get_the_title()."</h5>";
if(get_field('sous_titre_article')):
            echo "<p class='red stb'>".get_field('sous_titre_article')."</p>";
endif;
echo "<hr align='left' /> <p class='l'>".get_the_excerpt()."</p>       <p class='text-right red stb'><a href='".get_the_permalink()."'>Lire la suite<i class='fa fa-chevron-right' aria-hidden='true'></i></a></p>
          </div>";

endwhile;
            wp_reset_postdata();?>
        </div>

  <nav aria-label="Page navigation example" class="cq">
  <ul class="pagination justify-content-end">
    <li class="page-item nbg">
      <a class="page-link" href="#" aria-label="Previous">
        <span class="blk" aria-hidden="true">&lt;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item nb"><a class="page-link blk" href="#">1</a></li>
    <li class="page-item nb"><a class="page-link blk" href="#">2</a></li>
    <li class="page-item nbd">
      <a class="page-link" href="#" aria-label="Next">
        <span class="blk" aria-hidden="true">&gt;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
      </section>

    </main>
    
   <?php get_footer(); ?>