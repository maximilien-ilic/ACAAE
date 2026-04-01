<?php get_header(); ?>

<<<<<<< HEAD
<div class="membres-page">

	<h1 class="membres-title">Les membres</h1>

	<div class="membres-grid">
		<?php
		$membres = new WP_Query( array(
			'post_type'      => 'membre',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
		) );

		if ( $membres->have_posts() ) :
			while ( $membres->have_posts() ) : $membres->the_post();
				$photo      = get_field( 'photo' );
				$discipline = get_field( 'discipline' );
		?>

		<article class="membre-card">
			<div class="membre-card__image">
				<?php if ( $photo ) : ?>
					<img src="<?= esc_url( $photo['url'] ) ?>" alt="<?= esc_attr( $photo['alt'] ?: get_the_title() ) ?>">
				<?php else : ?>
					<div class="membre-card__placeholder"></div>
				<?php endif; ?>
			</div>
			<div class="membre-card__body">
				<h2 class="membre-card__name"><?php the_title(); ?></h2>
				<?php if ( $discipline ) : ?>
					<p class="membre-card__metier"><?= esc_html( $discipline ) ?></p>
				<?php endif; ?>
				<a href="<?php the_permalink(); ?>" class="membre-card__link">En savoir plus &rsaquo;</a>
			</div>
		</article>

		<?php
			endwhile;
			wp_reset_postdata();
		endif;
		?>
	</div>

</div>
=======
<main id="primary" class="site-main">
  <div class="membre-grid">

    <?php
    $membre = new WP_Query([
        'post_type'      => 'membre',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ]);

    if ($membre->have_posts()) :
        while ($membre->have_posts()) : $membre->the_post();
            $photo     = get_field('photo');
            $bio       = get_field('biographie');
            $discipline = get_field('discipline');
    ?>

    <article class="membre-card">

      <?php if ($photo) : ?>
        <img src="<?= esc_url($photo['url']) ?>"
             alt="<?= esc_attr($photo['alt'] ?: get_the_title()) ?>"
             class="membre-photo">
      <?php elseif (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('medium', ['class' => 'membre-photo']); ?>
      <?php endif; ?>

      <div class="membre-info">
        <h2 class="membre-name"><?php the_title(); ?></h2>

        <?php if ($discipline) : ?>
          <span class="membre-discipline"><?= esc_html($discipline) ?></span>
        <?php endif; ?>

        <?php if ($bio) : ?>
          <p class="membre-bio"><?= esc_html($bio) ?></p>
        <?php endif; ?>

        <a href="<?php the_permalink(); ?>" class="membre-lien">
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
>>>>>>> pape

<?php get_footer(); ?>