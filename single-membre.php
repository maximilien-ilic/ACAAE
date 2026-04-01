<?php get_header(); ?>

<main id="primary" class="site-main">
	<?php while ( have_posts() ) : the_post();
		$photo      = get_field( 'photo' );
		$bio        = get_field( 'biographie' );
		$discipline = get_field( 'discipline' );
	?>

	<article class="membre-single">

		<div class="membre-single__photo">
			<?php if ( $photo ) : ?>
				<img src="<?= esc_url( $photo['url'] ) ?>"
				     alt="<?= esc_attr( $photo['alt'] ?: get_the_title() ) ?>"
				     class="membre-photo-large">
			<?php else : ?>
				<div class="membre-photo-placeholder"></div>
			<?php endif; ?>
		</div>

		<div class="membre-single-info">
			<h1><?php the_title(); ?></h1>

			<?php if ( $discipline ) : ?>
				<p class="membre-discipline"><?= esc_html( $discipline ) ?></p>
			<?php endif; ?>

			<?php if ( $bio ) : ?>
				<div class="membre-bio"><?= nl2br( esc_html( $bio ) ) ?></div>
			<?php endif; ?>

			<?php the_content(); ?>
		</div>

	</article>

	<?php endwhile; ?>
</main>

<?php get_footer(); ?>