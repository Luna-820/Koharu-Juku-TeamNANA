<?php get_header(); ?>
<main id="partners">
    <div class="fv">
        <h2 class="section-title"><span>SPONSORS</span>スポンサー・協賛企業</h2>
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/fv-bg.png" alt="背景" class="fv-bg">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-1 hanabira">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-2 hanabira">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-3 hanabira">
    </div>

    <section id="list">
        <ul class="filter-list flex">
            <li class="active" data-filter="all">全て</li>
            <li data-filter="individual">個人</li>
            <li data-filter="corporate">法人</li>
            <li data-filter="government">行政</li>
        </ul>

        <ul class="partners wrapper">
            <?php
            $args = array(
                'post_type'      => 'sponsor',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            );
            $sponsor_query = new WP_Query($args);

            if ($sponsor_query->have_posts()) :
                while ($sponsor_query->have_posts()) : $sponsor_query->the_post();
                    // フィールドの取得
                    $name      = get_field('sponsor_name');
                    $type_slug = get_field('sponsor_type'); 
                    $logo      = get_field('sponsor_logo');
                    $url       = get_field('sponsor_url');

                    if (!$name) continue;

                    // --- 修正ポイント：ラベル取得の自動化 ---
                    // get_field_object を使うことで、ACF設定内の「値 : ラベル」のペアを丸ごと取得します
                    $field = get_field_object('sponsor_type');
                    $type_label = ($field && isset($field['choices'][$type_slug])) ? $field['choices'][$type_slug] : '未分類';

                    // ロゴURLの取得（配列・文字列・IDどれでも安全にURLを返すように修正）
                    $logo_url = '';
                    if (is_array($logo)) {
                        $logo_url = $logo['url'] ?? '';
                    } elseif (is_numeric($logo)) {
                        $logo_url = wp_get_attachment_url($logo);
                    } elseif (is_string($logo)) {
                        $logo_url = $logo;
                    }
            ?>
                    <li class="partner-box <?php echo esc_attr($type_slug); ?>">
                        <a href="<?php echo $url ? esc_url($url) : '#'; ?>" <?php echo $url ? 'target="_blank" rel="noopener"' : ''; ?>>
                            <div class="logo">
                                <?php if ($logo_url) : ?>
                                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($name); ?> ロゴ">
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/partners-thankyou-logo.png" alt="Thankyou-logo">
                                <?php endif; ?>
                            </div>
                            <div class="info">
                                <p class="name"><?php echo esc_html($name); ?></p>
                                <span class="tag">#<?php echo esc_html($type_label); ?></span>
                            </div>
                        </a>
                    </li>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <p>現在、スポンサー様を募集しております。</p>
            <?php endif; ?>
        </ul>
    </section>

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
    </section>
</main>
<?php get_footer(); ?>