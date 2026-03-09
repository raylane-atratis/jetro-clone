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

$titulo = get_sub_field('titulo');

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
    
    
    $lista_planos = get_sub_field('lista_planos'); //objeto de posts
 
    
?>

<section class="sessaoPlanosVantagens <?php echo $classe; ?> <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>"
    <?php echo $animacao; ?>>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title">
                    <h2><?php echo $titulo;?></h2>
                </div>
            </div>
        </div>

        

        <?php if ($lista_planos) : ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="grid-colunas-vantagens">
                    <?php foreach ($lista_planos as $post) : setup_postdata($post); 
                        $subtitulo_do_card = get_field('subtitulo_do_card');
                        $descricao_do_card = get_field('descricao_do_card');

                        $texto_botao_agendamento = get_field('texto_botao_agendamento');
                        $link_botao_agendamento = get_field('link_botao_agendamento');
                        $iframe_video = get_field('iframe_video');
                        $modal_id = 'modal-plano-' . get_the_ID();
                    ?>
                    <div class="item-plano">

                        <div class="header-plano">
                            <div class="title-header-plano">
                                <h3><?php the_title();?></h3>
                                <p><?php echo $subtitulo_do_card;?></p>
                            
                            </div>

                            <div class="descricao-header-plano">
                                <p><?php echo $descricao_do_card;?></p>
                            </div>
                            
                        </div>

                        <div class="body-plano">
                            <?php
                                $taxonomia = 'vantagens-jetro'; // Substitua por sua taxonomia personalizada se necessário
                                $categorias_post = get_the_terms( get_the_ID(), $taxonomia );
                                $categorias_ids_post = $categorias_post ? wp_list_pluck( $categorias_post, 'term_id' ) : [];

                                // Obtém todas as categorias de primeiro nível
                                $categorias_pai = get_terms([
                                    'taxonomy'   => $taxonomia,
                                    'parent'     => 0,
                                    'hide_empty' => false,
                                ]);
                            ?>
                            
                            
                            <?php foreach ( $categorias_pai as $cat_pai ): ?>
                                <h4><?php echo esc_html( $cat_pai->name );?></h4>

                                <?php 
                                    // Busca todas as subcategorias (filhas)
                                    $subcategorias = get_terms([
                                        'taxonomy'   => $taxonomia,
                                        'parent'     => $cat_pai->term_id,
                                        'hide_empty' => false,
                                    ]);
                                ?>

                                <ul class="lista-vantagens">
                                    <?php 
                                        foreach ( $subcategorias as $sub ) {
                                            $tem_categoria = in_array( $sub->term_id, $categorias_ids_post );

                                            // Escolhe a classe e ícone conforme o caso
                                            $classe = $tem_categoria ? 'item-lista-vantagens' : 'item-lista-vantagens item-not-checked';
                                            $icone = $tem_categoria
                                                ? '<div class="icon-checked">
                                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.8792 0L4.2553 7.13348L2.107 4.81992L0 7.08898L2.1483 9.40255L4.26906 11.6865L6.37607 9.41737L13 2.28391L10.8792 0Z" fill="#FF6E00"/>
                                                    </svg>
                                                </div>'
                                                : '<div class="icon-not-checked">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 1.85915L10.1408 0L6 4.22535L1.85915 0L0 1.85915L4.22535 6L0 10.1408L1.85915 12L6 7.77465L10.1408 12L12 10.1408L7.77465 6L12 1.85915Z" fill="#989898"/>
                                                    </svg>
                                                </div>';

                                            echo '<li class="' . $classe . '">' . $icone . esc_html( $sub->name ) . '</li>';
                                        }
                                    
                                    ?>
                                </ul>

                            <?php endforeach; ?>
                        </div>

                        <div class="footer-plano">
                            <a href="#" class="video-btn" data-modal-target="<?php echo $modal_id; ?>">
                                <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 0C8.82441 0 6.69767 0.674463 4.88873 1.9381C3.07979 3.20173 1.66989 4.99779 0.83733 7.09914C0.00476612 9.20049 -0.213071 11.5128 0.211367 13.7435C0.635804 15.9743 1.68345 18.0234 3.22183 19.6317C4.76021 21.24 6.72022 22.3353 8.85401 22.779C10.9878 23.2228 13.1995 22.995 15.2095 22.1246C17.2195 21.2542 18.9375 19.7802 20.1462 17.8891C21.3549 15.9979 22 13.7745 22 11.5C22 9.98979 21.7155 8.49438 21.1627 7.09914C20.6099 5.70389 19.7996 4.43614 18.7782 3.36827C17.7567 2.3004 16.5441 1.45331 15.2095 0.875385C13.8749 0.297456 12.4445 0 11 0ZM8.8 16.675V6.325L15.4 11.5L8.8 16.675Z" fill="#FF6E00"/>
                                </svg>

                                Assista demonstração
                            </a>

                            <a href="<?php echo $link_botao_agendamento;?>" target="_blank" class="btn-agendamento">
                                <?php echo $texto_botao_agendamento;?>
                            </a>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="<?php echo $modal_id; ?>" class="modal-planos">
                        <div class="modal-conteudo">
                            <div class="close-btn-modal">
                                <span class="fechar-modal-planos" data-modal-close="<?php echo $modal_id; ?>">&times;</span>
                            </div>
                            
                            
                            <?php echo $iframe_video; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        

         <?php endif; 
            ?>
        <?php wp_reset_postdata(); ?>

    </div>
</section>


