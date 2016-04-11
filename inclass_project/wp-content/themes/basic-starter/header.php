<!DOCTYPE html>
<html>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.0.0/normalize.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
  <title>TODO Change Later</title>
  <?php wp_head();  //HOOK. required for admin bar and plugins to work?>
</head>
<body>
  <header role="banner" id="header">
    <h1 class="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
    <h2><?php bloginfo('description'); ?></h2>
    <nav>
      <ul class="nav">
        <?php //TODO: upgrade this to menu system
         wp_list_pages( array( 
            'title_li' => '', //hide pages title list item
            'depth' => 1, //only top level headings
         )); ?>
      </ul>
    </nav>

    <?php get_search_form();//default search or include searchform.php ?>
  </header>