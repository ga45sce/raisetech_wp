<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p&family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
        <?php wp_head(); ?>
    </head>
    <body>
    <div class="l-wrapper">
        <div>
            <header class="l-header">
                <div class="p-header__area1">
                    <h1 class="p-header__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                    <div class="p-header__search">
                        <div class="p-header__search2"></div>

                        <?php get_search_form(); ?>
 
                    </div>
                </div>
                <div class="p-header__area2">
                    <div>
                        <button class="c-button-menu js-menu">
                            <span></span>
                        </button>
                    </div>
                </div>
            </header>
            