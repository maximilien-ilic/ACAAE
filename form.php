<?php
/**
 * Template Name: Formulaire d'inscription
 * Association des Artisans
 */

get_header();
?>

<main class="inscription-page">
    <div class="inscription-wrapper">

        <div class="inscription-header">
            <h1>Formulaire d'inscription</h1>
            <p>En adhérant à notre association, vous participez activement à la promotion et à la valorisation de plus d'une dizaine de métiers d'art en Essonne. Que vous soyez artisan, amateur d'art ou simplement curieux de savoir-faire uniques, votre adhésion nous permet de continuer à organiser des événements, des ateliers et des expositions pour faire rayonner notre patrimoine artisanal.</p>
        </div>

        <div class="inscription-form-box">
            <form id="inscription-form" method="post" action="">
                <?php wp_nonce_field('inscription_form', 'inscription_nonce'); ?>

                <div class="form-grid">
                    <div class="form-field">
                        <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>
                    </div>
                    <div class="form-field">
                        <input type="text" name="nom" id="nom" placeholder="Nom" required>
                    </div>
                    <div class="form-field">
                        <input type="email" name="email" id="email" placeholder="Adresse mail" required>
                    </div>
                    <div class="form-field">
                        <input type="tel" name="telephone" id="telephone" placeholder="Numéro de téléphone">
                    </div>
                    <div class="form-field">
                        <input type="text" name="ville" id="ville" placeholder="Ville">
                    </div>
                    <div class="form-field">
                        <input type="text" name="metier" id="metier" placeholder="Votre métier de l'artisanat">
                    </div>
                    <div class="form-field full-width">
                        <textarea name="message" id="message" placeholder="Message complémentaire :"></textarea>
                    </div>
                </div>

                <div class="form-submit">
                    <button type="submit" class="btn-submit">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                        Soumettre
                    </button>
                </div>

                <div class="form-success" id="form-success">
                    ✓ Votre inscription a bien été envoyée. Nous vous recontacterons bientôt.
                </div>
            </form>
        </div>

    </div>
</main>

<?php get_footer(); ?>