<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";


$classe = get_sub_field('class');

?>

<section class="secao-linha <?php echo $classe; ?>  <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>"
    <?php echo $animacao; ?>>
    <div class="container">
        <div class="linha"></div>
    </div>
</section>