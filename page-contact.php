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
      action="https://docs.google.com/forms/d/e/1FAIpQLSfZsmMpd1kB3Q-wfoqlDfbyoSpA6jWFUs11LN1DEuzBnyleLA/formResponse"
      method="POST"
      target="hidden_iframe"
      class="text">
      <label for="email">メールアドレス<span>*</span></label>
      <input type="email" id="email" name="entry.1942642596" required>

      <label for="tel">電話番号（ハイフン不要）<span>*</span></label>
      <input type="tel" id="tel" name="entry.47750521" inputmode="tel" pattern="[0-9\-+\s()]*" required>

      <label for="name">お名前<span>*</span></label>
      <input type="text" id="name" name="entry.889829965" required>

      <label for="furigana">お名前（ふりがな）<span>*</span></label>
      <input type="text" id="furigana" name="entry.1464438946" required>

      <label for="inquiry-type">件名<span>*</span></label>
      <select id="inquiry-type" name="entry.115181633" required>
        <option value="">選択してください</option>
        <option value="お問い合わせ">お問い合わせ</option>
        <option value="スポンサーに関して">スポンサーに関して</option>
        <option value="ご意見・ご感想">ご意見・ご感想</option>
        <option value="__other_option__">その他</option>
      </select>

      <label for="inquiry-other" id="inquiry-other-label" hidden>その他の内容<span>*</span></label>
      <input type="text" id="inquiry-other" name="entry.115181633.other_option_response" hidden disabled>

      <label for="message">内容<span>*</span></label>
      <textarea id="message" name="entry.1457973658" rows="5" required></textarea>

      <button type="submit">送信</button>

      <p id="contact-thanks" hidden>送信が完了しました。<br>お問い合わせありがとうございました。</p>
    </form>

    <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;"></iframe>

    <script>
      (function () {
        var form = document.getElementById('contact-form');
        var iframe = document.getElementById('hidden_iframe');
        var thanks = document.getElementById('contact-thanks');
        var inquiryType = document.getElementById('inquiry-type');
        var inquiryOther = document.getElementById('inquiry-other');
        var inquiryOtherLabel = document.getElementById('inquiry-other-label');
        var submitted = false;

        function toggleInquiryOther() {
          var isOther = inquiryType.value === '__other_option__';
          inquiryOther.hidden = !isOther;
          inquiryOtherLabel.hidden = !isOther;
          inquiryOther.disabled = !isOther;
          inquiryOther.required = isOther;
          if (!isOther) inquiryOther.value = '';
        }

        inquiryType.addEventListener('change', toggleInquiryOther);
        toggleInquiryOther();

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