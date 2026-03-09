<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

$bg = get_sub_field('background');
$titulo = get_sub_field('titulo');
$texto = get_sub_field('texto');
$texto_cta = get_sub_field('texto_cta');
$link_cta = get_sub_field('link_cta');

?>

<section class="secao_mini_banner <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="box" style="background-image: url(<?php echo $bg; ?>)">
          <div class="content">
            <h3><?php echo $titulo; ?></h3>
            <div class="texto">
              <?php echo $texto; ?>
            </div>
            <?php if ($texto_cta && $link_cta) { ?>
              <a href="<?php echo $link_cta; ?>" class="bt__padrao">
                <?php echo $texto_cta; ?>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
