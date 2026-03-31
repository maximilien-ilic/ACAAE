<?php get_header(); ?>

<main id="primary" class="site-main">
  <div class="artisans-grid">

    <?php
    $artisans = new WP_Query([
        'post_type'      => 'artisan',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ]);

    if ($artisans->have_posts()) :
        while ($artisans->have_posts()) : $artisans->the_post();
            $photo     = get_field('photo');
            $bio       = get_field('biographie');
            $discipline = get_field('discipline');
    ?>

    <article class="artisan-card">

      <?php if ($photo) : ?>
        <img src="<?= esc_url($photo['url']) ?>"
             alt="<?= esc_attr($photo['alt'] ?: get_the_title()) ?>"
             class="artisan-photo">
      <?php elseif (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('medium', ['class' => 'artisan-photo']); ?>
      <?php endif; ?>

      <div class="artisan-info">
        <h2 class="artisan-name"><?php the_title(); ?></h2>

        <?php if ($discipline) : ?>
          <span class="artisan-discipline"><?= esc_html($discipline) ?></span>
        <?php endif; ?>

        <?php if ($bio) : ?>
          <p class="artisan-bio"><?= esc_html($bio) ?></p>
        <?php endif; ?>

        <a href="<?php the_permalink(); ?>" class="artisan-lien">
          Voir le profil
        </a>
      </div>

    </article>

    <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>

  </div>
</main>

<?php get_footer(); ?>