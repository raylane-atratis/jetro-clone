<div class="col-12 col-lg-5 menu-footer d-block">
  <div class="item">
    <h4>Menus</h4>
    <?php
    wp_reset_query();
            wp_nav_menu(array(
            'menu' => 'Menu Rodape',
            'container' => false,
            'container_class' => '',
            'container_id' => '',
            'menu_class' => 'navbar-nav',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'depth' => 0,
            'walker' => new Description_Walker,
            'theme_location' => ''
            ));
        ?>
  </div>
</div>