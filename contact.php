<?php
/**
 * Template Name: Nous contacter
 * Association des Artisans
 */

get_header();
?>

<main class="contact-page">
    <div class="contact-wrapper">

        <h1 class="contact-title">Nous contacter</h1>

        <!-- Bloc infos -->
        <div class="contact-info-box">
            <p class="contact-info-label">Nos informations</p>
            <div class="contact-info-row">
                <span class="contact-info-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    Essonne, 91490 Oncy sur Ecole
                </span>
                <span class="contact-info-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.8a16 16 0 0 0 6.29 6.29l.98-.98a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    09 77 99 75 41
                </span>
                <span class="contact-info-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <a href="mailto:dieumegard.monique@orange.fr">dieumegard.monique@orange.fr</a>
                </span>
            </div>
        </div>

        <div class="contact-ou">OU</div>

        <!-- Formulaire -->
        <div class="contact-form-box">
            <p class="contact-form-label">Contactez nous directement !</p>
            <form id="contact-form" method="post" action="">
                <?php wp_nonce_field('contact_form', 'contact_nonce'); ?>

                <div class="contact-form-grid">
                    <div class="contact-field">
                        <input type="text" name="prenom" placeholder="Pénom" required>
                    </div>
                    <div class="contact-field">
                        <input type="text" name="nom" placeholder="Nom" required>
                    </div>
                    <div class="contact-field contact-full">
                        <input type="email" name="email" placeholder="Entrez une adresse mail valide" required>
                    </div>
                    <div class="contact-field contact-full">
                        <textarea name="message" placeholder="Votre message :"></textarea>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                    Envoyer le message
                </button>

                <div class="contact-success" id="contact-success">
                    ✓ Votre message a bien été envoyé. Nous vous répondrons bientôt.
                </div>
            </form>
        </div>

    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contact-form');
    const success = document.getElementById('contact-success');
    if (!form) return;
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        success.style.display = 'block';
        form.reset();
    });
});
</script>

<?php get_footer(); ?>