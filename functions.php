<?php
/**
 * acaae functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package acaae
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function acaae_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on acaae, use a find and replace
		* to change 'acaae' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'acaae', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'acaae' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'acaae_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'acaae_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function acaae_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'acaae_content_width', 640 );
}
add_action( 'after_setup_theme', 'acaae_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function acaae_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'acaae' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'acaae' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'acaae_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function acaae_scripts() {
	wp_enqueue_style( 'acaae-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'acaae-style', 'rtl', 'replace' );

	wp_enqueue_script( 'acaae-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'acaae_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function asso_register_cpt() {
    // Artisans
    register_post_type('artisan', [
        'labels' => [
            'name'          => 'Artisans',
            'singular_name' => 'Artisan',
            'add_new_item'  => 'Ajouter un artisan',
        ],
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-admin-users',
        'supports'     => ['title', 'thumbnail', 'editor'],
        'rewrite'      => ['slug' => 'artisans'],
    ]);

    // Membres 
    register_post_type('membre', [
        'labels' => [
            'name'          => 'Membres',
            'singular_name' => 'Membre',
            'add_new_item'  => 'Ajouter un membre',
        ],
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-groups',
        'supports'     => ['title', 'thumbnail', 'editor'],
        'rewrite'      => ['slug' => 'membres'],
    ]);
}
add_action('init', 'asso_register_cpt');

function acaae_register_membre_cpt() {
	register_post_type( 'membre', array(
		'labels' => array(
			'name'          => 'Membres',
			'singular_name' => 'Membre',
			'add_new_item'  => 'Ajouter un membre',
			'edit_item'     => 'Modifier le membre',
		),
		'public'       => true,
		'has_archive'  => true,
		'supports'     => array( 'title' ),
		'menu_icon'    => 'dashicons-groups',
		'rewrite'      => array( 'slug' => 'membre' ),
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'acaae_register_membre_cpt' );

function acaae_disable_gutenberg_membre( $use_block_editor, $post_type ) {
	if ( $post_type === 'membre' ) {
		return false;
	}
	return $use_block_editor;
}
add_filter( 'use_block_editor_for_post_type', 'acaae_disable_gutenberg_membre', 10, 2 );

function acaae_enqueue_actualites_assets() {
	if ( is_page_template( 'page-actualites.php' ) ) {
		wp_enqueue_script(
			'acaae-actualites',
			get_template_directory_uri() . '/js/actualites.js',
			array(),
			'1.0',
			true
		);
		wp_localize_script( 'acaae-actualites', 'acaae_ajax', array(
			'url'   => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'acaae_actualites_nonce' ),
		) );
	}
}
add_action( 'wp_enqueue_scripts', 'acaae_enqueue_actualites_assets' );
 
function acaae_load_actualites() {
	check_ajax_referer( 'acaae_actualites_nonce', 'nonce' );
 
	$paged     = isset( $_POST['paged'] )     ? absint( $_POST['paged'] )                    : 2;
	$recherche = isset( $_POST['recherche'] ) ? sanitize_text_field( $_POST['recherche'] )   : '';
	$date      = isset( $_POST['date'] )      ? sanitize_text_field( $_POST['date'] )        : '';
	$auteur    = isset( $_POST['auteur'] )    ? absint( $_POST['auteur'] )                   : 0;
	$ordre     = isset( $_POST['ordre'] )     ? sanitize_text_field( $_POST['ordre'] )       : 'DESC';
 
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 6,
		'paged'          => $paged,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => ( $ordre === 'ASC' ) ? 'ASC' : 'DESC',
	);
 
	if ( $recherche ) $args['s']      = $recherche;
	if ( $auteur )    $args['author'] = $auteur;
	if ( $date )      $args['date_query'] = array( array( 'year' => intval( $date ) ) );
 
	$query = new WP_Query( $args );
	$html  = '';
 
	if ( $query->have_posts() ) {
		ob_start();
		while ( $query->have_posts() ) {
			$query->the_post();
			?>
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
			<?php
		}
		$html = ob_get_clean();
		wp_reset_postdata();
	}
 
	wp_send_json_success( array( 'html' => $html ) );
}
add_action( 'wp_ajax_acaae_load_actualites',        'acaae_load_actualites' );
add_action( 'wp_ajax_nopriv_acaae_load_actualites', 'acaae_load_actualites' );