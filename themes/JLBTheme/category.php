<?php
/*
  Template Name: Category
  The template for displaying Category pages
*/
get_header(); ?>

<main id="category-page">
  <?php get_template_part('components/header/child-header-blank'); ?>

  <section class="category-container">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post() ?>

        <article>
        <!-- Post Content -->
        </article>

      <?php endwhile; ?>
    <?php endif; ?>
  </section>

</main>

<?php get_footer();
