<div class="cb-inner">
  <div class="left-half">
    <div class="left-half-headers">
      <h4>
        <?php echo $subhead; ?>
      </h4>
      <h3>
        <?php echo $heading; ?>
      </h3>
    </div>
    <div class="community-stats">
      <?php if( have_rows('community_stats') ): ?>
        <?php while( have_rows('community_stats') ): the_row(); 
            $icon = get_sub_field('icon');
            $stat = get_sub_field('stat');
        ?>
          <div class="stat">
            <img src="<?php echo $icon['url']; ?>" alt="">
            <?php echo $stat; ?>
          </div>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>
    <a href="<?php echo $cta['url']; ?>" class="community-cta-link">
      <button>
        <?php echo $cta['title']; ?>
      </button>
    </a>
  </div>
  <div class="right-half">
    <div class="merkaba-container">
      <div class="left-side">
        <div class="upper-el circle-el">
          <p>
            <?php echo $b1; ?>
          </p>
        </div>
        <div class="lower-el circle-el">
          <p>
            <?php echo $b4; ?>
          </p>
        </div>
      </div>
      <div class="center-sect">
        <div class="upper-el circle-el">
          <p>
            <?php echo $b2; ?>
          </p>
        </div>
        <div class="center-hex">
          <p>
            Membership Benefits Include
          </p>            
        </div>
        <div class="lower-el circle-el">
          <p>
            <?php echo $b5; ?>
          </p>
        </div>   
      </div>
      <div class="right-side">
        <div class="upper-el circle-el">
          <p>
            <?php echo $b3; ?>
          </p>
        </div>
        <div class="lower-el circle-el">
          <p>
            <?php echo $b6; ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<img src="@asset('images/flower_and_frame.png')" alt="" class="flower-and-frame">