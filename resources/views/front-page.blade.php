@extends('layouts.app')
@section('content')

<?php

    // Get banner section field values.
    $bg_image = get_field('background_image');
    $lil_text = get_field('little_text');
    $big_text = get_field('big_text');
    $call_to_action = get_field('call_to_action');

    // Get Modal Fields
    $modal_title = get_field('modal_title');
    $modal_text = get_field('modal_text');

    // Get second section field values.
    $section_header = get_field('section_header');
    $section_content = get_field('second_section_content');
    $second_cta = get_field('second_section_cta');
    $carosuel_images = get_field('carousel');

    // Get third section field values
    $third_section_header = get_field('third_section_header');
    $small_subtext = get_field('small_subtext');
    $large_subtext = get_field('large_subtext');
    $image_one = get_field('image_one');
    $link_one = get_field('link_one');
    $image_two = get_field('image_two');
    $link_two = get_field('link_two');
    $image_three = get_field('image_three');
    $link_three = get_field('link_three');

    // Get testimonials section field values
    $section_title = get_field('section_title');
    $section_background = get_field('sacred_geometry_background', 'options');

    // Get fifth section field values
    $section_image = get_field('section_image');
    $section_text = get_field('section_text');

 ?>
<section class="banner-section">
  <div class="main-banner" style="background: url(<?php echo $bg_image['url'];?>) no-repeat left center; height: 100vh; width: 100%;">
    <div class="banner-inner">
        
        <div class="banner-text">
          <h2>
            <?php echo $lil_text ?>
          </h2>
          <h1>
            <?php echo $big_text; ?>
          </h1>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <?php echo $call_to_action['title']; ?>
          </button>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $modal_title; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>
                 <?php echo $modal_text; ?>
                </p>
                <?php echo do_shortcode('[mc4wp_form id="3548"]'); ?>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section> 

<section class="second-section">
	<div class="second-section-inner">
		<div class="left-section" style="background: url(<?php echo $section_background['url'];?>) center center no-repeat;">
			<div class="ls-inner">
				<h3>
					<?php echo $section_header; ?>
				</h3>
				<p>
          <?php echo $section_content; ?>
				</p>
				<div class="wp-block-button"><a class="wp-block-button__link" href="<?php echo $second_cta['url']; ?>"><?php echo $second_cta['title']; ?></a></div>
			</div>
		</div>
		<div class="right-section">
			@include('partials.lil-carosuel')
		</div>
	</div>
</section>
<section class="third-section">
  <div class="third-section-intro">
    <h3>
      <?php echo $third_section_header; ?>
    </h3>
    <p>
      <?php echo $small_subtext; ?>
    </p>
    <p class="big-bold">
      <?php echo $large_subtext; ?>
    </p>
  </div>
  <div class="three-link-section">
    <div class="one-of-three" style="background: url(<?php echo $image_one['url'];?>) center center no-repeat;">
      <a class="three-inner" href="<?php echo $link_one['url']; ?>">
        <p>
          <?php echo $link_one['title'] ?>
        </p>
      </a>
    </div>
    <div class="one-of-three" style="background: url(<?php echo $image_two['url'];?>) center center no-repeat;">
      <a class="three-inner" href="<?php echo $link_two['url']; ?>">
        <p>
          <?php echo $link_two['title'] ?>
        </p>
      </a>
    </div>
    <div class="one-of-three" style="background: url(<?php echo $image_three['url'];?>) center center no-repeat;">
      <a class="three-inner" href="<?php echo $link_three['url']; ?>">
        <p>
          <?php echo $link_three['title'] ?>
        </p>
      </div>
    </a>
  </div>
</section>
<section class="fourth-section" style="background: url(<?php echo $section_background['url'];?>) center center repeat-y;">
  <h4><?php echo $section_title; ?></h4>
  @include('partials.testimonials-carosuel')
</section>
<section class="fifth-section" style="background: url(<?php echo $section_image['url'];?>) center center no-repeat;">
  <div class="quiz-section-inner">
    <h4>
      <?php echo $section_text; ?>
    </h4>
  </div>  
</section>
@endsection
