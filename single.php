<?php
  get_header();
  the_post();
?>
<main>
  <div class="single-post">
    <h1 class="single-post__title"><?= the_title(); ?></h1>
    <?php the_content(); ?>
  </div>
</main>
<?php get_footer(); ?>