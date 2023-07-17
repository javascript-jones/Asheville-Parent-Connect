<?php 
	$footer_quote = get_field('footer_quote', 'options');
  $fb = get_field('facebook_link', 'options');
  $ig = get_field('ig_link', 'options');
  $email = get_field('email_address', 'options');
 ?>
<footer class="content-info">
  <div class="footer-inner">
    <div class="left-column">
      <div class="social-links">
        <span id="facebook">
          <a href="<?php echo $fb; ?>" target="_blank">
            <img src="@asset('images/facebook-circular-logo.svg')" alt="facebook logo.">
          </a>
        </span>
        <span id="instagram">
          <a href="<?php echo $ig; ?>" target="_blank">
            <img src="@asset('images/instagram.svg')" alt="instagram logo.">
          </a>
        </span>
        <span class="email">
          <a href="mailto:<?php echo $email; ?>" target="_blank">
            <img src="@asset('images/gmail.svg')" alt="email icon.">
          </a>
        </span>
      </div>
    </div>
    <div class="center-column">
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
    </div>
    <div class="right-column">
      <nav class="nav-footer">
			  @if (has_nav_menu('footer_navigation'))
			    {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav']) !!}
			  @endif
			</nav>
    </div>
  </div>
  <div class="footer-upper">
    <p>
      <?php echo $footer_quote; ?>
    </p>
  </div>
</footer>
