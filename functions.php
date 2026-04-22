<?php

function koharu_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'koharu_setup');

function koharu_scripts()
{
    // Google Fonts
    wp_enqueue_style(
        'koharu-google-fonts',
        'https://fonts.googleapis.com/css2?family=Hina+Mincho&family=Noto+Sans+JP:wght@100..900&family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&family=Sassy+Frass&family=Vujahday+Script&display=swap',
        array(),
        null
    );

    // メインCSS
    wp_enqueue_style(
        'koharu-main',
        get_template_directory_uri() . '/main.css',
        array('koharu-google-fonts'),
        wp_get_theme()->get('Version')
    );

    // jQuery（WordPressバンドル版）＋ main.js読み込む
    wp_enqueue_script(
        'koharu-main',
        get_template_directory_uri() . '/main.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'koharu_scripts');

/**
 * ナビゲーションのis-activeクラス判定
 *
 * @param string $page  'home' | 'service' | 'about' | 'blog' | 'sponsor' | 'contact'
 * @return string       ' is-active' or ''
 */
function koharu_nav_class($page)
{
    switch ($page) {
        case 'home':
            return is_front_page() ? 'is-active' : '';
        case 'service':
            return is_page('service') ? ' is-active' : '';
        case 'about':
            return is_page('about') ? ' is-active' : '';
        case 'blog':
            // return ( is_home() || is_singular( 'post' ) || is_category() || is_tag() ) ? ' is-active' : '';
            return ((is_home() && !is_front_page()) || is_archive() || is_singular('post')) ? 'is-active' : '';
        case 'sponsor':
            return is_page('sponsor') ? ' is-active' : '';
        case 'contact':
            return is_page('contact') ? ' is-active' : '';
        default:
            return '';
    }
}

// blogカテゴリー自動生成
function koharu_insert_default_categories()
{
    $categories = array(
        array('name' => '桜',       'slug' => 'sakura'),
        array('name' => '映画',     'slug' => 'movie'),
        array('name' => 'eスポーツ', 'slug' => 'esports'),
    );

    foreach ($categories as $cat) {
        if (! get_category_by_slug($cat['slug'])) {
            wp_insert_term($cat['name'], 'category', array('slug' => $cat['slug']));
        }
    }
}
add_action('after_setup_theme', 'koharu_insert_default_categories');

// スポンサー用のカスタム投稿タイプを作成
function create_sponsor_post_type() {
    register_post_type(
        'sponsor',
        array(
            'labels' => array(
                'name' => __('スポンサー'),
                'singular_name' => __('スポンサー'),
                'add_new_item' => __('新しいスポンサーを追加'),
            ),
            'public' => true,
            'has_archive' => false,
            'menu_icon' => 'dashicons-businessperson',
            // --- ここを title だけにする ---
            'supports' => array('title'), // 本文（editor）を消す
            // ---------------------------
        )
    );
}
add_action('init', 'create_sponsor_post_type');