<?php get_header(); ?>

<main id="blog-detail">
  <div class="fv">
    <h2 class="section-title"><span>NEWS & BLOG</span>最新の活動</h2>
    <img src="<?php echo get_template_directory_uri(); ?>/img/fv-bg.png" alt="背景" class="fv-bg" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-1 hanabira" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-2 hanabira" />
    <img src="<?php echo get_template_directory_uri(); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-3 hanabira" />
  </div>

  <!--  -->
  <section class="blog">
    <div class="wrapper">
      <nav class="blog__category-nav">
        <ul class="list">
          <li class="item">
            <span>すべて</span>
          </li>
          <?php
          $category_slugs = array( 'sakura', 'movie', 'esports' );
          $categories = array();
          foreach ( $category_slugs as $slug ) {
            $cat = get_category_by_slug( $slug );
            if ( $cat ) $categories[] = $cat;
          }
          $current_cats = wp_list_pluck( get_the_category(), 'term_id' );

          foreach ( $categories as $cat ) :
            $is_active = in_array( $cat->term_id, $current_cats ) ? 'is-active' : '';
          ?>
          <li class="item <?php echo $is_active; ?>">
            <span><?php echo esc_html( $cat->name ); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
      </nav>

      <?php
      if (have_posts()) :
        while (have_posts()) :
          the_post();
      ?>
          <article class="post">
            <div class="post__header">
              <h3 class="title"><?php the_field('blog_title'); ?></h3>
              <?php
              $cats = get_the_category();
              if ($cats) :
              ?>
                <p class="category"># <?php echo esc_html($cats[0]->name); ?></p>
              <?php endif; ?>
            </div>

            <?php
            $image = get_field('blog_img');
            if ($image):
            ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="post__img" />
            <?php endif; ?>

            <p class="post__textarea">
              <?php the_field('blog_text'); ?>
            </p>
          </article>

        <?php
        endwhile;
      else:
        ?>
        <p class="no_post">投稿はありません</p>
      <?php endif; ?>

      <!-- <a href="javascript:history.back()" class="post__back">一覧に戻る 〉</a> -->
      <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="post__back">一覧に戻る 〉</a>

    </div>
    <img src="<?php echo get_template_directory_uri(); ?>/img/blog-bg.png" alt="背景" class="blog__bg" />
  </section>

  <section class="contact">
    <div class="wrapper">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="flex">
        <div class="left">
          <h2 class="contact-title">CONTACT</h2>
          <p class="contact-text">ご質問やご提案は、<br>いつでもお気軽にお送りください。</p>
        </div>
        <div class="right">
          <img src="<?php echo get_template_directory_uri(); ?>/img/arrow.png" alt="矢印" class="arrow">
        </div>
      </a>
    </div>
    <img src="<?php echo get_template_directory_uri(); ?>/img/top-sakura-deco2.png" alt="sakura-deco" class="before-footer-deco">
  </section>
</main>

<?php get_footer(); ?>