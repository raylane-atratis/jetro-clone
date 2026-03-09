<?php

/**
 * Seção de Campo Flexível - Lista de Blocos
 *
 * Campos ACF necessários (Flexible Content ou Group):
 * ─────────────────────────────────────────────────
 * Repetidor:  lista_de_blocos (have_rows)
 * ├─ imagem     (image — retorna array)
 * ├─ titulo     (image — retorna array) <── FOI ALTERADO PARA IMAGEM NO ACF
 * ├─ conteudo   (textarea / wysiwyg)
 * └─ posicao    (select → 'esquerda' | 'direita')
 *
 * Fora do repetidor:
 * ├─ url_botao  (url ou link)
 * └─ texto_botao (text)
 */

$url_botao   = get_sub_field('url_botao')   ?: get_field('url_botao');
$texto_botao = get_sub_field('texto_botao') ?: get_field('texto_botao');
$has_blocos  = have_rows('lista_de_blocos');
?>

<?php if ($has_blocos || $url_botao) : ?>

    <section class="secao-blocos-flexivel">

        <div class="container">

            <?php if (have_rows('lista_de_blocos')) : ?>
                <div class="sbf-lista">

                    <?php
                    $bloco_index = 0;
                    while (have_rows('lista_de_blocos')) : the_row();
                        $imagem   = get_sub_field('imagem');
                        $titulo   = get_sub_field('titulo'); // Agora tratado estritamente como array de imagem
                        $conteudo = get_sub_field('conteudo');
                        $posicao  = get_sub_field('posicao'); // 'esquerda' ou 'direita'

                        $is_direita = ($posicao === 'direita');
                        $delay      = $bloco_index * 120;

                        // Captura coluna da imagem principal
                        ob_start(); ?>
                        <div class="col-12 col-lg-7">
                            <?php if ($imagem) : ?>
                                <div class="sbf-img-wrap">
                                    <div class="sbf-img-shine" aria-hidden="true"></div>
                                    <img
                                        src="<?php echo esc_url($imagem['url']); ?>"
                                        alt="<?php echo esc_attr($imagem['alt'] ?: 'Imagem do bloco'); ?>"
                                        width="<?php echo esc_attr($imagem['width']); ?>"
                                        height="<?php echo esc_attr($imagem['height']); ?>"
                                        loading="lazy"
                                        decoding="async"
                                        class="sbf-img" />
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php $col_imagem = ob_get_clean();

                        // Captura coluna do conteúdo
                        ob_start(); ?>
                        <div class="col-12 col-lg-5">
                            <div class="sbf-conteudo-inner">

                                <?php
                                // --- CORREÇÃO AQUI: TRATANDO TÍTULO COMO IMAGEM ---
                                if (is_array($titulo) && !empty($titulo['url'])) : ?>
                                    <div class="sbf-titulo-imagem-wrap">
                                        <img src="<?php echo esc_url($titulo['url']); ?>"
                                            alt="<?php echo esc_attr($titulo['alt'] ?: 'Título'); ?>"
                                            width="<?php echo esc_attr($titulo['width'] ?? ''); ?>"
                                            height="<?php echo esc_attr($titulo['height'] ?? ''); ?>"
                                            class="sbf-titulo-img" />
                                    </div>
                                <?php endif; ?>

                                <?php if ($conteudo) : ?>
                                    <div class="sbf-texto">
                                        <?php echo wp_kses_post($conteudo); ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php $col_conteudo = ob_get_clean(); ?>

                        <article
                            class="row align-items-center sbf-bloco sbf-reveal"
                            data-delay="<?php echo $delay; ?>">

                            <?php
                            // A ordem no DOM define a posição — sem depender de CSS
                            if ($is_direita) {
                                echo $col_conteudo; // conteúdo à esquerda
                                echo $col_imagem;   // imagem à direita
                            } else {
                                echo $col_imagem;   // imagem à esquerda
                                echo $col_conteudo; // conteúdo à direita
                            }
                            ?>

                        </article><?php
                                    $bloco_index++;
                                endwhile;
                                    ?>

                </div><?php endif; ?>

            <?php if ($url_botao && $texto_botao) : ?>
                <div class="sbf-botao-wrap">
                    <a
                        href="<?php echo esc_url($url_botao); ?>"
                        class="sbf-botao"
                        target="_blank"
                        rel="noopener noreferrer">
                        <span class="sbf-botao-texto"><?php echo esc_html($texto_botao); ?></span>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <style>
        /* ── Seção ────────────────────────────────── */
        .secao-blocos-flexivel {
            overflow: hidden;
            padding: 90px 0 56px;
            background: #fff;
        }

        /* ── Lista de blocos ─────────────────────── */
        .sbf-lista {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        /* ── Bloco (row Bootstrap) ───────────────── */
        .sbf-bloco {
            row-gap: 28px;
            margin-bottom: 30px;
        }

        /* ── Wrapper da imagem principal ─────────── */
        .sbf-img-wrap {
            position: relative;
            border-radius: 10px;
            max-height: 419px;
            overflow: hidden;
            box-shadow:
                0 4px 24px rgba(0, 0, 0, .5),
                0 0 0 1px rgba(255, 255, 255, .06);
        }

        .sbf-img-wrap::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 20px;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .08);
            pointer-events: none;
        }

        .sbf-img {
            display: block;
            width: 100%;
            height: 419px;
            object-fit: cover;
            transition: transform .6s cubic-bezier(.25, .46, .45, .94);
        }

        .sbf-img-wrap:hover .sbf-img {
            transform: scale(1.04);
        }

        /* Efeito shine */
        .sbf-img-shine {
            position: absolute;
            inset: 0;
            z-index: 2;
            background: linear-gradient(130deg,
                    transparent 40%,
                    rgba(255, 255, 255, .07) 50%,
                    transparent 60%);
            background-size: 200% 100%;
            background-position: 200% 0;
            transition: background-position .7s ease;
            pointer-events: none;
            border-radius: 20px;
        }

        .sbf-img-wrap:hover .sbf-img-shine {
            background-position: -200% 0;
        }

        /* ── Conteúdo ────────────────────────────── */
        .sbf-conteudo-inner {
            border-radius: 10px;
            border: 1px solid #D5D5D5;
            background: var(--branco-100, #FFF);
            padding: 40px;
            /* Adicionado padding interno */
            height: 419px;
            display: flex;
            flex-direction: column;
            align-items: start;
            justify-content: center;
        }

        /* Novo estilo para o wrapper da imagem do título */
        .sbf-titulo-imagem-wrap {
            margin-bottom: 4px;
        }

        .sbf-titulo-img {
            display: block;
            max-width: 100%;
            height: auto;
        }

        .sbf-texto p {
            color: #23292E;
            font-size: 22px;
            font-weight: 400;
            font-family: "space-grotesk", sans-serif;
            line-height: 1.5;
        }

        .sbf-texto p:last-child {
            margin-bottom: 0;
        }

        /* ── Botão ───────────────────────────────── */
        .sbf-botao-wrap {
            display: flex;
            justify-content: center;
            margin-top: 72px;
        }

        .sbf-botao {
            position: relative;
            display: inline-flex;
            align-items: center;
            padding: 11px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            background-color: #FF6E00;
            text-decoration: none;
            border: 1px solid transparent;
            transition: color .6s, transform .6s;

            &:hover {
                color: #fff;
                background-color: #003061;
                transform: translateY(-2px);
            }
        }


        /* ── Animação de entrada (Intersection Observer) ─ */
        .sbf-reveal {
            opacity: 0;
            transform: translateY(40px);
            transition:
                opacity .65s cubic-bezier(.22, 1, .36, 1),
                transform .65s cubic-bezier(.22, 1, .36, 1);
        }

        .sbf-reveal.sbf-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── Responsivo ≤ 992px ──────────────────── */
        @media (max-width: 992px) {
            .secao-blocos-flexivel {
                padding: 64px 0 56px;
            }

            .sbf-lista {
                gap: 56px;
            }

            .sbf-bloco .col-lg-7 {
                order: -1;
            }

            .sbf-bloco .col-lg-5 {
                order: 1;
            }

            .sbf-conteudo-inner {
                padding: 30px;
            }

            .sbf-botao-wrap {
                margin-top: 48px;
            }
        }

        @media (max-width: 576px) {
            .secao-blocos-flexivel {
                padding: 48px 0 40px;
            }

            .sbf-lista {
                gap: 40px;
            }

            .sbf-conteudo-inner {
                padding: 20px;
            }

            .sbf-texto p {
                font-size: 18px;
            }
        }
    </style>

    <script>
        (function() {
            'use strict';

            function initReveal() {
                var items = document.querySelectorAll('.sbf-reveal');
                if (!items.length) return;

                if (!('IntersectionObserver' in window)) {
                    items.forEach(function(el) {
                        el.classList.add('sbf-visible');
                    });
                    return;
                }

                var observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var el = entry.target;
                            var delay = parseInt(el.getAttribute('data-delay') || '0', 10);
                            setTimeout(function() {
                                el.classList.add('sbf-visible');
                            }, delay);
                            observer.unobserve(el);
                        }
                    });
                }, {
                    threshold: 0.12,
                    rootMargin: '0px 0px -40px 0px'
                });

                items.forEach(function(el) {
                    observer.observe(el);
                });
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initReveal);
            } else {
                initReveal();
            }
        })();
    </script>

<?php endif; ?>