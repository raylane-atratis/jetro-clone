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
$iframe = get_sub_field('iframe');


$direction = $posicao == 0 ? 'row-reverse' : 'row';

// [ANIMAÇÃO CONTEÚDO]
if($animC == 0):
    $animacaoConteudo = "";
    elseif($animC == 1):
        $animacaoConteudo = "data-aos='fade-up' data-aos-duration='1000' data-aos-delay='300'";
        elseif($animC == 2):
            $animacaoConteudo = "data-aos='fade-down' data-aos-duration='1000' data-aos-delay='300'";
            elseif($animC == 3):
                $animacaoConteudo = "data-aos='fade-left' data-aos-duration='1000' data-aos-delay='300'";
                elseif($animC == 4):
                    $animacaoConteudo = "data-aos='fade-right' data-aos-duration='1000' data-aos-delay='300'";
                endif;

// [ANIMAÇÃO IMAGEM]
if($animI == 0):
    $animacaoImagem = "";
    elseif($animI == 1):
        $animacaoImagem = "data-aos='fade-up' data-aos-duration='1000' data-aos-delay='300'";
        elseif($animI == 2):
            $animacaoImagem = "data-aos='fade-down' data-aos-duration='1000' data-aos-delay='300'";
            elseif($animI == 3):
                $animacaoImagem = "data-aos='fade-left' data-aos-duration='1000' data-aos-delay='300'";
                elseif($animI == 4):
                    $animacaoImagem = "data-aos='fade-right' data-aos-duration='1000' data-aos-delay='300'";
                endif;

?>

<section class="secaoTextoVideoNovo <?php echo $classe; ?> <?php echo $parallax; ?> "
  style="position: relative; <?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>


  <div class="container">

    <div class="row align-items-center" style="flex-direction: <?php echo $direction; ?>">
      <div class="col-12">
        <div class="header-secao center">

            <?php if($sub_titulo): ?>
                <h3 class="sub-titulo"><?php echo $sub_titulo; ?></h3>
            <?php endif; ?>

            <?php if($titulo): ?>
                <h2 class="titulo"><?php echo $titulo; ?></h2>
            <?php endif; ?>

            <p>A Plataforma Digital Jetro é um ERP de última geração que possibilita a Transformação Digital e a Maturidade Digital, indo além do tradicional ERP, proporcionando uma gama de funcionalidades tecnológicas, boas práticas de gestão, processos operacionais bem definidos e ferramentas dinâmicas para tomada de decisões estratégicas.</p>
        </div>

        <!-- Vídeos Externos -->

          <div class="videos-grid">

            <?php if($add_video_interno): ?>
              
              <div class="video">
                <video width="560" height="315" altoplay controls>
                  <source src="<?php echo $video_unico; ?>" type="video/mp4">
                </video>
              </div>
           

            <?php else: ?>
              
              <div class="video">
                <?php echo $iframe; ?>
              </div>
              
            <?php endif; ?>
              
          </div>
          



        <!-- Vídeos Internos -->
        

      </div>
     
    </div>
  </div>
</section>