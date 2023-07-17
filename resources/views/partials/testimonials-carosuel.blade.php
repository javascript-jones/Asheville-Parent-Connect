<div class="testimonials-repeater">
    <?php if( have_rows('testimonials') ): ?>
      <?php 
        $i = 0;
        $total_rows = count(get_field('testimonials'));
      ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
         <?php for ($num = 0; $num < $total_rows; $num++){ 
            if($num == 0){
              $active = 'active';
            } else {
              $active = '';
            }
          ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $num; ?>" class="<?php echo $active; ?>"></li>
         <?php } ?>
        </ol> 
    <div class="carousel-inner">    
      <?php while( have_rows('testimonials') ): the_row(); 
        // vars
        $headline = get_sub_field('headline');
        $body = get_sub_field('body');
        $attribute = get_sub_field('attribute');
        $image = get_sub_field('image');

        if($i == 0){
          $active = 'active';
        } else {
          $active = '';
        }
      ?>        
        <div class="carousel-item <?php echo $active; ?>">               
          <div class="row flex-row-reverse h-100">
            <div class="col-md-1"></div>
            <div class="col-md-3 d-flex align-items-center justify-content-center">
              <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>" class="testimonial-thumb">
            </div>
            <div class="col-md-7 testi-text d-flex align-items-center justify-content-center">
              <p>
                <span class="big-bold d-block">
                  <?php echo $headline; ?>
                </span>
                <?php echo $body; ?>
                <span class="d-block testi-attribute"><?php echo $attribute; ?></span>
              </p>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>    
      <?php 
        $i++;
        endwhile; 
      ?>
      </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <?php endif; ?>
	</div>
  