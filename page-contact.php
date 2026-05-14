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
    <form
      id="contact-form"
      action="https://docs.google.com/forms/u/0/d/e/1FAIpQLSeN4spBJ-XLlXJz7tzC73Zg9VA1CdC0UoCKR0C68EvfTllkbg/formResponse"
      method="POST"
      target="hidden_iframe"
      class="text">
      <label for="email">メールアドレス<span>*</span></label>
      <input type="email" id="email" name="emailAddress" required>

      <label for="tel">電話番号（ハイフン不要）<span>*</span></label>
      <input type="tel" id="tel" name="entry.2023519439" inputmode="tel" pattern="[0-9\-+\s()]*" required>

      <label for="name">お名前<span>*</span></label>
      <input type="text" id="name" name="entry.182902865" required>

      <label for="furigana">お名前（ふりがな）<span>*</span></label>
      <input type="text" id="furigana" name="entry.2124998249" required>

      <label for="inquiry-type">件名<span>*</span></label>
      <select id="inquiry-type" name="entry.2137939297" required>
        <option value="">選択してください</option>
        <option value="お問い合わせ">お問い合わせ</option>
        <option value="スポンサーに関して">スポンサーに関して</option>
        <option value="ご意見・ご感想">ご意見・ご感想</option>
        <option value="その他">その他</option>
      </select>

      <label for="message">内容<span>*</span></label>
      <textarea id="message" name="entry.291457283" rows="5" required></textarea>

      <button type="submit">送信</button>

      <p id="contact-thanks" hidden>送信が完了しました。<br>お問い合わせありがとうございました。</p>
    </form>

    <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;"></iframe>

    <script>
      (function () {
        var form = document.getElementById('contact-form');
        var iframe = document.getElementById('hidden_iframe');
        var thanks = document.getElementById('contact-thanks');
        var submitted = false;

        form.addEventListener('submit', function () {
          submitted = true;
        });

        iframe.addEventListener('load', function () {
          if (!submitted) return;
          Array.prototype.forEach.call(form.children, function (el) {
            if (el.id !== 'contact-thanks') el.style.display = 'none';
          });
          thanks.hidden = false;
          form.reset();
        });
      })();
    </script>
  </section>

</main>

<?php get_footer(); ?>