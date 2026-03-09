<aside>

    <div class="navegacao">
        <h3>Categorias</h3>
        <ul>
            <?php
				// post type conteudos-uteis
				$args = array(
					'taxonomy' => 'categoria-conteudo',
					'title_li' => '',
					'orderby' => 'name',
					'order' => 'DESC',
                    'hide_empty' => 0,
				);
				wp_list_categories($args);
				?>

        </ul>
    </div>


    <!-- <a href="#"><img src="<?php bloginfo("template_url"); ?>/build/images/sem-imagem-4x3.jpg" alt="banner"></a> -->
    <?php if (is_active_sidebar('sidebar')) : ?>
    <?php dynamic_sidebar('sidebar'); ?>
    <?php endif; ?>

</aside>