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
					<h1><?php echo single_cat_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>

	<section class="blog_">
		<div class="container">
      <div class="row">
        <div class="col-lg-9">
          <?php if (have_posts()): ?>
            <div class="row">
              <?php while(have_posts()) : the_post(); ?>
                <div class="col-lg-4">
                  <article class="item">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                      <div class="imagem">
                        <?php 
                          if(has_post_thumbnail()):
                            the_post_thumbnail(); 
                          else: ?>
                          <img src="<?php bloginfo("template_url"); ?>/build/images/sem-imagem-4x3.jpg" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                      </div>
                      <span class="d-block blocoInfo">
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wp_trim_words( get_the_content(), 16, '...' ); ?></p>
                        <span class="linkfake">Saiba mais</span>
                      </span>
                    </a>
    
                    <?php // Autor
                      $autor = get_the_author();
                      $avatar = get_avatar( get_the_author_meta( 'ID' ), 64 );
      
                      $author_id = get_the_author_meta('ID');
                      $cargo = get_the_author_meta( 'description' );
                    ?>
    
                    <div class="author d-none">
                      <?php if($avatar): ?>
                      <div class="imges">
                        <?php echo $avatar; ?>
                      </div>
                      <?php endif; ?>
    
                      <div class="info d-none">
                        <?php the_author_posts_link(); ?>
                        <div class="date"><?php the_time('j \d\e F \d\e Y') ?></div>
                      </div>
                    </div>
                  </article>
                </div>
              <?php endwhile; ?>
            </div>	
          <?php else: ?>
            <div class="row">
              <div class="col-12 col-md-8">
                <div class="alert alert-warning" role="alert">
                  Ainda não há postagens vinculados a esta categoria.
                </div>
              </div>
            </div>
          <?php endif; ?>	
        </div>

        <?php get_sidebar(); ?>
      </div>

      <div class="row">
        <div class="paginacao col-12">
          <div class="wp-pagenavi" role="navigation">
            <?php wp_pagenavi(); ?>
          </div>                        
        </div>
      </div>
    </div>
	</section>	
</div>

<?php get_footer(); ?>