{{--
  Template Name: Community Page Template
--}}

<?php 
  // Banner Fields
  $banner_bg = get_field('banner_background');
  $subhead = get_field('sub-heading');
  $heading = get_field('large_heading');
  $cta = get_field('call_to_action');

  $b1 = get_field('benefit_1');
  $b2 = get_field('benefit_2');
  $b3 = get_field('benefit_3');
  $b4 = get_field('benefit_4');
  $b5 = get_field('benefit_5');
  $b6 = get_field('benefit_6');

  // Intro Section Fields
  $intro_heading = get_field('intro_heading');
  $intro_paragraph = get_field('intro_paragraph');
  $intro_cta = get_field('intro_cta');

  // Message Section Fields
  $message_heading = get_field('message_section_heading');
  $video_url = get_field('message_video_url');

  // Modify Video URL to include the embed/ part essential for the iFrame to work. 
  $dot_com_portion = strpos($video_url, '.com/');
  $insert_embed_at = $dot_com_portion + 5;
  $new_video_url = substr_replace($video_url, 'embed/', $insert_embed_at, 0);

  // Packages Section Fields 
  $packages_section_heading = get_field('packages_section_heading');
  $packages_section_background = get_field('sacred_geometry_background', 'options');


  // Quiz Section Fields 
  $quiz_section_background = get_field('quiz_section_bacgkround');
  $quiz_section_text = get_field('quiz_section_text');
?>

@extends('layouts.app')
@section('content')
  <section class="community-banner" style="background: url(<?php echo $banner_bg['url']; ?>) center center no-repeat;">
    @include('partials.community-banner')
  </section>
  <section class="community-intro">
    <div class="intro-inner">
      <h4>
        <?php echo $intro_heading; ?>
      </h4>
      <p>
        <?php echo $intro_paragraph; ?>
      </p>
      <a href="<?php echo $intro_cta['url']; ?>">
        <button>
          <?php echo $intro_cta['title']; ?>
        </button>
      </a>
    </div>
  </section>
  <section class="membership-levels" id="package-option" style="background: url(<?php echo $packages_section_background['url'];?>) center center repeat-y;">
    <h4>
      <?php echo $packages_section_heading; ?>
    </h4>

    <div class="levels-repeater">
      @include('partials.membership-levels')
    </div>
  
  </section>

  <section class="body-wrap">
    @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
  </section>
  
  <section class="quiz-section" style="background: url(<?php echo $quiz_section_background['sizes']['large']; ?>) center top no-repeat;">
    <div class="quiz-section-inner">
      <h4>
        <?php echo $quiz_section_text; ?>
      </h4>
    </div>
  </section>

@endsection
