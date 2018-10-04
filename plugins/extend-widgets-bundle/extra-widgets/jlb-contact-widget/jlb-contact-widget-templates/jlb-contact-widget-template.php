<?php 
    $title = $instance['title'];
    $content = $instance['content'];
    $widgetID  = $instance['panels_info']['id'];
    $string = get_field('address', 'option');
    $address = wp_strip_all_tags($string, true);
?>

<div class="contact-widget-container">
    <div class="contact-widget-header">
        <div class="contact-border-left" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/date-HR.jpg);"></div>
        <h2><?=$title?></h2>
        <div class="contact-border-right" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/date-HR.jpg);"></div>
    </div>
    <div class="contact-widget-content">
        <div class="contact-content-left">
            <p><?=$content?></p>
            <div class="contact-widget-info">
                <a href="mailto:<?=get_field('email', 'option'); ?>"><?=get_field('email', 'option'); ?></a>
                <a href="tel:<?=get_field('phone', 'option'); ?>"><?=get_field('phone', 'option'); ?></a>
                <p><?=get_field('address', 'option'); ?></p>
            </div>
            <div id="map-<?=$widgetID?>" class="contact-widget-map"></div>
        </div>
        <div class="contact-widget-gform">
            <?php gravity_form(2); ?>
            <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/bottom-fan.jpg" alt="">
        </div>
    </div>
    
</div>
<script>
    var $location = "";
    $.get('https://maps.googleapis.com/maps/api/geocode/json?address=<?=$address?>&key=AIzaSyDu7H77O2Jv8BPmWeZgFj0mZeIPZ2-2Cng', function(data, status) {
        $location = data.results[0].geometry.location;
    });

    var map;
    function initMap() {
        setTimeout(function(){
            map = new google.maps.Map(document.getElementById('map-<?=$widgetID?>'), {
                center: $location,
                zoom: 15
            });
        }, 300);
    };
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu7H77O2Jv8BPmWeZgFj0mZeIPZ2-2Cng&callback=initMap" async defer>
</script>