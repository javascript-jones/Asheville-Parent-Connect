{{--
  Template Name: Logged In User Dashboard Page Template
--}}
@extends('layouts.app')
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    <div class="body-wrap">
      <?php 
        // custom feild variable retreival 
        $first_pic = get_field('first_tile_picture');
        $first_text = get_field('first_tile_text');
        $first_link = get_field('first_tile_link');

        $second_pic = get_field('second_tile_picture');
        $second_text = get_field('second_tile_text');
        $second_link = get_field('second_tile_link');

        $third_pic = get_field('third_tile_picture');
        $third_text = get_field('third_tile_text');
        $third_link = get_field('third_tile_link');

        if(is_user_logged_in()) {
          $current_user = wp_get_current_user();
          $welcome_text = get_field('welcome_text');
      ?>
      <div class="row">
        <div class="col-md-9">
          <div class="dashboard-header">
            <h2>
              Welcome,  <?php printf(esc_html( $current_user->nickname ) ); ?>
            </h2>
            <p>
              <?php echo $welcome_text; ?>
            </p>
              <?php
              $current_user = wp_get_current_user();

                // get logged in user id 
                $current_user_id = $current_user->ID;
                // get group ids
                // Local site group ids, be sure this is commented out if dis goin live...
                  /*
                
                $groups = array(
                  'earth' => 288,
                  'water' => 290,
                  'fire' => 292,
                  'crystal' => 294,
                  'light' => 296,
                );
               */
                
                // Live Site Group Ids, commented out on local...
                $groups = array(
                  'earth' => 4533,
                  'water' => 4535,
                  'fire' => 4537,
                  'crystal' => 4539,
                  'light' => 4141,
                );

                
                // get all users within group
                $earth_users = learndash_get_groups_user_ids(  $groups['earth'],   $bypass_transient = false ); 
                $water_users = learndash_get_groups_user_ids(  $groups['water'],   $bypass_transient = false ); 
                $fire_users = learndash_get_groups_user_ids(  $groups['fire'],   $bypass_transient = false ); 
                $crystal_users = learndash_get_groups_user_ids(  $groups['crystal'],   $bypass_transient = false );
                $light_users = learndash_get_groups_user_ids(  $groups['light'],   $bypass_transient = false ); 

                // Initialize grouping booleens
                $earth_up = false;
                $water_up = false;
                $fire_up = false;
                $crystal_up = false;
                $light_up = false;

                // Set booleen values based on what groups people are in so that we can conditionally show/hide various UI elements. 
                if(in_array($current_user_id, $earth_users)) {
                  $earth_up = true;
                } 

                if(in_array($current_user_id, $water_users)) {
                  $earth_up = true;
                  $water_up = true;
                } 
                if(in_array($current_user_id, $fire_users)) {
                  $earth_up = true;
                  $water_up = true;
                  $fire_up = true;
                } 
                if(in_array($current_user_id, $crystal_users)) {
                  $earth_up = true;
                  $water_up = true;
                  $fire_up = true;
                  $crystal_up = true;
                } 
                if(in_array($current_user_id, $light_users)) {
                  $earth_up = true;
                  $water_up = true;
                  $fire_up = true;
                  $crystal_up = true;
                  $light_up = true;
                }


                $args = array(
                  'user_id' => $current_user_id,
                );

                $user_groups = groups_get_groups($args);
              ?>

              <style>
                <?php 
                  if($earth_up != true) {
                    echo ".earth-only, .water-only, .fire-only, .crystal-only, .light-only {display: none;}";
                  }

                  if($water_up != true) {
                    echo ".water-only, .fire-only, .crystal-only, .light-only {display: none;}";
                  }

                  if($fire_up != true) {
                    echo ".fire-only, .crystal-only, .light-only {display: none;}";
                  }

                  if($crystal_up != true) {
                    echo ".crystal-only, .light-only {display: none;}";
                  }

                  if($light_up != true) {
                    echo ".light-only {display: none;}";
                  }
                 ?>
              </style>
          </div>

          <div class="exclusive-content">
            <h3>
              Monthly Attunements 
            </h3>
            <?php if($earth_up == true) { ?>
              <div class="row py-2">
                <?php 
                  $loop = new WP_Query(
                    array(
                      'post_type' => 'exclusive-content',
                      'posts_per_page' => 3
                    )
                  );

                  while ( $loop->have_posts() ) : $loop->the_post();
                  $picture = get_the_post_thumbnail_url( get_the_ID(), 'large' );

                ?>
                  <div class="col-sm-4 py-2">
                    <div class="ex-inner" style="background: url(<?php echo $picture ?>) center top no-repeat;">
                      <a href="<?php echo get_permalink(); ?>">
                        <h4>
                          <?php the_title(); ?>
                        </h4>
                      </a>
                    </div>
                  </div>
                <?php endwhile;
                  wp_reset_postdata();
                  ?>
              </div>
              <p>
                View all monthly exclusive content <a href="/exclusive-content/">here</a>. 
              </p>
          <?php } else { ?>
              <p>
                You must be a member of the Soul Star Collective to view monthly exclusive content. Learn more about membership <a href="/community/">here</a>.
              </p>
          <?php } ?>
            </div>

          <h3>
            Temple Wisdom
          </h3>
           <?php if( have_rows('tiles') ): ?>
            <div class="oec-open">
            <?php 
              $i = 0;
              $total_rows = count(get_field('tiles'));
              while( have_rows('tiles') ): the_row(); 

              // vars
              $image = get_sub_field('tile_picture');
              $text = get_sub_field('tile_text');
              $link = get_sub_field('tile_link');
              $temple = get_sub_field('tile_temple');

              if ($i == 0 || $i % 3 == 0){
                echo '<div class="protected-content row py-2">';
              }
            ?>    

              <div class="col-sm-4 py-2 <?php echo $temple ?>-only">
                <div class="ex-inner" style="background: url(<?php echo $image['url'] ?>) center top no-repeat;">
                  <a href="<?php echo $link['url']; ?>">
                    <h4>
                     <?php echo $text; ?>
                    </h4>
                  </a>
                </div>
              </div>
                
            <?php
              $i++;
              if ($i % 3 == 0 || $i == $total_rows){
                echo '</div>';
              } 
              endwhile;
              endif; 
            ?>
            </div>

            <?php 
              if ($water_up != true) {
             ?>
              <p>You must be a member of the water temple or higher to view this content. Upgrade <a href="/community/">here</a></p>
            <?php 
              }
             ?>

          
          <div class="courses">
            <h3>
              Courses
            </h3>
          </div>

          <?php
            $enrolled_courses = learndash_user_get_enrolled_courses($current_user_id); 

            if (!empty($enrolled_courses)) {
              the_content(); 
            } else {
              echo '<p>' . "You aren't enrolled in any courses." . '</p>';
            }
            
          ?>
        
        </div>
        <div class="col-md-3 subscriber-sidebar">
          <h3>
            Quick Links
          </h3>
          <ul>
            <li>
              Engage with the community <a href="/news-feed/">here</a>.
            </li>
            <?php 
              if($user_groups['total'] != 0) {
            ?>
              <li>
                Engage with your groups:
                <ul>
                  <?php 
                    foreach($user_groups['groups'] as $group) {
                      echo '<li>';
                      echo '<a href="/groups/' . $group->slug . '/">' . $group->name . '</a>';
                      echo '</li>';
                    } 
                  ?>
                </ul>
              </li>
            <?php } ?>
          </ul>
          <a href="<?php echo wp_logout_url( home_url() ); ?>">
            <button>
              Logout
            </button>
          </a>
        </div>
      </div>
      <?php 
        } else {
      ?>
      <h2>
        Welcome to the Subscriber Dashboard!
      </h2>
      <p>
        As a member of the community, this page is where you will find links to exsclusive, subscriber-only content, courses, and the social group. 
      </p>
      <p>
        If you are already a member, <a href="#login" title="Members Area Login" rel="home">click here to login</a>. 
      </p>  
      <p>
        If you would like to join the community, you can learn more and sign up <a href="/community/">here</a>.
      </p>
      <?php
        }
      ?>
    </div>
  @endwhile
@endsection
