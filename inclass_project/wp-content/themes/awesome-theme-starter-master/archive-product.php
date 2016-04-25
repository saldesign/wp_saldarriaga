<?php get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>

		<h2 class="archive-title">
			All Products
		</h2>

		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" 
		<?php post_class('cf clearfix'); ?>>
			
			
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('thumbnail'); //don't forget to activate in functions ?>
			</a>

			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
<<<<<<< HEAD
<<<<<<< HEAD

			<?php the_terms( $post->ID, 'brand', '<h3>Brand: ', ', ' , '</h3>' ); ?>
=======
			<?php the_terms($post->ID, 'dietarypref', '<h3>Preference:', ', ', '</h3>'  ); ?>

			<?php the_terms($post->ID, 'brand', '<h3>Brand:', ', ', '</h3>'  ); ?>
>>>>>>> origin/master
=======
			<?php the_terms($post->ID, 'dietarypref', '<h3>Preference:', ', ', '</h3>'  ); ?>

			<?php the_terms($post->ID, 'brand', '<h3>Brand:', ', ', '</h3>'  ); ?>
>>>>>>> origin/master

			<div class="entry-content">
				<?php 
				//if viewing a single post or page, show full content. otherwise, show the short content (excerpt)
				if( is_singular() ){
					the_content();
				}else{
					the_excerpt();
				}
				 ?>

				 <?php //get the 'Price' custom field
				 //						post ID , field name , single?
				 $price = get_post_meta( $post->ID, 'Price', true );
				 if($price){ ?>
				 <span class="product-price"><?php echo $price; ?></span>
				 <?php } //end if price ?>
			</div>
					
		</article><!-- end post -->

		<?php endwhile; ?>

		<?php awesome_pagination(); ?>

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<<<<<<< HEAD
<<<<<<< HEAD
<?php get_sidebar('shop'); //include sidebar-shop.php ?>
=======
<?php get_sidebar('shop'); //include sidebar.php ?>
>>>>>>> origin/master
=======
<?php get_sidebar('shop'); //include sidebar.php ?>
>>>>>>> origin/master
<?php get_footer(); //include footer.php ?>