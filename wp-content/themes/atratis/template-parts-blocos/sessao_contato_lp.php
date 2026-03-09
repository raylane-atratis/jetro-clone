<?php
    $titulo = get_sub_field('titulo');
	$conteudo = get_sub_field('conteudo');

    $form = get_sub_field('shotcode_cf7');
?>

<section class="contato-page-lp" id="formulario-contato">

        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-4" data-aos="zoom-in" data-aos-duration="3000">
                  <h2><?php echo $titulo;?></h2>
                  <p class="description-contact"><?php echo $conteudo;?></p>

                </div>

                <div class="col-12 col-lg-8">

                    <div class="formx">

                        <?php //Formulário de contato 
								?>
                       
                        <?php if ($form) : ?>
                        <?php echo do_shortcode('' . $form . ''); ?>
                        <?php endif; ?>

                    </div>

                </div>

            </div>
        </div>

    </section>