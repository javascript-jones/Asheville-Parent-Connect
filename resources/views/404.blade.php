@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <section class="body-wrap">

      <div class="alert alert-warning">
        {{ __('Sorry, but the page you were trying to view does not exist. Perhaps try searching for it instead?', 'sage') }}
      </div>
      {!! get_search_form(false) !!}

    <section class="body-wrap">
  @endif
@endsection
