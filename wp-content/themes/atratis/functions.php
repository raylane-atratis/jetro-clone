<?php
/* ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);	 */
	

//Removendo barra administrativa quando logado, no front-end
function my_function_admin_bar()
{
    return false;
}
add_filter('show_admin_bar', 'my_function_admin_bar');



require_once('bs4navwalker.php');

//HABILITANDO MENU
register_nav_menu('principal', 'Menu');

// INICIAR SESSÃO 
function register_my_session(){
    if( !session_id() ){
        session_start();
    }
}
add_action('init', 'register_my_session');

/* THUMBNAILS CONFIGS */
add_theme_support('post-thumbnails');
add_image_size('4x3', 600, 400, true);


//HEADER
// add_theme_support('custom-header');

register_sidebar( array(
    'name'          => __( 'Breadcrumb'),
    'id'            => 'breadcrumb',
    'description'   => __( 'Widget na posição do breadcrumb' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
));

register_sidebar( array(
    'name'          => __( 'Sidebar'),
    'id'            => 'sidebar',
    'description'   => __( 'Widget na posição do sidebar' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
));

// REMOVE TAGS DESNECESSÁRIAS
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

remove_action('wp_head', 'wp_generator');



//OVERRIDE GALERY
add_shortcode('gallery', 'my_gallery_shortcode');
function my_gallery_shortcode($attr) {
    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $attr['orderby'] ) )
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

// Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;

// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 4,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    //SEMPRE O LINK VAI SER DO TIPO FILE
    $attr['link'] = 'file';

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $icontag = tag_escape($icontag);
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) )
        $itemtag = 'dl';
    if ( ! isset( $valid_tags[ $captiontag ] ) )
        $captiontag = 'dd';
    if ( ! isset( $valid_tags[ $icontag ] ) )
        $icontag = 'dt';

    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $gallery_style = $gallery_div = '';
    if ( apply_filters( 'use_default_gallery_style', true ) )
        $gallery_style = "
    <style type='text/css'>
        /*
        #{$selector} {
            margin: auto;
        }
        #{$selector} .gallery-item {
            float: {$float};
            margin-top: 10px;
            text-align: center;
            width: {$itemwidth}%;
        }
        #{$selector} img {
            border: 2px solid #cfcfcf;
        }
        #{$selector} .gallery-caption {
            margin-left: 0;
        }
        
        */

        .link-lightbox{
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 100;
        }
        
    </style>
    <!-- see gallery_shortcode() in wp-includes/media.php -->";
    $size_class = sanitize_html_class( $size );
    $gallery_div = "<div id='$selector' class='gallery justify-content-between gallery d-flex flex-wrap galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
        
        $output .= "<{$itemtag} class='gallery-item thumbs' data-gallery=\"one\">";
            $output .= "<a class='link-lightbox' href=". wp_get_attachment_url($id) . "></a>";
            $output .= "
            <{$icontag} class='gallery-icon'>
                <img src=". wp_get_attachment_url($id) ." />
            </{$icontag}>";
            if ( $captiontag && trim($attachment->post_excerpt) ) {
                $output .= "
                <{$captiontag} class='wp-caption-text gallery-caption'>
                <p>" . wptexturize($attachment->post_excerpt) . "</p>
                </{$captiontag}>";
            }    
        $output .= "</{$itemtag}>";

        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';
    }

    $output .= "
        <br style='clear: both;' />
    </div>\n";

    return $output;
}



if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
		'page_title' 	=> 'Opções do Tema',
		'menu_title'	=> 'Opções do Tema',
		'menu_slug' 	=> 'tema',
		'capability'	=> 'edit_posts',
        'icon_url' => 'dashicons-layout',
        // 'icon_url' => 'dashicons-schedule',
		'position' => 2,
	));

    acf_add_options_sub_page(array(
        'page_title'    => 'Opções Gerais',
        'menu_title'    => 'Opções Gerais',
        'menu_slug'     => 'configuracoes-do-tema',
        'capability'    => 'edit_posts',
        'parent_slug'	=> 'tema'
        // 'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Página Inicial',
        'menu_title'    => 'Página Inicial',
        'menu_slug'     => 'pagina-inicial',
        'capability'    => 'edit_posts',
        'parent_slug'	=> 'tema'
        // 'redirect'      => false
    ));
    
}



