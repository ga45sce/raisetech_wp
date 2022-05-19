<?php get_header(); ?>
            <article>
                <div class="p-article-top p-article-top__archive p-article-top__archive_area">
                    <div class="p-article-top__area p-article-top__area_archive">
                        <p class="p-article-top__title">Search:</p>
                        <p class="p-article-top__subtitle"><?php echo $s; ?></p>
                    </div>
                    <div class="p-article-top__archive_backcolor"></div>
            </div>
                <div class="p-archive-top">
                    <h2 class="p-archive-top__subtitle"><?php echo $s; ?>の検索結果を表示します。</h2>
                    <div class="p-archive-top__text">
                    <?php
                        if( have_posts() ) : ?>
                            <p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p><?php 
                        else :
                                ?><p>表示する記事がありません</p><?php
                        endif;
                    ?>
                     </div>
                </div>
                <?php
                    if( have_posts() ) :
                        while( have_posts() ) :
                            the_post(); 
                            $mypage = get_post( get_the_ID() ); $slug = $mypage->post_name;
                            ?>
                            <div id="post-<?php the_ID(); ?>" class="p-archive-contents p-archive-contents__wrap">
                                <img class="p-archive-contents__image" src="<?php echo esc_url(get_template_directory_uri() . '/img/burger.jpg' ); ?>">
                                <div class="p-archive-contents__text-area">
                                    <p class="p-archive-contents__text-title"><?php the_title(); ?></p>
                                    <div class="p-archive-contents__text-area--2">
                                        <?php the_content(); ?>
                                    </div>
                                    <div class="p-archive-contents__button-area">
                                        <a href="http://hamburger.local/<?php echo $slug; ?>">
                                            <button class="p-archive-contents__button">
                                                詳しく見る
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    endif;
                ?>
            </article>

            <div class="p-page-send p-page-send_phone__is-close">
            <?php if ( $wp_query -> max_num_pages > 1 ) : //ページ数が1を超える場合に処理 ?>
                <div>
                    <a href="#"><?php previous_posts_link( '&lt;&lt;前へ' ); ?></a>
                </div>
            <?php endif; ?>
                <div>
                    <a href="#"><?php next_posts_link( '次へ&gt;&gt;'); ?></a>
                </div>
            </div>
            <div class="p-page-send p-page-send_tablet__is-close">
                <?php wp_pagenavi(); ?>
            </div>

            </div>

            <?php get_sidebar(); ?>

        </div>

<?php get_footer(); ?>