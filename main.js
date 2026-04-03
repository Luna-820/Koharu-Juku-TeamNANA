$(function () {

  // --------------------------------
  // .body外でスクロール

  window.addEventListener('wheel', (e) => {
    const inner = document.querySelector('.body_inner');
    inner.scrollTop += e.deltaY;
  });
  // --------------------------------
  
});