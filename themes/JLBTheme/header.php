<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo home_url(); ?>">
    <link rel="apple-touch-icon" href="<?php echo home_url(); ?>"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-oi8o31xSQq8S0RpBcb4FaLB8LJi9AT8oIdmS1QldR8Ui7KUQjNAnDlJjp55Ba8FG" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nova+Slim|Raleway:400,700" rel="stylesheet">
    <script defer src="https://pro.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-d84LGg2pm9KhR4mCAs3N29GQ4OYNy+K+FBHX8WhimHpPm86c839++MDABegrZ3gn" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <header>
      <div class="header"> 
        <div class="header-content">
          <a class="logo-container" href="<?php echo home_url(); ?>">
            <div class="logo" style="background-image: url('<?=get_field('header_logo', 'option'); ?>');"></div>
          </a>
        </div> <!-- Header Content & Logo -->
        <div class="header-top">
          <div class="header-top-left">
            <div class="header-socials">
              <?php if ( have_rows('social_media', 'option') ): ?>
              <?php while ( have_rows('social_media', 'option') ): the_row(); ?>
                <a href="<?=get_sub_field('link'); ?>"class="header-socials-links"><i class="fab fa-<?=get_sub_field('platform'); ?>"></i></a>
              <?php endwhile; ?>
              <?php endif; ?>
            </div>
            <a href="tel:<?=get_field('phone', 'option'); ?>" class="header-phone"><?=get_field('phone', 'option'); ?></a>
          </div>
          <div class="header-top-right">
            <form action="post">
              <label ><?=get_field('header_email_cta', 'option'); ?></label>
              <div style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/nav-email-field.png;"><input type="text" class="header-email" name="EMAIL" placeholder="email address"></div>
              <input type="submit" class="header-submit" value="Submit">
              <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/fan-element.png" alt="">
            </form>
          </div>
        </div>
        <div class="header-middle">
          <nav class="header-nav-left">
              <?php wp_nav_menu( array( 'menu' => 'menu_left' ) ); ?>
          </nav>
          <div class="header-content-two">
            <a class="logo-container-two" href="<?php echo home_url(); ?>">
              <div class="logo-two" style="background-image: url('<?=get_field('header_logo', 'option'); ?>');"></div>
            </a>
          </div> <!-- Header Content & Logo -->
          <nav class="header-nav-right">
            <?php wp_nav_menu( array( 'menu' => 'menu_right' ) ); ?>
          </nav> <!-- Header Navigation -->
          <!-- Button trigger modal -->
          <div class="mobile-button">
            <div class="button-container">
              <div class="bar1 bar"></div>
              <div class="bar2 bar"></div>
              <div class="bar3 bar"></div>
            </div>
          </div> <!-- Mobile Menu Button -->
        </div>
        <div class="header-bottom" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/nav-pattern.png);"></div>
        
      </div> <!-- Header Inner Container -->

      <!-- Mobile Menu -->
      <div class="mobile-menu" id="mobile-menu">
        <nav class="menu-container">
          <?php wp_nav_menu( array( 'menu' => 'Header Menu' ) ); ?>
        </nav>
      </div>

    </header>

    <div class="body-container">
