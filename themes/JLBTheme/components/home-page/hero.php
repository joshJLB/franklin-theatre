<?php
/*
*
* hero.php
*
*/
?>

<?php
  // Hero Section Variables
  // $hero_background = get_field('hero_background');
  // $hero_video = get_field('hero_video');
  $hero_slider = get_field('hero_slider');
?>
<?php if (!$hero_video && !$hero_slider): ?>
  <section class="hero hero-single-image" style="background-image: url('<?php echo $hero_background['url']; ?>');" title="<?php echo $hero_background['alt']; ?>">
    <!-- Add Content Here for Static Background -->
    <?php include 'hero-content.php' ?>
  </section>
<?php elseif ( have_rows('hero_slider') ): ?>
  <section class="hero hero-slider-wrapper">
    <div class="hero-slider">
      <?php while ( have_rows('hero_slider') ): the_row(); ?>

        <!-- Hero Slider Slides -->
        <div class="slide">
          <div class="hero-slide">
            <div class="hero-image" style="background-image: url(<?=get_sub_field('image'); ?>);"></div>
            <div class="hero-content">
              <h2><?=get_sub_field('title'); ?></h2> 
              <p>
                <?=get_sub_field('date'); ?> 
                <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/spacer-element.png" alt=""> 
                <?=get_sub_field('time'); ?>
              </p>
              <div class="hero-link" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/hero-button.png);">
                <a href="<?=get_sub_field('link_url'); ?>"><?=get_sub_field('link_text'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </section>
<?php else: ?>
  <section class="hero hero-video">
    <video src="<?php echo $hero_video; ?>" autoplay mute loop></video>
    <?php include 'hero-content.php' ?>
  </section>
<?php endif; ?>
