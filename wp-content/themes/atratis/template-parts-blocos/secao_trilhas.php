<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

$sub_titulo = get_sub_field('sub_titulo');
$titulo = get_sub_field('titulo');


$classe = get_sub_field('class');

// post type = plataforma-digital

// get taxonomy (trilhas-plataforma) of post type plataforma-digital 
$categories = get_terms( array(
    'taxonomy' => 'trilhas-plataforma',
    'hide_empty' => false,
    "order" => "DESC"
) );



?>

<section class="secao-trilhas secao_texto valores<?php echo $classe; ?>  <?php echo $parallax; ?> "
  style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
  <section class="depoimentosBloco">

    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-12">
          <div class="header-secao center">
            <?php 
						$sub_titulo = get_sub_field('sub-titulo');
						$titulo = get_sub_field('titulo');
					?>
            <?php if($sub_titulo): ?>
            <h3 class="sub-titulo"><?php echo $sub_titulo; ?></h3>
            <?php endif; ?>

            <?php if($titulo): ?>
            <h2 class="titulo"><?php echo $titulo; ?></h2>
            <?php endif; ?>
          </div>
        </div>
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
                                        $sorted_terms;
                                        if ($category && !is_wp_error($category)) {
                                            $sorted_terms = wp_list_sort($category, 'term_order', 'ASC', true);
                                        }
                                        
                                        ?>
                    <div class="tags">
                      <?php foreach($sorted_terms as $cat):?>
                      <!-- <a class="tag" href="<?php echo get_term_link($cat->term_id); ?>" "> -->
                      <div class="tag">
                        <?php echo $cat->name ?>
                      </div>
                      <!-- </a> -->
                      <?php endforeach;?>
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