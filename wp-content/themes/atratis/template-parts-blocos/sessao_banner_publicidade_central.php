<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

// Variáveis
$banner = get_sub_field('banner');
$link = get_sub_field('link');
$novaAba = get_sub_field('nova_aba');
?>

<?php if( !empty($banner) ): ?>
<div class="banner_publi <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    
    <?php if($link): //// Se tiver link ?>
    <a href="<?php echo $link; ?>" <?php if($novaAba): echo "target='_blank'"; endif; ?>>
    <?php else: endif; // Se não tiver link  ?>
        
            <?php if( !empty($banner) ): 
                $url = $banner['url'];
                $title = $banner['title'];
                $alt = $banner['alt'];
            ?>
                <img src="<?php echo $url; ?>" title="<?php echo $title; ?>" alt="<?php echo $alt; ?>" />
            <?php else: ?>
                <img src="<?php bloginfo("template_url"); ?>/build/images/sem-imagem-4x3.jpg" alt="<?php the_title(); ?>">
            <?php endif; ?>

    <?php if($link): //// Se tiver link ?></a><?php else: endif; // Se não tiver link  ?>

</div>
<?php endif; ?>
