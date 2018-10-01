<?php
/*
  Template Name: Default
  The template for displaying Archive pages
*/
get_header(); ?>

<main id="archive-page">
  <?php get_template_part('components/header/child-header-blank'); ?>

  <section class="archive-container">
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
