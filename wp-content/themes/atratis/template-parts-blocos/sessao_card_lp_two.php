<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";


$classe = get_sub_field('class');
$titulo = get_sub_field('titulo');
$cards = get_sub_field('cards');

$btn_link = get_sub_field('btn_link');
$btn_texto = get_sub_field('btn_texto');

?>

<section class="sessao_card_lp_two <?php echo $classe; ?>  <?php echo $parallax; ?> "
    style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    <div class="container">

        <div class="header-secao" style="margin-bottom: 40px;">
            <?php if($titulo): ?>
            <h2 class="titulo" style="max-width: 463px;"><?php echo $titulo; ?></h2>
            <?php endif; ?>
        </div>

        <div class="make-easy-item">
            <div class="owl-sessao-card-lp owl-carousel owl-theme">
            <?php foreach($cards as $card){
                    ?>
                <div class="item">
                    <img src="<?php echo $card['icon_img']['url'];?>" alt="<?php echo $card['icon_img']['alt'];?>">
                    <?php echo $card['conteudo'];?>
                </div>
                <?php
                }?>
            </div>
        </div>

        <div class="btn-container">
            <a id="link-lp-two" href="<?php echo $btn_link;?>"><?php echo $btn_texto;?></a>
        </div>


    </div>
</section>