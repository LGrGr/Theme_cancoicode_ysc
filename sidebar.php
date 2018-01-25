<?php require_once(get_template_directory() . '/includes/bootstrap-navwalker.php'); ?>

<nav class="navbar navbar-expand-lg navbar-toggleable-md navbar-light">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"> <img src="<?php bloginfo('template_directory'); ?>/assets/img/logo_cancoicode_penche2.svg" width="320px" height="220px" alt="logo_cancoicode"></a>
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
