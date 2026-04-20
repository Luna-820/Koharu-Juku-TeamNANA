<?php get_header(); ?>

      <main id="blog">
        <div class="fv">
          <h2 class="section-title"><span>NEWS & BLOG</span>最新の活動</h2>
          <img src="<?php echo get_template_directory_uri(); ?>/img/fv-bg3.png" alt="背景" class="fv-bg" />
          <img src="<?php echo get_template_directory_uri(); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-1 hanabira" />
          <img src="<?php echo get_template_directory_uri(); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-2 hanabira" />
          <img src="<?php echo get_template_directory_uri(); ?>/img/haanbira-3.png" alt="花びら" class="hanabira-3 hanabira" />
        </div>

        <!--  -->
        <section class="blog">
          <div class="wrapper">
            <nav class="blog__category-nav">
              <ul class="list">
                <li class="item is-active"><a href="#">すべて</a></li>
                <li class="item"><a href="#">桜</a></li>
                <li class="item"><a href="#">映画</a></li>
                <li class="item"><a href="#">eスポーツ</a></li>
              </ul>
            </nav>

            <ul class="blog__posts">

              <?php 
              $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
              // 投稿タイプを post に指定
              $args = array(
                'post_type'      => 'post',   // ← 通常の投稿
                'posts_per_page' => 1,       // 全件表示
                'paged'          => $paged, 
              );
              $news_query = new WP_Query($args);

              if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
              ?>

              <li class="post">
                <article>
                  <!-- todo -->
                  <a href="<?php the_permalink(); ?>" class="post__link">
                    <?php 
                    $image = get_field('blog_img');
                    if ($image): 
                    ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img" />
                    <?php endif; ?>
                    <div class="flex">
                      <div class="flex__left">
                        <h3 class="title">
                          <img src="<?php echo get_template_directory_uri(); ?>/img/blog-hanabira.png" alt="桜" class="sakura" />
                          <?php the_field('blog_title'); ?>
                        </h3>
                        <p class="category"># 桜</p>
                        <!-- <a href="#" class="category">桜</a> -->
                      </div>

                      <div class="flex__right">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/blog-arrow.png" alt="矢印" class="arrow" />
                      </div>
                    </div>
                  </a>
                </article>
              </li>

              <?php
            endwhile;
          else:
          ?> 
          <p class="no_post">投稿はありません</p>
          <?php endif; ?>

            </ul>

            <!-- <nav class="navigation pagination" aria-label="投稿">
              <div class="nav-links">
                <span aria-current="page" class="page-numbers current">1</span>
                <a class="page-numbers" href="#">2</a>
                <a class="page-numbers" href="#">3</a>
              </div>
            </nav> -->

            <?php
              global $wp_query;
              $temp_query = $wp_query;
              $wp_query   = $news_query;

              the_posts_pagination(array(
                  'mid_size'           => 2,
                  'prev_text'          => '',
                  'next_text'          => '',
                  'screen_reader_text' => '',
                  'aria_label'         => '投稿',
              ));

              $wp_query = $temp_query;
              wp_reset_postdata();
              ?>

          </div>
          <img src="<?php echo get_template_directory_uri(); ?>/img/blog-bg.png" alt="背景" class="blog__bg" />
        </section>

        <section class="contact">
          <div class="wrapper">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="flex">
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