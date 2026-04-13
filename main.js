$(function () {
  // --------------------------------
  // .body外でもスクロール
  const inner = document.querySelector(".body__inner");
  let velocity = 0;
  let rafId = null;

  window.addEventListener(
    "wheel",
    (e) => {
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
  // --------------------------------
});