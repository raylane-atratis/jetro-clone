<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

$posicao = get_sub_field('posicao_conteudo');
$animC = get_sub_field('escolha_animacao_conteudo');
$animI = get_sub_field('escolha_animacao_imagem');
$classe = get_sub_field('classe');



// [ANIMAÇÃO CONTEÚDO]
if($animC == 0):
    $animacaoConteudo = "";
    elseif($animC == 1):
        $animacaoConteudo = "data-aos='fade-up' data-aos-duration='1000' data-aos-delay='300'";
        elseif($animC == 2):
            $animacaoConteudo = "data-aos='fade-down' data-aos-duration='1000' data-aos-delay='300'";
            elseif($animC == 3):
                $animacaoConteudo = "data-aos='fade-left' data-aos-duration='1000' data-aos-delay='300'";
                elseif($animC == 4):
                    $animacaoConteudo = "data-aos='fade-right' data-aos-duration='1000' data-aos-delay='300'";
                endif;

// [ANIMAÇÃO IMAGEM]
if($animI == 0):
    $animacaoImagem = "";
    elseif($animI == 1):
        $animacaoImagem = "data-aos='fade-up' data-aos-duration='1000' data-aos-delay='300'";
        elseif($animI == 2):
            $animacaoImagem = "data-aos='fade-down' data-aos-duration='1000' data-aos-delay='300'";
            elseif($animI == 3):
                $animacaoImagem = "data-aos='fade-left' data-aos-duration='1000' data-aos-delay='300'";
                elseif($animI == 4):
                    $animacaoImagem = "data-aos='fade-right' data-aos-duration='1000' data-aos-delay='300'";
                endif;
    
    
    $titulo_do_botao = get_sub_field('titulo_do_botao');
?>

<section class="sessaoTabelaVantagens <?php echo $classe; ?> <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>"
    <?php echo $animacao; ?>>

    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="title">
                    <a id="btn-comparacao-planos">
                        <?php echo $titulo_do_botao;?> 
                        <svg width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 2.25146L8.25157 9.13731L15.1374 1.88574" stroke="#FF6E00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-lg-12">

                <div class="borda-tabela "><!-- is-hidden -->
                    <div class="tabela-funcionalidades">
                        <div class="tabela-scroll-wrapper">
                        <div class="cabecalho-global-tabela">
                            <div class="col-funcionalidades">Funcionalidades</div>
                            <div class="col-gold">Gold</div>
                            <div class="col-premium">Premium</div>
                            <div class="col-platinum">Platinum</div>
                        </div>

                        <?php 
                        $planos = array(
                            'gold' => get_page_by_path('gold', OBJECT, 'planos-precos'),
                            'premium' => get_page_by_path('premium', OBJECT, 'planos-precos'),
                            'platinum' => get_page_by_path('platinum', OBJECT, 'planos-precos'),
                        );

                        $categorias_pai = get_terms([
                            'taxonomy' => 'vantagens-jetro',
                            'parent' => 0,
                            'orderby' => 'term_order',
                            'order' => 'DESC',
                            'hide_empty' => false,
                        ]);
                        ?>

                        <?php foreach ($categorias_pai as $categoria_pai) : ?>
                            <div class="grupo">
                            <button class="grupo-toggle grupo-azul">
                                <?php echo esc_html($categoria_pai->name); ?>
                                <svg width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 2.25146L8.25157 9.13731L15.1374 1.88574" stroke="#FF6E00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>

                            <div class="grupo-conteudo">
                                <?php
                                $subcategorias = get_terms([
                                'taxonomy' => 'vantagens-jetro',
                                'parent' => $categoria_pai->term_id,
                                'orderby' => 'term_order',
                                'order' => 'ASC',
                                'hide_empty' => false,
                                ]);
                                ?>

                                <?php foreach ($subcategorias as $subcategoria) : ?>
                                <div class="subgrupo">
                                    <button class="subgrupo-toggle grupo-laranja">
                                    <?php echo esc_html($subcategoria->name); ?>
                                    <svg width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 2.25146L8.25157 9.13731L15.1374 1.88574" stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    </button>

                                    <div class="subgrupo-conteudo">
                                    <table>
                                        <tbody>
                                        <?php
                                        $subcategorias_neta = get_terms([
                                            'taxonomy' => 'vantagens-jetro',
                                            'parent' => $subcategoria->term_id,
                                            'orderby' => 'term_order',
                                            'order' => 'ASC',
                                            'hide_empty' => false,
                                        ]);

                                        foreach ($subcategorias_neta as $subcategoria_neta) :
                                            $categorias_bisnetas = get_terms([
                                            'taxonomy' => 'vantagens-jetro',
                                            'parent' => $subcategoria_neta->term_id,
                                            'orderby' => 'term_order',
                                            'order' => 'ASC',
                                            'hide_empty' => false,
                                            ]);

                                            $itens = empty($categorias_bisnetas) ? [$subcategoria_neta] : $categorias_bisnetas;

                                            if (!empty($categorias_bisnetas)) : ?>
                                            <tr>
                                                <td colspan="4" style="padding: 0;">
                                                <button class="subgrupo-toggle grupo-laranja-claro" style="background: #FF6E001A; color: #000;">
                                                    <?php echo esc_html($subcategoria_neta->name); ?>
                                                </button>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php foreach ($itens as $item) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo esc_html($item->name); ?>

                                                    <?php
                                                    // Recupera o campo personalizado da taxonomia
                                                    $descricao = get_field('descricao_das_categorias', 'vantagens-jetro_' . $item->term_id);
                                                    if ($descricao) :
                                                    ?>
                                                        <div class="descricao-categoria">
                                                            <?php echo $descricao; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                                <?php foreach ($planos as $slug => $plano) :
                                                $termos_do_plano = wp_get_post_terms($plano->ID, 'vantagens-jetro', ['fields' => 'ids']);
                                                $tem_categoria = in_array($item->term_id, $termos_do_plano);
                                                ?>
                                                <td class="check">
                                                    <div class="<?php echo $tem_categoria ? 'icon-checked' : 'icon-not-checked'; ?>">
                                                    <?php if ($tem_categoria) : ?>
                                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.8792 0L4.2553 7.13348L2.107 4.81992L0 7.08898L2.1483 9.40255L4.26906 11.6865L6.37607 9.41737L13 2.28391L10.8792 0Z" fill="#FF6E00"/>
                                                        </svg>
                                                    <?php else : ?>
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 1.85915L10.1408 0L6 4.22535L1.85915 0L0 1.85915L4.22535 6L0 10.1408L1.85915 12L6 7.77465L10.1408 12L12 10.1408L7.77465 6L12 1.85915Z" fill="#989898"/>
                                                        </svg>
                                                    <?php endif; ?>
                                                    </div>
                                                </td>
                                                <?php endforeach; ?>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</section>