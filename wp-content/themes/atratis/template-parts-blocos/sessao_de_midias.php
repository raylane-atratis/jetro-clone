<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

// Escolha de blocos
$esquerda = get_sub_field('midias_escolha01');
$direita = get_sub_field('midias_escolha02');

$animE = get_sub_field('escolha_animacao_esquerda');
$animD = get_sub_field('escolha_animacao_direita');

// [ANIMAÇÃO ESQUERDA]
if($animE == 0):
    $animacaoEsquerda = ""; 
    elseif($animE == 1):
        $animacaoEsquerda = "data-aos='fade-up' data-aos-duration='1000' data-aos-delay='300'";
        elseif($animE == 2):
            $animacaoEsquerda = "data-aos='fade-down' data-aos-duration='1000' data-aos-delay='300'";
            elseif($animE == 3):
                $animacaoEsquerda = "data-aos='fade-left' data-aos-duration='1000' data-aos-delay='300'";
                elseif($animE == 4):
                    $animacaoEsquerda = "data-aos='fade-right' data-aos-duration='1000' data-aos-delay='300'";
                endif;

// [ANIMAÇÃO DIREITA]
if($animD == 0):
    $animacaoDireita = "";
    elseif($animD == 1):
        $animacaoDireita = "data-aos='fade-up' data-aos-duration='1000' data-aos-delay='300'";
        elseif($animD == 2):
            $animacaoDireita = "data-aos='fade-down' data-aos-duration='1000' data-aos-delay='300'";
            elseif($animD == 3):
                $animacaoDireita = "data-aos='fade-left' data-aos-duration='1000' data-aos-delay='300'";
                elseif($animD == 4):
                    $animacaoDireita = "data-aos='fade-right' data-aos-duration='1000' data-aos-delay='300'";
                endif;
?>

<style>

    @media (max-width: 767px){
        .midias .facebook{
            width: 100%;
        }
    }

    .midias .imagem_bloco_midias{
        width: 555px;
    }
</style>

<section class="midias_sec <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    <div class="container pt-5 pb-5 midias">
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-between">

                <?php if($esquerda): // Escolha de Blocos da Esquerda ?>
                
                    <?php 
                    $facebook = get_sub_field('facebook_01');
                    $texto = get_sub_field('bloco_de_texto_01');  
                    $banner = get_sub_field('banner_01');
                    ?>

                    <?php if($esquerda == "facebook01"): ?>
                        <div class="facebook" style="overflow-y: scroll;" <?php echo $animacaoEsquerda; ?> >
                            <iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $facebook; ?>&tabs=timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="500" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        </div>
                    <?php elseif($esquerda == "instagram01"): ?>
                        <div class="instagram" <?php echo $animacaoEsquerda; ?> >
                            <?php echo do_shortcode( '[instagram-feed]' ); ?>
                        </div>
                    <?php elseif($esquerda == "banner01"): ?>
                        <div class="imagem_bloco_midias" <?php echo $animacaoEsquerda; ?> >
                            <img src="<?php echo $banner['url']; ?>" alt="<?php echo $banner['alt']; ?>" title="<?php echo $banner['title']; ?>">
                        </div>
                    <?php elseif($esquerda == "texto01"): ?>
                        <div class="imagem_bloco_midias" <?php echo $animacaoEsquerda; ?> >
                            <?php echo $texto; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                                
                <?php if($direita): // Escolha de Blocos da Direita  ?>

                    <?php 
                    $facebook = get_sub_field('facebook_02');
                    $texto = get_sub_field('bloco_de_texto_02');  
                    $banner = get_sub_field('banner_02');
                    ?>

                    <?php if($direita == "facebook02"): ?>
                        <div class="facebook" style="overflow-y: scroll;" <?php echo $animacaoDireita; ?> >
                            <iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $facebook; ?>&tabs=timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="500" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        </div>
                    <?php elseif($direita == "instagram02"): ?>
                        <div class="instagram" <?php echo $animacaoDireita; ?> >
                            <?php echo do_shortcode( '[instagram-feed]' ); ?>
                        </div>
                    <?php elseif($direita == "banner02"): ?>
                        <div class="imagem_bloco_midias" <?php echo $animacaoDireita; ?> >
                            <img src="<?php echo $banner['url']; ?>" alt="<?php echo $banner['alt']; ?>" title="<?php echo $banner['title']; ?>">
                        </div>
                    <?php elseif($direita == "texto02"): ?>
                        <div class="imagem_bloco_midias" <?php echo $animacaoDireita; ?> >
                            <?php echo $texto; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</section>