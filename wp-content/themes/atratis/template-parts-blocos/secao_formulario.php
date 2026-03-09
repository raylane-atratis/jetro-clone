<?php
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

$detalhe_meio = get_sub_field('detalhe_meio');
$classeExtra = $detalhe_meio ? 'com-detalhe' : '';
$imagem_esquerda = get_sub_field('imagem_esquerda');
$shortcode_formulario = get_sub_field('shortcode_formulario');
?>


<section class="secao secao-formulario <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>"
    <?php echo $animacao; ?>>
    <div class="container">
        <div class="card-laranja">
            <div class="img-laptop move-1">
                <img src="<?php echo bloginfo( "template_url" ); ?>/build/images/laptop-rosa.png" alt="">
            </div>
            <div class="row">
                <div class="col-12 col-lg-5 imagem">
                    <img src="<?php echo $imagem_esquerda['url']; ?>" alt="">
                </div>
                <div class="col-12 col-lg-7 formulario <?php echo $classeExtra; ?>">
                    <?php if($detalhe_meio): ?>
                    <div class="detalhe-meio">
                        <img src="<?php echo bloginfo( "template_url" ); ?>/build/images/detalhe-form.png" alt="">
                    </div>
                    <?php endif; ?>
                    <?php echo do_shortcode( $shortcode_formulario ); ?>
                </div>
            </div>
        </div>
    </div>
</section>