@extends('layouts.base')

@section('content')
  <div class="container">

  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
    @while (have_posts()) @php(the_post())
      @include ('partials.content-'.get_post_type())
    @endwhile

  {!! get_the_posts_navigation() !!}
  
  </div>
@endsection
