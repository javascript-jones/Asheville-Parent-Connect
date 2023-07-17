<?php 
	$picture = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	$blog_banner = get_field('blog_page_header_image', 'options');
	$ec_header = get_field('exclusive_content_header', 'options');
	$banner_404 = get_field('404_page_header_image', 'options');
	$search_banner = get_field('search_page_header_image', 'options');
?>

<?php if( is_home() ) { ?>
	<div class="page-header">
		<div class="single-page-header" style="background: url(<?php echo $blog_banner['url']; ?>) center center no-repeat;">
			<div class="ze-title">      
				<h1 class="text-center">
					Blog
				</h1>
			</div>   
		</div>
	</div>
<?php } elseif(is_post_type_archive('exclusive-content')) {?>
	<div class="page-header">
			<div class="single-page-header" style="background: url(<?php echo $ec_header['url']; ?>) center center no-repeat;">
			<div class="ze-title">      
				<h1 class="text-center">
						Subscriber Exclusive Content
				</h1>
			</div>   
		</div>
	</div>
<?php } elseif (is_404()) { ?>
	<div class="page-header">
		<div class="single-page-header" style="background: url(<?php echo $banner_404['url']; ?>) center center no-repeat;">
			<div class="ze-title">      
				<h1 class="text-center">
						This Is Not The Webpage You Are Looking For...
				</h1>
			</div>   
		</div>
	</div>
<?php } elseif (is_page('news-feed')) { ?>
<div class="page-header">
	<div class="single-page-header" style="background: url(<?php echo $picture; ?>) center center no-repeat;">
			<div class="ze-title">      
				<h1 class="text-center">
					<?php echo get_the_title(); ?>
				</h1>
			</div>   
		</div>
</div>
<?php } elseif (is_buddypress()) { ?>
<div class="buddy-page-header">

</div>
<?php } elseif (is_search()) { ?>
<div class="page-header">
		<div class="single-page-header" style="background: url(<?php echo $search_banner['url']; ?>) center center no-repeat;">
			<div class="ze-title">      
				<h1 class="text-center">
					You Searched For: <?php echo esc_html( $_GET['s'] ); ?>
				</h1>
			</div>   
		</div>
	</div>
<?php } else { ?>
	<div class="page-header">
		<div class="single-page-header" style="background: url(<?php echo $picture; ?>) center center no-repeat;">
			<div class="ze-title">      
				<h1 class="text-center">
					<?php echo get_the_title(); ?>
				</h1>
			</div>   
		</div>
	</div>
<?php } ?>