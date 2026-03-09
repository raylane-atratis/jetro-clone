<?php 

    // Campos da sessão
    $email = get_sub_field('email');
    $endereco = get_sub_field('endereco');
    $linkMapa = get_sub_field('link_mapa');

    $telefone = get_sub_field('telefone');
    // Caracteres
    $chars = array('(',')',' ','.','-');

    // Telefones tratados
    $telT = str_replace($chars, "", $telefone);

?>

<section class="contato-page">
    <div class="container">
        <div class="row mt-5">
                        
            <div class="col-12 col-lg-6">
                <div class="box_">
                    <?php if($telefone): ?>
                        <a class="tel" href="tel:<?php echo $telT; ?>"><i class="fas fa-phone"></i><?php echo $telefone; ?></a>
                    <?php endif; ?>

                    <?php if($email): ?>
                    <a class="mail" href="mailto:<?php echo $email; ?>"><i class="fas fa-envelope"></i> <?php echo $email; ?></a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="box_ center">
                    <i class="fas fa-map-marker-alt"></i>
                    
                    <?php if($endereco): ?>
                        <address><?php echo $endereco; ?></address>
                    <?php endif; ?>

                    <?php if($linkMapa): ?>
                        <a href="<?php echo $linkMapa; ?>" target="_blank" class="mapa_l">Ver no mapa</a>
                    <?php endif; ?>
                    
                </div>
            </div>

        </div>
    </div>
</div>