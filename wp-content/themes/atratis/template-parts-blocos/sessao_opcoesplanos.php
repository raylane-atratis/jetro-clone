<?php 
/////////////////////////////////////////////////////////
// Configurações Gerais do Bloco
// template: conf_gerais.php
// Variáveis diponíveis: $geraisCSS, $corFonte, $animacao

include "conf_gerais.php";

/////////////////////////////////////////////////////////	

$titulo_da_sessao_planos = get_sub_field('titulo_inicial_da_sessao_planos');
$texto_inicial_planos = get_sub_field('texto_inicial_planos');

//Planos
$nome_do_plano_opcao_1 = get_sub_field('nome_do_plano_opcao_1');
$imagem_opcao_1 = get_sub_field('imagem_opcao_1');
$preco_do_plano_opcao_1 = get_sub_field('preco_do_plano_opcao_1');
$link_do_plano_opcao_1 = get_sub_field('link_do_plano_opcao_1');
$itens_do_plano_opcao_1 = get_sub_field('itens_do_plano_opcao_1');
$texto_link_do_plano_opcao_1 = get_sub_field('texto_link_do_plano_opcao_1');

$nome_do_plano_opcao_2 = get_sub_field('nome_do_plano_opcao_2');
$imagem_opcao_2 = get_sub_field('imagem_opcao_2');
$preco_do_plano_opcao_2 = get_sub_field('preco_do_plano_opcao_2');
$link_do_plano_opcao_2 = get_sub_field('link_do_plano_opcao_2');
$itens_do_plano_opcao_2 = get_sub_field('itens_do_plano_opcao_2');
$texto_link_do_plano_opcao_2 = get_sub_field('texto_link_do_plano_opcao_2');

$nome_do_plano_opcao_3 = get_sub_field('nome_do_plano_opcao_3');
$imagem_opcao_3 = get_sub_field('imagem_opcao_3');
$preco_do_plano_opcao_3 = get_sub_field('preco_do_plano_opcao_3');
$link_do_plano_opcao_3 = get_sub_field('link_do_plano_opcao_3');
$itens_do_plano_opcao_3  = get_sub_field('itens_do_plano_opcao_3');
$texto_link_do_plano_opcao_3  = get_sub_field('texto_link_do_plano_opcao_3');
?>
	<div id="pricing" class="pricing-area default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="site-heading text-center">
                        <h2><?php echo $titulo_da_sessao_planos;?></h2>
                        <p>
                            <?php echo $texto_inicial_planos;?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row pricing pricing-simple text-center default-padding.bottom-less ">
				<div class="col-12 col-lg-4 mb-5">
					<div class="pricing-item">
						<ul>
							<li class="icon">
							<?php echo $imagem_opcao_1;?>
							</li>
							<li class="title">
								<h4><?php echo $nome_do_plano_opcao_1;?></h4>
							</li>
							<li class="pricing-header">
								<h2><?php echo $preco_do_plano_opcao_1;?></h2>
							</li>
							<?php //repetidor plano_opcao_1 ?>
							<?php if( have_rows('itens_do_plano_opcao_1') ): while( have_rows('itens_do_plano_opcao_1') ): the_row(); ?>
							<li><?php echo get_sub_field('descricao_do_item');?></li>
							<?php endwhile; endif; ?>
							<li class="footer">
								<a class="bt__padrao" target="_blank" href="<?php echo $link_do_plano_opcao_1;?>"><?php echo $texto_link_do_plano_opcao_1;?></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-12 col-lg-4 mb-5">
					<div class="pricing-item active">
						<ul>
							<li class="icon">
							<?php echo $imagem_opcao_2;?>
							</li>
							<li class="title">
								<h4><?php echo $nome_do_plano_opcao_2;?></h4>
							</li>
							<li class="pricing-header">
								<h2><?php echo $preco_do_plano_opcao_2;?></h2>
							</li>
							<?php if( have_rows('itens_do_plano_opcao_2') ): while( have_rows('itens_do_plano_opcao_2') ): the_row(); ?>
							<li><?php echo get_sub_field('descricao_do_item');?></li>
							<?php endwhile; endif; ?>
							<li class="footer">
								<a class="bt__padrao" target="_blank" href="<?php echo $link_do_plano_opcao_2;?>"><?php echo $texto_link_do_plano_opcao_2;?></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-12 col-lg-4 mb-5">
					<div class="pricing-item">
						<ul>
							<li class="icon">
								<?php echo $imagem_opcao_3;?>
							</li>
							<li class="title">
								<h4><?php echo $nome_do_plano_opcao_3;?></h4>
							</li>
							<li class="pricing-header">
								<h2><?php echo $preco_do_plano_opcao_3;?></h2>
							</li>
							<?php if( have_rows('itens_do_plano_opcao_3') ): while( have_rows('itens_do_plano_opcao_3') ): the_row(); ?>
							<li><?php echo get_sub_field('descricao_do_item');?></li>
							<?php endwhile; endif; ?>
							<li class="footer">
								<a class="bt__padrao" target="_blank" href="<?php echo $link_do_plano_opcao_3;?>"><?php echo $texto_link_do_plano_opcao_3;?></a>
							</li>
						</ul>
					</div>
				</div>
            </div>
        </div>
    </div>