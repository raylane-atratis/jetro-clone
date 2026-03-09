<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";
$sub_titulo = get_sub_field('sub_titulo');
$titulo = get_sub_field('titulo');
$texto = get_sub_field('texto');
$imagens = get_sub_field('imagens');
$texto_botao = get_sub_field('texto_botao');
$link_botao = get_sub_field('link_botao');
$aba = get_sub_field('aba') ? "target='_blank'" : "";

$classe = get_sub_field('class');

?>



<section class="secao servicosBloco <?php echo $classe; ?>  <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>"
    <?php echo $animacao; ?>>
    <div class="container">
        <div class="row">

            <div class="col-lg-6">

                <div class="boxOwl">
                    <div class="owl-servicos owl-carousel owl-theme">

                        <?php foreach($imagens as $imagem): ?>
                        <div class="item">
                            <img src="<?php echo $imagem["imagem"]['url']; ?>"
                                alt="<?php echo $imagem["imagem"]['alt']; ?>">
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="titulo texto-secao">
                    <div class="header-secao">
                        <?php if($sub_titulo): ?>
                        <h3 class="sub-titulo"><?php echo $sub_titulo; ?></h3>
                        <?php endif; ?>

                        <?php if($titulo): ?>
                        <h2 class="titulo"><?php echo $titulo; ?></h2>
                        <?php endif; ?>
                    </div>

                    <?php echo $texto; ?>

                    <?php if($link_botao): ?>
                    <a href="<?php echo $link_botao; ?>" <?php echo $aba; ?> class="bt__padrao">
                        <?php echo $texto_botao ? $texto_botao : "Saiba mais"; ?>
                    </a>
                    <?php endif; ?>

                </div>

            </div>

            <div class="col-12">
                <hr>
            </div>

        </div>
    </div>
</section>