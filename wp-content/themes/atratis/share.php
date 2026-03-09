<?php 
    $title = get_the_title();
    $permalink = get_permalink();

    $link_facebook = "https://www.facebook.com/sharer/sharer.php?u=".$permalink;
    $link_twitter = "https://twitter.com/intent/tweet?text=".$title."&url=".$permalink;
    $link_linkedin = "https://www.linkedin.com/shareArticle?mini=true&url=".$permalink."&title=".$title;
    $link_whatsapp = "https://api.whatsapp.com/send?text=".$title."%20".$permalink;
    $link_email = "mailto:?subject=".$title."&body=".$permalink;
    ?>

<div class="share-links">
    <div class="container">

        <h4>Compartilhe esta página:</h4>
        <div class="links">
            <a target="_blank" href="<?php echo $link_facebook;?>" class="facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a target="_blank" href="<?php echo $link_twitter; ?>" class="twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a target="_blank" href="<?php echo $link_linkedin; ?>" class="linkedin">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a target="_blank" href="<?php echo $link_whatsapp; ?>" class="whatsapp">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a target="_blank" href="<?php echo $link_email; ?>" class="email">
                <i class="fas fa-envelope"></i>
            </a>
        </div>
    </div>
</div>