class Description_Walker extends Walker_Nav_Menu
{

    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array|object $args    Additional strings. Actually always an 
                                     instance of stdClass. But this is WordPress.
     * @return void
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' '
        ,   apply_filters(
                'nav_menu_css_class'
            ,   array_filter( $classes ), $item
            )
        );

        ! empty ( $class_names )
            and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= "<li id='menu-item-$item->ID' $class_names>";

        $attributes  = '';

        ! empty( $item->attr_title )
            and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
            and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
            and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
            and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        // insert description for top level elements only
        // you may change this
        $description = ( ! empty ( $item->description ) and 0 == $depth )
            ? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small>' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        

        $item_output = $args->before
            . "<a $attributes>"
            . $args->link_before
            . $title
            . '</a> '
            . $args->link_after
            . $description
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
        ,   $item_output
        ,   $item
        ,   $depth
        ,   $args
        );


        //$count_pre++;
    }
}



//site scripts
//function add_site_scripts() {
//        //meus scripts
//        wp_deregister_script('jquery');
//        wp_register_script('scripts',get_template_directory_uri().'/js/scripts.min.js', false,'1.0',false);
//        wp_enqueue_script('scripts');
//}
//
//add_action( 'wp_enqueue_scripts', 'add_site_scripts' );



// add_filter('pre_get_posts','searchfilter');
// function searchfilter($query) {
 
// if ($query->is_search) {
// $query->set('post_type', 'produtos');
// }
 
// return $query;
// }


class WPQuestions_Walker extends Walker_Category
{

    function start_lvl(&$output, $depth = 1, $args = array())
    {
        if($depth == 0) {
            $output .= "\n<ul class=\"sub-menu\">\n";
        }else{
            $output .= "\n<ul>\n";
        }
    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {
        $output .= "</ul>\n";
    }

    public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        /** This filter is documented in wp-includes/category-template.php */
        $cat_name = apply_filters(
            'list_cats',
            esc_attr( $category->name ),
            $category
        );

        // Don't generate an element if the category name is empty.
        if ( ! $cat_name ) {
            return;
        }

        $link = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';
        if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
            /**
             * Filter the category description for display.
             *
             * @since 1.2.0
             *
             * @param string $description Category description.
             * @param object $category    Category object.
             */
            $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
        }

        $link .= '>';
        $link .= $cat_name . '</a>';

        if ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) ) {
            $link .= ' ';

            if ( empty( $args['feed_image'] ) ) {
                $link .= '(';
            }

            $link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) . '"';

            if ( empty( $args['feed'] ) ) {
                $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
            } else {
                $alt = ' alt="' . $args['feed'] . '"';
                $name = $args['feed'];
                $link .= empty( $args['title'] ) ? '' : $args['title'];
            }

            $link .= '>';

            if ( empty( $args['feed_image'] ) ) {
                $link .= $name;
            } else {
                $link .= "<img src='" . $args['feed_image'] . "'$alt" . ' />';
            }
            $link .= '</a>';

            if ( empty( $args['feed_image'] ) ) {
                $link .= ')';
            }
        }

        if ( ! empty( $args['show_count'] ) ) {
            $link .= ' (' . number_format_i18n( $category->count ) . ')';
        }
        if ( 'list' == $args['style'] ) {
            $output .= "\t<li";
            $css_classes = array(
                'cat-item',
                'cat-item-' . $category->term_id,
            );

            if ( ! empty( $args['current_category'] ) ) {
                $_current_category = get_term( $args['current_category'], $category->taxonomy );
                if ( $category->term_id == $args['current_category'] ) {
                    $css_classes[] = 'current-cat';
                } elseif ( $category->term_id == $_current_category->parent ) {
                    $css_classes[] = 'current-cat-parent';
                }
            }

            $css_classes = implode( ' ', apply_filters( 'category_css_class', $css_classes, $category, $depth, $args ) );

            if($depth == 0 && $args['has_children']){
                $output .=  ' class="' . $css_classes . ' drop-menu has-sub"';
            }
            if($depth == 1 && $args['has_children']){
                $output .=  ' class="' . $css_classes . ' has-sub"';
            }
            $output .=  ' class="' . $css_classes . '"';
            $output .= ">$link\n";
        } else {
            $output .= "\t$link<br />\n";
        }
    }

}

add_filter('wpcf7_validate_email*', 'send_api_filter', 20, 2);

