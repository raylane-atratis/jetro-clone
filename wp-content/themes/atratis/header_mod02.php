<header class="m2 desktop">
    <?php // Campos Extrar - Header 02
        $headerMod02 = get_field('modelo_topo02', "option");

        // Exibição
        $exibirSocial = $headerMod02['exibir_redes_sociais'];
        $exibirLinkExterno = $headerMod02['exibir_link_externo'];
        $exibirTelefone = $headerMod02['exibir_telefone'];

        // Link Externo        
        $linkIcone = $headerMod02['link_externo_icone'];
        $linkNome = $headerMod02['link_externo_nome'];
        $linkArea = $headerMod02['link_externo_area_cliente'];

        // Telefone
        $tituloTelefone = $headerMod02['titulo_telefone'];
        $telefoneTexto = $headerMod02['telefone'];

        $telefone = str_replace(' ','', $telefoneTexto );
        $telefone = str_replace(',','', $telefone );
        $telefone = str_replace('-','', $telefone );
        $telefone = str_replace('.','', $telefone );
        $telefone = str_replace('(','', $telefone );
        $telefone = str_replace(')','', $telefone );
        $telefone = str_replace('+','', $telefone );
    ?>
    <style>
    .p-m2 {
        padding-top: 153px;
    }

    @media (max-width: 992px) {
        .p-m2 {
            padding-top: 60px;
        }
    }



    .m2 {
        padding: 0;
    }

    .m2 .topo_ {
        padding: 15px 0 10px;
        border-bottom: 1px solid #ccc;
    }

    .m2 .telefone p {
        margin: 0;
        line-height: 20px;
        text-align: center;
    }

    .m2 .telefone p a {
        margin: 0;
        display: block;
        font-size: 23px;
        font-weight: bold;
        color: #ff8100;
    }

    .m2 .social {
        height: 50px;
        padding: 12px 0 15px 0;
    }

    .m2 .social a {
        padding: 0 5px 0 0;
        font-size: 20px;
        color: #5d5d61;
    }

    .m2 .social a i {
        padding: 0 5px 0 0;
        font-size: 20px;
        color: #5d5d61;
    }

    .m2 .area {
        height: 50px;
        padding: 16px 0 15px 35px;
        margin-left: 30px;
        border-left: 1px solid #eae9ea;
    }

    .m2 .area a {
        padding: 0;
        font-size: 16px;
        color: #5d5d61;
        font-weight: bold;
    }

    .m2 .area a i {
        padding: 0 5px 0 0;
        font-size: 20px;
        color: #5d5d61;
    }

    .m2 .telefone {
        height: 50px;

        padding: 5px 0 15px 30px;
        margin-left: 30px;
        border-left: 1px solid #eae9ea;
    }

    .m2 ul {
        padding: 15px 0;
        margin-left: 0;
    }

    .bt__padrao {
        border-radius: 50px;
        height: 44px;
        padding: 11px 30px 0;
    }

    .links {
        margin-left: 20px;
    }
    </style>

    <div class="topo_">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">

                        <a href="<?php echo get_home_url(); ?>">
                            <?php if(is_front_page()): ?>
                            <h1>
                                <img src="<?php echo $logoUrl; ?>" alt="<?php echo $h1Home; ?>"
                                    title="<?php echo $h1Home; ?>">
                            </h1>
                            <?php else: ?>
                            <img src="<?php echo $logoUrl; ?>" alt="<?php echo $logoAlt; ?>"
                                title="<?php echo $logoTitle; ?>">
                            <?php endif; ?>
                        </a>

                        <div class="d-flex align-items-center justify-content-between flex-wrap">

                            <?php if($exibirSocial == true): // Se for para exibir as Redes Sociais faça ?>
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
                            <?php endif; ?>

                            <a data-toggle="tooltip" data-placement="bottom" title="Pesquisar" href="#"
                                class="busca_bt abrir_pesquisa"><i class="fa fa-search"></i></a>


                            <?php if($exibirLinkExterno == true): ?>
                            <?php if($linkArea['url']): ?>
                            <div class="area">
                                <a href="<?php echo $linkArea['url']; ?>"
                                    <?php if($linkArea['target']): echo "target='_blank'"; endif; ?>>
                                    <?php echo $linkIcone; ?>
                                    <?php echo $linkNome; ?>
                                </a>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>



                            <?php if($exibirTelefone == true): ?>
                            <?php if($telefoneTexto): ?>
                            <div class="telefone">
                                <p>
                                    <?php echo $tituloTelefone; ?>
                                    <a href="tel:<?php echo $telefone; ?>"
                                        target="_blank"><?php echo $telefoneTexto; ?></a>
                                </p>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
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
                                'depth'           => 20,
                                'fallback_cb'     => 'bs4navwalker::fallback',
                                'walker'          => new bs4navwalker()
                            ]);

                            
                            ?>
                        </div>
                    </nav>


                    <div class="d-flex">
                        <?php 
						if( have_rows('botoes_cta', "option") ):
						while( have_rows('botoes_cta', "option") ): the_row(); 
							$icone = get_sub_field('icone_do_botao');
							$botaoTexto = get_sub_field('botao_texto');
							$botaoCor = get_sub_field('botao_cor');
							$botaoLink = get_sub_field('botao_link');
                            $novaAba = get_sub_field('abrir_outra_aba');
                            $posicaoCTA = get_sub_field('posicao_do_icone');

							if($botaoCor):
								$botaoCor = " background-color: " . $botaoCor . "; ";
							else:
								$botaoCor = "";
							endif;

							if($novaAba):
								$novaAba = " target='_blank' ";
							else:
								$novaAba = "";
							endif;

							
						?>
                        <div class="links">
                            <a href="<?php echo $botaoLink; ?>" class="bt__padrao" style="<?php echo $botaoCor; ?>"
                                <?php echo $novaAba; ?>>
                                <?php if($posicaoCTA == 0): ?>
                                <?php echo $icone; ?>
                                <?php echo $botaoTexto; ?>
                                <?php else: ?>
                                <?php echo $botaoTexto; ?>
                                <?php echo $icone; ?>
                                <?php endif; ?>
                            </a>
                        </div>
                        <?php endwhile; endif; ?>


                    </div>


                </div>
            </div>

        </div>
    </div>

</header>