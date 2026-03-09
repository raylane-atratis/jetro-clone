<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

// Variáveis
$titulo = get_sub_field('titulo');
$conteudo = get_sub_field('conteudo');

// Botão
$nomeBtn = get_sub_field('nome_botao');
$corBtn = get_sub_field('cor_do_botao');
$link = get_sub_field('link_btn');
$novaAba = get_sub_field('nova_aba');

?>
<div class="cta_paralax <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    <div class="texto" data-aos="fade-up" data-aos-duration="1000"  data-aos-delay="300" style="<?php echo $corFonte; ?>">
        <h2 style="<?php echo $corFonte; ?>"><?php echo $titulo; ?></h2>
        <?php echo $conteudo; ?>

        <?php if($link): ?>
        <a href="<?php echo $link; ?>" class="bt__padrao" style="background-color: <?php echo $corBtn; ?>" <?php if($novaAba): echo "target='_blank'"; endif; ?> ><?php echo $nomeBtn; ?></a>
        <?php endif; ?>

    </div>
</div>