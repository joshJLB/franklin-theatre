<?php
/*
  Template Name: Home Page
  front-page.php
*/
get_header(); ?>

<main id="home">

  <?php get_template_part('components/home-page/hero'); ?>

  <!-- Continue Sections -->
  <section class="one">
    <div class="one-container">

    </div>
  </section>

  <section class="two">
    <div class="two-container">
      <div class="two-header">
        <h2><?=get_field('two_title'); ?></h2>
        <div class="two-header-image" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/horziontal-rule.png);"></div>
      </div>
      <div class="two-blog-wrapper">
        <div class="two-blog-content">
          <?php
            $args = array( 'numberposts' => '1' );
            $recentPosts = wp_get_recent_posts( $args );
            $mostRecent = $recentPosts[0];
          ?>
          <h3><?=$mostRecent['post_title']?></h3>
          <div class="two-blog-content-inner">
            <p><?=$mostRecent['post_content']?></p>
          </div>
          <a href="<?=get_permalink($mostRecent['ID']); ?>" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/hero-button.png);"><?=get_field('two_link_text'); ?></a>
        </div>
        <div class="two-image" style="background-image: url(<?=get_field('two_image'); ?>);"></div>
      </div>
    </div>
  </section>

  <section class="three">
    <div class="three-container">
      <?=do_shortcode('[instagram-feed num=5 cols=5 showheader=false showfollow=false]'); ?>
    </div>
  </section>

</main>

<?php get_footer();
