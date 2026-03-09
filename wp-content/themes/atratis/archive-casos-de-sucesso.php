<?php get_header(); ?>

<div class="interna casoDeSucesso animated fadeIn">

    <div class="barraBC">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if (is_active_sidebar('breadcrumb')) : ?>
                    <?php dynamic_sidebar('breadcrumb'); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h1><?php echo $title = post_type_archive_title('', false); ?></h1>
                </div>
            </div>
        </div>
    </div>

    <?php if (have_posts()) : ?>
    <section class="casosLista">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <ul>
                        <?php while (have_posts()) : the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" class="imagem">
                                <?php
										if (has_post_thumbnail()) :
											the_post_thumbnail();
										else : ?>
                                <img src="<?php bloginfo("template_url"); ?>/build/images/sem-imagem-4x3.jpg"
                                    alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <div class="blocoTexto">
                                    <h3 class="texto"><?php the_title(); ?></h3>
                                    <p class="texto"><?php echo wp_trim_words(get_the_content(), 16, '...'); ?></p>
                                    <span class="linkFake">Saiba mais</span>
                                </div>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <?php endif; ?>
    <div class="container">
        <div class="wp-pagenavi" role="navigation">
            <?php wp_pagenavi(); ?>
        </div>
    </div>

    <?php wp_reset_postdata(); ?>

</div>

<?php get_footer(); ?>