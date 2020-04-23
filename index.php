<?php get_header() ?>
<div class="home">
  <h1 class="home__title">
    Posts
  </h1>
  <div class="posts">
    <?php
    while (have_posts()) {
      the_post();
    ?>
      <a class="post-card" href="<?= the_permalink(); ?>">
        <div class="post-card__image">
          <img class="post-card__image" src="<?= get_the_post_thumbnail_url() ?>">
        </div>
        <div class="post-card__content">
          <h3 class="post-card__title"><?= the_title(); ?></h3>
          <p class="post-card__description"><?= get_the_excerpt(); ?></p>
          <div class="post-card__tags">
            <div class="post-card__tag" href="#">
              Coding Adventures
            </div>
          </div>
        </div>
      </a>
    <?php
    }
    echo paginate_links();
    ?>
  </div>
</div>
<?php get_footer() ?>