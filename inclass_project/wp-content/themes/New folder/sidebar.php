<aside id="sidebar">
  <section id="categories" class="widget">
    <h3 class="widget-title"> Categories </h3>
    <ul>
    <?php
    //show the top 10 categories with the most posts
    wp_list_categories(array(
      'title_li'    => '', //hide pages title list item
      'orderby'     => 'count', //sort by postid
      'show_count'  => true, //shows number of posts
      'order'       => 'DESC', //descending order most posts to least
      'number'      => 10,
      ) );
     ?>
    </ul>
  </section>
  <section id="archives" class="widget">
    <h3 class="widget-title"> Archives </h3>
    <ul>
    <?php 
    //get a list of archives by year. newst first
    wp_get_archives(array(
      'type' => 'yearly',
      'order' => 'DESC',
      ) );
     ?>
    </ul>
  </section>
  <section id="tags" class="widget">
    <h3 class="widget-title"> Tags </h3>
    <ul>
    <?php
    //show a tag cloud
    wp_tag_cloud(array(

        'smallest' => 1,
        'largest' => 1,
        'unit' => 'rem',
      ) );

     ?>
    </ul>
  </section>
  <section id="meta" class="widget">
    <h3 class="widget-title"> Meta </h3>
    <ul>
      <?php wp_register(); //either shows link to admin panel, or link to sign up, or nothing ?>
      <li><?php 
      // wp_loginout( );
      //if the user is not logged in, show a form
      if( !is_user_logged_in() ){
        wp_login_form();
      }else{ 
        wp_loginout();;//logout button
      } ?></li>
      
    </ul>
  </section>
</aside>
<!-- end #sidebar -->