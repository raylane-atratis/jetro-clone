<?php /* Template Name: Página de LP */ ?>
<html>
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
    <?php wp_head();?>	

    <style>
        #identidade {
            text-transform: lowercase;
        }
    </style>
  
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  

    <script src="<?php bloginfo("template_url"); ?>/build/js/scripts.min.js"></script>
    <script src="<?php bloginfo("template_url"); ?>/build/js/jquery.fancybox.min.js"></script>
    <script src="<?php bloginfo("template_url"); ?>/build/js/sweetalert2.js"></script>
    <?php wp_footer(); ?>
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

    
<script>
        jQuery("#telefone").mask("99 99999-9999");
        jQuery('#identidade').on('input', function() {
            $(this).val($(this).val().replace(/\s+/g, ''));
        });

        var link = document.getElementById('link-lp-one');
        var linkdois = document.getElementById('link-lp-two');
        link.href = '#formulario-contato';
        linkdois.href = '#formulario-contato';

document.addEventListener('wpcf7submit', function(event) {
    var inputs = event.detail.inputs;
    var formData = {};

    for (var i = 0; i < inputs.length; i++) {
        formData[inputs[i].name] = inputs[i].value;
    }

    var identidadeLowCase  = formData.identidade.toLowerCase();

    var test = {
        "username" : identidadeLowCase,
        "password": formData.senha,
        "map_firstname": formData.nome,
        "map_lastname": formData.sobrenome,
        "map_city": formData.cidade,
        "map_empresa": formData.empresa,
        "map_segmento": formData.segmento,
        "map_telefone": formData.telefone,
        "map_email": formData.email,
        "force_update": 0
    };





    fetch('/wp-json/meu-tema/v1/enviar-dados', { // Use o caminho do seu endpoint
        method: 'POST',
        body: JSON.stringify(test),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw response;
        }
        return response.json();
    })
    .then(data => {
        Swal.fire({
            title: "Bom Trabalho!",
            text: "Dados enviados com sucesso!",
            icon: "success",
            footer: '<a href="https://jetro.com.br/agradecimento/">Acesse o conteúdo!</a>'
        }).then(function() {
            window.location = "https://jetro.com.br/agradecimento/";
        });
    })
    .catch(errorResponse => {
        
    

        errorResponse.json().then(errorData => {

       
           
           var inicioJson = errorData.message.indexOf('{'); // Encontra o índice do início do JSON
           var jsonStr = errorData.message.substring(inicioJson); // Extrai o JSON da string
           var erroObj = JSON.parse(jsonStr); // Analisa o JSON em um objeto JavaScript
           var mensagemErro = erroObj.error; // Obtém a mensagem de erro

           console.log(mensagemErro);

            Swal.fire({
                icon: "error",
                title: mensagemErro,
                text: 'Erro na solicitação',
            });
        });
    });
}, false);


</script>




  
<footer class="footer-lp">
<a href="#formulario-contato" class="btn-flutuante" id="btn-flutuante">
    <div class="border-btn">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M17.846 14.217L13.453 12.325C12.516 11.922 11.441 11.922 10.505 12.327L6.14 14.217C5.417 14.53 4.968 15.214 4.967 16.001C4.966 16.788 5.414 17.473 6.135 17.788L8 18.602V21.194C8 22.168 8.57 23.06 9.454 23.467C10.223 23.821 11.079 24 12 24C12.921 24 13.777 23.82 14.548 23.467C15.43 23.06 16 22.167 16 21.194V18.594L17 18.16V21.001C17 21.554 17.447 22.001 18 22.001C18.553 22.001 19 21.554 19 21.001C19 21.001 19 16.054 19 16.001C19 15.224 18.559 14.523 17.846 14.218V14.217ZM11.3 14.163C11.732 13.975 12.23 13.975 12.662 14.161L17.012 15.938C17.012 15.952 17.005 15.963 17.004 15.977L12.669 17.86C12.233 18.049 11.733 18.049 11.297 17.858L6.934 16.053L11.299 14.163H11.3ZM14 21.193C14 21.392 13.889 21.568 13.711 21.65C12.701 22.113 11.298 22.113 10.29 21.65C10.111 21.568 10 21.392 10 21.193V19.474L10.498 19.691C10.971 19.897 11.478 20 11.986 20C12.491 20 12.996 19.898 13.467 19.693L14 19.461V21.193ZM7 4.5C7 5.328 6.328 6 5.5 6C4.672 6 4 5.328 4 4.5C4 3.672 4.672 3 5.5 3C6.328 3 7 3.672 7 4.5ZM11 4.5C11 5.328 10.328 6 9.5 6C8.672 6 8 5.328 8 4.5C8 3.672 8.672 3 9.5 3C10.328 3 11 3.672 11 4.5ZM19 0H5C2.243 0 0 2.243 0 5V17C0 19.757 2.243 22 5 22C5.552 22 6 21.553 6 21C6 20.447 5.552 20 5 20C3.346 20 2 18.654 2 17V9H22V17C22 17.731 21.734 18.436 21.251 18.983C20.886 19.397 20.925 20.029 21.34 20.394C21.752 20.759 22.385 20.721 22.751 20.305C23.557 19.393 24 18.218 24 16.999V5C24 2.243 21.757 0 19 0ZM2 7V5C2 3.346 3.346 2 5 2H19C20.654 2 22 3.346 22 5V7H2Z" fill="white"/>
        </svg>
        Acessar curso gratuito
    </div>
</a>
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


   
</body>
</html>

    


    
