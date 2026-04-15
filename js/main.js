$(function() {
    // 1. 要素を取得
    const $filterBtn = $('.filter-list li'); // ボタン
    const $sponsorBox = $('.sponsor-box');  // 切り替える箱

    $filterBtn.on('click', function() {
        // 2. クリックされたボタンの data-filter の値を取得（all, individual など）
        const filter = $(this).attr('data-filter');

        // 3. ボタンの見た目（activeクラス）を切り替え
        $filterBtn.removeClass('active');
        $(this).addClass('active');

        // 4. アニメーション処理
        if (filter === 'all') {
            // 「全て」なら全部出す
            $sponsorBox.stop().fadeOut(200, function() {
                $sponsorBox.fadeIn(300);
            });
        } else {
            // 一旦全部消して、該当するクラスだけ出す
            $sponsorBox.stop().fadeOut(200, function() {
                // ここで HTML の li に付けたクラス（.individual など）を探しています
                $('.' + filter).fadeIn(300);
            });
        }
    });
});