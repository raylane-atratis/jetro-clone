<div class="col-12 col-lg-3 redes-sociais">
  <div class="item">
    <?php if( have_rows('redes_sociais', "option") ): ?>
    <div class="social">
      <h4>Redes Jetro</h4>
      <?php while( have_rows('redes_sociais', "option") ): the_row(); 
                $icone = get_sub_field('icone_rede_social');
                $link_rede = get_sub_field('link_rede_social'); ?>

      <a href="<?php echo $link_rede; ?>">
        <?php echo $icone; ?>
      </a>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
    <div class="contato">
      <h4>Contato</h4>
      <?php 
      $whatsapp_para_contato = get_field('whatsapp_para_contato', "option");
      $link_whatsapp = get_field('link_whatsapp', "option");
      ?>
      <a href="<?php echo $link_whatsapp; ?>">
        <?php echo $whatsapp_para_contato; ?>
      </a>
    </div>



  </div>
</div>