<div class="col-12 col-lg-3">
    <aside>

        <div class="navegacao">
            <h3>Categorias</h3>
            <ul>
                <?php
				$args = array(
					'show_option_all' => '',
					'orderby' => 'name',
					'order' => 'ASC',
					'style' => 'list',
					'show_count' => 0,

					// Oculta os que não tem post
					'hide_empty' => 0,

					'use_desc_for_title' => 1,
					// 'child_of'           => get_query_var('blog'),
					'child_of'           => 5,
					'feed' => '',
					'feed_type' => '',
					'feed_image' => '',
					// 'exclude' => '9,12,23,1,8',
					'hierarchical' => 2,
					'title_li' => '',
					'show_option_none' => __(''),
					'number' => null,
					'echo' => 1,
					'depth' => 0,
					'current_category' => 0,
					'pad_counts' => 0,
				);

				wp_list_categories($args);
				?>

            </ul>
        </div>

        <div class="formulario-side">
            <svg class="airplane" xmlns="http://www.w3.org/2000/svg" width="61" height="41" viewBox="0 0 61 41"
                fill="none">
                <path
                    d="M50.8565 9.85661C51.2082 10.2083 51.331 10.7286 51.1737 11.2004L42.8167 36.2713C42.6565 36.7519 42.2342 37.0975 41.7314 37.1594C41.2286 37.2213 40.735 36.9885 40.4631 36.5611L34.1199 26.5932L24.152 20.25C23.7246 19.978 23.4918 19.4845 23.5537 18.9817C23.6155 18.4789 23.9611 18.0565 24.4417 17.8963L49.5126 9.53938C49.9845 9.38209 50.5047 9.5049 50.8565 9.85661ZM36.7445 25.8257L41.1976 32.8235L46.923 15.6471L36.7445 25.8257ZM45.0659 13.79L27.8896 19.5155L34.8874 23.9686L45.0659 13.79Z"
                    fill="#FFE895" />
                <circle cx="28.9999" cy="32" r="2" fill="#FFE895" />
                <circle cx="24.9999" cy="38" r="2" fill="#FFE895" />
                <circle cx="16.9999" cy="38" r="2" fill="#FFE895" />
                <circle cx="9.99988" cy="35" r="2" fill="#FFE895" />
                <circle cx="1.99988" cy="39" r="2" fill="#FFE895" />
            </svg>
            <?php echo do_shortcode( '[contact-form-7 id="5" title="Newsletter"]' ); ?>
        </div>


        <!-- <a href="#"><img src="<?php bloginfo("template_url"); ?>/build/images/sem-imagem-4x3.jpg" alt="banner"></a> -->
        <?php if (is_active_sidebar('sidebar')) : ?>
        <?php dynamic_sidebar('sidebar'); ?>
        <?php endif; ?>

    </aside>
</div>