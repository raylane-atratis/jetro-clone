<div class="col-12 col-lg-4">
  <a class="logope" href="<?php echo get_home_url(); ?>">
    <?php 
            $logoRodape = get_field('logo_rodape', "option");
            $urlLogo = $logoRodape['url'];
            $titleLogo = $logoRodape['title'];
            $altLogo = $logoRodape['alt'];
            ?>
    <?php if($logoRodape): ?>
    <img src="<?php echo $urlLogo; ?>" alt="<?php echo $altLogo; ?>" title="<?php echo $titleLogo; ?>">
    <?php endif; ?>
  </a>
  <div class="endereco">
    <?php $endereco = get_field('endereco', "option"); ?>
    <?php echo $endereco; ?>
  </div>
</div>