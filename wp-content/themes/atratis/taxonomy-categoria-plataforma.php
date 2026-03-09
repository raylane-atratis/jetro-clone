<?php get_header(); ?>

<div class="interna animated fadeIn">

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
                    <h1>
                        <?php 
                          $name =  get_the_archive_title();
                            $name = str_replace('Categoria Plataforma: ', '', $name);
                            echo $name;

                            $slug = get_queried_object()->slug;
                        ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <?php 
        $categories = get_terms( array(
            'taxonomy' => 'trilhas-plataforma',
            'hide_empty' => false,
            "order" => "DESC",
        ) );
    ?>

    <section class="secao-trilhas secao_texto valores">
        <section class="depoimentosBloco">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-lg-12">
                        <div class="tab-nav">
                            <div class="tab-links">
                                <?php foreach($categories as $pos => $category): 
                                    $first = ($pos == 0) ? 'active' : '';
                                ?>
                                <a href="#" data-tab="tab<?php echo $pos ?>" class="<?php echo $first; ?>">
                                    <?php echo $category->name ?>
                                </a>
                                <?php endforeach; ?>
                            </div>
                            <div class="tab-content">
                                <?php foreach($categories as $pos => $category): 
                                    $first = ($pos == 0) ? 'active' : '';
                                ?>

                                <div id="tab<?php echo $pos; ?>" class="tab-panel <?php echo $first; ?>">

                                    <?php 
                                    $query = new WP_Query( array(
                                        'post_type' => 'plataforma-digital',
                                        'posts_per_page' => -1,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'trilhas-plataforma',
                                                'field' => 'slug',
                                                'terms' => $category->slug
                                            ),
                                            array(
                                                'taxonomy' => 'categoria-plataforma',
                                                'field' => 'slug',
                                                'terms' => $slug
                                                )
                                                )
                                                ) );
                                                
                                                if($query->have_posts()):?>
                                    <div class="gridItems">
                                        <?php while($query->have_posts()): 
                                                        ?>

                                        <?php $query->the_post(); ?>
                                        <div class="item">
                                            <div class="icone-trilha">
                                                <?php 
                                                $icone = get_field('icone');
                                            ?>
                                                <img src="<?php echo $icone['url']; ?>" alt="">
                                            </div>
                                            <?php
                                        
                                        $category = get_the_terms( $post->ID, 'categoria-plataforma' );
                                                
                                        
                                        ?>
                                            <div class="tags">
                                                <?php 
                                          foreach($category as $cat):
                                        ?>
                                                <a class="tag" href="
                                            <?php echo get_term_link($cat->term_id); ?>" "><?php echo $cat->name ?></a>
                                            <?php 
                                          endforeach;
                                         ?>
                                        </div>
                                        <h3>
                                            <?php the_title(); ?>
                                        </h3>
                                        <p>
                                            <?php echo get_the_content(); ?>
                                        </p>
                                        <a href=" <?php echo get_the_permalink(); ?>" class="link">Saiba
                                                    mais</a>
                                            </div>

                                            <?php endwhile;
                                    wp_reset_postdata();
                                     ?>
                                        </div>
                                        <?php else: ?>
                                        <h3 class="aviso">Nenhuma trilha encontrada</h3>

                                        <?php endif; ?>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <?php 
        $titulo_orcamento = get_field('titulo_orcamento', 'option');
        $descricao_orcamento = get_field('descricao_orcamento', 'option');
        $link_orcamento = get_field('link_orcamento', 'option');
        $texto_link_orcamento = get_field('texto_link_orcamento', 'option');
        $aba_orcamento = get_field('aba_orcamento', 'option') ? 'target="_blank"' : '';
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <section class="linha_cta card-laranja" style="padding-block: 50px 30px; margin-block: 60px;">

                    <h2>
                        <?php echo $titulo_orcamento; ?>
                    </h2>
                    <p>
                        <?php echo $descricao_orcamento; ?>
                    </p>

                    <div class="divisao">

                        <a href="<?php 
                        echo $link_orcamento; ?>" class="bt__padrao" <?php echo $aba_orcamento; ?>>
                            <?php 
                        echo $texto_link_orcamento;
                        ?>
                        </a>

                    </div>
                    <div class="detalhe-meio">
                        <img src="<?php echo bloginfo( "template_url" ); ?>/build/images/detalhe-form.png" alt="">
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>