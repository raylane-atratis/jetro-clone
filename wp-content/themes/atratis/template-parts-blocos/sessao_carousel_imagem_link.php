<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

// Variáveis
$titulo = get_sub_field('titulo', "option");
$descricao = get_sub_field('descricao', "option");

?>

<?php if( have_rows('carousel_imagens') ): ?>

<div class="carrossel <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    <div class="container mt-5 mb-5 ">
        <div class="row">
            <div class="col-12">

                <div class="titulo">
                    <h2><?php echo $titulo; ?></h2>
                    <p style="margin-bottom: 30px;"><?php echo $descricao; ?></p>
                </div>

                <div class="owl-logos owl-carousel owl-theme">

                    <?php 
                        while( have_rows('carousel_imagens') ): the_row(); 
                            $imagem = get_sub_field('imagem');
                            $link = get_sub_field('link');
                            $novaAba = get_sub_field('nova_aba');
                    ?>
                    <div class="item" data-aos="fade-up" data-aos-duration="1000">

                        <?php if($link): //// Se tiver link ?>
                        <a href="<?php echo $link; ?>" <?php if($novaAba): echo "target='_blank'"; endif; ?>>
                            <?php else: endif; // Se não tiver link  ?>

                            <?php if( !empty($imagem) ): 
                                    $url = $imagem['url'];
                                    $title = $imagem['title'];
                                    $alt = $imagem['alt'];
                                ?>
                            <img src="<?php echo $url; ?>" title="<?php echo $title; ?>" alt="<?php echo $alt; ?>" />
                            <?php else: ?>
                            <img src="<?php bloginfo("template_url"); ?>/build/images/sem-imagem-4x3.jpg"
                                alt="<?php the_title(); ?>">
                            <?php endif; ?>

                            <?php if($link): //// Se tiver link ?></a><?php else: endif; // Se não tiver link  ?>

                    </div>
                    <?php endwhile; ?>



                </div>

                <?php 
                $link_cta = get_sub_field('link_cta');
                $texto_cta = get_sub_field('texto_cta');
                ?>
                <a href="<?php echo $link_cta; ?>" class="bt__padrao">
                    <?php echo $texto_cta; ?>
                </a>

            </div>
        </div>
    </div>
</div>

<?php endif; ?>