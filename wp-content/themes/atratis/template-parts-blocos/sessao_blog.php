<?php
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////

$exibirImagens = get_sub_field('exibir_imagens', "option");
$exibirConteudo = get_sub_field('exibir_conteudo', "option");
$caracteresConteudo = get_sub_field('qtd_caracteres_conteudo', "option");
$descricao = get_sub_field('descricao', "option");
$titulo = get_sub_field('titulo', "option");
$subTitulo = get_sub_field('sub_titulo', "option");

if ($caracteresConteudo) :
    $caracteresConteudo = $caracteresConteudo;
else :
    // Caso não tenha valor (Padrão: 26 caracteres)
    $caracteresConteudo = 26;
endif;

$nomeBtn = get_sub_field('nome_botao', "option");
$x = get_sub_field('categoria_destaque', "option");
$categorias = implode(',', $x);

$args = array(
    'cat' => $categorias,
    'posts_per_page' => 4
);
$query = new WP_Query($args);

?>

<?php if ($query->have_posts()) : ?>
<section class="destaques_sec <?php echo $parallax; ?> " style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="titulo">
                    <h2 style="<?php echo $corFonte; ?>"><?php echo $subTitulo; ?></h2>
                    <h3 style="<?php echo $corFonte; ?>"><?php echo $titulo ?></h3>
                    <p><?php echo $descricao; ?></p>
                </div>
                <?php if (get_sub_field('link_ver_todos', "option")) : ?>
                <a href="<?php echo get_sub_field('link_ver_todos', "option"); ?>" class="bt__padrao">
                    <?php // Nome do Botão
                            if ($nomeBtn) :
                                echo $nomeBtn;
                            else :
                                echo "Ver todos";
                            endif;
                            ?>
                </a>
                <?php endif; ?>
            </div>
            <div class="col-lg-9">
                <ul class="lista">

                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <li class="item">

                        <?php if ($exibirImagens) : ?>
                        <a href="<?php the_permalink(); ?>" class="imagem">
                            <?php
                                        if (has_post_thumbnail()) :
                                            the_post_thumbnail();
                                        else : ?>
                            <img src="<?php bloginfo("template_url"); ?>/build/images/sem-imagem-4x3.jpg"
                                alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </a>
                        <?php endif; ?>
                        <div class="caixaTexto">
                            <h3>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <?php if ($exibirConteudo) : ?>
                            <p><?php echo wp_trim_words(get_the_content(), $caracteresConteudo, '...'); ?></p>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>">Saiba mais</a>
                        </div>
                    </li>
                    <?php endwhile; ?>

                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php wp_reset_postdata(); ?>