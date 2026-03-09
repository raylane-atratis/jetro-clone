<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";


$classe = get_sub_field('class');

?>

<section class="secao_texto <?php echo $classe; ?>  <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>"
    <?php echo $animacao; ?>>
    <div class="container">
        <div class="row">
            <?php if (get_sub_field('titulo')) { ?>

            <div class="col-12">
                <div class="section_title">
                    <h2><?php the_sub_field('titulo'); ?></h2>
                </div>
            </div>

            <?php } ?>
        </div>

        <div class="row">

            <?php
        $largura = 12;
        if (get_sub_field('colunas') == 2) {
          $largura = 6;
        } else if (get_sub_field('colunas') == 3) {
          $largura = 4;
        }
      ?>

            <div class="col-lg-<?php echo $largura; ?>">
                <p>

                    <?php the_sub_field('coluna_1'); ?>
                </p>
            </div>

            <?php if (get_sub_field('colunas') == 2 || get_sub_field('colunas') == 3) { ?>

            <div class="col-md-<?php echo $largura; ?>">
                <p>

                    <?php the_sub_field('coluna_2'); ?>
                </p>
            </div>

            <?php } ?>

            <?php if (get_sub_field('colunas') == 3) { ?>

            <div class="col-md-<?php echo $largura; ?>">
                <p>
                    <?php the_sub_field('coluna_3'); ?>
                </p>
            </div>

            <?php } ?>

        </div>
    </div>
</section>