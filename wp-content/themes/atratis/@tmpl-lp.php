<?php /* Template Name: Página de LP */ ?>
<head>
    <?php echo get_field('acf-header-codigo', "option"); ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/build/css/all.css?v=2.2">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/build/css/jquery.fancybox.min.css" />

</head>


<body class="body-lp">

<div class="owl-banner-principal" style="overflow: hidden;">

<?php
        $img_url = get_field('img_banner_lp');
        $img_mobile = get_field('img_mobile');
        $img_logo = get_field('img_logo');

        $titulo = get_field('titulo_banner_lp');
        $conteudo = get_field('conteudo_banner_lp');

        $btnNome = get_field('btn_banner_lp');
        $btnLink = get_field('link_banner_lp');
        $btnAba = get_field('btnAba_banner_lp');

        // Posição do conteúdo
        $posicaoConteudo = get_field('posicao_descricao');
        if ($posicaoConteudo == 1) :
            $posConteudo = "";
        elseif ($posicaoConteudo == 2) :
            $posConteudo = "conteudo_banner_direita";
        elseif ($posicaoConteudo == 3) :
            $posConteudo = "conteudo_banner_central";
        endif;

        // Parallax
        $plx = get_field('parallax');
        if ($plx == 1) :
            $parallax = " data-type='background' data-speed='3' ";
        else :
            $parallax = "";
        endif;

        // Camada de cor sobre o banner
        $escolhaCorBanner = get_field('escolha_cor_sobre_banner');
        if ($escolhaCorBanner) :
            $camadaCorB = get_field('camada_cor_banner');
            if ($camadaCorB) :
                $camadaCorBanner = " background-color: " . $camadaCorB . "; ";
            else :
                $camadaCorBanner = "";
            endif;
        endif;

        // Transparência da cor
        $transparencia = get_field('tansparencia_cor');
        if ($transparencia) :
            $transparencia = " opacity: 0." . $transparencia . "; ";
        else :
            $transparencia = "";
        endif;

    ?>


    <div class="item item-lp" style="background-image: url('<?php echo $img_url['url']; ?>')" <?php echo $parallax; ?>>

        <?php if ($escolhaCorBanner) : ?>
        <div class="bg_color_imagem" style="<?php echo $camadaCorBanner; ?> <?php echo $transparencia; ?> "></div>
        <?php endif; ?>

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="texto <?php echo $posConteudo; ?>" data-aos="fade-right" data-aos-duration="3000">

                        <img  src="<?php echo $img_logo['url'];?>" alt="<?php echo $img_logo['alt'];?>">
                        <?php if ($titulo) : ?>
                        <h2><?php echo $titulo; ?></h2>
                        <?php endif; ?>
                        <?php if ($conteudo) : ?>
                        <div>
                            <?php echo $conteudo; ?>
                        </div>
                        <?php endif; ?>


                        <?php if($btnLink){
                            ?>
                             <a href="
                                    <?php
                                    // Link do Banner
                                    if ($btnLink) :
                                        echo $btnLink;
                                    else :
                                        echo "#";
                                    endif;
                                    ?>" <?php
                                        // Nova Aba
                                        if ($btnAba == true) :
                                            echo "target='_blank'";
                                        else :
                                            echo "";
                                        endif;
                                        ?> class="bt__padrao">
                            <?php if ($btnNome) : ?>
                            <?php echo $btnNome; ?>
                           
                            <?php endif; ?>
                        </a>
                            
                            <?php
                        }?>
                       


                    </div>
                </div>
            </div>
        </div>
    </div>


    <img src="<?php echo bloginfo('template_url'); ?>/build/images/caixote.png" alt="caixa"
    class="caixaFlutuante move-1">

  

</div>

<div class="owl-banner-mobile">
        <div class="item">
            
            <a href="<?php echo $btnLink; ?>" 
                <?php if ($btnAba == true) : echo "target='_blank'";
                    else : echo "";
                    endif; ?>
                >
                <img src="<?php echo $img_mobile['url'];?>" alt="<?php echo $img_mobile['alt'];?>">
            </a>
            
        </div>
    </div>

<!-- [BLOCOS] Chamar template de blocos -->
<?php get_template_part('blocos'); ?>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


    <script src="<?php bloginfo("template_url"); ?>/build/js/scripts.min.js"></script>
    <script src="<?php bloginfo("template_url"); ?>/build/js/jquery.fancybox.min.js"></script>
    <script src="<?php bloginfo("template_url"); ?>/build/js/sweetalert2.js"></script>

    <script>
        jQuery(".owl-sessao-card-lp").owlCarousel({
        loop: true,
        margin: 20,
        dots: true,
        nav: false,
        smartSpeed: 900,
        
        responsive: {
            0: {
            items: 1,
            },
            600: {
            items: 2,
            },
            1000: {
            items: 3,
            },
        },
        });
    </script>
</body>
<footer class="footer-lp">
        <div class="final">
            <div class="container">
                <div class="row">
                    <div class="col-12" style="padding: 0;">
                        <div class="fim">
                            <a class="img" href="https://jetro.com.br/">
                                <img src="<?php echo $img_logo['url']?>" alt="<?php echo $img_logo['alt']?>">
                            </a>
                            <div class="assinatura">
                                <h2>
                                    <a href="http://www.atratis.com.br" target="_blank" class="ir"
                                    title="Site criado pela agência Atratis Digital de Fortaleza - Ceará. Inbound Marketing, Criação de Sites, Mídias Sociais e mais.">Site
                                    criado por Atratis, uma agência de comunicação digital de Fortaleza - Ceará</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</footer>

    


    
