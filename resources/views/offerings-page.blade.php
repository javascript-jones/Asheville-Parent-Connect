{{--
  Template Name: Offerings Page Template
--}}

@extends('layouts.app')
<?php 
  // Intro section fields
  $intro_header = get_field('intro_header');
  $intro_paragraph = get_field('intro_paragraph');

  // Servies offered section fields
  $services = get_field('add_services');

	if( $services ) {
		$images = array();
		$titles = array();
		$descriptions = array();
		$links = array();
    $n = 0;

    foreach( $services as $element ) {
        $images[$n] = $element['service_image'];
        $titles[$n] = $element['service_name'];
        $descriptions[$n] = $element['service_description'];
        $links[$n] = $element['service_link'];
        $n++;
    }

	}

  // Action section fields
  $action_header = get_field('action_section_header');
  $action_paragraph = get_field('action_paragraph');
  $action_link = get_field('action_link');

?>
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    <div class="body-wrap">
      <section class="intro-section">
        <h4><?php echo $intro_header; ?></h4>
        <p>
          <?php echo $intro_paragraph; ?>
        </p>
      </section>
      <section class=offerings-list>
        @include('partials/zigzag')
      </section>
      <section class="action-call">
        <h4>
          <?php echo $action_header; ?>
        </h4>
        <p>
          <?php echo $action_paragraph; ?>
        </p>
        <a href="<?php echo $action_link['url']; ?>">
          <button>
            <?php echo $action_link['title']; ?>
          </button>
        </a>
      </section>
      <section class="faq-section">
        <h4>
          Frequently Asked Questions
        </h4>
        @include('partials.faq-repeater')
      </section>
    </div>
  @endwhile
@endsection
