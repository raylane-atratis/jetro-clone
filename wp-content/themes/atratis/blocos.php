<?php // Chamadas dos blocos ?>

<?php 
    if(is_front_page()):
        $lugar = "option";    
    elseif(is_archive("plataforma-digital")):
        $page = get_page_by_path( 'plataforma-digital' );
        $lugar = $page->ID;
    else: 
        $lugar = "";
     endif;
    ?>

<?php if( have_rows('blocos_home', $lugar) ): ?>
<?php while( have_rows('blocos_home', $lugar) ): the_row();  ?>
<?php 

            // Verificando Layout de Soluções
            if(get_row_layout() == 'secao_segmentos' && get_sub_field('exibir') ): 
                get_template_part('template-parts-blocos/secao_segmentos'); 
                
            // Verificando Layout Sessão CTA Centralizado
            elseif(get_row_layout() == 'sessao_cta_centralizado' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/sessao_cta_centralizado'); 
            
            elseif(get_row_layout() == 'secao_mvv' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/secao_mvv'); 
            
            elseif(get_row_layout() == 'secao_de_cases' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/secao_de_cases');
            
            elseif(get_row_layout() == 'sessao_contato_lp' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/sessao_contato_lp'); 

            elseif(get_row_layout() == 'sessao_card_lp_one' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/sessao_card_lp_one'); 
            
            elseif(get_row_layout() == 'sessao_card_lp_two' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/sessao_card_lp_two'); 

            elseif(get_row_layout() == 'sessao_perguntas_frequentes' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/sessao_perguntas_frequentes');

            elseif(get_row_layout() == 'secao_linha' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/secao_linha'); 
            
            elseif(get_row_layout() == 'secao_trilhas' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/secao_trilhas'); 

            // Verificando Layout Texto + Imagem
            elseif(get_row_layout() == 'sessao_texto_imagem' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/sessao_texto_imagem');
            
            // Verificando Layout Texto + Vídeo
            elseif(get_row_layout() == 'sessao_texto_video' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/sessao_texto_video');

            // Verificando Layout Depoimentos
            elseif(get_row_layout() == 'sessao_depoimentos' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/sessao_depoimentos'); 

            // Verificando Layout Blog
            elseif(get_row_layout() == 'sessao_blog' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/sessao_blog'); 

            // Verificando Layout de Logos
            elseif(get_row_layout() == 'sessao_logos' && get_sub_field('exibir') ):
                get_template_part('template-parts-blocos/sessao_logos');

            // Verificando Carousel de imagens + Link
            elseif(get_row_layout() == 'carousel_imagem_link' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/sessao_carousel_imagem_link'); 

            // Verificando Layout Blog
            elseif(get_row_layout() == 'sessao_contato_endereco' ):
                get_template_part('template-parts-blocos/sessao_contato_endereco'); 

            // Verificando Carousel de imagens + Link
            elseif(get_row_layout() == 'sessao_banner_publicidade_central' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/sessao_banner_publicidade_central'); 

            // Verificando Background Full + Texto
            elseif(get_row_layout() == 'sessao_full_background_texto' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/sessao_full_background_texto'); 

            // Verificando Layout Mídias
            elseif(get_row_layout() == 'sessao_de_midias' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/sessao_de_midias'); 

            // Verificando Layout de números e estatísticas
            elseif(get_row_layout() == 'sessao_numeros_estatisticas' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/sessao_numeros_estatisticas'); 
                
            // Verificando Layout de opções de planos
            elseif(get_row_layout() == 'sessao_opcoesplanos' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/sessao_opcoesplanos'); 
            
            // Verificando Layout de mini banner
            elseif(get_row_layout() == 'secao_mini_banner'):
                get_template_part('template-parts-blocos/secao_mini_banner'); 
            
            // Verificando Layout de Texto
            elseif(get_row_layout() == 'secao_texto'):
                get_template_part('template-parts-blocos/secao_texto'); 

            // Verificando Layout de Texto
            elseif(get_row_layout() == 'secao_galeria_texto'):
                get_template_part('template-parts-blocos/secao_galeria_texto');
                 
            // Verificando Layout de Texto
            elseif(get_row_layout() == 'secao_cards_com_links'):
                get_template_part('template-parts-blocos/secao_cards_com_links'); 
            
            elseif(get_row_layout() == 'secao_formulario'):
                get_template_part('template-parts-blocos/secao_formulario'); 
            
            // Verificando Layout de opções de planos
            elseif(get_row_layout() == 'secao_conteudo_da_pagina' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/secao_conteudo_da_pagina'); 

            elseif(get_row_layout() == 'secao_planos_vantagens' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/secao_planos_vantagens');

            elseif(get_row_layout() == 'sessao_tabela_vantagens' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/sessao_tabela_vantagens');

            elseif(get_row_layout() == 'sessao_texto_video_novo' && get_sub_field('exibir')):
                get_template_part('template-parts-blocos/sessao_texto_video_novo');

            elseif(get_row_layout() == 'texto_imagem_maior'):
                get_template_part('template-parts-blocos/texto_imagem_maior');

                
            endif;
            
        ?>
<?php endwhile; ?>
<?php endif; // Fim Blocos de Layout ?>