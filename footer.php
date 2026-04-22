      <footer>
        <div class="footer__inner wrapper">
          <div class="footer__content">
            <div class="footer__info">
              <h2 class="footer__logo">心晴塾</h2>
              <div class="footer__contact">
                <p class="footer__tel">
                  <a href="tel:080-9496-3177">080-9496-3177</a>
                </p>
                <p class="footer__email">
                  <a href="mailto:yamanaka.shokupan@gmail.com">yamanaka.shokupan@gmail.com</a>
                </p>
              </div>
              <ul class="footer__sns">
                <li>
                  <a href="#" target="_blank">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/footer-icon-ig.png" alt="Instagram" />
                  </a>
                </li>
                <li>
                  <a href="#" target="_blank">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/footer-icon-tiktok.png" alt="Tiktok" />
                  </a>
                </li>
                <li>
                  <a href="#" target="_blank">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/footer-icon-yt.png" alt="YouTube" />
                  </a>
                </li>
              </ul>
            </div>

            <nav class="footer__nav">
              <ul class="footer__menu">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a></li>
                <li><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">事業内容</a></li>
                <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">私たちについて</a></li>
                <li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">最新情報</a></li>
                <li><a href="<?php echo esc_url( home_url( '/sponsor/' ) ); ?>">スポンサー</a></li>
                <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a></li>
              </ul>
            </nav>
          </div>

          <div class="footer__bottom">
            <hr class="footer__line" />
            <p class="footer__copyright">&copy; <?php echo date( 'Y' ); ?>年 心晴塾</p>
            <ul class="footer__sub-links">
              <li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>">利用規約</a></li>
              <li><a href="<?php echo esc_url( home_url( '/policy/' ) ); ?>">プライバシーポリシー</a></li>
            </ul>
          </div>
        </div>
      </footer>

      <?php wp_footer(); ?>

    </div><!-- /.body__inner -->
  </div><!-- /.body -->

</body>
</html>
