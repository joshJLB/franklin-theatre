<?php 
    $title = $instance['title'];
    $content = $instance['content'];
    $linkText = $instance['link_text'];
    $linkURL = $instance['link_url'];
    $image = wp_get_attachment_url($instance['image']); 
?>

<div class="image-text-wrapper">
    <div class="image-text-content">
        <h3><?=$title?></h3>
        <div class="image-text-content-inner">
            <p><?=$content?></p>
        </div>
        <a href="<?=$linkURL?>" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/hero-button.png);"><?=$linkText?></a>
    </div>
    <div class="image-text-image" style="background-image: url(<?=$image?>);"></div>
</div>