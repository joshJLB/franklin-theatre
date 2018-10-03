<?php 
    $title = $instance['title'];
    $content = $instance['content'];
    $linkText = $instance['link_text'];
    $linkURL = $instance['link_url'];
?>

<div class="centered-text-container">
    <h2><?=$title?></h2>
    <div class="centered-text-content">
        <?=$content?>
    </div>
    <a href="<?=$linkURL?>" style="background-image: url(<?=home_url(); ?>/wp-content/uploads/2018/10/hero-button.png);"><?=$linkText?></a>
</div>