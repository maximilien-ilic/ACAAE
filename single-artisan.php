<?php get_header(); ?>

<main id="primary" class="site-main">
	<?php while ( have_posts() ) : the_post();
		$photo      = get_field( 'photo' );
		$bio        = get_field( 'biographie' );
		$discipline = get_field( 'discipline' );
	?>

	<article class="artisan-single">

		<div class="artisan-single__photo">
			<?php if ( $photo ) : ?>
				<img src="<?= esc_url( $photo['url'] ) ?>"
				     alt="<?= esc_attr( $photo['alt'] ?: get_the_title() ) ?>"
				     class="artisan-photo-large">
			<?php else : ?>
				<div class="artisan-photo-placeholder"></div>
			<?php endif; ?>
		</div>

		<div class="artisan-single-info">
			<h1><?php the_title(); ?></h1>

			<?php if ( $discipline ) : ?>
				<p class="artisan-discipline"><?= esc_html( $discipline ) ?></p>
			<?php endif; ?>

			<?php if ( $bio ) : ?>
				<div class="artisan-bio"><?= nl2br( esc_html( $bio ) ) ?></div>
			<?php endif; ?>

			<?php the_content(); ?>
		</div>

	</article>

	<?php endwhile; ?>
</main>

<?php get_footer(); ?>