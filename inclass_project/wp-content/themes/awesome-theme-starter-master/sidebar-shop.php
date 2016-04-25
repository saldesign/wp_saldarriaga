<aside id="sidebar">

<<<<<<< HEAD
	<?php 
	//guide the user back to the shop if they have filtered by taxonomy term
	if( is_tax() ){ ?>
	<section class="widget">
		<a class="button" href="<?php echo get_post_type_archive_link( 'product' ); ?>">
		Clear Filter
		</a>
	</section>
	<?php } //end if is tax ?>

	<section class="widget">
		<h3 class="widget-title">Filter by Brand</h3>
		<ul>
			<?php wp_list_categories( array(
				'taxonomy' => 'brand',
				'title_li' => '',
				'show_count' => true,
			) ); ?>
		</ul>
	</section>
	<section class="widget">
		<h3 class="widget-title">Filter by Feature</h3>
		<ul>
			<?php wp_list_categories( array(
				'taxonomy' => 'feature',
				'title_li' => '',
				'show_count' => true,
			) ); ?>
		</ul>
	</section>
</aside>
=======
<?php //direct user back to the shop if they hav filtered by taxonomy term
 if(is_tax()){ ?>
	<section class="widget">
		<a class="button" href="<?php echo get_post_type_archive_link('product' ); ?>">Clear Filter</a>
	</section>
<?php } ?>
		<section class="widget">
			<h3 class="widget-title">Filter by Brand</h3>
			<ul>
				<?php wp_list_categories( array(
					'taxonomy' => 'brand',
					'title_li' => '',
					'show_count' => true
					) ); ?>
			</ul>
		</section>
		<section class="widget">
			<h3 class="widget-title">Filter by Dietary Preference</h3>
			<ul>
				<?php wp_list_categories( array(
					'taxonomy' => 'dietarypref',
					'title_li' => '',
					'show_count' => true
					) ); ?>
				</ul>
		</section>


	</aside>
>>>>>>> origin/master
