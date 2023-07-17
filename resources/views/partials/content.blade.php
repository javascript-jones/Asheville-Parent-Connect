
<?php
	$picture = get_the_post_thumbnail_url( get_the_ID(), 'large' );
  if ($counter % 2 != 0) {
?>
<article <?php post_class(); ?>>
  <div class="picture-portion">
  		<div class="picture-inner" style="background: url(<?php echo $picture; ?>) center center no-repeat">	
		
			</div>
  </div>
  <div class="content-portion right">
		<div class="content-inner">

				<div class="post-title">
					<h2 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
				</div>

			<div class="entry-summary">
				<?php 
					the_excerpt();
				 ?>
			</div>
		</div>
  </div>
</article>
<?php 
	} else { 
?>
<article <?php post_class('reverse-it'); ?>>
	<div class="content-portion left">
		<div class="content-inner">
			
				<div class="post-title">
					<h2 class="entry-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
				</div>

			<div class="entry-summary">
				<?php 
					the_excerpt();
				 ?>
			</div>
		</div>
  </div>
  <div class="picture-portion">
		<div class="picture-inner" style="background: url(<?php echo $picture; ?>) center center no-repeat">	
		
		</div>
  </div>
</article>

<?php 
  	}
?>