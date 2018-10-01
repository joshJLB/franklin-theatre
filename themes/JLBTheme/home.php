<?php
/*
  Template Name: Home
  home.php (the Template for displaying all single posts)
*/
get_header(); ?>

<main id="blog-page">
  <?php get_template_part('components/header/child-header'); ?>

  <div class="blog-container">
    <?php if ( have_posts() ) : ?>
      <section class="blog-posts">
        <?php while ( have_posts() ) : the_post() ?>

          <article class="blog-post-container">
            <div class="blog-post">
              <h3><?php the_title(); ?></h3>
              <h5><?php the_author(); ?></h5>
              <?php the_excerpt(); ?>
            </div>
          </article>

        <?php endwhile; ?>
      </section>

      <nav class="pagination">
        <div class="content">
          <p><?php previous_posts_link( 'Previous', max_num_pages) ?></p>
          <p><?php next_posts_link( 'Next', max_num_pages) ?></p>
        </div>
      </nav>
    <?php wp_reset_postdata(); endif; ?>

  </div>
</main>

<?php get_footer();
