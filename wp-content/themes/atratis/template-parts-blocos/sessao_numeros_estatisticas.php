<?php
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

$titulo = get_sub_field('titulo');
$descricao = get_sub_field('descricao');
$textoBotao = get_sub_field('texto_botao');
$linkBotao = get_sub_field('link_botao');
$aba = get_sub_field('aba') ? "target='_blank'" : "";
$imagem_meio = get_sub_field('imagem_meio');
$cesta_no_topo = get_sub_field('cesta_no_topo');


/////////////////////////////////////////////////////////

// $modeloS = get_sub_field('modelo_solucoes', "option");

?>

<section class="numeroz <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>




  <div class="container">
    <?php if ($cesta_no_topo) : ?>
    <img src="<?php echo bloginfo("template_url"); ?>/build/images/cesto.png" alt="caixa"
      class="caixaFlutuante4 move-1">
    <?php endif; ?>
    <div class="row">
      <div class="col-lg-3">
        <div class="titulo">
          <span>Números</span>
          <h2><?php echo $titulo; ?></h2>
          <p>
            <?php echo $descricao; ?>
          </p>
          <?php if($linkBotao): ?>
          <a href="<?php echo $linkBotao; ?>" <?php echo $aba; ?> class="bt__padrao">
            <?php echo $textoBotao; ?>
          </a>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="foto">
          <img src="
                    <?php echo $imagem_meio['url']; ?>
                    " alt="Moça">
        </div>
      </div>
      <div class="col-lg-6">
        <ul class="gridzon">
          <?php $cont = 0; ?>
          <?php if (have_rows('bloco_numeros')) : ?>
          <?php
                        while (have_rows('bloco_numeros')) : the_row();
                            $preNumero = get_sub_field('pre_numero');
                            $posNumero = get_sub_field('pos_numero');
                            $numero = get_sub_field('numero');
                            $tituloNumero = get_sub_field('titulo_numero');
                            $descricao = get_sub_field('descricao');
                        ?>


          <li class="item">
            <style>
            .numeroz .imagem .bloco<?php echo $cont . " ";

            ?>.numero::before {
              content: "<?php echo $preNumero; ?>";
            }

            .numeroz .imagem .bloco<?php echo $cont . " ";

            ?>.numero::after {
              content: "<?php echo $posNumero; ?>";
            }
            </style>
            <div class="imagem">
              <div class="bloco<?php echo $cont; ?>">
                <span class="numero numero-info sinal_diferente_5"><?php echo $numero; ?></span>
              </div>
            </div>
            <?php if ($tituloNumero) : ?>
            <h4><?php echo $tituloNumero; ?></h4>
            <?php endif; ?>
            <?php if($descricao): ?>
            <p>
              <?php echo $descricao; ?>
            </p>
            <?php endif; ?>
          </li>

          <?php $cont++;
                        endwhile; ?>
          <?php endif; ?>

        </ul>
      </div>
    </div>
  </div>
</section>