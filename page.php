<?php
if (is_page('blog'))
{
    get_template_part('Blog');
} elseif(is_page('projets'))
{ 
    get_template_part('Projets'); 
} elseif(is_page('equipe'))
{ 
    get_template_part('Team'); 
} else {
    get_header();
?>
<!-- Faire un template pour une page classique -->
<?php 
    get_footer();
}
?>