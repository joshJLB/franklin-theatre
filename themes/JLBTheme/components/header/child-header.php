<?php
/**
* Template Name: Child Header
*
* child-header.php
*
*/ ?>

<?php
  if(get_field('child_header')) :
    $header_image = get_field('child_header')['url'];
  else :
    $header_image = get_field('default_child_header','option')['url'];
  endif;

  if (is_category()) :
    $categories = get_the_category();
    $category = $categories[0]->name;
    $title = $category;
  elseif (is_archive()) :
    $title = post_type_archive_title( '', false );
  elseif (is_404()) :
    $title = "404";
  elseif (is_home()) :
    $title = "News";
  elseif (is_search()) :
    $title = "Search";
  else :
    $title = get_the_title();
  endif;

?>
  
<div class="child-header" style="background-image: url(<?=$header_image?>);">
  <!-- <h1 class="title"><?=$title?></h1> -->
</div>
