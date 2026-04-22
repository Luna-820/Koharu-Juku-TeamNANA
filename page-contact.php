<?php get_header(); ?>

<main id="contact">
  <div class="fv">
    <h2 class="section-title"><span>CONTACT</span>お問い合わせ</h2>
    <img src="<?php echo get_template_directory_uri(); ?>/img/fv-bg.png" alt="背景" class="fv-bg" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-1 hanabira" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-2 hanabira" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-3 hanabira" />
  </div>


  <section class="wrapper">
    <p class="text">お気軽にお問い合わせください。</p>

    <!--GoogleForm埋め込み参考 https://form.run/media/contents/form-creation-tools/google-form-embedding/ -->
    <form class="text">
      <label for="name">お名前<span>*</span></label>
      <input type="text" id="name" name="name" required>

      <label for="email">メールアドレス<span>*</span></label>
      <input type="email" id="email" name="email" required>

      <label for="message">お問い合わせ内容<span>*</span></label>
      <textarea id="message" name="message" rows="5" required></textarea>

      <button type="submit">送信</button>
    </form>
  </section>

</main>

<?php get_footer(); ?>