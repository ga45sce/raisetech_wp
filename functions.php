<?php
    //テーマサポート
    add_theme_support( 'menus' );
    add_theme_support( 'title-tag' );

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
        //wp_enqueue_style( 'reset', get_template_directory_uri() . '//unpkg.com/ress/dist/ress.min.css', array() );
        wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' );
        //wp_enqueue_style( 'js', get_template_directory_uri() . '/script/script.js', array(), '1.0.0' );
    }
    add_action( 'wp_enqueue_scripts', 'wpbeg_script' );

    // 親テーマのテーマフォルダのパスを取得するショートコード
    function gettmplurl($atts, $content = null) {
        return get_template_directory_uri();
    }
    add_shortcode('tmplurl', 'gettmplurl');