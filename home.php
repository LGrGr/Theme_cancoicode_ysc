<?php
get_header();
?>

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Library</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
  </nav>
</div>

<div class="container article">
  <div class="row">
    <?php
    $args = array( 'post_type' => '');
    $loop = new WP_Query( $args );
    if( $loop->have_posts() ):
    while ( $loop->have_posts() ) : $loop->the_post();

      echo '<div class="col-md-4">
            <article>
            <div class="card text-center">';
      if( has_post_thumbnail() ) {
        the_post_thumbnail();
      } else {
       echo '<a href="'.get_the_permalink().'"><img src="' . get_bloginfo('template_directory') . '/img/img_base.svg" alt="" />';
     }
     echo'<div class="card-body">
     <h5 class="card-title">' . get_the_title() . '</h5>
     <p class="date">'.get_the_date('l j F Y').' by '. get_the_author() .'</p>
     <p class="card-text">'.get_the_excerpt().'</p>
     </div>
     </a>
     </div>
     </article>
     </div>';

   endwhile;

 else:
     echo '<p>Sorry, no posts were found!</p>';
   endif;
   ?>
  </div>
</div>

<div class="container" id="pagi">
  <nav id="pag" aria-label="Page navigation example" class="navbar">
      <?php pressPagination($pages ='', $range = 2); ?>
  </nav>
</div>

<?php
get_footer();
?>
