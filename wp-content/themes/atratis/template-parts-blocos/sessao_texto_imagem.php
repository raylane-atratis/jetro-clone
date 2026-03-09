<?php
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

$posicao = get_sub_field('posicao_conteudo');
$animC = get_sub_field('escolha_animacao_conteudo');
$animI = get_sub_field('escolha_animacao_imagem');
$classe = get_sub_field('classe');
$link_do_cta = get_sub_field('link_do_cta');
$texto_do_cta = get_sub_field('texto_do_cta');
$imagem_pessoa = get_sub_field('imagem_pessoa');
$circulo_girando = get_sub_field('circulo_girando');
$titulo = get_sub_field('titulo');
$sub_titulo = get_sub_field('sub_titulo');
$card_com_texto_a_esquerda_da_imagem = get_sub_field('card_com_texto_a_esquerda_da_imagem');
$card_com_texto = get_sub_field('card_com_texto');
$logo_depois_do_texto = get_sub_field("logo_depois_do_texto");
$lista_redes_sociais = get_sub_field("lista_redes_sociais");
$link_botao_centralizado = get_sub_field("link_botao_centralizado");
$texto_botao_centralizado = get_sub_field("texto_botao_centralizado");
$texto_centralizado = get_sub_field("texto_centralizado");


// $classe = $classe . $imagem_pessoa ? " imagem-pessoa" : "";
if ($imagem_pessoa):
    $classe .=  " imagem-pessoa";
endif;

// $classe = $classe . $posicao ? "img-direita" : "img-esquerda";
if ($posicao):
    $classe .= " img-esquerda";
else:
    $classe .= " img-direita";
endif;


if ($card_com_texto_a_esquerda_da_imagem):
    $classe .= " card-com-texto-a-esquerda-da-imagem";
endif;

// [ANIMAÇÃO CONTEÚDO]
if ($animC == 0):
    $animacaoConteudo = "";
elseif ($animC == 1):
    $animacaoConteudo = "data-aos='fade-up' data-aos-duration='1000' data-aos-delay='300'";
elseif ($animC == 2):
    $animacaoConteudo = "data-aos='fade-down' data-aos-duration='1000' data-aos-delay='300'";
elseif ($animC == 3):
    $animacaoConteudo = "data-aos='fade-left' data-aos-duration='1000' data-aos-delay='300'";
elseif ($animC == 4):
    $animacaoConteudo = "data-aos='fade-right' data-aos-duration='1000' data-aos-delay='300'";
endif;

// [ANIMAÇÃO IMAGEM]
if ($animI == 0):
    $animacaoImagem = "";
elseif ($animI == 1):
    $animacaoImagem = "data-aos='fade-up' data-aos-duration='1000' data-aos-delay='300'";
elseif ($animI == 2):
    $animacaoImagem = "data-aos='fade-down' data-aos-duration='1000' data-aos-delay='300'";
elseif ($animI == 3):
    $animacaoImagem = "data-aos='fade-left' data-aos-duration='1000' data-aos-delay='300'";
elseif ($animI == 4):
    $animacaoImagem = "data-aos='fade-right' data-aos-duration='1000' data-aos-delay='300'";
endif;

?>

<style>
    .lp-homem {

        @media (max-width: 992px) {
            padding: 50px 20px 0;
        }

        .imagem::after {
            right: 168px !important;
        }

        .circulo-girando {
            top: 80px !important;
            /* left: 30px !important; */
            left: 168px !important;
        }
    }

    .lp-mulher {

        @media (max-width: 992px) {
            padding: 50px 20px 0;

            .imagem {
                display: flex;
                justify-content: center;
            }
        }

        .imagem::after {
            right: 163px !important;

            @media (max-width: 992px) and (min-width: 768px) {
                right: 244px !important;

            }
        }

        .circulo-girando {
            top: 50px !important;
            left: 430px !important;

            @media (max-width: 992px) {
                top: 62px !important;
                left: 290px !important;
            }

            @media (max-width: 468px) {
                top: 74px !important;
                left: 226px !important;
            }
        }

        .header-secao {
            margin-bottom: 6px !important;
        }

        ul {
            margin-left: 18px !important;

            li {
                list-style: disc !important;
            }

            li::marker {
                color: #FF6E00 !important;
                font-size: 18px;
            }
        }

        h3 {
            font-size: 26px !important;
            color: #484D51 !important;
            text-transform: none !important;
            font-weight: 700 !important;
        }
    }


    .lp-texto-2 {
        @media (max-width: 992px) {
            padding: 50px 20px 0;

            .col-lg-6:first-child {
                padding-top: 0 !important;
            }
        }

        .texto {
            p {
                margin-bottom: 10px !important;
                color: #23292E !important;
            }

            ul {
                margin-left: 18px !important;
            }

            ul li {
                margin-bottom: 5px !important;
                list-style: disc !important;
            }
        }
    }

    .texto-centralizado {
        margin-top: 40px;
    }

    .centralizado-btn {
        .bt__padrao {
            padding: 6px 27px;
        }
    }
