<div class="col-12 col-lg-4">
    <div class="item" data-aos="fade-up" data-aos-duration="1000"  data-aos-delay="300" style="display: flex;justify-content: center;">
        <?php $endereco = get_field('endereco', "option"); ?>
        <?php if($endereco): ?>
        <h4>Endereços</h4>
        <address>
            <?php echo $endereco; ?>
        </address>
        <?php endif; ?>
            
        <?php if( have_rows('redes_sociais', "option") ): ?>
        <div class="social">
            <?php while( have_rows('redes_sociais', "option") ): the_row(); 
                $icone = get_sub_field('icone_rede_social');
                $link_rede = get_sub_field('link_rede_social'); ?>

                <a href="<?php echo $link_rede; ?>">
                    <?php echo $icone; ?>
                </a>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>

    </div>
</div>