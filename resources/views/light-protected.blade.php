{{--
  Template Name: Protected Temple of Radiant Light Page Template
--}}

@extends('layouts.app')
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    <div class="body-wrap">
      <?php 
        if(is_user_logged_in()) {
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
        }
      ?>
      <?php 
        if($light_up == true){
            the_content(); 
        } else {
      ?>
     <div class="exclusive-content-logged-out">
      <h2>
        This page contains exclusive content
      </h2>
      <p>
        You must be logged in and be a member of temple of radiant light to view the contents of this page. To login and gain access, you need to be a member of the community.
      </p>
      <p>
        If you are already a member, <a href="#login" title="Members Area Login" rel="home">click here to login</a>. 
      </p>  
      <p>
        If you would like to join the community or upgrade your membership level, you can learn more and sign up <a href="/community/">here</a>.
      </p>
	</div>
      <?php
        }
      ?>
    </div>
  @endwhile
@endsection

