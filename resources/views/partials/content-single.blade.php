<article @php post_class( 'blog-single' ) @endphp>
  <header>
    <h2 class="entry-title">{!! get_the_title() !!}</h2>
    @include('partials/entry-meta')
  </header>
  <?php echo get_the_post_thumbnail(get_the_id(), 'large') ?>
  <div class="entry-content">
    @php the_content() @endphp
  </div>
  <div class="comment-section">
    @include('partials/comments')
  </div>
  <?php 
    if( is_singular('exclusive-content') || is_singular('post') ) {
   ?>
    <div class="other-posts">
      <span class="previous-post">
      <?php if(get_previous_post()) { ?>
        <span><i>Previous Post</i></span>
        <br>
        <?php
            previous_post_link(); 
          }
        ?>
        </span>
        <span class="next-post">
        <?php
          if(get_next_post()) {
        ?>
          <span><i>Next Post</i></span>
        <br>
      <?php 
            next_post_link() ; 
          }
        } 
      ?>
        </span>
    </div>
</article>
