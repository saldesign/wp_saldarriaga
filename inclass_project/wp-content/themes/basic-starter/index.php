<?php get_header(); //include header.php ?>
<main id="content">

<?php 
  if(have_posts() ){
    while( have_posts() ){
      the_post();
 ?>
<!-- TODO: Change ID to Class and use  -->
  <article id="post-<?php the_id(); ?>" class="post">
    <h2 class="entry-title"> 
        <a href="<?php the_permalink(); ?>"> 
          <?php the_title(); ?>
        </a>
      </h2>
    <div class="entry-content">
      <p><?php the_excerpt();// could also use the_content(); ?></p>
    </div>
    <div class="postmeta">
      <span class="author"> Posted by: <?php the_author(); ?></span>
      <span class="date"> <?php the_date(); ?></span>
      <span class="num-comments"> <?php comments_number(); ?></span>
      <span class="categories"><?php the_category(); ?></span>
      <span class="tags"><?php the_tags(); ?></span>
    </div>
    <!-- end postmeta -->
  </article>
  <!-- end post -->
<?php 
  }//end while
}else{
  echo 'sorry, no posts found';
}//end the loop
 ?>
</main>
<!-- end #content -->
<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>