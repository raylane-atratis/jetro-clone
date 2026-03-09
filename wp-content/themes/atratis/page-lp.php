<?php /* Template Name: Landing Page Jetro */ ?>

<style>
    .banner-desktop-lp {
        width: 100%;
        height: 700px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 74px 0 78px;

        .logo-banner {
            margin-top: 55px;
        }

        @media (max-width: 992px) {
            display: none;
        }
    }

    .secao-banner-mobile {
        display: none;
        width: 100%;
        height: auto;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding: 40px 10px;

        @media (max-width: 992px) {
            display: block;
        }
    }

    #titulo-banner {
        color: #fff;
        margin-top: 20px;
    }

    #descricao-banner {
        color: #FFF;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 28px;
        margin-top: 10px;
    }

    .wpcf7-form {
        max-width: 488px;
        width: 100%;
        height: auto;
        padding: 30px 22px 25px;
        background-color: #ffffff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
    }

    .wpcf7-form-control-wrap {
        display: flex;
        justify-content: center;
    }

    .wpcf7-form .titulo {
        max-width: 334px;
        color: #FF6E00;
        text-align: center;
        margin: 0 auto;
        padding-bottom: 28px;
        font-family: "Space Grotesk";
        font-size: 22px;
        font-style: normal;
        font-weight: 700;
        line-height: 28px;
    }

    .wpcf7-form p {
        font-size: 13px;
        font-style: normal;
        font-weight: 400;
        line-height: 16px;
        color: #484D51;
        margin-bottom: 0;
    }

    .wpcf7-form #checkbox {
        display: flex;
        flex-direction: row;
        gap: 9px;
        margin-top: 5px;
    }

    .wpcf7-form #checkbox input[type="checkbox"] {
        width: 19px;
        height: 19px;
        border-radius: 3px;
        border: 1px solid #BABABA;
        background: #F3F3F3;
    }

    .wpcf7-form .form-group {
        display: flex;
        gap: 12px;
    }

    .wpcf7-form .form-group input {
        width: 216px;
        height: 43px;
        border-radius: 10px;
        padding: 8px 20px;
        font-size: 16px;
        border: 1px solid #BABABA;
        background: #F3F3F3;
    }

    .wpcf7-form .form-group input:focus {
        border-color: #FF6E00;
        outline: none;
    }

    .wpcf7-form .form-group input::placeholder {
        color: #484D51;
    }

    .wpcf7-form .btn-form-lp {
        width: 100%;
    }

    .wpcf7-form .btn-form-lp input[type="submit"] {
        width: 100%;
        background-color: #FF6E00;
        color: #ffffff;
        padding: 11px;
        border-radius: 6px;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 500;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        margin-top: 20px;
    }

    .wpcf7-form .btn-form-lp input[type="submit"]:hover {
        background-color: #002F5C;
    }

    .secao-texto-imagem .lp-homem {
        .secaoTextoImagem.imagem-pessoa.img-esquerda .imag em::after {
            right: 168px;
        }
    }

    .caixaFlutuante {
        right: 5% !important;
        bottom: -200px !important;
    }
</style>

<?php get_header(); ?>

<?php
// 1. Buscamos a logo (fora do loop dos blocos, pois geralmente é global)
$logo = get_field('logo', 'option');
$footer_background = get_field('footer_background', 'option');
?>

<?php
// 2. Loop do Conteúdo Flexível (Apenas para o Banner)
if (have_rows('blocos_home')):
    while (have_rows('blocos_home')) : the_row();

        if (get_row_layout() == 'banner_lp'):
            $banner_desktop = get_sub_field('banner_desktop');
            $banner_mob = get_sub_field('banner_mob');
