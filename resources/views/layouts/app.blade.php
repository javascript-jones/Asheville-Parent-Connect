<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <?php 
    $buddy_background = get_field('sacred_geometry_background', 'options'); 
    $buddy_style_tag = 'style="background: url(' . $buddy_background['url'] . ') center center;"';
  ?>
  <body <?php body_class() ?> <?php if (is_buddypress()) {echo $buddy_style_tag;} ?>>
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
    <div id="to-the-top"></div>
  </body>
</html>
