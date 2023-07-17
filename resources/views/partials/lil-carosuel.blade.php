<div class="carosuel">
    <?php if( have_rows('carousel') ): ?>
      <?php 
        $i = 0;
        $total_rows = count(get_field('carousel'));
      ?>
    <div id="switchSlide" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
         <?php for ($num = 0; $num < $total_rows; $num++){ 
            if($num == 0){
              $active = 'active';
              
            } else {
              $active = '';
              
            }
          ?>
          <li data-target="#switchSlide" data-slide-to="<?php echo $num; ?>" class="<?php echo $active; ?>"></li>
         <?php } ?>
        </ol> 
    <div class="carousel-inner">    
      <?php while( have_rows('carousel') ): the_row(); 
        // vars
        $size = '2048x2048';
        $image = get_sub_field('carousel_image');
        $image_src = wp_get_attachment_image_src( $image, $size );
        $image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
        if($i == 0){
          $active = 'active';
        } else {
          $active = '';
        }
      ?>        
        <div class="carousel-item <?php echo $active; ?>">
          <img class="not-lazy" src="<?php echo $image['url'];?>" alt="<?php echo $image_alt; ?>">
        </div>    
      <?php 
        $i++;
        endwhile; 
      ?>
      </div>
        <a class="carousel-control-prev" href="#switchSlide" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#switchSlide" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <?php endif; ?>
	</div>