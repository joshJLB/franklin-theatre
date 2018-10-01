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
  // $hero_slider = get_field('hero_slider');
?>
<?php if (!$hero_video && !$hero_slider): ?>
  <section class="hero hero-single-image" style="background-image: url('<?php echo $hero_background['url']; ?>');" title="<?php echo $hero_background['alt']; ?>">
    <!-- Add Content Here for Static Background -->
    <?php include 'hero-content.php' ?>
  </section>
<?php elseif ( have_rows('hero_slider') ): ?>
  <section class="hero hero-slider-wrapper">
    <div class="hero-slider">
      <?php while ( have_rows('hero_slider') ): the_row();
        //vars
        $b = get_sub_field('background');
        ?>
        <!-- Hero Slider Slides -->
        <div class="hero-slide" style="background-image: url('<?php echo $b['url']; ?>');" title="<?php echo $b['alt']; ?>">
          <?php include 'hero-content.php' ?>
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
