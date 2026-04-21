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
                <li class="item <?php echo !isset($_GET['cat']) ? 'is-active' : ''; ?>">
                  <a href="<?php echo esc_url( get_permalink() ); ?>">
                    すべて
                  </a>
                </li>

                <?php
                  $category_slugs = array( 'sakura', 'movie', 'esports' );
                  $categories = array();
                  foreach ( $category_slugs as $slug ) {
                    $cat = get_category_by_slug( $slug );
                    if ( $cat ) $categories[] = $cat;
                  }

                  foreach ( $categories as $cat ) :
                    $is_active = isset($_GET['cat']) && $_GET['cat'] == $cat->term_id ? 'is-active' : '';
                  ?>
                <li class="item <?php echo $is_active; ?>">
                  <a href="<?php echo esc_url( add_query_arg( 'cat', $cat->term_id, get_permalink() ) ); ?>"><?php echo esc_html( $cat->name ); ?></a>
                </li>
                <?php endforeach; ?>
              </ul>
            </nav>

            <ul class="blog__posts">

              <?php 
              $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
              // 投稿タイプを post に指定
              $args = array(
                'post_type'      => 'post',   // ← 通常の投稿
                'posts_per_page' => 5,       // 全件表示
                'paged'          => $paged, 
              );
              if ( isset($_GET['cat']) && !empty($_GET['cat']) ) {
                $args['cat'] = intval( $_GET['cat'] );
              }
              $news_query = new WP_Query($args);

              if ($news_query->have_posts()) :
                while ($news_query->have_posts()) : $news_query->the_post();
              ?>

              <li class="post">
                <article>
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
                        <?php
                        $cats = get_the_category();
                        if ( $cats ) :
                        ?>
                        <p class="category"># <?php echo esc_html( $cats[0]->name ); ?></p>
                        <?php endif; ?>
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

            <?php
              global $wp_query;
              $temp_query = $wp_query;
              $wp_query   = $news_query;

              the_posts_pagination(array(
                  'mid_size'           => 2,
                  'prev_text'          => false,
                  'next_text'          => false,
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