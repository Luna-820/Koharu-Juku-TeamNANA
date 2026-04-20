<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <aside class="side-menu">
    <div class="side-menu__inner">
      <nav class="side-menu__nav">
        <ul class="side-menu__list">
          <li class="<?php echo koharu_nav_class( 'home' ); ?>">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />
              トップ
            </a>
          </li>
          <li class="<?php echo koharu_nav_class( 'service' ); ?>">
            <a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />
              事業内容
            </a>
          </li>
          <li class="<?php echo koharu_nav_class( 'about' ); ?>">
            <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />
              私たちについて
            </a>
          </li>
          <li class="<?php echo koharu_nav_class( 'blog' ); ?>">
            <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />
              最新情報
            </a>
          </li>
          <li class="<?php echo koharu_nav_class( 'sponsor' ); ?>">
            <a href="<?php echo esc_url( home_url( '/sponsor/' ) ); ?>">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />
              スポンサー
            </a>
          </li>
          <li class="<?php echo koharu_nav_class( 'contact' ); ?>">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />
              お問い合わせ
            </a>
          </li>
        </ul>
      </nav>

      <nav class="side-menu__sub">
        <ul class="side-menu__list">
          <li>
            <a href="#" target="_blank">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />
              Youtube
            </a>
          </li>
          <li>
            <a href="#" target="_blank">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />
              Instagram
            </a>
          </li>
          <li>
            <a href="#" target="_blank">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />
              Tiktok
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <div class="petals">
    <!-- 画面左 -->
    <div class="petal" style="left: 5%; animation-duration: 13s; animation-delay: 0s; width: 30px; height: 30px;"></div>
    <div class="petal" style="left: 10%; animation-duration: 13s; animation-delay: 6s; width: 50px; height: 50px;"></div>
    <div class="petal" style="left: 25%; animation-duration: 13s; animation-delay: 2.5s; width: 36px; height: 36px;"></div>
    <div class="petal" style="left: 20%; animation-duration: 13s; animation-delay: 10s; width: 40px; height: 40px;"></div>
    <!-- 画面右 -->
    <div class="petal" style="left: 70%; animation-duration: 13s; animation-delay: 6s; width: 32px; height: 32px;"></div>
    <div class="petal" style="left: 82%; animation-duration: 13s; animation-delay: 1s; width: 40px; height: 40px;"></div>
    <div class="petal" style="left: 94%; animation-duration: 13s; animation-delay: 10s; width: 34px; height: 34px;"></div>
  </div>

  <div class="body">
    <div class="body__inner">

      <header>
        <div class="hamburger_toggle">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <nav class="hamburger-menu">
          <div class="hamburger-menu__inner">
            <ul class="hamburger-menu__list">
              <li class="<?php echo koharu_nav_class( 'home' ); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />トップ
                </a>
              </li>
              <li class="<?php echo koharu_nav_class( 'service' ); ?>">
                <a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />事業内容
                </a>
              </li>
              <li class="<?php echo koharu_nav_class( 'about' ); ?>">
                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />私たちについて
                </a>
              </li>
              <li class="<?php echo koharu_nav_class( 'blog' ); ?>">
                <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />最新情報
                </a>
              </li>
              <li class="<?php echo koharu_nav_class( 'sponsor' ); ?>">
                <a href="<?php echo esc_url( home_url( '/sponsor/' ) ); ?>">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />スポンサー
                </a>
              </li>
              <li class="<?php echo koharu_nav_class( 'contact' ); ?>">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-deco.png" alt="" class="sakura-icon" />お問い合わせ
                </a>
              </li>
            </ul>
            <div class="hamburger-menu__sub">
              <ul>
                <li><a href="#" target="_blank">Youtube</a></li>
                <li><a href="#" target="_blank">Instagram</a></li>
                <li><a href="#" target="_blank">Tiktok</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
