<?php

/**
 * Layout: Sessão Cards Crescimento - Grid 3 Colunas
 */

include "conf_gerais.php";

$classe          = get_sub_field('class');
$titulo          = get_sub_field('titulo');
$subtitulo       = get_sub_field('subtitulo');
$caixa_flutuante = get_sub_field('caixa_flutuante');
?>

<style>
    .s-growth-cards {
        padding: 60px 0 70px;
        position: relative;
        background-color: #fcfcfc;
    }

    /* Caixa Flutuante */
    .s-growth-cards .caixaFlutuanteDois {
        position: absolute;
        top: -35px;
        left: 190px;
        z-index: 5;
    }

    /* Cabeçalho */
    .s-growth-cards .header-growth {
        text-align: center;
        margin-bottom: 40px;
    }

    .s-growth-cards .title-growth {
        color: #ff6600;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .s-growth-cards .subtitle-growth {
        color: #23292E;
        font-size: 1.4rem;
    }

    /* Estrutura do Grid */
    .s-growth-cards .grid-growth {
        display: grid;
        /* Cria 3 colunas iguais */
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        justify-content: center;
    }

    /* Estilo dos Cards */
    .s-growth-cards .card-growth-item {
        background: #fff;
        border-radius: 8px;
        padding: 40px 30px;
        filter: drop-shadow(0 4px 4px rgba(0, 0, 0, 0.08));
        border: 1px solid #f0f0f0;
        height: 100%;
        transition: transform 0.3s ease;
    }

    .s-growth-cards .card-growth-item:hover {
        transform: translateY(-5px);
    }

    .s-growth-cards .card-growth-item h3 {
        color: #23292E;
        font-size: 1.4rem;
        margin-bottom: 8px;
        font-weight: 700;
    }

    .s-growth-cards .content-growth {
        color: #777;
        font-size: 1rem;
        line-height: 1.6;
    }

    /* Responsividade */
    @media (max-width: 992px) {
        .s-growth-cards {
            padding: 60px 20px 70px;
        }
        .s-growth-cards .grid-growth {
            grid-template-columns: repeat(2, 1fr);
            /* 2 colunas no tablet */
        }
    }

    @media (max-width: 768px) {
        .s-growth-cards .grid-growth {
            grid-template-columns: 1fr;
            /* 1 coluna no celular */
            max-width: 400px;
            margin: 0 auto;
        }
    }
</style>

<section class="s-growth-cards <?php echo esc_attr($classe); ?>" style="<?php echo $geraisCSS; ?>">

    <div class="container">

        <?php if ($caixa_flutuante === 'sim'): ?>
            <img src="<?php echo get_template_directory_uri(); ?>/build/images/caixote-2.png"
                alt="caixa" class="caixaFlutuanteDois move-2">
        <?php endif; ?>

        <div class="header-growth">
            <?php if ($titulo): ?>
                <h2 class="title-growth"><?php echo esc_html($titulo); ?></h2>
            <?php endif; ?>

            <?php if ($subtitulo): ?>
                <p class="subtitle-growth"><?php echo esc_html($subtitulo); ?></p>
            <?php endif; ?>
        </div>

        <?php if (have_rows('card')): ?>
            <div class="grid-growth">
                <?php while (have_rows('card')): the_row(); ?>
                    <div class="card-growth-item">
                        <h3><?php echo esc_html(get_sub_field('titulo')); ?></h3>
                        <div class="content-growth">
                            <?php echo get_sub_field('conteudo'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </div>
</section>