</style>

<section class="secaoTextoImagem <?php echo $classe; ?> <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>"
    <?php echo $animacao; ?>>

    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <div class="imagem" <?php echo $animacaoImagem; ?>>
                    <?php
                    if ($card_com_texto_a_esquerda_da_imagem):
                        $texto_card = $card_com_texto['texto'];
                        $texto_botao_card = $card_com_texto['texto_botao'];
                        $link_botao_card = $card_com_texto['link_botao'];
                        $aba_card = $card_com_texto['aba'] ? "target='_blank'" : "";
                    ?>

                        <div class="extra-card">
                            <div class="circulo-girando">
                                <img src="<?php bloginfo("template_url"); ?>/build/images/jetro-circulo.png" alt="img">
                                <img class="seta" src="<?php bloginfo("template_url"); ?>/build/images/seta-jetro.svg"
                                    alt="img">
                            </div>
                            <div class="card">
                                <p class="texto">
                                    <?php echo $texto_card; ?>
                                </p>
                                <div class="line"></div>
                                <a href="<?php echo $link_botao_card; ?>" <?php echo $aba_card; ?>>
                                    <?php echo $texto_botao_card; ?>
                                </a>
                            </div>
                            <div class="circulo-girando">
                                <img src="<?php bloginfo("template_url"); ?>/build/images/jetro-circulo.png" alt="img">
                                <img class="seta" src="<?php bloginfo("template_url"); ?>/build/images/seta-jetro.svg"
                                    alt="img">
                            </div>
                        </div>

                    <?php
                    endif;
                    ?>

                    <div class="box">
                        <?php if ($circulo_girando): ?>
                            <div class="circulo-girando">
                                <img src="<?php bloginfo("template_url"); ?>/build/images/jetro-circulo.png" alt="img">
                                <img class="seta" src="<?php bloginfo("template_url"); ?>/build/images/seta-jetro.svg"
                                    alt="img">
                            </div>
                        <?php endif; ?>
                        <img src="<?php echo get_sub_field('imagem'); ?>"
                            alt="Imagem sobre <?php echo esc_attr(get_sub_field('titulo', "option")); ?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="texto" <?php echo $animacaoConteudo; ?>>
                    <div class="header-secao" style="margin-bottom: 10px;">
                        <?php if ($sub_titulo): ?>
                            <h3 class="sub-titulo"><?php echo $sub_titulo; ?></h3>
                        <?php endif; ?>

                        <?php if ($titulo): ?>
                            <h2 class="titulo"><?php echo $titulo; ?></h2>
                        <?php endif; ?>
                    </div>
                    <?php echo get_sub_field('conteudo', "option"); ?>

                    <?php $lista = get_sub_field('lista');

                    if ($lista):
                        $size = count($lista);
                    ?>
                        <div class="listas">
                            <ul class="lista">
                                <?php
                                $middleIndex = ceil($size / 2); // Calculate the middle index

                                foreach ($lista as $pos => $item):
                                    if ($pos == $middleIndex):
                                ?>
                            </ul>
                            <ul class="lista">
                            <?php endif; ?>
                            <li>
                                <?php echo $item['texto']; ?>
                            </li>
                        <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if ($logo_depois_do_texto): ?>
                        <div class="logo-depois-do-texto">
                            <img src="<?php echo $logo_depois_do_texto["url"]; ?>" alt="Logo">
                        </div>
                    <?php endif; ?>
                    <?php if ($link_do_cta) { ?>
                        <div class="mobile-btn">
                            <a class="bt__padrao" href="<?php echo $link_do_cta; ?>">
                                <?php echo $texto_do_cta; ?>
                            </a>
                        </div>

                    <?php } ?>
                    <?php if ($lista_redes_sociais) {
                    ?><ul><?php
                            foreach ($lista_redes_sociais as $item) {
                            ?>
                                <a href="<?php echo $item['link']; ?>">
                                    <li>
                                        <img src="<?php echo $item['img']['url']; ?>" alt="<?php echo $item['img']['alt']; ?>">
                                        <p><?php echo $item['texto']; ?></p>
                                    </li>
                                </a>
                            <?php
                            }
                            ?>
                        </ul><?php
                            } ?>

                </div>
            </div>
        </div>
        <div class="final-centralizado align-items-center">
            <?php if ($texto_centralizado): ?>
                <div class="col-12 text-center">
                    <p class="texto-centralizado" <?php echo $animacaoConteudo; ?>>
                        <?php echo $texto_centralizado; ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if ($link_botao_centralizado): ?>
                <div class="col-12 d-flex justify-content-center">
                    <div class="centralizado-btn">
                        <a class="bt__padrao" href="<?php echo $link_botao_centralizado; ?>">
                            <?php echo $texto_botao_centralizado; ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>