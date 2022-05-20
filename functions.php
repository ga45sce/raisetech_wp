<?php
    //テーマサポート
    //add_theme_support( 'menus' );
    register_nav_menus( array(
        'cateogrymenu' => 'cateogrymenu'
      ));
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );

    //タイトル出力
    function wpbeg_title( $title ) {
        if ( is_front_page() && is_home() ) { //トップページなら
            $title = get_bloginfo( 'name', 'display' );
        } elseif ( is_singular() ) { //シングルページなら
            $title = single_post_title( '', false );
        }
            return $title;
    }
    add_filter( 'pre_get_document_title', 'wpbeg_title' );

    function wpbeg_script() {
        wp_enqueue_style( 'font', '//fonts.googleapis.com/css2?family=M+PLUS+1p&family=Roboto&display=swap', array() );
        wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' );
    }
    add_action( 'wp_enqueue_scripts', 'wpbeg_script' );

    function load_jquery() {
        if ( !is_admin() ) {
            wp_deregister_script('jquery');
            wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js', array(), '1.10.1');
        }
    }
    add_action('wp_enqueue_scripts', 'load_jquery');



    // 投稿のアーカイブページを作成する
    function post_has_archive($args, $post_type)
    {
        if ('post' == $post_type) {
            $args['rewrite'] = true; // リライトを有効にする
            //$args['has_archive'] = 'blog'; // 任意のスラッグ名
            $args['has_archive'] = 'archive'; // 任意のスラッグ名
        }
        return $args;
    }
    add_filter('register_post_type_args', 'post_has_archive', 10, 2);

    //現在のページ数の取得
function show_page_number() {
    global $wp_query;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $max_page = $wp_query->max_num_pages;
    echo $paged;
}
//総ページ数の取得
function max_show_page_number() {
    global $wp_query;
    $max_page = $wp_query->max_num_pages;
    echo $max_page;
}

function wpbeg_widgets_init() {
    register_sidebar (
        array(
            'name'          => 'カテゴリーウィジェット',
            'id'            => 'category_widget',
            'description'   => 'カテゴリー用ウィジェットです',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2><i class="fa fa-folder-open" aria-hidden="true"></i>',
            'after_title'   => "</h2>\n",
        )
    );
}
add_action( 'widgets_init', 'wpbeg_widgets_init' );
