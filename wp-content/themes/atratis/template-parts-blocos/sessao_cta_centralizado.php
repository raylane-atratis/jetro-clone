<?php
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

$btnNome = get_sub_field('nome_btn');
$btnLink = get_sub_field('link_btn');
$btnAba = get_sub_field('nova_aba');

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <section class="linha_cta card-laranja <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>"
                <?php echo $animacao; ?>>

                <h2 style="<?php echo $corFonte; ?>"><?php echo get_sub_field('titulo', "option"); ?></h2>
                <p style="<?php echo $corFonte; ?>"><?php echo get_sub_field('subtitulo', "option"); ?></p>

                <div class="divisao">

                    <?php if (get_sub_field('utilizar_linha')) : ?>
                    <hr><?php endif; ?>

                    <!-- <a href="#" class="bt__padrao m-auto">Ligamos para você</a> -->

                    <a href="

                        <?php
                        // Link do Banner
                        if ($btnLink) :
                            echo $btnLink;
                        else :
                            echo "#";
                        endif;
                        ?>" <?php
                            // Nova Aba
                            if ($btnAba == true) :
                                echo "target='_blank'";
                            else :
                                echo "";
                            endif;
                            ?> class="bt__padrao m-auto">

                        <?php if ($btnNome) : ?>
                        <?php echo $btnNome; ?>
                        <?php else : ?>
                        Ligamos para você
                        <?php endif; ?>

                    </a>

                </div>
                <div class="detalhe-meio">
                    <img src="<?php echo bloginfo( "template_url" ); ?>/build/images/detalhe-form.png" alt="">
                </div>
            </section>

        </div>
    </div>
</div>