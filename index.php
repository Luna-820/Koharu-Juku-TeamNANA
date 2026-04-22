<?php get_header(); ?>

<main id="top">
    <section id="fv">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-fv.png" alt="fv" class="fv-bg">
    </section>

    <section id="service" class="wrapper">
        <span class="section-title-span">SERVICE</span>
        <h2 class="section-title">事業内容</h2>
        <p class="text">地域を彩る、未来をつなぐ。<br>桜の植樹から始まる３つの事業</p>

        <ul class="service-list">
            <li class="item service1">
                <a href="<?php echo esc_url(home_url('/service/')); ?>#sakura">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-service1.png" alt="service1">
                </a>
            </li>
            <li class="item service2">
                <a href="<?php echo esc_url(home_url('/service/')); ?>#esports">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-service2.png" alt="service2">
                </a>
            </li>
            <li class="item service3">
                <a href="<?php echo esc_url(home_url('/service/')); ?>#movie">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-service3.png" alt="service3">
                </a>
            </li>
        </ul>
    </section>

    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-divider1.png" alt="divider">

    <div class="cta">
        <p class="cta__title">さくらオーナーになる</p>
        <p class="cta__text">一本の桜の木があなたの名前とともに育つ</p>
        <div class="cta__btn">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/haanbira-3.png" alt="花びら">
                参加する
            </a>
            <a href="<?php echo esc_url(home_url('/service/')); ?>" class="btn">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/haanbira-3.png" alt="花びら">
                詳しく見る
            </a>
        </div>
    </div>

    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-divider2.png" alt="">

    <section id="about">
        <span class="section-title-span">ABOUT</span>
        <h2 class="section-title">私たちの想い</h2>
        <p class="text">知多半島を塗り替える「意志」と「挑戦」</p>

        <ul>
            <li>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-list1.png" alt="top-list1" class="img-left">
                <div class="box-title wrapper">
                    <div class="hanabira">
                        <span class="sub">信念｜Philosophy</span>
                        <span class="num">01</span>
                    </div>
                    <h2 class="box-title__main">何を目指し、どう変えるのか</h2>
                </div>
                <div class="button wrapper">
                    <a href="<?php echo esc_url(home_url('/about/')); ?>#mission" class="btn-simple">詳しく見る ></a>
                </div>
            </li>

            <li>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-list2.png" alt="top-list1" class="img-right">
                <div class="box-title wrapper">
                    <div class="hanabira">
                        <span class="sub">未来｜Vision</span>
                        <span class="num">02</span>
                    </div>
                    <h2 class="box-title__main">知床半島を<br>世界に誇れる「桜の半島」へ。</h2>
                </div>
                <div class="button wrapper">
                    <a href="<?php echo esc_url(home_url('/about/')); ?>#vision" class="btn-simple">詳しく見る ></a>
                </div>
            </li>

            <li>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-list3.png" alt="top-list1" class="img-left">
                <div class="box-title wrapper">
                    <div class="hanabira">
                        <span class="sub">約束｜Promise</span>
                        <span class="num">03</span>
                    </div>
                    <h2 class="box-title__main">私たちが約束すること</h2>
                </div>
                <div class="button wrapper">
                    <a href="<?php echo esc_url(home_url('/about/')); ?>#value" class="btn-simple">詳しく見る ></a>
                </div>
            </li>
        </ul>
    </section>

    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-divider3.png" alt="divider">

    <section id="cta" class="wrapper">
        <div class="sponsor">
            <p>多くの企業や団体が私たちの活動を支援しています</p>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-logos.png" alt="">
        </div>
        <div class="cta-box">
            <p class="cta__title">あなたの街を変える</p>
            <p class="cta__text">一本の桜の木があなたの名前とともに育つ</p>
            <div class="cta__btn">
                <a href="<?php echo esc_url(home_url('/sponsor/')); ?>" class="btn">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/haanbira-3.png" alt="花びら">
                    参加する
                </a>
                <a href="<?php echo esc_url(home_url('/service/')); ?>" class="btn">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/haanbira-3.png" alt="花びら">
                    詳しく見る
                </a>
            </div>
        </div>
    </section>
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-divider4.png" alt="">

    <section id="news" class="wrapper">
        <span class="section-title-span">NEWS & BLOG </span>
        <h2 class="section-title">最新の活動</h2>
        <p class="text">植樹、イベント、教育の現場から</p>

        <div class="news-container">
            <div class="news-list">
                <?php
                // 最新の投稿を4件取得
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4,
                );
                $news_query = new WP_Query($args);
                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                        <article class="news-item">
                            <a href="<?php the_permalink(); ?>" class="news-link">
                                <div class="news-content">
                                    <div class="news-header">
                                        <span class="sakura-icon"></span>
                                        <h3 class="news-title"><?php the_title(); ?></h3>
                                    </div>
                                    <p class="news-category">
                                        <?php
                                        $categories = get_the_category();
                                        if (!empty($categories)) {
                                            echo '#' . esc_html($categories[0]->name);
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="arrow-icon"></div>
                            </a>
                        </article>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p>現在、新しい記事はありません。</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="insta-container">
            <div class="dummy-imsta">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-insta-dummy.png" alt="">
            </div>
        </div>
    </section>

    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-divider5.png" alt="">

    <section class="contact">
        <div class="wrapper">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="flex">
                <div class="left">
                    <h2 class="contact-title">CONTACT</h2>
                    <p class="contact-text">ご質問やご提案は、<br>いつでもお気軽にお送りください。</p>
                </div>
                <div class="right">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/arrow.png" alt="矢印" class="arrow">
                </div>
            </a>
        </div>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/top-sakura-deco2.png" alt="sakura-deco" class="before-footer-deco">
    </section>

</main>

<?php get_footer(); ?>