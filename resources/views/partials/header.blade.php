<header class="banner">
  <div class="header-inner">
    <a class="brand" href="{{ home_url('/') }}">
        <?php
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        
          if ( has_custom_logo() ) {
            echo '<img src="' . $image[0] . '" class="logo" alt="' . get_bloginfo( 'name' ) . '">';
          } else {
            echo '<h3>'. get_bloginfo( 'name' ) .'</h3>';
          }    
        ?>
    </a>
    <div class="hamburger hamburger--spring">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </div>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</header>
