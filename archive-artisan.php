<?php get_header(); ?>

<<<<<<< HEAD
<main id="primary" class="artisans-page">

	<div class="artisans-header">
		<h1 class="artisans-title">Nos artisans</h1>
	</div>

	<div class="artisans-grid">
		<?php
		$artisans = new WP_Query( array(
			'post_type'      => 'artisan',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
		) );

		if ( $artisans->have_posts() ) :
			while ( $artisans->have_posts() ) : $artisans->the_post();
				$photo      = get_field( 'photo' );
				$discipline = get_field( 'discipline' );
				$ville_terms = get_the_terms( get_the_ID(), 'ville_artisan' );
				$ville_name  = $ville_terms && ! is_wp_error( $ville_terms ) ? $ville_terms[0]->name : '';
		?>

		<article class="artisan-card">
			<div class="artisan-card__image">
				<?php if ( $photo ) : ?>
					<img src="<?= esc_url( $photo['url'] ) ?>"
					     alt="<?= esc_attr( $photo['alt'] ?: get_the_title() ) ?>">
				<?php else : ?>
					<div class="artisan-card__placeholder"></div>
				<?php endif; ?>
			</div>
			<div class="artisan-card__body">
				<h2 class="artisan-card__name"><?php the_title(); ?></h2>
				<?php if ( $discipline ) : ?>
					<p class="artisan-card__metier"><?= esc_html( $discipline ) ?></p>
				<?php endif; ?>
				<?php if ( $ville_name ) : ?>
					<p class="artisan-card__ville"><?= esc_html( $ville_name ) ?></p>
				<?php endif; ?>
				<a href="<?php the_permalink(); ?>" class="artisan-card__link">En savoir plus &rsaquo;</a>
			</div>
		</article>

		<?php
			endwhile;
			wp_reset_postdata();
		endif;
		?>
	</div>

=======
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
>>>>>>> pape
</main>

<?php get_footer(); ?>