<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article <?php post_class('cf' ); ?>id="post-<?php the_ID(); ?>" >
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<?php the_post_thumbnail('large' ); ?>
			<div class="entry-content">
				<?php //if viewing single/page show full content
						//else show excerpt
				if(is_singular( )){
					the_content( );
				}else{	 
					the_excerpt();
				} ?>
			</div>		
		</article><!-- end post -->

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_sidebar('images'); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>