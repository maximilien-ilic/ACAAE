<?php
/**
 * Template Name: Les Actualités
 * @package acaae
 */

get_header();

$paged     = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$recherche = isset( $_GET['recherche'] ) ? sanitize_text_field( $_GET['recherche'] ) : '';
$date      = isset( $_GET['date'] )      ? sanitize_text_field( $_GET['date'] )      : '';
$auteur    = isset( $_GET['auteur'] )    ? absint( $_GET['auteur'] )                 : 0;
$ordre     = isset( $_GET['ordre'] )     ? sanitize_text_field( $_GET['ordre'] )     : 'DESC';

$args = array(
	'post_type'      => 'post',
	'posts_per_page' => 6,
	'paged'          => $paged,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => ( $ordre === 'ASC' ) ? 'ASC' : 'DESC',
);

if ( $recherche ) {
	$args['s'] = $recherche;
}

if ( $auteur ) {
	$args['author'] = $auteur;
}

if ( $date ) {
	$args['date_query'] = array(
		array( 'year' => intval( $date ) ),
	);
}

$query = new WP_Query( $args );

$auteurs = get_users( array( 'who' => 'authors' ) );

$annees = $wpdb->get_col(
	"SELECT DISTINCT YEAR(post_date) FROM {$wpdb->posts}
	WHERE post_status = 'publish' AND post_type = 'post'
	ORDER BY post_date DESC"
);
?>

<div class="actualites-page">

	<h1 class="actualites-title">Les actualités</h1>

	<form class="actualites-filters" method="GET" action="">
		<div class="filter-search actu-search">
			<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
			<input type="text" name="recherche" placeholder="Rechercher un article" value="<?php echo esc_attr( $recherche ); ?>">
		</div>

		<div class="filter-select actu-select">
			<select name="date" onchange="this.form.submit()">
				<option value="">Date</option>
				<?php foreach ( $annees as $annee ) : ?>
					<option value="<?php echo esc_attr( $annee ); ?>" <?php selected( $date, $annee ); ?>>
						<?php echo esc_html( $annee ); ?>
					</option>
				<?php endforeach; ?>
			</select>
			<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
		</div>

		<div class="filter-select actu-select">
			<select name="auteur" onchange="this.form.submit()">
				<option value="">Auteur/ice</option>
				<?php foreach ( $auteurs as $user ) : ?>
					<option value="<?php echo esc_attr( $user->ID ); ?>" <?php selected( $auteur, $user->ID ); ?>>
						<?php echo esc_html( $user->display_name ); ?>
					</option>
				<?php endforeach; ?>
			</select>
			<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
		</div>

		<div class="filter-select actu-select">
			<select name="ordre" onchange="this.form.submit()">
				<option value="DESC" <?php selected( $ordre, 'DESC' ); ?>>Plus récents</option>
				<option value="ASC"  <?php selected( $ordre, 'ASC' );  ?>>Plus anciens</option>
			</select>
			<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
		</div>
	</form>

	<div class="actualites-grid" id="actualites-grid">
		<?php if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<article class="actu-card">
				<div class="actu-card__image">
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'medium_large' ); ?>
					<?php else : ?>
						<div class="actu-card__placeholder"></div>
					<?php endif; ?>
				</div>
				<div class="actu-card__body">
					<h2 class="actu-card__title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h2>
					<div class="actu-card__meta">
						<span class="actu-meta-author">
							<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
							<?php the_author(); ?>
						</span>
						<span class="actu-meta-date">
							<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
							<?php echo get_the_date( 'd/m/y' ); ?>
						</span>
					</div>
					<p class="actu-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '.' ); ?></p>
					<a href="<?php the_permalink(); ?>" class="actu-card__link">Lire la suite</a>
				</div>
			</article>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p class="actualites-empty">Aucun article trouvé.</p>
		<?php endif; ?>
	</div>

	<?php if ( $query->max_num_pages > $paged ) : ?>
		<div class="actualites-loadmore-wrap">
			<button
				class="actualites-loadmore"
				data-page="<?php echo esc_attr( $paged + 1 ); ?>"
				data-max="<?php echo esc_attr( $query->max_num_pages ); ?>"
				data-recherche="<?php echo esc_attr( $recherche ); ?>"
				data-date="<?php echo esc_attr( $date ); ?>"
				data-auteur="<?php echo esc_attr( $auteur ); ?>"
				data-ordre="<?php echo esc_attr( $ordre ); ?>"
			>
				Charger plus
			</button>
		</div>
	<?php endif; ?>

</div>

<?php get_footer(); ?>