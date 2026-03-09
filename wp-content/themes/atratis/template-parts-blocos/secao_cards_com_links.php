<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";


$classe = get_sub_field('class');
$secao_cards_com_links = get_sub_field('secao_cards_com_links');
$sub_titulo = get_sub_field('sub_titulo');
$titulo = get_sub_field('titulo');
$cards = get_sub_field('cards');


?>

<section class="evoluaBloco center <?php echo $classe; ?>  <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>"
    <?php echo $animacao; ?>>
    <div class="container">
        <div class="row">
            <div class="header-secao center">
                <?php if($sub_titulo): ?>
                <h3 class="sub-titulo"><?php echo $sub_titulo; ?></h3>
                <?php endif; ?>

                <?php if($titulo): ?>
                <h2 class="titulo"><?php echo $titulo; ?></h2>
                <?php endif; ?>
            </div>
        </div>
        <div class="itens">
            <?php foreach($cards as $card): 
            $link = $card['link'];
            $imagem = $card['imagem'];
            $titulo = $card['titulo'];
            $aba = $card['aba'] ? "target='_blank'" : "";
            ?>
            <a href="<?php echo $link; ?>" <?php echo $aba; ?>>
                <i class="fa-solid fa-arrow-up"></i>
                <p><?php echo $titulo; ?></p>
                <img src="<?php echo $imagem['url']; ?>" alt="<?php echo $imagem['alt']; ?>">
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
</section>