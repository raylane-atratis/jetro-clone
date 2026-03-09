<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";


$classe = get_sub_field('class');
$titulo = get_sub_field('titulo');
$cards = get_sub_field('cards');

?>

<section class="secao-valores valores <?php echo $classe; ?>  <?php echo $parallax; ?> "
    style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    <div class="container">

        <div class="header-secao" style="margin-bottom: 40px;">
            <?php if($titulo): ?>
            <h2 class="titulo" style="max-width: 463px;"><?php echo $titulo; ?></h2>
            <?php endif; ?>
        </div>
        <div class="make-easy-item">
            <?php foreach($cards as $pos => $card): ?>
            <?php 
            $card_titulo = $card["titulo"];
            $texto = $card["texto"];
            ?>
            <div class="item">
                <?php if($pos == 0): ?>
                <img src="<?php echo bloginfo("template_url"); ?>/build/images/missao.png" alt="missão">
                <?php elseif($pos == 1): ?>
                <img src="<?php echo bloginfo("template_url"); ?>/build/images/visao.png" alt="visão">
                <?php else: ?>
                <img src="<?php echo bloginfo("template_url"); ?>/build/images/valores.png" alt="valores">
                <?php endif; ?>
                <h3>
                    <?php echo $card_titulo; ?>
                </h3>
                <p>
                    <?php echo $texto; ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>