<?php if( have_rows('membership_levels') ): ?>
  <?php 
    $i = 0;
    $total_rows = count(get_field('membership_levels'));
    while( have_rows('membership_levels') ): the_row(); 

    // vars
    $title = get_sub_field('level_title');
    $subtitle = get_sub_field('level_subtitle');
    $cta = get_sub_field('level_cta');

    if ($i == 0 || $i % 3 == 0){
      echo '<div class="levels-row">';
    }
  ?>    

        <div class="card temple-card">
          <div class="card-header d-flex flex-column">
            <h5>
              <?php echo $title ?>
            </h5>
            <?php if($subtitle){
                 echo '<span class="subtitle">' . $subtitle . '</span>';
              } ?>
          </div>
          <div class="card-body">
            <ul>
              <?php 
                if( have_rows('included_benefits') ): 
                  while( have_rows('included_benefits') ): the_row();
                  $benefit = get_sub_field('benefit');
                  $included = get_sub_field('included');
                  if ($included == 1) {
                    $included = 'included';
                  } else {
                    $included = 'not-included';
                  }
              ?>
                  <li class="<?php echo $included; ?>">
                    <?php echo $benefit; ?>
                  </li>
              <?php 
                  endwhile;
                endif;
              ?>        
            </ul> 
            <a href="<?php echo $cta['url']; ?>">
              <button class="is-style-outline wp-block-button__link">
                <?php echo $cta['title']; ?>
              </button>
            </a> 
          </div>
        </div>


<?php
  $i++;
  if ($i % 3 == 0){
    echo '</div>';
  } 
  endwhile;
  endif; 
?>