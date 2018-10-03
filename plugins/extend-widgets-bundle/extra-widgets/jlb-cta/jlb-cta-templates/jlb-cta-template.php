<?php 
    $image = wp_get_attachment_url($instance['image']);
    $titleLeft = $instance['title_left'];
    $titleRight = $instance['title_right'];
    $content = $instance['content'];
    $linkText = $instance['link_text'];
    $linkURL = $instance['link_url'];
?>

<div class="cta-container" style="background-image: url(<?=$image?>);">
    <div class="overlay"></div>
    <div class="cta-content">
        <div class="cta-header">
            <h2><?=$titleLeft?></h2>
            <img src="<?=home_url(); ?>/wp-content/uploads/2018/10/spacer-element-large.png" alt="">
            <h2><?=$titleRight?></h2>
        </div>
        <p><?=$content?></p>
        <a href="<?=$linkURL?>" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/hero-button.png);"><?=$linkText?></a>
    </div>
</div>