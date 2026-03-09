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
$link_cta = get_sub_field('link_cta');
$texto_cta = get_sub_field('texto_cta');
$aba = get_sub_field('aba') ? 'target="_blank"' : '';
$titulo = get_sub_field('titulo');
$sub_titulo = get_sub_field('sub_titulo');
$flutuante_no_topo = get_sub_field('flutuante_no_topo');
$mais_videos = get_sub_field('3_videos');
$videos_iframe = get_sub_field('videos-iframes');

$add_video_interno = get_sub_field('add_video_interno');
$video_unico = get_sub_field('video');
$videos_internos = get_sub_field('videos-internos');


$direction = $posicao == 0 ? 'row-reverse' : 'row';

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
  .videos-lp-3 {
      padding-bottom: 70px;

      @media (max-width: 991px) {
            padding: 40px 20px 20px;
      }

    .sub-titulo {
      font-size: 30px !important;
      text-transform: none !important;
      margin-top: 30px;
    }

    .titulo {
      font-size: 22px !important;
      text-transform: none !important;
      margin-top: 11px !important;
      font-weight: 400 !important;
      color: #484D51 !important;
    }

    p {
      color: #000000 !important;
      text-align: center !important;
      margin-top: 24px !important;
    }

    .bt__padrao {
      margin-top: 10px !important;
    }


    element {}

    .move-1 {
      animation: move 5s infinite ease-in-out;

    }

    .caixaFlutuanteTres {
      position: absolute;
      right: 10%;
      top: auto !important;
      bottom: -112px !important;
      z-index: 1;
    }
  }
</style>

<section class="secaoTextoVideo <?php echo $classe; ?> <?php echo $parallax; ?> "
  style="position: relative; <?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
  <?php if ($flutuante_no_topo): ?>
    <img src="<?php echo bloginfo("template_url"); ?>/build/images/cesto.png" alt="caixa"
      class="caixaFlutuanteTres move-1">
  <?php endif; ?>

  <div class="container">

    <div class="row align-items-center" style="flex-direction: <?php echo $direction; ?>">
      <div class="col-12">
        <div class="header-secao center">
          <?php if ($sub_titulo): ?>
            <h3 class="sub-titulo"><?php echo $sub_titulo; ?></h3>
          <?php endif; ?>

          <?php if ($titulo): ?>
            <h2 class="titulo"><?php echo $titulo; ?></h2>
          <?php endif; ?>
        </div>

        <!-- Vídeos Externos -->
        <?php if ($mais_videos): ?>
          <div class="videos-grid">

            <?php if ($add_video_interno): ?>
              <?php foreach ($videos_internos as $video): ?>
                <div class="video">
                  <video width="560" height="315">
                    <source src="<?php echo $video['videos'] ?>" type="video/mp4">
                  </video>
                </div>
              <?php endforeach; ?>

            <?php else: ?>
              <?php foreach ($videos_iframe as $video): ?>
                <div class="video">
                  <?php echo $video['iframe']; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>

          </div>
        <?php else: ?>

          <?php if ($add_video_interno): ?>
            <div class="video">
              <video width="560" height="315">
                <source src="<?php echo $video_unico; ?>" type="video/mp4">
              </video>
            </div>
          <?php else: ?>
            <div class="video">
              <?php echo get_sub_field('iframe'); ?>
            </div>
          <?php endif; ?>

        <?php endif; ?>

        <!-- Vídeos Internos -->


      </div>
      <div class="col-12">
        <div class="texto" <?php echo $animacaoConteudo; ?>>
          <?php echo get_sub_field('conteudo', "option"); ?>
          <?php if ($link_cta) { ?>
            <a class="bt__padrao" href="<?php echo $link_cta; ?>" <?php echo $aba; ?>>
              <?php echo $texto_cta; ?>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>