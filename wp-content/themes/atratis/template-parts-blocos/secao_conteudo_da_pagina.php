<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

$post = get_sub_field('pagina');

?>

<section class="secao_conteudo_pagina <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php echo $post[0]->post_content; ?>
      </div>
    </div>
  </div>
</section>