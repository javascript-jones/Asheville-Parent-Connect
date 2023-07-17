@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <section class="body-wrap">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

    <h4>Results:</h4>
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-search')
    @endwhile
  </section>

  {!! get_the_posts_navigation() !!}
@endsection
