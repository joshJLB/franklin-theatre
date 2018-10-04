<?php 
    $title = $instance['title'];
    $repeater = get_field('social_media', 'option'); 
    $phone = get_field('phone', 'option');
    $email = get_field('email', 'option');
    $string = get_field('address', 'option');
    $address = wp_strip_all_tags($string, true);
?>

<div class="contact-icons-container">
    <div class="contact-icons-header">
        <div class="contact-icons-header-left" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/date-HR.jpg);"></div>
        <h2><?=$title?></h2>
        <div class="contact-icons-header-right" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/date-HR.jpg);"></div>
    </div>
    <div class="contact-icons-wrapper">
        <?php foreach($repeater as $index => $slide){
            $link = $slide['link'];
            $platform = $slide['platform'];
        ?>
            <a href="<?=$link?>" class="header-socials-links"><i class="fab fa-<?=$platform?>"></i></a>
        <?php } ?>
        <a href="tel:<?=$phone?>" class="header-socials-links"><i class="fas fa-mobile"></i></a>
        <a href="mailto:<?=$email?>" class="header-socials-links"><i class="fal fa-envelope"></i></a>
        <a href="http://maps.google.com/?q=<?=$address?>" class="header-socials-links"><i class="far fa-map-marker-alt"></i></a>
    </div>
</div>