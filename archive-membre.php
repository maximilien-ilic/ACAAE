<?php get_header(); ?>

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

<?php get_footer(); ?>