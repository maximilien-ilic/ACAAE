<?php
/**
 * Front Page — Page d'accueil (/)
 *
 * @package acaae
 */

get_header();
?>


<main id="primary" class="site-main association-page">

    <!-- Bande blanche supérieure -->
    <div class="assoc-band assoc-band--top"></div>

    <!-- Zone verte avec la carte -->
    <div class="assoc-green-zone">
        <div class="assoc-card">

            <h1 class="assoc-title">Qui sommes nous ?</h1>

            <div class="assoc-logo-wrap">
                <img
                    src="<?php echo esc_url( get_template_directory_uri() . '/images/logo-acaae.png' ); ?>"
                    alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                    class="assoc-logo"
                />
            </div>

            <p class="assoc-valeurs">
                Les valeurs de notre association ?
                <em>Diversité, qualité, originalité</em> et <em>tradition</em>.
            </p>

            <p class="assoc-description">
                L'association des Créateurs &amp; Artisans de l'Essonne a pour but de promouvoir,
                diffuser, conserver, soutenir et faire connaître le travail des professionnels
                des métiers d'Art et de l'Artisanat ayant un statut reconnu par tous organismes
                obligatoires en organisant des événements propices à la reconnaissance de ces
                métiers et transmettre leur savoir&#8209;faire.
            </p>

            <div class="assoc-stats">
                <div class="assoc-stat"><span>17 ans d'activité</span></div>
                <div class="assoc-stat"><span>+ de 20 adhérents</span></div>
                <div class="assoc-stat"><span>+ de 14 métiers d'art</span></div>
                <div class="assoc-stat"><span>des dizaines de salons</span></div>
            </div>

        </div><!-- .assoc-card -->
    </div><!-- .assoc-green-zone -->

<!-- Section Galerie -->
<section class="galerie-section">
    <div class="galerie-wrapper">

        <?php
        $images = [
            get_template_directory_uri() . '/images/galerie_image1.jpg',
            get_template_directory_uri() . '/images/galerie_image2.jpg',
            get_template_directory_uri() . '/images/galerie_image3.jpg',
            get_template_directory_uri() . '/images/galerie_image4.jpg',
            get_template_directory_uri() . '/images/galerie_image5.jpg',
            get_template_directory_uri() . '/images/galerie_image6.jpg',
            get_template_directory_uri() . '/images/galerie_image7.jpg',
            get_template_directory_uri() . '/images/galerie_image8.jpg',
            get_template_directory_uri() . '/images/galerie_image9.jpg',
            get_template_directory_uri() . '/images/galerie_image10.jpg',
        ];
        $chunks = array_chunk($images, 6);
        ?>

        <div class="galerie-slider" id="galerie-slider">
            <?php if (!empty($chunks)) : ?>
                <?php foreach ($chunks as $index => $group) : ?>
                    <div class="galerie-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                        <div class="galerie-grid">
                            <?php foreach ($group as $src) : ?>
                                <div class="galerie-item">
                                    <img src="<?php echo esc_url($src); ?>" alt="Image galerie">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="galerie-empty">Aucune image disponible.</div>
            <?php endif; ?>
        </div>

        <!-- Flèches -->
        <div class="galerie-controls">
            <button class="galerie-prev" id="galerie-prev" aria-label="Précédent">&#60;</button>
            <button class="galerie-next" id="galerie-next" aria-label="Suivant">&#62;</button>
        </div>

    </div>
</section>
<script src="<?php echo get_template_directory_uri(); ?>/js/galerie.js"></script>
<?php get_footer(); ?>