function send_api_filter($result, $tag) {
    // Obtém a instância da submissão do CF7
    $submission = WPCF7_Submission::get_instance();
    $form_id = '';

    if ($submission) {
        $form_id = $submission->get_contact_form()->id();
        // Se não for o formulário que queremos (ID: d1b840f), não altera o fluxo
        if ($form_id != '1921') {
            return $result;
        }
    }

    // Verifica se os campos essenciais foram enviados (você pode ajustar a lógica de validação conforme necessário)
    if (isset($_POST['email']) && isset($_POST['nome'])) {

        // Mapeamento dos campos do CF7 para os campos da documentação:
        $username      = isset($_POST['identidade']) ? trim($_POST['identidade']) : ''; // Nome de usuário
        $password      = isset($_POST['senha']) ? trim($_POST['senha']) : '';           // Senha
        $map_firstname = isset($_POST['nome']) ? trim($_POST['nome']) : '';              // Primeiro nome
        $map_lastname  = isset($_POST['sobrenome']) ? trim($_POST['sobrenome']) : '';    // Sobrenome
        $map_city      = isset($_POST['cidade']) ? trim($_POST['cidade']) : '';          // Cidade
        $map_empresa   = ''; // Campo não presente no formulário – defina um valor padrão ou adicione o campo ao CF7
        $map_segmento  = isset($_POST['segmento']) ? trim($_POST['segmento']) : '';      // Segmento
        $map_telefone  = isset($_POST['telefone']) ? trim($_POST['telefone']) : '';      // Telefone
        $map_email     = isset($_POST['email']) ? trim($_POST['email']) : '';            // E-mail
        $force_update  = "0"; // Valor padrão (0); se desejar que o usuário informe, adicione o campo ao CF7

        // Monta o array de dados conforme a documentação
        $data = array(
            'username'      => $username,
            'password'      => $password,
            'map_firstname' => $map_firstname,
            'map_lastname'  => $map_lastname,
            'map_city'      => $map_city,
            'map_empresa'   => $map_empresa,
            'map_segmento'  => $map_segmento,
            'map_telefone'  => $map_telefone,
            'map_email'     => $map_email,
            'force_update'  => $force_update,
        );

        // Defina a URL do endpoint da API – substitua pela URL real de integração com o Moodle ou o banco de dados
        $url = 'https://integracao.jetrogrupo.com/save';

        // Configuração do envio via POST utilizando URL-encoded (conforme documentação de exemplo)
        $options = array(
            'http' => array(
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);

        try {
            $api_response = file_get_contents($url, false, $context);
            // Você pode registrar ou tratar a resposta da API conforme necessário
            // Por exemplo, se a resposta não indicar sucesso, pode invalidar o campo:
            $response_data = json_decode($api_response, true);
            if (!isset($response_data['status']) || $response_data['status'] !== 'success') {
                // $result->invalidate($tag, 'A API retornou um erro: ' . $api_response);
            }
        } catch (Exception $e) {
            // Em caso de exceção, opcionalmente invalidar o formulário ou registrar o erro
            // $result->invalidate($tag, 'Erro na integração: ' . $e->getMessage());
        }
    }
	var_dump( $data);
	die();
    return $result;
}


add_action('rest_api_init', function () {
    register_rest_route('meu-tema/v1', '/enviar-dados', array(
        'methods' => 'POST',
        'callback' => 'enviar_dados_para_api_externa',
    ));
});

function enviar_dados_para_api_externa($request) {
    $body = $request->get_json_params();

    $response = wp_remote_post('https://integracao.jetrogrupo.com/save', array(
        'headers' => array(
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Basic !9roh5&jW7zUFE'
        ),
        'body' => json_encode($body),
        'method' => 'POST',
        'data_format' => 'body',
    ));

    if (is_wp_error($response)) {
        return new WP_Error('erro_na_requisicao', 'Erro na requisição: ' . $response->get_error_message(), array('status' => 500));
    }

    $response_code = wp_remote_retrieve_response_code($response);
    $response_body = wp_remote_retrieve_body($response);

    if ($response_code != 200) {
        return new WP_Error('resposta_api_nao_bem_sucedida', 'Resposta da API não foi bem-sucedida: ' . $response_body, array('status' => $response_code));
    }

    return rest_ensure_response(json_decode($response_body));
}

