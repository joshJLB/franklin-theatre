<?php
/*
  Template Name: Home Page
  front-page.php
*/
get_header(); ?>

<main id="home">

  <?php get_template_part('components/home-page/hero'); 
  $currentDate = date('Ymd'); 
?>

  <!-- Continue Sections -->
  <section class="one" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/frame-element.png);">
    <div class="one-container">
      
      <div class="one-see-all">
        <div class="one-titles">
          <h2>Music</h2>
          <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/spacer-element-large.png" alt="">
          <h2>Movies</h2>
          <img class="one-titles-spacer" src="<?=home_url(); ?>/wp-content/uploads/2018/10/spacer-element-large.png" alt="">
          <h2 class="one-titles-more">More</h2>
        </div>
        <a href="http://google.com" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png;">See All Events</a>      
      </div>
      <?php 
        $url = "http://prod1.agileticketing.net/websales/feed.ashx?guid=e2ebf70f-bf96-4f20-9746-81ccfa2fb62b&&showslist=true&format=xml&";
        $response = wp_remote_get($url);
        $body = wp_remote_retrieve_body($response);
        $xml  = simplexml_load_string($body);
        $feed = $xml->ArrayOfShows;
      ?>
      <div class="one-content-container">
        <?php
          $i = 0;
          $count = 0;
          // loops through all events 
          foreach($feed->Show as $show) {
            $name = (string)$show->Name;
            $image = (string)$show->EventImage;
            $linkDetails = (string)$show->InfoLink;
            $linkPurchase = (string)$show->CurrentShowings->Showing->LegacyPurchaseLink;
            $dateGet = (string)$show->CurrentShowings->Showing->StartDate;
            $tempDate = date_create($dateGet);
            $dateOne = date_format($tempDate, 'F jS');
            $dateTwo = date_format($tempDate, 'g:i:A');
            
        ?>
          <!-- Three "slides" are created and each slide contains 12 events -->
          <?php if ($count == 0): ?> 
            <div class="slide">
              <div class="one-events">
                <div class="one-events-wrapper">
                  <div class="one-event">
                    <div class="one-event-image" style="background-image: url(<?=$image?>);">
                      <div class="overlay"></div>
                      <div class="one-event-tickets">
                        <a href="<?=$linkDetails?>" target="_blank" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">View Details</a>
                        <a href="<?=$linkPurchase?>" target="_blank" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">Buy Tickets</a>
                      </div>
                    </div>
                    <div class="one-event-content">
                      <h3><?=$name?></h3>
                      <div class="one-event-time">
                        <p><?=$dateOne?></p>
                        <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/spacer-element.png" alt="">
                        <p><?=$dateTwo?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php elseif ($count == 12 || $count == 24): ?>
            </div>
            <div class="slide">
              <div class="one-events">
                <div class="one-events-wrapper">
                  <div class="one-event">
                    <div class="one-event-image" style="background-image: url(<?=$image?>);">
                      <div class="overlay"></div>
                      <div class="one-event-tickets">
                        <a href="<?=$linkDetails?>" target="_blank" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">View Details</a>
                        <a href="<?=$linkPurchase?>" target="_blank" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">Buy Tickets</a>
                      </div>
                    </div>
                    <div class="one-event-content">
                      <h3><?=$name?></h3>
                    </div>
                    <div class="one-event-time">
                      <p><?=$dateOne?></p>
                      <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/spacer-element.png" alt="">
                      <p><?=$dateTwo?></p>
                    </div>
                  </div>
                </div>
              </div>
          <?php elseif ($count == 35): ?>
              <div class="one-events">
                <div class="one-events-wrapper">
                  <div class="one-event">
                    <div class="one-event-image" style="background-image: url(<?=$image?>);">
                      <div class="overlay"></div>
                      <div class="one-event-tickets">
                        <a href="<?=$linkDetails?>" target="_blank" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">View Details</a>
                        <a href="<?=$linkPurchase?>" target="_blank" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">Buy Tickets</a>
                      </div>
                    </div>
                    <div class="one-event-content">
                      <h3><?=$name?></h3>
                    </div>
                    <div class="one-event-time">
                      <p><?=$dateOne?></p>
                      <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/spacer-element.png" alt="">
                      <p><?=$dateTwo?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php else: ?>
            <div class="one-events">
              <div class="one-events-wrapper">
                <div class="one-event">
                  <div class="one-event-image" style="background-image: url(<?=$image?>);">
                    <div class="overlay"></div>
                    <div class="one-event-tickets">
                      <a href="<?=$linkDetails?>" target="_blank" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">View Details</a>
                      <a href="<?=$linkPurchase?>" target="_blank" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/view-details-button.png);">Buy Tickets</a>
                    </div>
                  </div>
                  <div class="one-event-content">
                    <h3><?=$name?></h3>
                  </div>
                  <div class="one-event-time">
                    <p><?=$dateOne?></p>
                    <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/spacer-element.png" alt="">
                    <p><?=$dateTwo?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
          
        <?php 
          $count++;
          $i++;
          if ($i == 36) break; 
        } ?>
      </div>
      <div class="load-more">
        <p>Load More</p>
        <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/fan-element.png" alt="">
      </div>
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
      <?=do_shortcode('[instagram-feed num=5 cols=5 showheader=false showfollow=false showbutton=false]'); ?>
    </div>
  </section>

</main>

<?php get_footer();
