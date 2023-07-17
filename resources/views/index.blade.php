@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
  <?php $counter = 0; ?>
  <section class="body-wrap">
  @if ((is_post_type_archive( 'exclusive-content' ) || is_singular( 'exclusive-content' )) && count(learndash_user_get_enrolled_courses(get_current_user_id())) < 1)
  <div class="exclusive-content-logged-out">
      <h2>
        Welcome to the Exclusive Content Archive!
      </h2>
      <p>
        As a member of the community, this page is where you will find all of the exsclusive content that membership gives you access to. In order to view this conent, you must be a member of the community. 
      </p>
      <p>
        If you are already a member, <a href="#" title="Members Area Login" rel="home">click here to login</a>. 
      </p>  
      <p>
        If you would like to join the community, you can learn more and sign up <a href="/community/">here</a>.
      </p>
	</div>
  @else
  @while (have_posts()) @php the_post() @endphp
  <?php $counter++; ?>
      @include('partials.content-'.get_post_type())
  @endwhile
  @endif
  {!! get_the_posts_navigation() !!}
  </section>

@endsection