?>
            <section class="banner-desktop-lp" style="background-image:<?php echo $banner_desktop ? 'url(' . esc_url($banner_desktop['url']) . ')' : 'none'; ?>;">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="conteudo-banner-desktop">
                                <div class="logo-banner">
                                    <img src="<?php echo $logo['url']; ?>" alt="Logo">
                                </div>
                                <h1 id="titulo-banner"><?php the_sub_field('titulo'); ?></h1>
                                <p id="descricao-banner"><?php the_sub_field('subtitulo'); ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form">
                                <?php
                                $form_shortcode = get_sub_field('shortcode_form');
                                if ($form_shortcode) {
                                    echo do_shortcode($form_shortcode);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            </section>

            <section class=" secao-banner-mobile" style="background-image:<?php echo $banner_mob ? 'url(' . esc_url($banner_mob['url']) . ')' : 'none'; ?>;">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="conteudo-banner-mobile">
                                <div class="logo-banner">
                                    <img src="<?php echo $logo['url']; ?>" alt="Logo">
                                </div>
                                <h1 id="titulo-banner"><?php the_sub_field('titulo'); ?></h1>
                                <p id="descricao-banner"><?php the_sub_field('subtitulo'); ?></p>
                                <div class="form">
                                    <?php
                                    $form_shortcode = get_sub_field('shortcode_form');
                                    if ($form_shortcode) {
                                        echo do_shortcode($form_shortcode);
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php
        endif;
    endwhile;
endif;
?>

<img src="<?php echo bloginfo('template_url'); ?>/build/images/caixote.png" alt="caixa"
    class="caixaFlutuante move-1">

<?php
get_template_part('blocos');
?>

<style>
    .footer-lp {
        img {
            height: 53px;

        }

        .final {
            .fim {
                @media (max-width: 768px) {
                    display: flex;
                    flex-direction: column !important;
                    align-items: center;
                    text-align: center;
                }

                @media (max-width: 992px) {
                    flex-direction: row;
                    gap: 40px;
                }
            }
        }

        .inicio-rodape {
            display: flex;
            align-items: center;
            gap: 20px;

            .separator {
                height: 38px;
                width: 1px;
                background-color: #979797;
            }

            @media(max-width: 768px) {
                justify-content: center;
                flex-direction: column;

                .separator {
                    width: 100%;
                    height: 1px;
                }
            }
        }

        .redes-footes {
            display: flex;
            gap: 15px;

            a {
                transition: all 0.3s ease-in-out;
            }

            p {
                width: 26px;
                height: 26px;
                background-color: #FF6E00;
                padding: 7px;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #fff;
                margin-bottom: 0;
            }

            a:hover {
                text-decoration: none;
                filter: none;
                transform: translateY(-3px);
            }
        }
    }
</style>

<footer class="footer-lp" style="background-image: url('<?php echo $footer_background['url']; ?>');">
    <div class="final">
        <div class="container">
            <div class="row">
                <div class="col-12" style="padding: 0;">
                    <div class="fim">
                        <div class="inicio-rodape">
                            <a class="img" href="https://jetro.com.br/">
                                <?php if (!empty($logo) && isset($logo['url'])): ?>
                                    <img src="<?php echo $logo['url']; ?>" alt="Logo">
                                <?php else: ?>
                                    <span><?php bloginfo('name'); ?></span>
                                <?php endif; ?>
                            </a>
                            <div class="separator">
                            </div>
                            <div class="redes-footes">
                                <?php
                                if (have_rows('redes_sociais', 'option')) : // Adicionado parênteses
                                    while (have_rows('redes_sociais', 'option')) : the_row();
                                        $link  = get_sub_field('link_rede_social');
                                        $icone = get_sub_field('icone_rede_social');
                                ?>
                                        <a href="<?php echo $link; ?>">
                                            <p><?php echo $icone; ?></p>
                                        </a>

                                <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="assinatura">
                            <h2>
                                <a href="http://www.atratis.com.br" target="_blank" class="ir"
                                    title="Site criado pela agência Atratis Digital">Site
                                    criado por Atratis, uma agência de comunicação digital de Fortaleza - Ceará</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>