<?php
/**
 * Layout: Sessão Card LP One
 * Dentro de um campo flexível, os campos devem ser acessados com get_sub_field
 */

include "conf_gerais.php";

// Pegando os campos da "linha" atual do Flexible Content
$classe          = get_sub_field('class');
$titulo          = get_sub_field('titulo');
$subtitulo       = get_sub_field('subtitulo');
$caixa_flutuante = get_sub_field('caixa_flutuante'); // Valor do Select (ex: 'sim' ou 'nao')
?>

<section class="sessao_card_lp_one <?php echo esc_attr($classe); ?> <?php echo esc_attr($parallax); ?>" 
         style="<?php echo $geraisCSS; ?>" <?php echo $animacao; ?>>
    
    <div class="container">
        
        <?php 
        // Lógica da Caixa Flutuante
        // Verifica se o campo existe e se o valor é 'sim'
        if ($caixa_flutuante === 'sim'): ?>
            <img src="<?php echo get_template_directory_uri(); ?>/build/images/caixote-2.png" 
                 alt="caixa" 
                 class="caixaFlutuanteDois move-2">
        <?php endif; ?>
        
        <div class="header-secao" style="margin-bottom: 40px;">
            <?php if ($titulo): ?>
                <h2 class="titulo" style="max-width: 463px;"><?php echo esc_html($titulo); ?></h2>
            <?php endif; ?>
            
            <?php if ($subtitulo): ?>
                <p class="subtitulo" style="max-width: 463px;"><?php echo esc_html($subtitulo); ?></p>
            <?php endif; ?>
        </div>

        <?php 
        if (have_rows('card')): ?>
            <div class="make-easy-item">
                <div class="owl-sessao-card-lp owl-carousel owl-theme">
                    
                    <?php while (have_rows('card')): the_row(); 
                        $card_titulo   = get_sub_field('titulo');
                        $card_conteudo = get_sub_field('conteudo');
                    ?>
                        <div class="item">
                            <?php if ($card_titulo): ?>
                                <h3><?php echo esc_html($card_titulo); ?></h3>
                            <?php endif; ?>
                            
                            <?php if ($card_conteudo): ?>
                                <div class="card-content">
                                    <?php echo $card_conteudo; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>
        <?php endif; ?>

    </div>
</section>