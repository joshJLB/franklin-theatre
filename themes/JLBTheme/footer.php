      <footer class="footer">
        <div class="footer-email-container">
          <form action="post">
            <label ><?=get_field('header_email_cta', 'option'); ?></label>
            <div style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/nav-email-field.png;"><input type="text" class="header-email" name="EMAIL" placeholder="email address"></div>
            <input type="submit" class="header-submit" value="Submit">
            <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/fan-element.png" alt="">
          </form>
        </div>
        <section class="footer-top" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/footer.jpg);">
          <div class="footer-mission">
            <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/ft-fan.png" alt="">
            <h3><?=get_field('mission_title', 'option'); ?></h3>
            <p><?=get_field('mission_content', 'option'); ?></p>
          </div>
          <div class="footer-logo">
            <img src="<?=get_field('footer_logo', 'option'); ?>" alt="">
            <div class="footer-socials">
              <?php if ( have_rows('social_media', 'option') ): ?>
              <?php while ( have_rows('social_media', 'option') ): the_row(); ?>
                <a href="<?=get_sub_field('link'); ?>" class="header-socials-links"><i class="fab fa-<?=get_sub_field('platform'); ?>"></i></a>
              <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="footer-contact">
            <a href=""><?=get_field('address', 'option'); ?></a>
            <a href="tel:<?=get_field('phone', 'option'); ?>" class="footer-phone"><?=get_field('phone', 'option'); ?></a>
            <a href="mailto:<?=get_field('email', 'option'); ?>"><?=get_field('email', 'option'); ?></a>
          </div>
          <div class="footer-find-us">
            <h3>Find Us One</h3>
            <div class="footer-find-us-two"></div>
            <img src="<?=get_field('yelp_logo', 'option'); ?>" alt="">
            <img src="<?=get_field('trip_advisor_logo', 'option'); ?>" alt="">
          </div>
        </section>
        <section class="jlb">
          <p><a href="http://www.jlbworks.com/#latest-work">Web Design</a>, <a href="http://www.jlbworks.com/#services">Marketing</a> & <a href="http://www.jlbworks.com/#contact">Support</a> by <a href="http://www.jlbworks.com/#latest-work">JLB</a></p>
        </section>
        <?php wp_footer(); ?>
      </footer>
    </div> <!-- Closing Header Container -->
  </body>
</html>
