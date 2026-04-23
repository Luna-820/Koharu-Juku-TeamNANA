(function ($) {
  $(function () {
    // --------------------------------
    // .body外でもスクロール
    const inner = document.querySelector(".body__inner");
    let velocity = 0;
    let rafId = null;

    window.addEventListener(
      "wheel",
      (e) => {
        // ★ハンバーガーメニューが開いてる時はスクロール禁止★
        if (document.querySelector('header').classList.contains('active')) return;
        velocity += e.deltaY * 0.4;
        if (rafId) return;
        const step = () => {
          inner.scrollTop += velocity;
          velocity *= 0.85;
          if (Math.abs(velocity) > 0.5) {
            rafId = requestAnimationFrame(step);
          } else {
            velocity = 0;
            rafId = null;
          }
        };
        rafId = requestAnimationFrame(step);
      },
      { passive: true },
    );

    // --------------------------------
    // サービスページ　カード
    // --------------------------------

    // innerまでの距離を正確に取得する関数
    const getOffsetTop = (el) => {
      let top = 0;
      while (el && el !== inner) {
        top += el.offsetTop;
        el = el.offsetParent;
      }
      return top;
    };

    // --------------------------------
    // ページ内リンク スムーススクロール
    // --------------------------------
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
      anchor.addEventListener("click", (e) => {
        e.preventDefault();
        const target = document.querySelector(anchor.getAttribute("href"));
        if (!target) return;

        const targetTop = getOffsetTop(target);
        inner.scrollTo({ top: targetTop, behavior: "smooth" });
      });
    });

    const setupCardSection = (sectionSelector) => {
      const section = document.querySelector(sectionSelector);
      if (!section) return;

      const cards = section.querySelectorAll(".card");
      if (cards.length <= 1) return;

      // --------------------------------
      // ドットナビ生成
      // --------------------------------
      const nav = document.createElement("div");
      nav.classList.add("card-nav");
      cards.forEach((_, i) => {
        const dot = document.createElement("span");
        dot.classList.add("card-nav__dot");
        nav.appendChild(dot);
      });
      section.querySelector(".box").appendChild(nav);

      const dots = nav.querySelectorAll(".card-nav__dot");

      const handleScroll = () => {
        const scrollY = inner.scrollTop;
        const sectionTop = getOffsetTop(section);
        const localScroll = scrollY - sectionTop;

        if (localScroll < 0) {
          cards.forEach((card, i) => card.classList.toggle("active", i === 0));
          dots.forEach((dot, i) => dot.classList.toggle("active", i === 0));
          return;
        }

        const sectionHeight = window.innerHeight;
        const index = Math.min(
          Math.floor(localScroll / sectionHeight),
          cards.length - 1
        );

        cards.forEach((card, i) => card.classList.toggle("active", i === index));
        dots.forEach((dot, i) => dot.classList.toggle("active", i === index));
      };

      inner.addEventListener("scroll", handleScroll);
      handleScroll();
    };

    setupCardSection(".card-section-sakura");
    setupCardSection(".card-section-esports");

    // // --------------------------------
    // // スポンサーページソート機能
    // // --------------------------------

    // 1. 要素を取得
    const $filterBtn = $('.filter-list li');
    
    $filterBtn.on('click', function () {
      const filter = $(this).attr('data-filter');

      // ボタンのactive切り替え
      $filterBtn.removeClass('active');
      $(this).addClass('active');

      // 対象となる箱をその都度定義
      const $targetBoxes = $('.partner-box');

      if (filter === 'all') {
        // 全て表示
        $targetBoxes.stop(true, true).fadeIn(300);
      } else {
        // 一旦すべて隠して、対象だけ出す（fadeOutのコールバックを待たずに処理する方が安全）
        $targetBoxes.stop(true, true).hide(); // パッと消す
        $('.partner-box.' + filter).stop(true, true).fadeIn(300); // 該当のみふわっと出す
      }
    });

    // --------------------------------
    // 1. ハンバーガーメニュー開閉
    // --------------------------------
    $('.hamburger_toggle').on('click', function (e) {
      e.stopPropagation();
      $('header').toggleClass('active');

      // メニューが開いたら inner を隠し、背景の固定を確実にする
      if ($('header').hasClass('active')) {
        $('.body__inner').css('overflow', 'hidden');
      } else {
        $('.body__inner').css('overflow-y', 'scroll');
      }
    });

    // 背景クリックで閉じる
    $('.hamburger-menu').on('click', function () {
      $('header').removeClass('active');
      $('.body__inner').css('overflow-y', 'scroll');
    });

    $('.hamburger-menu__inner').on('click', function (e) {
      e.stopPropagation();
    });

    // ---------------------------------------------------------
    // メニュー開閉時だけスクロールを強制ブロック
    // ---------------------------------------------------------
    // $(window).on('wheel touchmove', function (e) {
    //   // もし header が active クラス（メニュー開状態）を持っていたら
    //   if ($('header').hasClass('active')) {
    //     // 全てのスクロール動作を強制的にキャンセルする
    //     e.preventDefault();
    //     return false;
    //   }
    // }, { passive: false });

    ['wheel', 'touchmove'].forEach(function (eventType) {
      window.addEventListener(eventType, function (e) {
        if ($('header').hasClass('active')) {
          e.preventDefault();
        }
      }, { passive: false });
    });


  });
})(jQuery);