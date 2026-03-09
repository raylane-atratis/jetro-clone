<!DOCTYPE html>
<html lang="pt-Br">

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


  <style>
  .sobre_sec .texto2 p {
    font-weight: 400 !important;
  }

  .sobre_sec .texto p {
    font-weight: 400 !important;
  }

  .conteudo p,
  .conteudo ul li {
    font-weight: 400;
  }

  .cta_paralax {
    height: auto !important;
    min-height: 400px !important;
  }

  /* .depoimentos .texto span{
			margin: 0px;
			display: initial;
		} */

  a:hover {
    opacity: 0.8;
  }
  </style>

  <?php wp_head(); ?>

  <?php
	// MODELOS DE HEADER
	// Estilos de header escolhidos em "Opções do Tema > Geral > Modelos de Topo"
	$estiloTopo = get_field('estilo_do_topo', "option"); ?>

</head>



<?php if ($estiloTopo == 1) : ?>

<body <?php body_class('animated fadeIn type1'); ?>>
  <?php elseif ($estiloTopo == 2) : ?>

  <body <?php body_class('animated fadeIn type2'); ?>>
    <?php elseif ($estiloTopo == 3) : ?>

    <body <?php body_class('animated fadeIn type3'); ?>>
      <?php endif; ?>

      <?php echo get_field('acf-body-codigo', "option"); ?>

      <?php // Informações Gerais
			$logo = get_field('logo', "option");
			if (!empty($logo)) :
				$logoUrl = $logo['url'];
				$logoTitle = $logo['title'];
				$logoAlt = $logo['alt'];
			endif;

			$h1Home = get_field('h1_home', "option");
			?>

      <!-- Header fixo, comum a todos os modelos de header -->


      <div class="pesquisa_full">
        <button class="fechar_pesquisa"><i class="fa fa-times" aria-hidden="true"></i></button>

        <div class="conteudo">
          <form class="search" id="searchform" method="get" value="<?php the_search_query(); ?>"
            action="<?php echo esc_url(home_url('/')); ?>">
            <label for="search" id="label_for"></label>
            <input id="search" type="text" name="s" placeholder="Digite sua busca" required>
            <button type="submit" style="display: none;"></button>
            <span>Insira as palavras-chave da sua pesquisa e pressione Enter.</span>
          </form>
        </div>
      </div>



      <?php

			if ($estiloTopo == 1) :
				include "header_mod01.php";
			elseif ($estiloTopo == 2) :
				include "header_mod02.php";
			elseif ($estiloTopo == 3) :
				include "header_mod03.php";
			endif;

			?>



      <header class="mob_header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-9">
              <a href="<?php echo get_home_url(); ?>" class="marca">
                <img src="<?php echo $logoUrl; ?>" alt="<?php echo $logoAlt; ?>" title="<?php echo $logoTitle; ?>">
              </a>
            </div>
            <div class="col-3">
              <a id="menuBtn" onclick="toggleNave()" class="hamb icon-menu">
                <div class="sc-mob-menu__trigger">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </header>

      <div id="mySidenav" class="sidenav">
        <nav class="navbar">
          <?php
            wp_nav_menu([
                'menu'            => 'Menu Principal',
                'theme_location'  => 'principal',
                'container'       => '',
                'container_id'    => '',
                'container_class' => '',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav mr-auto',
                'depth'           => 10,
                'fallback_cb'     => 'bs4navwalker::fallback',
                'walker'          => new bs4navwalker()
            ]);
            ?>
        </nav>


        <div class="links">

          <?php 
        if( have_rows('botoes_cta', "option") ):
        while( have_rows('botoes_cta', "option") ): the_row(); 
            $icone = get_sub_field('icone_do_botao');
            $botaoTexto = get_sub_field('botao_texto');
            $botaoCor = get_sub_field('botao_cor');
            $botaoLink = get_sub_field('botao_link');
            $novaAba = get_sub_field('abrir_outra_aba');
            $posicaoCTA = get_sub_field('posicao_do_icone');

            if($botaoCor):
                $botaoCor = " background-color: " . $botaoCor . "; ";
            else:
                $botaoCor = "";
            endif;

            if($novaAba):
                $novaAba = " target='_blank' ";
            else:
                $novaAba = "";
            endif;

            
        ?>
          <div class="links">
            <a href="<?php echo $botaoLink; ?>" class="bt__padrao"
              style="width: 90%;margin: 10px auto; <?php echo $botaoCor; ?>" <?php echo $novaAba; ?>>
              <?php if($posicaoCTA == 0): ?>
              <?php echo $icone; ?>
              <?php echo $botaoTexto; ?>
              <?php else: ?>
              <?php echo $botaoTexto; ?>
              <?php echo $icone; ?>
              <?php endif; ?>
            </a>
          </div>
          <?php endwhile; endif; ?>
          <div class="dropdown menu-cliente">
            <a class=" bt__padrao dropdown-toggle" style="<?php echo $botaoCor; ?>" href="#" role="button"
              id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Área do Cliente
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <?php 
                                        $dropdown_cliente = get_field('dropdown_cliente', 'option');

                                        foreach ($dropdown_cliente as $item) :
                                            $texto = $item['texto'];
                                            $link_externo = $item['link_externo'];
                                            $shortcode = $item['shortcode'];
                                            $shortcode = "[placeholder Formulario]";


                                                   ?>
              <a class="dropdown-item" <?php if($link_externo) : ?> href="<?php echo $link_externo; ?>" target="_blank"
                <?php else:?> onclick="abrirVideo('<?php echo $shortcode; ?>', '<?php echo $texto?>')" <?php endif; ?>>
                <?php echo $texto; ?>
              </a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

      </div>