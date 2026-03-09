<?php /* Template Name: Página de Agradecimento */ ?>
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

<?php
    $img_logo = get_field('img_logo_agr');

    $titulo = get_field('titulo_agr');
    $conteudo = get_field('conteudo_agr');
?>

<div class="agradecimento">
    <svg width="43" height="42" viewBox="0 0 43 42" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M40.5787 0.405281C40.1501 0.63221 35.4854 3.06122 30.2155 5.81802C24.9457 8.56641 16.1374 13.1723 10.6322 16.0383C5.13538 18.9128 0.546317 21.3502 0.437053 21.4511C0.184907 21.678 0 22.0983 0 22.4344C0 22.7706 0.285766 23.317 0.537912 23.4851C0.832082 23.6784 12.0274 27.4942 12.1534 27.4438C12.2123 27.4185 13.826 26.0654 15.7339 24.4348C17.6418 22.7959 22.8781 18.3245 27.3579 14.5002C31.8461 10.6676 35.603 7.45697 35.7207 7.35611L35.9224 7.17961L35.7207 7.43175C35.603 7.57463 31.4846 12.5419 26.5594 18.4758C21.6341 24.4012 17.5998 29.2844 17.583 29.3096C17.5746 29.3601 35.6198 35.5713 36.536 35.8402C36.9646 35.9579 37.7043 35.5881 37.9396 35.1426C38.1077 34.8148 43.0666 1.39705 42.9993 1.04405C42.9321 0.68264 42.5791 0.25399 42.2177 0.111107C41.7386 -0.0906067 41.4108 -0.0317726 40.5787 0.405281Z" fill="white"/>
    <path d="M15.7171 35.9243C15.7171 40.6394 15.7087 40.5386 16.1878 40.9168C16.7425 41.3539 17.4905 41.3118 17.9612 40.8244C18.2974 40.4629 22.9705 34.1089 22.9201 34.0668C22.8865 34.0332 15.818 31.5958 15.7507 31.5958C15.7339 31.5958 15.7171 33.5457 15.7171 35.9243Z" fill="white"/>
    </svg>

    <h1><?php echo $titulo;?></h1>

    <p><?php echo $conteudo;?></p>
</div>

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

    


    
