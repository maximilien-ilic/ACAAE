<?php
/**
 * Template Name: Newsletter
 * Association des Artisans
 */

get_header();
?>

<main class="newsletter-page">
    <div class="newsletter-wrapper">

        <div class="newsletter-header">
            <h2>Inscrivez-vous à notre Newsletter !</h2>
            <p>Ce courrier a pour vocation de vous tenir informé des actualités de notre association et de ses plus d'une dizaine de métiers d'art. Chaque édition vous propose un regard croisé sur les savoir-faire qui animent l'Essonne : des rencontres avec nos artisans, des ateliers à venir, des expositions et des initiatives pour valoriser le fait main dans notre territoire.</p>
        </div>

        <div class="newsletter-form-box">
            <form id="newsletter-form" method="post" action="">
                <?php wp_nonce_field('newsletter_form', 'newsletter_nonce'); ?>

                <div class="newsletter-email-field">
                    <input type="email" name="email" id="newsletter-email" placeholder="Entrez une adresse mail valide" required>
                </div>

                <p class="newsletter-interests-label">Par quoi seriez-vous intéressé.e ? (plusieurs choix possibles)</p>

                <div class="newsletter-metiers">
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Broderie">
        <img src="<?php echo get_template_directory_uri(); ?>/images/broderie.svg" alt="Broderie" class="metier-svg">
        <span class="metier-name">Broderie</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Céramique">
        <img src="<?php echo get_template_directory_uri(); ?>/images/ceramique.svg" alt="Céramique" class="metier-svg">
        <span class="metier-name">Céramique</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Décoration">
        <img src="<?php echo get_template_directory_uri(); ?>/images/decoration.svg" alt="Décoration" class="metier-svg">
        <span class="metier-name">Décoration</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Dorure">
        <img src="<?php echo get_template_directory_uri(); ?>/images/dorure.svg" alt="Dorure" class="metier-svg">
        <span class="metier-name">Dorure</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Ebénisme">
        <img src="<?php echo get_template_directory_uri(); ?>/images/ebenisme.svg" alt="Ebénisme" class="metier-svg">
        <span class="metier-name">Ebénisme</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Encadrement">
        <img src="<?php echo get_template_directory_uri(); ?>/images/encadrement.svg" alt="Encadrement" class="metier-svg">
        <span class="metier-name">Encadrement</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Ferronnerie">
        <img src="<?php echo get_template_directory_uri(); ?>/images/ferronnerie.svg" alt="Ferronnerie" class="metier-svg">
        <span class="metier-name">Ferronnerie</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Tapisserie">
        <img src="<?php echo get_template_directory_uri(); ?>/images/tapisserie.svg" alt="Tapisserie" class="metier-svg">
        <span class="metier-name">Tapisserie</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Lutherie">
        <img src="<?php echo get_template_directory_uri(); ?>/images/lutherie.svg" alt="Lutherie" class="metier-svg">
        <span class="metier-name">Lutherie</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Poterie">
        <img src="<?php echo get_template_directory_uri(); ?>/images/poterie.svg" alt="Poterie" class="metier-svg">
        <span class="metier-name">Poterie</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Stylisme">
        <img src="<?php echo get_template_directory_uri(); ?>/images/stylisme.svg" alt="Stylisme" class="metier-svg">
        <span class="metier-name">Stylisme</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Souffle de verre">
        <img src="<?php echo get_template_directory_uri(); ?>/images/souffle_de_verre.svg" alt="Souffle de verre" class="metier-svg">
        <span class="metier-name">Souffle de verre</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Restauration de tableaux">
        <img src="<?php echo get_template_directory_uri(); ?>/images/restauration.svg" alt="Restauration de tableaux" class="metier-svg">
        <span class="metier-name">Restauration de tableaux</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Gravure - émaillage">
        <img src="<?php echo get_template_directory_uri(); ?>/images/gravure_emaillage.svg" alt="Gravure – émaillage" class="metier-svg">
        <span class="metier-name">Gravure – émaillage</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Tous les métiers">
        <span class="metier-name">Tous les métiers</span>
    </label>
    <label class="metier-item">
        <input type="checkbox" name="metiers[]" value="Les évènements">
        <span class="metier-name">Les évènements</span>
    </label>
</div>

                <div class="newsletter-submit">
                    <button type="submit" class="btn-submit">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                        Soumettre
                    </button>
                </div>

                <div class="newsletter-success" id="newsletter-success">
                    ✓ Vous êtes bien inscrit à notre newsletter !
                </div>

            </form>
        </div>

    </div>
</main>

<?php get_footer(); ?>