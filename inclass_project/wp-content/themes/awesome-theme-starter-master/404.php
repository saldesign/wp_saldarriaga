<?php get_header(); //include header.php ?>

<main id="content">

<div class="e404">
<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/404.png">
<h2>OOOOPS 404</h2>
<p>Try another link</p>
</div>
<section class="onethird">
	<h3>Pages:</h3>
	<ul>
	<?php wp_list_pages(array( 
		'title_li' => '', 
		'sort_column' => 'post_title'
	) ); ?>
	</ul>
</section>
<section class="onethird">
	<h3>Categories:</h3>
	<ul>
	<?php wp_list_categories(array(
		'title_li' => '',
		'show_count' => true,
		'feed' => 'rss'
	) ); ?>
	</ul>
</section>
<section class="onethird">
	<h3>Posts:</h3>
	<ul>
	<?php wp_get_archives( array(
		'type' => 'alpha', //each post alphabetically by title
	) ); ?>
	</ul>
</section>





</main><!-- end #content -->

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>

