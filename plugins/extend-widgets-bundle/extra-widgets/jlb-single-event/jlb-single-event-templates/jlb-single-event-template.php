<?php 
    $id = $instance['show_id'];
    $url = "http://prod1.agileticketing.net/websales/feed.ashx?guid=e2ebf70f-bf96-4f20-9746-81ccfa2fb62b&&showslist=true&showid={$id}&format=xml&";
    $response = wp_remote_get($url);
    $body = wp_remote_retrieve_body($response);
    $xml  = simplexml_load_string($body);
    $feed = $xml->ArrayOfShows->Show[0];
    $title = $feed->Name;
    $image = $feed->EventImage;
    $description = $feed->ShortDescription;
?>

<div class="single-event-container">
    <h2 class="single-event-title "><?=$title?></h2>
    <div class="single-event-wrapper">
        <div class="single-event-left">
            <div class="single-event-image" style="background-image: url(<?=$image?>);"></div>
            <div class="single-event-description">
                <div class="single-event-header">
                    <h3>Description</h3>
                    <div class="single-event-border" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/date-HR.jpg);"></div>
                </div>
                <p><?=$description?></p>
            </div>
        </div>
        <div class="single-event-right">
            <h3>Showings</h3>
        <?php
            foreach($feed->CurrentShowings->Showing as $showing) {
                $link = (string)$showing->LegacyPurchaseLink;
                $dateGet = (string)$showing->StartDate;
                $tempDate = date_create($dateGet);
                $dateOne = date_format($tempDate, 'l M jS');
                $dateTwo = date_format($tempDate, 'g:i:A');
                $price = (string)$showing->ShortDescriptive;
        ?>
            <div class="single-event-card-wrapper">
                <div class="single-event-card">
                    <div class="single-event-card-content-wrapper">
                        <div class="single-event-card-content">
                            <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/break.jpg" alt="">
                            <h4><?=$dateOne?></h4> 
                            <p class="single-event-time"><?=$dateTwo?></p>
                            <p class="single-event-price"><?=$price?></p>
                        </div>
                    </div>
                    <div class="single-event-link">
                        <a href="<?=$link?>">Buy Tickets</a>
                        <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/bottom-fan.jpg" alt="">
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</div>