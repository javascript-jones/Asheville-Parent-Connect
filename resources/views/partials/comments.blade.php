@php
if (post_password_required()) {
  return;
}
@endphp

<section id="comments" class="comments">
  <h3>
    Reviews:
  </h3>
  @if (get_comments_number() > 0)
    <ol class="comment-list">
      <?php 
          $post_id = get_the_ID();
          $comments = get_comments( array( 'post_id' => $post_id) );

          foreach ( $comments as $comment ) :
            	echo '<h5>' . $comment->comment_author . '</h5>' . '<p>' .$comment->comment_content . '</p>';
          endforeach;
       ?>
      {!! wp_list_comments(['style' => 'ol', 'short_ping' => true]) !!}
    </ol>

    @if (get_comment_pages_count() > 1 && get_option('page_comments'))
      <nav>
        <ul class="pager">
          @if (get_previous_comments_link())
            <li class="previous">@php previous_comments_link(__('&larr; Older comments', 'sage')) @endphp</li>
          @endif
          @if (get_next_comments_link())
            <li class="next">@php next_comments_link(__('Newer comments &rarr;', 'sage')) @endphp</li>
          @endif
        </ul>
      </nav>
    @endif
  @endif

  @if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments'))
    <div class="alert alert-warning">
      {{ __('Comments are closed.', 'sage') }}
    </div>
  @endif

  @php comment_form() @endphp
</section>
