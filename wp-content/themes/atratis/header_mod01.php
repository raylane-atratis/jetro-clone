<header class="desktop menupc">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between flex-wrap">

                    <a href="<?php echo get_home_url(); ?>">
                        <?php if (is_front_page()) : ?>
                        <h1>
                            <img src="<?php echo $logoUrl; ?>" alt="<?php echo $h1Home; ?>"
                                title="<?php echo $h1Home; ?>">
                        </h1>
                        <?php else : ?>
                        <img src="<?php echo $logoUrl; ?>" alt="<?php echo $logoAlt; ?>"
                            title="<?php echo $logoTitle; ?>">
                        <?php endif; ?>
                    </a>

                    <nav class="navbar navbar-expand-md">
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <?php
                            wp_nav_menu([
                                'menu'            => 'Menu Principal',
                                'theme_location'  => 'principal',
                                'container'       => 'div',
                                'container_id'    => 'bs4navbar',
                                'container_class' => 'collapse navbar-collapse',
                                'menu_id'         => false,
                                'menu_class'      => 'navbar-nav mr-auto',
                                'depth'           => 10,
                                'fallback_cb'     => 'bs4navwalker::fallback',
                                'walker'          => new bs4navwalker()
                            ]);
                            ?>
                        </div>
                    </nav>

                    <?php
                    if (have_rows('botoes_cta', "option")) :
                        while (have_rows('botoes_cta', "option")) : the_row();
                            $icone = get_sub_field('icone_do_botao');
                            $botaoTexto = get_sub_field('botao_texto');
                            $botaoCor = get_sub_field('botao_cor');
                            $botaoLink = get_sub_field('botao_link');
                            $novaAba = get_sub_field('abrir_outra_aba');
                            $posicaoCTA = get_sub_field('posicao_do_icone');

                            if ($botaoCor) :
                                $botaoCor = " background-color: " . $botaoCor . "; ";
                            else :
                                $botaoCor = "";
                            endif;

                            if ($novaAba) :
                                $novaAba = " target='_blank' ";
                            else :
                                $novaAba = "";
                            endif;


                    ?>
                    <div class="links">
                        <a href="<?php echo $botaoLink; ?>" class="bt__padrao" style="<?php echo $botaoCor; ?>"
                            <?php echo $novaAba; ?>>
                            <?php if ($posicaoCTA == 0) : ?>
                            <?php // echo $icone; ?>
                            <?php echo $botaoTexto; ?>
                            <?php else : ?>
                            <?php echo $botaoTexto; ?>
                            <?php // echo $icone; ?>
                            <?php endif; ?>
                        </a>
                        <div class="dropdown show">
                            <a class=" bt__padrao dropdown-toggle" style="<?php echo $botaoCor; ?>" href="#"
                                role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                Área do Cliente
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php 
                                        $dropdown_cliente = get_field('dropdown_cliente', 'option');

                                        foreach ($dropdown_cliente as $item) :
                                            $texto = $item['texto'];
                                            $link_externo = $item['link_externo'];
                                            $shortcode = $item['shortcode'];
                                            $shortcode = "[placeholder Formulario]";


                                                   ?>
                                <a class="dropdown-item" <?php if($link_externo) : ?>
                                    href="<?php echo $link_externo; ?>" target="_blank" <?php else:?>
                                    onclick="abrirVideo('<?php echo $shortcode; ?>', '<?php echo $texto?>')"
                                    <?php endif; ?>>
                                    <?php echo $texto; ?>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;
                    endif; ?>

                </div>
            </div>
        </div>
    </div>
</header>