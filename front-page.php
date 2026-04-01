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

    <!-- Bande blanche inférieure -->
    <div class="assoc-band assoc-band--bottom"></div>

</main>

<?php
get_footer();